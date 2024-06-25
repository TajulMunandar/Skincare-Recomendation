@extends('layout.main')

@section('content')
    <div class="container">
        {{--  ALERT  --}}
        <div class="row mt-3">
            <div class="col">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('failed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('failed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        {{--  ALERT  --}}
        {{--  CONTENT  --}}
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#createModal">
            <i class="fa-solid fa-magnifying-glass me-2"></i>
            Cari Rekomendasi
        </button>
        <div class="row mt-3 mb-5" id="productCardContainer">

        </div>
        {{--  CONTENT  --}}

        {{--  MODAL ADD  --}}
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cari Rekomendasi Skincare</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('api/cbf') }}" method="POST" enctype="multipart/form-data" id="skincareForm"
                        data-cbf-route="{{ route('rekomendasi.cbf', ':id') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="umur" class="form-label">Umur</label>
                                    <input type="text" class="form-control @error('umur') is-invalid @enderror"
                                        name="umur" id="umur" placeholder="Anton" autofocus required>
                                    @error('umur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                        name="harga" id="harga" placeholder="Anton" autofocus required>
                                    @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="id_brand" class="form-label">Brand</label>
                                    <select class="form-select @error('id_brand') is-invalid @enderror" name="id_brand"
                                        id="id_brand">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->nama }}" selected>
                                                {{ $brand->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_type_kulit" class="form-label">Tipe Kulit</label>
                                    <select class="form-select @error('id_type_kulit') is-invalid @enderror"
                                        name="id_type_kulit" id="id_type_kulit">
                                        @foreach ($type_kulits as $type_kulit)
                                            <option value="{{ $type_kulit->nama }}" selected>
                                                {{ $type_kulit->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_masalah_kulit" class="form-label">Masalah Kulit</label>
                                    <select class="form-select @error('id_masalah_kulit') is-invalid @enderror"
                                        name="id_masalah_kulit" id="id_masalah_kulit">
                                        @foreach ($masalah_kulits as $masalah_kulit)
                                            <option value="{{ $masalah_kulit->nama }}" selected>
                                                {{ $masalah_kulit->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_kategori" class="form-label">Kategori</label>
                                    <select class="form-select @error('id_kategori') is-invalid @enderror"
                                        name="id_kategori" id="id_kategori">
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->nama }}" selected>
                                                {{ $kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" id="pythonResponse" name="pythonResponse">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--  MODAL ADD  --}}

    </div>

@section('scripts')
    <script>
        const form = document.getElementById('skincareForm');
        const url = 'http://127.0.0.1:5000/cbf';

        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            const formData = new FormData(form);
            const response = await fetch(url, {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.status === 'success') {
                const productData = data.data;
                let cardHtml = '';
                for (const [key, value] of Object.entries(productData.Nama)) {
                    const imageUrl = `${productData.gambar[key]}`;

                    // Membuat HTML untuk setiap kartu produk
                    cardHtml += `
                    <div class="col-4 col-lg-4 col-sm-12" >
                        <div class="card mt-3 mb-3">
                            <img src="${imageUrl}" alt="Product Image" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title text-center">${value}</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Umur: ${productData.Umur[key]}</li>
                                    <li class="list-group-item">Harga: Rp. ${productData.Harga[key]}</li>
                                    <li class="list-group-item">Brand: ${productData.Brand[key]}</li>
                                    <li class="list-group-item">Masalah Kulit: ${productData.Masalah_Kulit[key]}</li>
                                    <li class="list-group-item">Tipe Kulit: ${productData.Tipe_Kulit[key]}</li>
                                    <li class="list-group-item">Kategori: ${productData.Kategori[key]}</li>
                                </ul>
                            </div>
                        </div>
                    </div>`;
                }
                $('#productCardContainer').html(cardHtml);
                $('#createModal').modal('hide');
            } else {
                console.log('Failed to retrieve product data');
            }

        });


        $(document).ready(function() {
            // Simpan ikon di dalam tag HTML
            var prevIcon = '<i class="fa-solid fa-chevron-left"></i>';
            var nextIcon = '<i class="fa-solid fa-chevron-right"></i>';

            // Ganti teks "Previous" dengan ikon saat dokumen pertama kali dimuat
            $('.page-link:contains("Previous")').html(prevIcon);

            // Ganti teks "Next" dengan ikon saat dokumen pertama kali dimuat
            $('.page-link:contains("Next")').html(nextIcon);

            // Tambahkan event handler untuk setiap kali tabel di-redraw
            $('#myTable').on('draw.dt', function() {
                // Ganti teks "Previous" dengan ikon setiap kali tabel di-redraw
                $('.page-link:contains("Previous")').html(prevIcon);

                // Ganti teks "Next" dengan ikon setiap kali tabel di-redraw
                $('.page-link:contains("Next")').html(nextIcon);
            });
        });
    </script>
@endsection
@endsection
