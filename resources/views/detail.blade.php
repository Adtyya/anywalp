@include('nav.navtop')
@extends('default.template')
@section('content')
    <section>
        <div class="container-fluid" style="background-color: #082032">
            <div class="row">
                <div class="col-md">
                    <div class="text-center mt-5">
                    <h2 class="text-light mb-3"> {{ $detail->judul }} </h2>
                    <img src="{{ url('foto/'.$detail->foto) }}" alt="gambar" width="100%" height="auto" class="img-fluid mb-3 rounded">
                    <div class="mt-5">
                        <a href="{{ url('foto/'.$detail->foto) }}" class="btn btn-light mb-2 me-3" download>Download gambar</a>
                        <a href="/" class="btn btn-light mb-2">Kembali ke home</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="background-color: #082032; height: 20vh;"></div>
    </section>
@endsection