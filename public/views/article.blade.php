@extends('layout')

@section('title', 'Makale - ' . $article_title)

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $article_title }}</h5>
            {{ htmlspecialchars_decode($article_text) }}
        </div>
    </div>

@endsection