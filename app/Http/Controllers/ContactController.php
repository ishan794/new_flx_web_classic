<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|min:20|max:5000',
        ]);
        
        // Log it for now (no mail config needed per requirements)
        Log::info('Contact form submission', $validated);
        
        return back()->with('success', 'Message sent! We\'ll get back to you within 24 hours.');
    }
}
