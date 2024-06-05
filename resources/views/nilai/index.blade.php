@extends('layouts.index')
@section('title','nilai')
@section('content')
<div class="container mt-5">
            <a href="{{ route('nilai_tambah') }}" class="btn btn-primary">Tambah</a>
    @if(Session::has('Pesan'))
        <div class="alert alert-primary">
        {{Session::get('Pesan')}}
        </div>
    @endif
    @if(Session::has('Hapus'))
        <div class="alert alert-primary">
        {{Session::get('Hapus')}}
        </div>
    @endif
    @if(Session::has('edit'))
        <div class="alert alert-warning">
        {{Session::get('edit')}}
    </div>
    @endif
<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nama Siswa</th>
        <th>Nilai</th>
      </tr>
        <tbody>
        @foreach ($dataNilai as $item)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nilai }}</td>
            <td>
                <form action="{{route('hapus_nilai',$item->nilai_id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <a href="{{ route('nilai_edit',$item->nilai_id) }}"  class="btn btn-warning">Edit</a>
            </td>
        </tr>
            @endforeach
        </tbody>
    </tables>
</div>
@endsection
