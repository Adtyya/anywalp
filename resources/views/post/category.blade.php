@extends('default.admin')
@section('content')
    <section>
        <main class="col-md-9 ms-sm-auto col-lg-10"> 
        <h3>Tambah Kategori Baru</h3>
        <div class="row">
            <div class="col-lg">
                <form action="/storeCategory" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">Nama kategori</label>
                            <input type="text" name="nama" placeholder="Masukan nama kategori" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <input type="hidden" name="slug" placeholder="Masukan slug" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-gorup mt-2">
                        <button type="submit" class="btn" style="background-color: #082032;color:white">Tambah kategori</button>
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
                  <th scope="col">Nama kategori</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $no => $item)
                <tr>
                  <td>{{ $data->firstItem()+ $no }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->slug }}</td>
                    <td>
                      <a href="{{url('/delete/'.$item->id)}}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </main>
    </section>    

@endsection