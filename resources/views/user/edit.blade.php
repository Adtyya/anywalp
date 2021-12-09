@include('nav.navtop')
@extends('default.template')
@section('content')
    <section>
        <div class="container">
            @if(session()->has('succes'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('succes') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <h3>Edit akun</h3>
        <div class="row">
            <div class="col-md">
                <form action="{{ url('/updateUser/'.$user->id) }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">Nama</label>
                            <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{$user->name}}"required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-gorup mt-2">
                        <button type="submit" class="btn" style="background-color: #082032;color:white">Simpan perubahan</button>
                        <a href="{{ url('/setting/changepass/'.$user->id) }}" class="btn" style="background-color: #082032;color: white;">Ganti password</a>
                    </div>
                    
                    <a href="/">Kembali</a>
                </form>
            </div>
        </div>
        </div>
    </section>
@endsection