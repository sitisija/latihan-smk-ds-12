@extends('layouts.index')
@section('content')
<div class="container">
    <h2>Edit kelas</h2>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('edit'))
    <div class="alert alert-success">
        {{ Session::get('edit') }}
    </div>
    @endif
    <form action="{{ route('aksiedit', $dataKelas->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <input type="text" value="{{ $dataKelas->id }}" name="kelas" class="form-control" placeholder="Masukan kelas">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection
