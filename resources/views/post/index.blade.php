@extends('default.admin')
@section('content')
    <section>
        <main class="col-md-9 ms-sm-auto col-lg-10"> 
        <h3>Tambah Postingan Baru</h3>
        <div class="row">
            <div class="col-lg">
                <form action="/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">Judul gambar</label>
                            <input type="text" name="judul" placeholder="Masukan judul gambar" class="form-control @error('judul') is-invalid @enderror" required>
                            @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-3">Foto</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" onchange="previewImage()" id="image">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            {{-- <label for="nama" class="mb-2">Slug</label> --}}
                            <input type="hidden" name="slug" placeholder="slug" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">Deskripsi</label>
                            <input type="text" name="deskripsi" placeholder="Deskripsi gambar" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="category" class="form-label">Category</label>
                            <select name="category_id" class="form-select @error ('category_id') is-invalid @enderror">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{  $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-gorup mt-2">
                        <button type="submit" class="btn" style="background-color: #082032;color:white">Tambah Postingan</button>
                    </div>
                </form>
            </div>
        </div>
        </main>
    </section>    
<script>
    function previewImage ()
    {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const OFReader = new FileReader();
        OFReader.readAsDataURL(image.files[0]);

        OFReader.onload = function (oFRevent) {
            imgPreview.src = oFRevent.target.result;
        }
    }
</script>
@endsection