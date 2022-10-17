@extends('layout.main')

@section('title_page','Blank')
@section('title','Blank Page')
@section('content')
<h1>
    Hello {{ Auth::user()->name }}
</h1>
@endsection