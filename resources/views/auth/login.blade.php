<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin &mdash; PT Griya Beku Nusantara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { extend: {
                colors: {
                    brand: { 50:'#eef6fc',100:'#d7eaf8',600:'#1e5a8f',700:'#17456e',800:'#0e344f',900:'#0a2439' },
                    accent: { 400:'#54d2e6',500:'#28b9d2' },
                },
                fontFamily: { sans: ['Poppins', 'ui-sans-serif', 'system-ui', 'sans-serif'] },
            } }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <style>body { font-family: 'Poppins', ui-sans-serif, system-ui, sans-serif; }</style>
</head>
<body class="bg-brand-900 min-h-screen flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-sm">
        <div class="text-center mb-6">
            <span class="inline-flex h-20 w-20 items-center justify-center rounded-2xl bg-white p-2 shadow-lg mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo rumah PT Griya Beku Nusantara" class="h-full w-full object-contain">
            </span>
            <h1 class="text-white font-bold text-lg">PT Griya Beku Nusantara</h1>
            <p class="text-brand-200 text-sm">Login Admin</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8">
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-lg px-4 py-3 mb-5" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.login.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
                    <input type="email" name="email" id="email" required autofocus value="{{ old('email') }}"
                           autocomplete="username"
                           class="w-full rounded-lg border-slate-300 focus:border-brand-600 focus:ring-brand-600 text-sm"
                           placeholder="admin@griyabekunusantara.test">
                </div>
                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">Kata Sandi</label>
                    <input type="password" name="password" id="password" required autocomplete="current-password"
                           class="w-full rounded-lg border-slate-300 focus:border-brand-600 focus:ring-brand-600 text-sm"
                           placeholder="Kata sandi">
                </div>
                <label class="flex items-center gap-2 text-sm text-slate-500">
                    <input type="checkbox" name="remember" value="1" class="rounded border-slate-300 text-brand-600 focus:ring-brand-600">
                    Ingat saya
                </label>
                <button type="submit" class="w-full bg-brand-700 hover:bg-brand-800 text-white font-bold py-2.5 rounded-xl shadow transition">
                    Masuk
                </button>
            </form>
        </div>

        <p class="text-center text-brand-300 text-xs mt-6">
            <a href="{{ route('home') }}" class="hover:text-white">&larr; Kembali ke website</a>
        </p>
    </div>
</body>
</html>