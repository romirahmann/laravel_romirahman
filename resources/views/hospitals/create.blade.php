@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Rumah Sakit</h2>
    <form action="{{ route('hospitals.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Rumah Sakit</label>
            <input type="text" name="hospital_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
