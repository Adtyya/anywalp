@include('nav.navtop')
@extends('default.template')
@section('content')
<style>
    .hero{
        background-color: #082032
    }
    .blank{
        height: 10vh;
        background-color: #082032
    }
</style>
    <div class="blank"></div>
    <section class="hero">
        <div class="container-fluid">
            <div class="px-4 text-center">
                <h1 class="display-4 fw-bold text-light">AnyWalp</h1>
                <div class="col-lg-6 mx-auto">
                  <p class="lead my-4 text-light">Website yang menyajikan berbagai wallpaper untuk berbagai macam devices. Mulai dari Handphone dan Desktop. Download wallpaper dengan kualitas tinggi di AnyWalp. Tersedia berbagai macam kategori yang bisa anda pilih.</p>
                </div>
            </div>
        </div>
        <div class="blank"></div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#082032" fill-opacity="1" d="M0,128L0,192L144,192L144,288L288,288L288,128L432,128L432,128L576,128L576,64L720,64L720,160L864,160L864,288L1008,288L1008,256L1152,256L1152,64L1296,64L1296,160L1440,160L1440,0L1296,0L1296,0L1152,0L1152,0L1008,0L1008,0L864,0L864,0L720,0L720,0L576,0L576,0L432,0L432,0L288,0L288,0L144,0L144,0L0,0L0,0Z"></path></svg>
    <div class="container">
        <div class="row">
            <div class="text-center mt-5">
                <h3>Download Wallpaper</h3>
            </div>
            <hr>
            @foreach ($data as $post)
                
            <div class="col-md-6">
                <div class="card mb-3" style="max-width: 500px;">
                    <div class="row g-0">
                        <div class="col-md-8" style="background-color: #082032">
                            <img src="{{ asset('storage/'.$post->foto) }}" class="img-fluid rounded-end" alt="gambar">
                        </div>
                        <div class="col-md-4" style="background-color: #082032">
                            <div class="card-body">
                                <h5 class="card-title mt-3 text-light text-center">{{ $post->judul }}</h5>
                                <div class="d-flex justify-content-center">
                                    <a href="/detail/{{$post->slug}}" class="btn my-3" style="background-color: white">Detail Gambar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @include('default.cp')
@endsection