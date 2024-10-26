@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Pasien</h2>

    <!-- Menampilkan error jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Pasien</label>
            <input type="text" name="patient_name" class="form-control" value="{{ old('patient_name', $patient->patient_name) }}" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $patient->address) }}" required>
        </div>

        <div class="form-group">
            <label>No. Telepon</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $patient->phone) }}" required>
        </div>

        <div class="form-group">
            <label>Rumah Sakit</label>
            <select name="hospital_id" class="form-control" required>
                <option value="">Pilih Rumah Sakit</option>
                @foreach ($hospitals as $hospital)
                    <option value="{{ $hospital->id }}" {{ $hospital->id == old('hospital_id', $patient->hospital_id) ? 'selected' : '' }}>
                        {{ $hospital->hospital_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
