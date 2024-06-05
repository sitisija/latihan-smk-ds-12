@extends('layouts.index')
@section('title','Nilai')
@section('content')
<div class="container">
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('validasi_nilai'))
    <div class="alert alert-danger">
    {{ Session::get('validasi_nilai') }}
    </div>
    @endif
    <form action="{{ route('aksi_edit', $nilai->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="siswa">Siswa</label>
            <select name="siswa_id" class="form-control">
                <option value="">Pilih siswa</option>
                @foreach($dataSiswa as $siswa)
                    <option
                    @if ($siswa->id==$nilai->siswa_id)
                    selected
                    @endif
                    value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nilai">Nilai</label>
            <input type="text" value="{{ $nilai->nilai }}" class="form-control" name="nilai">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
