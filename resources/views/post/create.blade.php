<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('投稿作成') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <!-- メッセージ -->
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
            </div>
        @endif
        <!-- フォーム -->
        <form method="post" action="{{ route('post.store') }}">
          @csrf
            <div class="flex flex-col gap-2 p-4 md:p-8">
                <label for="title" class="font-semibold mt-4">タイトル</label>
                <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{ old('title' )}}">
            </div>
            <div class="flex flex-col gap-2 p-4 md:p-8">
                <label for="body" class="font-semibold mt-4">本文</label>
                <textarea name="body" class="w-auto py-2 border border-gray-300 rounded-md" id="title" cols="30" rows="5">{{ old('body') }}</textarea>
            </div>
            <div class="flex flex-col gap-2 p-4 md:p-8">
                <label for="image" class="font-semibold mt-4">画像</label>
                <input type="file" name="image" class="w-auto py-2 border border-gray-300 bg-white rounded-md" id="title">
            <div class="flex justify-center">
            <!-- 投稿ボタン -->
            <x-primary-button class="mt-12">
                投稿する
            </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
