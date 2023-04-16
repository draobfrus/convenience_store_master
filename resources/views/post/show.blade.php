<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿詳細
        </h2>

        <x-message :message="session('message')" />

    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <div class="px-10 mt-4">
                <div class="bg-white w-full md:w-2/3 mx-auto rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                        <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer">
                            {{ $post->title }}
                            <!-- 編集・削除ボタン -->
                            <div class="flex justify-end mt-4">
                                @can('update', $post)
                                <a href="{{route('post.edit', $post)}}"><x-primary-button class="bg-cyan-400 hover:bg-cyan-500 focus:bg-cyan-500 active:bg-cyan-600 float-right mb-2">編集</x-primary-button></a>
                                @endcan
                                @can('delete', $post)
                                <form method="post" action="{{route('post.destroy', $post)}}">
                                    @csrf
                                    @method('delete')
                                    <x-primary-button class="bg-red-500 hover:bg-red-600 focus:bg-red-600 active:bg-red-700 float-right ml-4" onClick="return confirm('本当に削除しますか？');">削除</x-primary-button>
                                </form>
                                @endcan
                            </div>
                        <div>
                            </h1><hr class="w-full">
                            <p class="mt-4 text-gray-600 py-4">{{$post->body}}</p>
                            <div class="rounded-lg bg-white group mb-2 block overflow-hidden">
                                @if($post->image)
                                    <img src="{{ $post->image }}" alt="Image">
                                @else
                                    <img alt="content" class="object-cover object-center h-full w-full" src="{{ asset('images/no_image.jpg') }}">
                                @endif
                            </div>
                            <div class="text-sm font-semibold flex flex-row">
                                <p>by {{ $post->user->name }} • {{$post->created_at->format('Y/m/d')}}</p>
                            </div>
                            <!-- ブックマークボタン -->
                            <div class="flex justify-end">
                                @if (!Auth::user()->is_bookmark($post->id))
                                <form action="{{ route('bookmark.store', $post) }}" method="post">
                                    @csrf
                                    <x-primary-button class="bg-orange-400 hover:bg-orange-500 focus:bg-orange-500 active:bg-orange-600">ブックマーク</x-primary-button>
                                </form>
                                @else
                                <form action="{{ route('bookmark.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <x-primary-button class="bg-orange-400 hover:bg-orange-500 focus:bg-orange-500 active:bg-orange-600">ブックマーク解除</x-primary-button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
