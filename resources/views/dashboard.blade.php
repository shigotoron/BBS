<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}（あなたの記事一覧）
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="table-auto border-solid border-black border-2" style="border-collapse: separate; border-spacing: 0">
                <tr class="bg-green-300">
                    <th class="border border-black px-4 py-2">タイトル</th>
                    <th class="border border-black px-4 py-2">内容</th>
                    <th class="border border-black px-4 py-2">更新日時</th>
                </tr>
                @foreach ($posts as $post)
                    <tr>
                        <td class="border border-black px-4 py-2 text-blue-500">
                            <a href="{{ route('post', $post['id']) }}">{{ $post['title'] }}</a>
                        </td>
                        <td class="border border-black px-4 py-2">{{ Str::limit($post['content'], 60, '…' ) }}</td>
                        <td class="border border-black px-4 py-2">{{ $post['updated_at'] }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>