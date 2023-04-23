@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
        @if(empty($errors->first('image')))
            <li>再度、店舗を選択してください。</li>
            <li>画像ファイルがあれば、再度、選択してください。</li>
        @endif
    </ul>
@endif
