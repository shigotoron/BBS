<x-guest-layout>
    <h1>Laravel掲示板</h1>
    <p>これはLaravelで作った電子掲示板です。</p>
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