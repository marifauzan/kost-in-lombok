@extends('layouts.layout')

@section('content')
    @if(session()->has('tambah_kost_berhasil'))
        <div class="container alert alert-success text-center mt-3" role="alert">
            {{ session('tambah_kost_berhasil')}}
        </div>
    @endif

    <section class="mt-5 pb-5">
        <div class="container">
            <div class="page-title">
                <div class="d-flex align-items-center">
                    <h2 class="mt-1 f-green f-20 f-bold">Atur Marchendise</h2>
                    <a class="ms-4 btn btn-primary rounded-btn d-flex" href="/tambah-kost">
                        <i class="ri-add-line" style="margin-top:-2px; font-size:20px;"></i>
                        <span style="margin-top:2px;">Tambah</span>
                    </a>
                </div>
            </div>
            <div class="list-items mt-5">
                <div class="row gy-5 row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

                    @foreach($kostan as $kost)
                    <div class="col">
                        <div class="card">
                            <img src="images/{{$kost->gambar}}" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{$kost->nama}}</h5>
                                <p class="card-text f-black">{{$kost->kota}}</p>
                                <p class="card-text f-black">{{$kost->kategori}}</p>
                                <p class="card-text f-grey">
                                    <?php
                                        $fasilitas = "";
                                        
                                        if($kost->is_wifi == "tersedia"){
                                            $fasilitas .= "Wi-Fi, ";
                                        }

                                        if($kost->is_ac == "tersedia"){
                                            $fasilitas .= "AC, ";
                                        }

                                        if($kost->is_toilet == "di dalam"){
                                            $fasilitas .= "Toilet di Dalam, ";
                                        }

                                        if($kost->is_kasur == "tersedia"){
                                            $fasilitas .= "Kasur, ";
                                        }

                                        if($kost->is_meja == "tersedia"){
                                            $fasilitas .= "Meja, ";
                                        }

                                        if($kost->is_lemari == "tersedia"){
                                            $fasilitas .= "Lemari,";
                                        }

                                        echo rtrim($fasilitas, ',');
                                            
                                    ?>
                                </p>
                                <p class="card-price f-orange">Rp.{{$kost->harga}} /Bulan</p>
                            </div>
                            <div class="action d-flex flex-column justify-content-center align-items-center">
                                <a href="" class="btn btn-primary rounded-btn" style="width: 120px;">Ubah</a>
                                <a href="" class="btn btn-danger rounded-btn mt-2" style="width: 120px;">Hapus</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                 
                   
                </div>
            </div>

        </div>
    </section>
@endsection
