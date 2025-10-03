@extends('layout.app')
@section('tittle', '| Nevek')
@section('content')
    {{-- A nevek egy listbázása a tömböll --}}
    <div class="container">
        {{-- <ul>
            @foreach ($names as $name)
                <li @if ($name == 'soma') style="font-weight: bold;"@endif>
                    @if ($loop->last)utólsó: @endif
                    {{$name.split(':')[1].split(',')[0]}}
                    
                </li>
            @endforeach
            
        </ul> --}}

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Név</th>
                    <th>Létrehozva</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($names as $name)
                    <tr>
                        <td>{{ $name->id }}</td>
                        @empty($name->family)
                            <td><strong>Nincs adat</strong></td>
                        @else
                            <td>{{ $name->family->surname }}</td>
                        @endempty
                        <td>{{ $name->name }}</td>
                        <td>{{ $name->created_at }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
