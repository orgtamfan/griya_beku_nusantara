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
                    ivory: { 50:'#FAF8F5', 100:'#F3EFE8', 200:'#E2DDD4' },
                    brand: { 50:'#EDF3F6', 100:'#D4E2EA', 600:'#1A5270', 700:'#144159', 800:'#0F3548', 900:'#0A2330' },
                },
                fontFamily: {
                    sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    serif: ['Fraunces', 'Georgia', 'serif'],
                },
            } }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <style>body { font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif; }</style>
</head>
<body class="bg-ivory-50 text-[#1B1F23] min-h-screen flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-sm">
        <div class="flex items-center gap-3 mb-6">
            <span class="inline-flex h-12 w-12 items-center justify-center rounded-lg bg-white border border-ivory-200 p-1.5">
                <img src="{{ asset('images/logo.png') }}" alt="Logo PT Griya Beku Nusantara" class="h-full w-full object-contain">
            </span>
            <div>
                <h1 class="font-bold text-base text-brand-900">PT Griya Beku Nusantara</h1>
                <p class="text-[#636B73] text-xs uppercase tracking-wider">Portal Admin</p>
            </div>
        </div>

        <div class="bg-white border border-ivory-200 rounded-lg p-6 sm:p-7">
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 text-sm rounded-md px-3.5 py-2.5 mb-5" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.login.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#525B63] mb-1.5">Email</label>
                    <input type="email" name="email" id="email" required autofocus value="{{ old('email') }}"
                           autocomplete="username"
                           class="w-full rounded-md border border-ivory-200 px-3 py-2 text-sm focus:outline-none focus:border-brand-700 focus:ring-1 focus:ring-brand-700"
                           placeholder="admin@griyabekunusantara.test">
                </div>
                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#525B63] mb-1.5">Kata Sandi</label>
                    <input type="password" name="password" id="password" required autocomplete="current-password"
                           class="w-full rounded-md border border-ivory-200 px-3 py-2 text-sm focus:outline-none focus:border-brand-700 focus:ring-1 focus:ring-brand-700"
                           placeholder="Kata sandi">
                </div>
                <label class="flex items-center gap-2 text-sm text-[#525B63]">
                    <input type="checkbox" name="remember" value="1" class="rounded border-ivory-200 text-brand-800 focus:ring-brand-700">
                    Ingat saya
                </label>
                <button type="submit" class="w-full bg-brand-800 hover:bg-brand-900 text-white font-semibold text-sm py-2.5 rounded-lg transition">
                    Masuk
                </button>
            </form>
        </div>

        <p class="text-center text-[#636B73] text-xs mt-5">
            <a href="{{ route('home') }}" class="hover:text-brand-800">&larr; Kembali ke beranda</a>
        </p>
    </div>
</body>
</html>
