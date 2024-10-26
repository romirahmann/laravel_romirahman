@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Pasien</h2>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mt-2 mb-2">Tambah Pasien</a>
    <select id="hospitalFilter" class="form-control mb-3 mt-2">
        <option value="">Semua Rumah Sakit</option>
        @foreach($hospitals as $hospital)
            <option value="{{ $hospital->id }}">{{ $hospital->hospital_name }}</option>
        @endforeach
    </select>

    <table class="table mt-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>Rumah Sakit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="patientTable">
            @foreach($patients as $index => $patient)
                <tr data-hospital-id="{{ $patient->hospital_id }}">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $patient->patient_name }}</td>
                    <td>{{ $patient->address }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->hospital->hospital_name }}</td>
                    <td>
                        <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger delete" data-id="{{ $patient->id }}">Hapus</button>
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
                url: '/patients/' + id,
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

    $('#hospitalFilter').change(function() {
        var hospitalId = $(this).val();
        $('#patientTable tr').each(function() {
            $(this).toggle(hospitalId ? $(this).data('hospital-id') == hospitalId : true);
        });
    });
</script>
@endsection
