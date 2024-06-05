@extends('layouts.index')

@section('content')
<div class="container">
    <h2>Edit siswa</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (Session::has('edit'))
    <div class="alert alert-success">
        {{ Session::get('edit') }}
    </div>
    @endif

    <form action="{{ route('aksi_edit_siswa', $dataSiswa->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Siswa</label>
            <input type="text" value="{{ $dataSiswa->nama }}  {{$dataSiswa->alamat}}" name="nama" class="form-control" placeholder="Masukkan nama siswa">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection
