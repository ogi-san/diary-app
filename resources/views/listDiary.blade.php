<!-- resources/views/diaries/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('日記一覧') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('createDiary') }}" method="get">
                        <x-primary-button class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">新しい日記を作成</x-primary-button>    
                    </form>
                    @if($diaries->isEmpty())
                    <p class="message">日記がありません。</p>
                    @else

                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">タイトル</th>
                                <th class="py-2 px-4 border-b">内容</th>
                                <th class="py-2 px-4 border-b">操作</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                        @foreach($diaries as $diary)
                            <tr>
                                <td class="py-2 px-4 border-b break-words"> {{ $diary->title }}</td>
                                <td class="py-2 px-4 border-b break-words "> {{ $diary->content }} </td>
                                <td class="py-2 px-4 border-b">
                                    <form action="{{ route('editDiary', $diary->id) }}" method="get" class="inline">
                                        @csrf
                                        <x-primary-button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">{{__("編集")}}</x-primary-button>
                                    </form>
                                    <form action="{{ route('destroyDiary', $diary->id) }}" method="post" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{__("削除")}}</x-danger-button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
