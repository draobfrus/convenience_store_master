<x-app-layout>
    <x-slot name="header">
        <p class="pb-2">{{ $user->name }}さん、こんにちは！<p>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            {{ ('投稿一覧') }}
        </h2>
        <!-- メッセージ -->
        <x-validation-errors class="my-2" :messages="$errors->all()"/>
        @if(session('message'))
            <x-message :message="session('message')" />
        @endif
        <!-- 検索フォーム -->
        <form method="get" action="{{ route('post.index') }}">
            <input type="text" name="search" placeholder="タイトル検索" class="w-2/3">
            <x-primary-button class="mt-6">
                検索する
            </x-primary-button>
        </form>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <!-- コンテンツ -->
        <div class="container py-16 mx-auto">
            <div class="grid gap-x-2 gap-y-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($posts as $post)
                <div class="mb-10 md:mb-20 px-6">
                    <div class="rounded-lg bg-white group mb-2 block h-48 overflow-hidden">
                        @if($post->image)
                            <img src="{{ $post->image }}" alt="Image">
                        @else
                            <img alt="content" class="object-cover object-center h-full w-full" src="{{ asset('images/no_image.jpg') }}">
                        @endif
                    </div>
                    <h2 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer pt-4">
                        <a href="{{route('post.show', $post)}}">{{ $post->title }}</a>
                    </h2>
                    <p class="leading-relaxed text-base">{{ $post->user->name }}</p>
                    <p class="leading-relaxed text-base">{{$post->created_at->diffForHumans()}}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-6 mb-2">
            {{ $posts->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</x-app-layout>
