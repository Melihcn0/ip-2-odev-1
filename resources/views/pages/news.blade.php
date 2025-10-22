@extends('layout')

@section('title')
    ÇTBMYO | Haberler
@endsection

@section('content')
    @foreach($news as $newsItem)
        <div stlye="margin-bottom:20px;">
            <a href="{{ $newsItem->link }}" target="_blank">
                <h5>{{ $newsItem->title }}</h5>
                <p>{{ $newsItem->description }}</p>
            </a>
        </div>
    @endforeach
@endsection