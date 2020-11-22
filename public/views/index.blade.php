@extends('layout')

@section('title', 'Üye ' . $username)

@section('content')
<h3>
    Hoşgeldin, {{$username}}
</h3>
@endsection