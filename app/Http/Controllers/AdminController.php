<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if ($email === config('app.admin_email') && $password === config('app.admin_password')) {
            session(['is_admin' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        session()->forget('is_admin');
        return redirect()->route('home');
    }

    public function dashboard()
    {
        $cmsData = json_decode(File::get(storage_path('app/cms/content.json')), true);
        return view('admin.dashboard', compact('cmsData'));
    }

    public function preview()
    {
        return view('admin.preview');
    }

    public function update(Request $request)
    {
        $cmsData = $request->input('cms_data');
        if (!$cmsData) {
            return response()->json(['success' => false, 'message' => 'No data provided']);
        }

        // Save data
        File::put(storage_path('app/cms/content.json'), json_encode($cmsData, JSON_PRETTY_PRINT));

        // Auto-deploy via Git
        $cwd = base_path();
        $output = shell_exec("cd {$cwd} && git add storage/app/cms/content.json && git commit -m \"Admin content update\" && git push origin main 2>&1");

        return response()->json([
            'success' => true, 
            'message' => 'Saved and deployed successfully!',
            'git_output' => $output
        ]);
    }

    public function loadProject()
    {
        $projectFile = storage_path('app/cms/project.json');
        if (File::exists($projectFile)) {
            $data = File::get($projectFile);
            return response($data)->header('Content-Type', 'application/json');
        }
        
        return response()->json([]); // Empty project for new installations
    }

    public function saveProject(Request $request)
    {
        $payload = json_decode($request->getContent(), true);
        
        if (!$payload) {
            return response()->json(['success' => false, 'message' => 'No data provided'], 400);
        }

        $cmsDir = storage_path('app/cms');
        if (!File::exists($cmsDir)) {
            File::makeDirectory($cmsDir, 0755, true);
        }

        // Save the raw GrapesJS project data
        if (isset($payload['project_data'])) {
            File::put($cmsDir . '/project.json', json_encode($payload['project_data']));
        }

        // Save the compiled HTML/CSS pages
        if (isset($payload['html_pages'])) {
            $pagesDir = storage_path('app/cms/pages');
            if (!File::exists($pagesDir)) {
                File::makeDirectory($pagesDir, 0755, true);
            }
            foreach ($payload['html_pages'] as $slug => $content) {
                File::put($pagesDir . '/' . $slug . '.html', $content['html'] ?? '');
                File::put($pagesDir . '/' . $slug . '.css', $content['css'] ?? '');
            }
        }

        // Auto-deploy via Git
        $cwd = base_path();
        $output = shell_exec("cd {$cwd} && git add storage/app/cms/* && git commit -m \"Multi-page project update\" && git push origin main 2>&1");

        return response()->json([
            'success' => true,
            'message' => 'Project saved successfully',
            'git_output' => $output
        ]);
    }

    public function uploadMedia(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/uploads'), $filename);

            return response()->json([
                'data' => [
                    url('images/uploads/' . $filename)
                ]
            ]);
        }
        
        // GrapesJS sends multiple files sometimes as files[]
        if ($request->hasFile('files')) {
            $uploaded = [];
            foreach ($request->file('files') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/uploads'), $filename);
                $uploaded[] = url('images/uploads/' . $filename);
            }
            return response()->json(['data' => $uploaded]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
