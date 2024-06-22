@extends('layout.main')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Brand</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $brand }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-1 px-0">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa-duotone fa-gauge fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Products</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $produk }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-1 px-0">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa-solid fa-bottle-droplet fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Tipe Kulit </p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $tipe }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-1 px-0">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa-regular fa-smile fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 mt-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Masalah Kulit </p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $masalah }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-1 px-0">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa-regular fa-face-worried fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 mt-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-10">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Kategori </p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $kategori }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-1 px-0">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa-regular fa-bars fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <p class="mb-1 pt-2 text-bold">Hi Developers</p>
                                    <h5 class="font-weight-bolder">Temukan Skincare Terbaik untuk Anda dengan Rekomendasi
                                        CBF yang Personal</h5>
                                    <p class="mb-5 text-justify">Selamat datang di Rekomendasi Skincare, platform yang
                                        menghubungkan
                                        Anda
                                        dengan produk skincare terbaik melalui metode Content-Based Filtering (CBF). Kami
                                        memahami bahwa setiap kulit memiliki kebutuhan unik, oleh karena itu kami
                                        menggunakan teknologi canggih untuk menganalisis dan merekomendasikan produk
                                        skincare yang paling sesuai untuk Anda.

                                        Jelajahi berbagai produk skincare yang telah disesuaikan berdasarkan preferensi dan
                                        kebutuhan kulit Anda. Dapatkan saran produk yang tepat dan ciptakan rutinitas
                                        perawatan kulit yang efektif dan personal.

                                        Mulai perjalanan perawatan kulit Anda dengan kami hari ini!</p>

                                </div>
                            </div>
                            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                <div class="bg-gradient-primary border-radius-lg h-100">
                                    <img src="../assets/img/shapes/waves-white.svg"
                                        class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                        <img class="w-100 position-relative z-index-2 pt-4"
                                            src="../assets/img/illustrations/rocket-white.png" alt="rocket">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
