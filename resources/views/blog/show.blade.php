<x-layout title="Blog">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 pt-8 lg:gap-6">
        <div class="hidden lg:block lg:col-span-3 sidebar">
            <ul>
                @foreach ($posts as $year => $months)
                    @foreach ($months as $month => $posts)
                        <li>
                            {{ $month }} {{ $year }}

                            <ul>
                                @foreach ($posts as $post)
                                    <li><a href="{{ $post->url }}">{{ $post->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>

        <div class="lg:col-span-9">
            <h1>{{ $post->title }}</h1>
            {!! $post->content !!}
        </div>
    </div>
</x-layout>