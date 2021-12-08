@extends('default.admin')
@section('content')

<section>
  <main class="col-md-9 ms-sm-auto col-lg-10">    
    <h2>Post Management</h2>
      <div class="table-responsive col-lg mt-3">
        <table class="table table-striped table-md">
            <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($data as $no => $dataPost)
              <tr>
                  <td>{{ $data->firstItem()+$no }}</td>
                  <td>{{ $dataPost->judul }}</td>
                  <td><img src="{{url('foto/'.$dataPost->foto)}}" width="180" height="100" alt="image"></td>
                  <td>{{ $dataPost->deskripsi }}</td>
                  <td>
                    <a href="{{url ('/dashboard/edit/'. $dataPost->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{url ('/delete/post/'.$dataPost->id)}}" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
            <div class="mt-3">
              {{ $data->links() }}
            </div>
            <div>
              Showing 
              {{ $data->firstItem() }}
              To
              {{ $data->lastItem() }}
              Of
              {{ $data->total() }}
              Entries
            </div>
        </table>
      </div>
  </main>
</section>
@endsection