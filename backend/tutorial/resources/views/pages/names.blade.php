@extends('layout.app')
@section('tittle', '| Nevek')
@section('content')
    {{-- A nevek egy listbázása a tömböll--}}
    <div class="container">
        <ul>
            @foreach($names as $name)
                <li @if($name == 'soma') style="font-weight: bold;"@endif>
                    @if($loop->last)utólsó: @endif
                    {{$name}}
                    
                </li>
            @endforeach
            
        </ul>
    </div>
@endsection