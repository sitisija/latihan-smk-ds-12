@extends('layouts.index')

@section('content')
<div class="container">
    <h2>Tambah kelas</h2>

    <form action="{{ route('aksi_tambah_kelas') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <input type="text" value="{{ $dataKelas->id }}" name="kelas" class="form-control" placeholder="Masukkan kelas">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
