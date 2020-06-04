@extends('layouts.default')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 pt-8 lg:gap-6">
        <div class="hidden lg:block lg:col-span-3 sidebar">
            {!! $index !!}
        </div>

        <div class="lg:col-span-9">
            {!! $content !!}
        </div>

    </div>
@endsection