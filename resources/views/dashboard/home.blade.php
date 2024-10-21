@extends('partial.teamplate')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Barang Rusak -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <a href="{{ route('admin.indexx') }}">
                <div class="card border-radius-md shadow-sm">
                    <div class="row no-gutters align-items-center">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Barang Rusak</p>
                                <?php $barang = \App\Barang::all()->count(); ?>
                                <h5 class="font-weight-bolder">{{ $barang }}</h5>
                            </div>
                        </div>
                        <div class="col-4 text-center"> <!-- Changed to text-center -->
                            <div class="icon icon-shape bg-gradient-danger text-center text-white border-radius-md">
                                <i class="fas fa-tools text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Barang Perbaikan -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <a href="{{ route('admin.index3') }}">
                <div class="card border-radius-md shadow-sm">
                    <div class="row no-gutters align-items-center">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Barang Perbaikan</p>
                                <?php $perbaikan = \App\Perbaikan::all()->count(); ?>
                                <h5 class="font-weight-bolder">{{ $perbaikan }}</h5>
                            </div>
                        </div>
                        <div class="col-4 text-center"> <!-- Changed to text-center -->
                            <div class="icon icon-shape bg-gradient-danger text-center text-white border-radius-md">
                                <i class="fas fa-tools text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Pengguna -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card border-radius-md shadow-sm">
                <div class="row no-gutters align-items-center">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengguna</p>
                            <?php $user = \App\User::all()->count(); ?>
                            <h5 class="font-weight-bolder">{{ $user }}</h5>
                        </div>
                    </div>
                    <div class="col-4 text-center"> <!-- Changed to text-center -->
                        <div class="icon icon-shape bg-gradient-warning text-center text-white border-radius-md">
                            <i class="fas fa-user text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten tambahan -->
    <div class="row mt-4">
        <div class="col-lg-7 mb-4">
            <div class="card border-radius-md shadow-sm">
                <!-- Konten lain di sini jika ada -->
            </div>
        </div>
    </div>
</div>
@endsection
