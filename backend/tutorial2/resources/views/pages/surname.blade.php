@extends('layout.app')
@section('tittle', '| Családevek')
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
                    <th>CsaládNév</th>
                    <th>Létrehozva</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($names as $name)
                    <tr>
                        <th>{{ $name->id }}</th>
                        <th>{{ $name->surname }}</th>
                        <th>{{ $name->created_at }}</th>
                        <td>
                            <a href="#" class="btn btn-sm btn-danger btn-delete-name"
                                data-id="{{ $name->id }}">Törlés</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <h3 class="mt-3">Új családnév</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="/names/manage/surname/new">
            @csrf
            <div class="form-group">
                <label for="inputfamily">Családnév</label>
                <input type="text" class="form-control" id="inputFamily" name="inputFamily"
                    placeholder="Családnév"value="{{ old('inputFamily') }}" minlength="2" maxlength="20">

            </div>
            <button type="submit" class="btn btn-primary mt-2">hozzáad</button>
        </form>

    </div>
@endsection
@section('scripts')
    <script>
        $('.btn-delete-name').on('click', function() {
            let thisBtn = $(this);
            let id = thisBtn.data('id');
            $.ajax({
                type: 'POST',
                url: '/names/manage/surname/delete',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(data) {
                    if (data.success == true) {
                        thisBtn.closest('tr').fadeOut()
                    } else alert('hiba történ a törlésnél:' + data.message);

                },
                error: function() {
                    alert('Nem sikerült a törlés');
                }


            })
        })
    </script>
@endsection
