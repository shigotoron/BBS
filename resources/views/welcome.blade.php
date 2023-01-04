<x-guest-layout>
    <h1 class="mt-8">Laravel掲示板</h1>
    <p>これはLaravelで作った電子掲示板です。</p>
    <p>なお、この電子掲示板の作り方に関して知りたい方は、<a class="text-blue-500" href="https://shigotoron.com/laravel-%e3%81%a7%e9%9b%bb%e5%ad%90%e6%8e%b2%e7%a4%ba%e6%9d%bf%e3%82%92%e4%bd%9c%e3%82%8d%e3%81%86-%e2%91%a0/">こちら</a>を参照して下さい。</p>
    <h2>みんなの記事一覧</h2>
    <table class="table-auto border-solid border-black border-2" style="border-collapse: separate; border-spacing: 0">
        <tr class="bg-green-300">
            <th class="border border-black px-4 py-2 text-center">タイトル</th>
            <th class="border border-black px-4 py-2 text-center">内容</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td class="border border-black px-4 py-2">
                    <a href="{{ route('post', $post['id']) }}" class="text-blue-500">{{ $post['title'] }}</a>
                </td>
                <td class="border border-black px-4 py-2">{{ Str::limit($post['content'], 80, '...') }}</td>
            </tr>
        @endforeach
    </table>
</x-guest-layout>