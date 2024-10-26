@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Rumah Sakit</h2>

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

    <form action="{{ route('hospitals.update', $hospital->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nama Rumah Sakit</label>
            <input type="text" name="hospital_name" class="form-control" value="{{ old('hospital_name', $hospital->hospital_name) }}" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $hospital->address) }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $hospital->email) }}" required>
        </div>

        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $hospital->phone) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('hospitals.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
