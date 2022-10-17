@extends('layout.main')

@section('title_page','Blank')
@section('title','Blank Page')
@section('content')
<h1>
    Hello {{ Auth::user()->name }}
    
</h1>
@if(empty($pmjn))
    
        <h3>
        Anda tidak memiliki peminjaman yang belum dikembalikan
        </h3>
@else
        <h3>
        Anda memiliki peminjaman yang belum dikembalikan
        </h3>
@endif

@endsection