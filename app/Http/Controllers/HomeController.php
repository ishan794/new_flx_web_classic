<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return $this->servePage('home', 'home', $request);
    }

    public function showCustomPage($slug, Request $request)
    {
        return $this->servePage($slug, '404', $request);
    }

    private function servePage($slug, $fallbackView, Request $request)
    {
        $pagesDir = storage_path('app/cms/pages');
        
        // If editing in GrapesJS, or if no saved page exists, return Blade template
        if ($request->has('grapesjs') || !\Illuminate\Support\Facades\File::exists($pagesDir . '/' . $slug . '.html')) {
            if (view()->exists($fallbackView)) {
                return view($fallbackView);
            }
            abort(404);
        }

        // Return the GrapesJS saved static HTML wrapped in the main layout
        $html = \Illuminate\Support\Facades\File::get($pagesDir . '/' . $slug . '.html');
        $css = \Illuminate\Support\Facades\File::exists($pagesDir . '/' . $slug . '.css') 
            ? \Illuminate\Support\Facades\File::get($pagesDir . '/' . $slug . '.css') 
            : '';

        return view('page', [
            'contentHtml' => $html,
            'customCss' => $css
        ]);
    }
}
