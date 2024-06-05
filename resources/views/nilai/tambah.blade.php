@extends('layouts.index')
@section('title','Nilai')
@section('content')
<div class="container">
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('validasi_nilai'))
    <div class="alert alert-danger">
    {{Session::get('validasi_nilai')}}
    </div>
    @endif
    <form action="{{ route('aksi_tambah') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="siswa">Siswa</label>
            <select class="form-select" name="siswa_id">
                <option value="">Pilih siswa</option>
                @foreach($dataSiswa as $siswa)
                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nilai">Nilai</label>
            <input type="text" class="form-control" name="nilai">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
