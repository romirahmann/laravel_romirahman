@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Rumah Sakit</h2>
    <a href="{{ route('hospitals.create') }}" class="btn btn-primary">Tambah Rumah Sakit</a>
    <table class="table mt-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Rumah Sakit</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hospitals as $index => $hospital)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $hospital->hospital_name }}</td>
                    <td>{{ $hospital->address }}</td>
                    <td>{{ $hospital->email }}</td>
                    <td>{{ $hospital->phone }}</td>
                    <td>
                        <a href="{{ route('hospitals.edit', $hospital) }}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger delete" data-id="{{ $hospital->id }}">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        if(confirm('Anda yakin ingin menghapus data ini?')) {
            $.ajax({
                url: '/hospitals/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                }
            });
        }
    });
</script>
@endsection
