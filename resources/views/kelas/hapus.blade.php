@extends('layouts.index')

@section('content')
<div class="container">
    <h2>Hapus Kelas</h2>
    <div class="alert alert-warning">
        Apakah Anda yakin ingin menghapus kelas <strong>{{ $dataKelas->kelas }}</strong>?
    </div>
    <form action="{{ route('hapus_kelas', $dataKelas->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
