<x-app-layout>
    <x-slot name="header">
        <p class="pb-2">{{ $user->name }}さん、こんにちは！<p>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-2">
            {{ ('投稿一覧') }}
        </h2>
        <x-validation-errors class="my-2" :messages="$errors->all()"/>
        @if(session('message'))
            <x-message :message="session('message')" />
        @endif
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <!-- コンテンツ -->
        <div class="container py-16 mx-auto">
            <div class="grid gap-x-6 gap-y-6 sm:grid-cols-2 md:gap-x-6 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($posts as $post)
                <div class="mb-10 px-6">
                    <div class="rounded-lg h-64 overflow-hidden">
                        @if($post->image)
                            <img src="{{ $post->image }}" alt="Image">
                        @else
                            <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1201x501">
                        @endif
                    </div>
                    <h2 class="title-font text-2xl font-medium text-gray-900 my-3">{{ $post->title }}</h2>
                    <p class="leading-relaxed text-base">{{ $post->user->name }}</p>
                    <p class="leading-relaxed text-base">{{$post->created_at->diffForHumans()}}</p>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
