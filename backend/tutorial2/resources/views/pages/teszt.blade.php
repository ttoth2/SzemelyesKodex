@extends('layout.app')
@section('tittle', '| KOMA oldal')
@section('content')
    

<div class="jumbotron">
        <h1>halló</h1>
        <p class="lead">demo dejo</p>
        <a href="https://szbi-pg.hu" class="btn btn-lg btn-primary" role="button">suli</a>
        <p>{{ date('Y-m-d H:i:s')}}</p>
        <p>{{$randomName}}</p>
</div>
@endsection