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
                        <td>
                            <a href="#" class="btn btn-sm btn-danger btn-delete-name"
                                data-id="{{ $name->id }}">Törés</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script>
        $('.btn-delete-name').on('click', function() {
            let thisBtn = $(this);
            let id = thisBtn.data('id');
            $.ajax({
                type: 'POST',
                url: '/names/delete',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function() {
                    thisBtn.closest('tr').fadeOut()
                },
                error: function() {
                    alert('Nem sikerült a törlés');
                }


            })
        })
    </script>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let deleteButtons = document.querySelectorAll('.btn-delete-name');

        deleteButtons.forEach(function(button) {
            let id = this.dataset.id;

            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('id', id);

            fetch('/names/delete', {
                method: 'POST',
                body: formData
            }).then(response => {
                if (!response.ok) {
                    throw new Error('Nem ikerült komának')
                }
                return response;
            }).then(() => {
                let row = this.closest('tr');
                row.style.display = 'none';
            }).catch(error => {
                alert(error.message)
            });
        });
    })
</script>
