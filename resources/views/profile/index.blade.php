@extends('layouts.index')
@section('content')
    <div class="container">
        <h2>Profile</h2>
        @if ($errors->all())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach
            
        @endif
        <div class="row">
            <div class="col-lg-5">
                <form action="{{route('aksi_edit_profile')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text"class="form-control" value="{{auth()->user()->nama}}" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        {{-- biar ga bisa di ganti itu readonly klo ngga disabled dan inputannya bedaa jika disable itu tidak muncul
                            jika readonlyy makan emaillnya muncul--}}
                        <input type="text" class="form-control" disabled value="{{auth()->user()->email}}" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Edit Profile
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection