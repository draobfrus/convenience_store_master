<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            {{ ('投稿編集') }}
        </h2>
        <!-- メッセージ -->
        <x-validation-errors class="my-2" :messages="$errors->all()"/>
        @if(session('message'))
            <x-message :message="session('message')" />
        @endif
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <!-- フォーム -->
        <form method="post" action="{{route('post.update', $post)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="flex flex-col gap-2 p-4 md:p-8">
                <label for="title" class="font-semibold mt-4">タイトル</label>
                <input type="text" name="title" class="w-auto py-2 border border-gray-300 placeholder-gray-400 rounded-md" id="title" value="{{ old('title', $post->title )}}" placeholder="必須/255字以下で入力してください">
            </div>
            <div class="flex flex-col gap-2 p-4 md:p-8">
                <label for="body" class="font-semibold mt-4">本文</label>
                <textarea name="body" class="w-auto py-2 border border-gray-300 placeholder-gray-400 rounded-md" id="title" cols="30" rows="5" placeholder="必須/1000字以下で入力してください">{{ old('body', $post->body) }}</textarea>
            </div>
            <div class="flex flex-col gap-2 p-4 md:p-8">
                <label for="image" class="font-semibold mt-4">画像（1MBまで）</label>
                <input type="file" name="image" class="w-auto py-2 border border-gray-300 bg-white rounded-md" id="title">
                <p class="text-xs text-gray-500">*jpg、jpeg、png、bmp、gif、svg、webpのみ有効</p>
                @if($post->image)
                    <p class="pt-10">（現在の画像）</p>
                    <img src="{{ $post->image }}" alt="Image">
                @endif
            <div class="flex justify-center">
            <!-- 投稿ボタン -->
            <x-primary-button class="mt-12">
                更新する
            </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
