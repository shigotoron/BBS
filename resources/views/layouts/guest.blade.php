<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ (isset($title) ? $title . ' | ' : '') . config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="flex flex-wrap justify-between mb-8">
            <div class="px-4 py-4">
                <a href="/" class="text-sm text-gray-700 underline dark:text-gray-500">トップページ</a>
            </div>
            @if (Route::has('login'))
                <div class="px-4 py-4 text-right sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline dark:text-gray-500">ダッシュボード</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline dark:text-gray-500">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">会員登録</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        
        <div class="px-4 font-sans antialiased text-gray-900">
            <div class="max-w-2xl mx-auto prose">
                {{ $slot }}
            </div>
        </div>

        <footer class="h-10 mt-10 text-center text-white bg-green-700">
            <small class="leading-10">&copy; {{ config('app.name') }}</small>
        </footer>

        {!! htmlScriptTagJsApi() !!}
    </body>
</html>
