<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | Flxwaretech</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="font-sans text-white antialiased bg-navy-dark flex items-center justify-center min-h-screen relative overflow-hidden">
    
    <div class="absolute inset-0 z-0 bg-gradient-to-b from-navy-deep/60 to-navy-deep"></div>
    <div class="absolute inset-0 z-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.05) 1px, transparent 0); background-size: 24px 24px;"></div>

    <div class="z-10 bg-navy-mid border border-white/10 p-8 rounded-2xl shadow-2xl w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-white">Flxware<span class="text-accent">tech</span></h1>
            <p class="text-gray-400 mt-2">Sign in to manage the website.</p>
        </div>

        @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 p-3 rounded-lg text-sm mb-6">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                <input type="email" name="email" required class="w-full bg-navy-deep border border-white/10 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-colors" placeholder="admin@example.com">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                <input type="password" name="password" required class="w-full bg-navy-deep border border-white/10 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-colors" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
            </div>

            <button type="submit" class="w-full bg-accent hover:bg-blue-600 text-white font-medium py-3 px-4 rounded-lg transition-colors">
                Sign In
            </button>
        </form>
    </div>
</body>
</html>
