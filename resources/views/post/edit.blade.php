<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
        <main class="col-md-9 ms-sm-auto col-lg-10 mt-5"> 
        <div class="container">
            <h3>Edit Postingan</h3>
        <div class="row">
            <div class="col-md">
                <form action="{{ url('/update/'.$edit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">Judul gambar</label>
                            <input type="text" name="judul" class="form-control" value="{{$edit->judul}}"required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-3">Foto</label>
                            <input type="hidden" name="oldImage" value="{{ $edit->foto }}">
                            <img src={{asset('storage/'.$edit->foto)}} class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            <input type="file" name="foto" class="form-control" onchange="previewImage()" id="image">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <input type="hidden" name="slug" placeholder="slug" class="form-control" value="{{$edit->slug}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="nama" class="mb-2">Deskripsi</label>
                            <input type="text" name="deskripsi" placeholder="Deskripsi gambar" class="form-control" value="{{$edit->deskripsi}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <label for="category" class="form-label">Category</label>
                            <select name="category_id" class="form-select">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{  $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-gorup mt-2">
                        <button type="submit" class="btn" style="background-color: #082032;color:white">Edit Postingan</button>
                    </div>
                    <a href="/dashboard">Kembali</a>
                </form>
            </div>
        </div>
        </div>
        </main>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
</body>
</html>