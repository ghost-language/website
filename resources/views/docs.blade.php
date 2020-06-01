@extends('layouts.default')

@section('content')
    <div class="flex">
        <div class="sidebar hidden md:flex md:flex-shrink-0">
            <div class="sidebar__container">
                {!! $index !!}
            </div>
        </div>

        <div class="p-0 md:pl-12 max-w-screen-md">
            {!! $content !!}
        </div>
    </div>
@endsection