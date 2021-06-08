@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <img src="{{ asset('uploads/profile_images/' . Auth::user()->profile_image) }}">
        </div>
    </div>
@endsection
