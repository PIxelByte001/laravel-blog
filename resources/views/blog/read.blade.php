@extends('layouts.home')

@section('page')

<div class="container mt-4" style="max-width:1000px">
    <p>{!!$blog->title!!}</p>

    <p style="text-align:justify">{!!$blog->content!!}</p>

    <p class="text-end mt-5">Publisher : {{$blog->author}}</p>
</div>
@endsection