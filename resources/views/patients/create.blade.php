@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pasien</h2>
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Pasien</label>
            <input type="text" name="patient_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label>No Telepon</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Rumah Sakit</label>
            <select name="hospital_id" class="form-control" required>
                @foreach($hospitals as $hospital)
                    <option value="{{ $hospital->id }}">{{ $hospital->hospital_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
