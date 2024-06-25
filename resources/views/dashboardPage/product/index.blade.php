@extends('layout.main')

@section('content')
    <div class="container">
        {{--  ALERT  --}}
        <div class="row mt-3">
            <div class="col">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('failed'))
                    <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
                        {{ session('failed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        {{--  ALERT  --}}
        {{--  CONTENT  --}}
        <div class="row mt-3 mb-5">
            <div class="col">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#createModal">
                    <i class=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                        </svg></i>
                    Tambah
                </button>

                <div class="card mt-3 col-sm-6 col-md-12 mb-3">
                    <div class="card-body">
                        {{-- tables --}}
                        <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Product</th>
                                    <th>Umur</th>
                                    <th>Harga</th>
                                    <th>Brand</th>
                                    <th>Tipe Kulit</th>
                                    <th>Masalah Kulit</th>
                                    <th>Kategori</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->nama }}</td>
                                        <td>{{ $product->umur }}</td>
                                        <td>{{ $product->harga }}</td>
                                        <td>{{ $product->Brand->nama }}</td>
                                        <td>{{ $product->TypeKulit->nama }}</td>
                                        <td>{{ $product->MasalahKulit->nama }}</td>
                                        <td>{{ $product->Kategori->nama }}</td>
                                        <td>
                                            <img class="rounded-3" style="object-fit: cover" src="{{ $product->gambar }}"
                                                alt="" height="75" width="175">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $loop->iteration }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button id="delete-button" class="btn btn-danger" id="delete-button"
                                                data-bs-toggle="modal" data-bs-target="#hapusModal{{ $loop->iteration }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    {{--  MODAL Delete  --}}
                                    <div class="modal fade" id="hapusModal{{ $loop->iteration }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('product.destroy', $product->id) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @method('delete')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <p>Apakah Anda Yakin Ingin Menghapus Data
                                                            <b>{{ $product->nama }}</b>
                                                            ini?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">hapus
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  MODAL Delete  --}}

                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editModal{{ $loop->iteration }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('product.update', $product->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('put')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <input type="hidden" name="oldGambar"
                                                                value="{{ $product->gambar }}">
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama</label>
                                                                <input type="text"
                                                                    class="form-control @error('nama') is-invalid @enderror"
                                                                    name="nama" id="nama" placeholder="Anton"
                                                                    value="{{ old('nama', $product->nama) }}" autofocus
                                                                    required>
                                                                @error('nama')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="umur" class="form-label">Umur</label>
                                                                <input type="text"
                                                                    class="form-control @error('umur') is-invalid @enderror"
                                                                    name="umur" id="umur" placeholder="Anton"
                                                                    value="{{ old('umur', $product->umur) }}" autofocus
                                                                    required>
                                                                @error('umur')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="harga" class="form-label">Harga</label>
                                                                <input type="number"
                                                                    class="form-control @error('harga') is-invalid @enderror"
                                                                    name="harga" id="harga" placeholder="Anton"
                                                                    value="{{ old('harga', $product->harga) }}" autofocus
                                                                    required>
                                                                @error('harga')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_brand" class="form-label">Brand</label>
                                                                <select
                                                                    class="form-select @error('id_brand') is-invalid @enderror"
                                                                    name="id_brand" id="id_brand"
                                                                    value="{{ old('id_brand', $product->id_brand) }}">
                                                                    @foreach ($brands as $brand)
                                                                        @if (old('id_brand', $product->id_brand) == $brand->id)
                                                                            <option value="{{ $brand->id }}" selected>
                                                                                {{ $brand->nama }}</option>
                                                                        @else
                                                                            <option value="{{ $brand->id }}">
                                                                                {{ $brand->nama }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_type_kulit" class="form-label">Tipe
                                                                    Kulit</label>
                                                                <select
                                                                    class="form-select @error('id_type_kulit') is-invalid @enderror"
                                                                    name="id_type_kulit" id="id_type_kulit"
                                                                    value="{{ old('id_type_kulit', $product->id_type_kulit) }}">
                                                                    @foreach ($type_kulits as $type_kulit)
                                                                        @if (old('id_type_kulit', $product->id_type_kulit) == $type_kulit->id)
                                                                            <option value="{{ $type_kulit->id }}"
                                                                                selected>
                                                                                {{ $type_kulit->nama }}</option>
                                                                        @else
                                                                            <option value="{{ $type_kulit->id }}">
                                                                                {{ $type_kulit->nama }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_masalah_kulit" class="form-label">Masalah
                                                                    Kulit</label>
                                                                <select
                                                                    class="form-select @error('id_masalah_kulit') is-invalid @enderror"
                                                                    name="id_masalah_kulit" id="id_masalah_kulit"
                                                                    value="{{ old('id_masalah_kulit', $product->id_masalah_kulit) }}">
                                                                    @foreach ($masalah_kulits as $masalah_kulit)
                                                                        @if (old('id_masalah_kulit', $product->id_masalah_kulit) == $masalah_kulit->id)
                                                                            <option value="{{ $masalah_kulit->id }}"
                                                                                selected>
                                                                                {{ $masalah_kulit->nama }}</option>
                                                                        @else
                                                                            <option value="{{ $masalah_kulit->id }}">
                                                                                {{ $masalah_kulit->nama }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_kategori"
                                                                    class="form-label">Kategori</label>
                                                                <select
                                                                    class="form-select @error('id_kategori') is-invalid @enderror"
                                                                    name="id_kategori" id="id_kategori"
                                                                    value="{{ old('id_kategori', $product->id_kategori) }}">
                                                                    @foreach ($kategoris as $kategori)
                                                                        @if (old('id_kategori', $product->id_kategori) == $kategori->id)
                                                                            <option value="{{ $kategori->id }}" selected>
                                                                                {{ $kategori->nama }}</option>
                                                                        @else
                                                                            <option value="{{ $kategori->id }}">
                                                                                {{ $kategori->nama }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="gambar" class="form-label">Upload
                                                                    Gambar Product</label>
                                                                <img src="{{ asset('storage/' . $product->gambar) }}"
                                                                    class="img-previewnew1 img-fluid mb-3 col-sm-5 d-block">
                                                                <img class="img-previewnew1 img-fluid mb-3 col-sm-5">
                                                                <input
                                                                    class="form-control @error('gambar') is-invalid @enderror"
                                                                    type="file" name="gambar" id="thumnailnew1"
                                                                    onchange="previewImagenew1()">
                                                                @error('gambar')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-warning">Perbarui</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Edit --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{--  CONTENT  --}}

        {{--  MODAL ADD  --}}
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tipe Kulit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" id="nama" placeholder="Anton" autofocus required>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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
                                            <option value="{{ $brand->id }}" selected>
                                                {{ $brand->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_type_kulit" class="form-label">Tipe Kulit</label>
                                    <select class="form-select @error('id_type_kulit') is-invalid @enderror"
                                        name="id_type_kulit" id="id_type_kulit">
                                        @foreach ($type_kulits as $type_kulit)
                                            <option value="{{ $type_kulit->id }}" selected>
                                                {{ $type_kulit->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_masalah_kulit" class="form-label">Masalah Kulit</label>
                                    <select class="form-select @error('id_masalah_kulit') is-invalid @enderror"
                                        name="id_masalah_kulit" id="id_masalah_kulit">
                                        @foreach ($masalah_kulits as $masalah_kulit)
                                            <option value="{{ $masalah_kulit->id }}" selected>
                                                {{ $masalah_kulit->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="id_kategori" class="form-label">Kategori</label>
                                    <select class="form-select @error('id_kategori') is-invalid @enderror"
                                        name="id_kategori" id="id_kategori">
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}" selected>
                                                {{ $kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Upload Gambar <i>(png, jpeg, jpg)</i></label>
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    <input class="form-control @error('gambar') is-invalid @enderror" type="file"
                                        name="gambar" id="gambar" onchange="previewImage()">
                                    @error('gambar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--  MODAL ADD  --}}

    </div>

@section('scripts')
    <script>
        function previewImage() {
            const image = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(OFREvent) {
                imgPreview.src = OFREvent.target.result;
            }
        }

        function previewImagenew1() {

            const image1 = document.querySelector('#thumnailnew1');
            const imgPreview1 = document.querySelector('.img-previewnew1');

            imgPreview1.style.display = 'block';

            const oFReader1 = new FileReader();
            oFReader1.readAsDataURL(image1.files[0]);

            oFReader1.onload = function(OFREvent) {
                imgPreview1.src = OFREvent.target.result;
            }
        }

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
