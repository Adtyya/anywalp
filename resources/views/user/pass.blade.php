@include('nav.navtop')
@extends('default.template')
@section('content')
    <section>
        <div class="container">
            <h3>Edit akun</h3>
        <div class="row">
            @if(session()->has('succes'))
            <div class="alert alert-success">
                {{ session()->get('succes') }}
              </div>
            @endif
            <div class="col-md">
                <form action="{{ url('/updateUser/pass/'.$user->id) }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">Old Password</label>
                            <input type="text" name="#" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">New password</label>
                            <input type="text" name="#" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">Confirm new password</label>
                            <input type="text" name="#" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-gorup mt-2">
                        <button type="submit" class="btn" style="background-color: #082032;color:white">Simpan perubahan</button>
                    </div>
                    <a href="/">Kembali</a>
                </form>
            </div>
        </div>
        </div>
    </section>
@endsection