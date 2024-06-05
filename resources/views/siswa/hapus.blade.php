@extends('layouts.index')

@section('content')
<div class="container">
    <h2>Hapus Siswa</h2>

    <form action="{{ route('aksi_hapus_siswa', $dataSiswa->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Siswa</label>
            <input type="text" value="{{ $dataSiswa->nama }} {{$dataSiswa->alamat}}" name="nama" class="form-control" placeholder="Masukkan nama siswa" readonly>
        </div>
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
</div>
@endsection
