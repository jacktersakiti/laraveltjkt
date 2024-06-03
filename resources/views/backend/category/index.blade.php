@extends('backend.layout.template')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('title','List Category | Admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Layout</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- PERINGATAN -->
    @if ($errors->any())
        <div class="my-3">
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if (session('success'))
        <div class="my-3">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- End Content -->
    <div class="container-fluid">
        <section class="content">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right">
                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                    data-target="#modalCreate">
                                    <i class="fa fa-marker"></i>
                                    Buat Baru
                                </button>
                            </div>
                            <div class="float-left">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <!-- Button trigger modal -->




                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="datatableCategory" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Slug</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Function</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td class="text-center">{{ $item->created_at }}</td>
                                            <td class="text-center">{{ $item->updated_at }}</td>
                                            <td class="text-center">
                                                <div class="text-center">
                                                    <button class="btn btn-xs btn-warning" data-toggle="modal"
                                                        data-target="#modalUpdate{{ $item->id }}"><i
                                                            class="fa fa-edit"></i> Edit</button>
                                                    <button class="btn btn-xs btn-danger" data-toggle="modal"
                                                        data-target="#modalDelete{{ $item->id }}"><i
                                                            class="fa fa-trash-alt"></i> Hapus</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Slug</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Function</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
    </div>

    {{-- End Content --}}

    <!-- Modal Create -->
    <div class="modal fade" id="modalCreate" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ url('categories') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Masukkan Category</label>
                            <input type="text" name="name"
                                class="form-control @error('name')
                            is-invalid
                        @enderror"
                                id="name" value="{{ old('name') }}">
                            <small class="form-text text-muted">Category Minimal 3 Karakter & Maksimal 12 Karakter.</small>

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-success float-right">Simpan Kategori</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Create -->

    <!-- Modal Update -->
    @foreach ($categories as $item)
        <div class="modal fade" id="modalUpdate{{ $item->id }}" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('categories/' . $item->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="name">Masukkan Category</label>
                                <input type="text" name="name"
                                    class="form-control @error('name')
                            is-invalid
                        @enderror"
                                    id="name" value="{{ old('name', $item->name) }}">
                                <small class="form-text text-muted">Category Minimal 3 Karakter & Maksimal 12
                                    Karakter.</small>

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <button type="submit" class="btn btn-success float-right">Simpan Perubahan</button>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Modal Update -->

    <!-- Modal Delete -->
    @foreach ($categories as $item)
        <div class="modal fade" id="modalDelete{{ $item->id }}" data-backdrop="static" tabindex="-1"
            role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('categories/' . $item->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="form-group text-center">
                                <label for="name">Apakah Yakin akan Menghapus Category ini !</label>
                                <h3><b>{{ $item->name }}</b></h3>
                                <small class="form-text text-muted">Category <b>{{ $item->name }}</b> akan terhapus
                                    Permanen !</small>
                                <div class="my-3">
                                    <button type="submit" class="btn btn-danger">Hapus Kategori</button>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- End Modal Delete -->
@endsection



@push('javascript')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush

@push('script')
    <script>
        $(function() {
            $("#datatableCategory").DataTable({
                "responsive": true,
                "autoFill": true,
                "fixedColumns": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#datatableCategory_wrapper .col-md-6:eq(0)');
            //   $('#datatable2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            //   });
        });
    </script>
@endpush
