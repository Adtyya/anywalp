@extends('default.admin')
@section('content')
    <section>
        <main class="col-md-9 ms-sm-auto col-lg-10"> 
        <h3>Tambah User Baru</h3>
        <div class="row">
            <div class="col-lg">
                <form action="/storeUser" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">Nama User</label>
                            <input type="text" name="name" placeholder="Masukan nama user" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">Email</label>
                            <input type="text" name="email" placeholder="Masukan email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">Password</label>
                            <input type="password" name="password" placeholder="Masukan password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">Password Confirmation</label>
                            <input type="password" name="password_confirmation" placeholder="Masukan ulang password" class="form-control @error('password') is-invalid @enderror" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="category" class="form-label">Category</label>
                            <select name="role" class="form-select">
                                <option value="1">Admin</option>
                                <option value="0">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-gorup mt-2">
                        <button type="submit" class="btn" style="background-color: #082032;color:white">Tambah user</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <main class="col-md-9 ms-sm-auto col-lg-10">
    <div class="table-responsive col-lg-8 mt-3">
        <table class="table table-striped table-md">
            <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama User</th>
                  <th scope="col">email</th>
                  <th scope="col">Tingkatan</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $no => $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>@if ($item->role == 0)
                        User
                        @elseif($item->role == 1)
                        Admin
                        @endif
                    </td>
                    <td>
                      <a href="{{url('/delete/user/'.$item->id)}}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </main>
    </section>    

@endsection