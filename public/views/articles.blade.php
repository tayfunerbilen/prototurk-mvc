@extends('layout')

@section('title', 'Makaleler')

@section('content')

    <h3>
        Makaleler
    </h3>

    @foreach($articles as $article)
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $article->article_title }}</h5>
                <a href="{{url('article', ['url' => $article->article_url])}}" class="btn btn-primary">Görüntüle</a>
            </div>
        </div>
    @endforeach

@endsection