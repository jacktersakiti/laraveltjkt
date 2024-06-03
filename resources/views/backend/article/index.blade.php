@extends('backend.layout.template')
@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('title','List Articles | Admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Articles</h1>
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
                                    Create New
                                </button>
                            </div>
                            <div class="float-left">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <!-- Button trigger modal -->




                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <table id="datatableArticle" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Slug</th>
                                        <th>Category</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Views</th>
                                        <th>Status</th>
                                        {{-- <th>Created At</th> --}}
                                        <th>Publish Date</th>
                                        <th>Function</th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Slug</th>
                                        <th>Category</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Views</th>
                                        <th>Status</th>
                                        {{-- <th>Created At</th> --}}
                                        <th>Publish Date</th>
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
@endsection
{{-- End Content --}}


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
        $(document).ready(function(){
            $('#datatableArticle').DataTable({
                processing: true,
                serverside: true,
                responsive: true,
                autoFill: true,
                fixedColumns: true,
                lengthChange: true,
                autoWidth: false,

                ajax:'{{ url()->current() }}',
                columns: [
                    {
                        data: 'id',
                        name:'id'
                    },
                    {
                        data: 'title',
                        name:'title'
                    },
                    {
                        data: 'slug',
                        name:'slug'
                    },
                    {
                        data: 'category_id',
                        name:'category_id'
                    },
                    {
                        data: 'desc',
                        name:'desc'
                    },
                    {
                        data: 'img',
                        name:'img'
                    },
                    {
                        data: 'views',
                        name:'views'
                    },
                    {
                        data: 'status',
                        name:'status'
                    },
                    // {
                    //     data: 'created_at',
                    //     name:'created_at'
                    // },
                    {
                        data: 'publish_date',
                        name:'publish_date'
                    },
                    {
                        data: 'button',
                        name:'button'
                    },
                ]
            });
        });
        // $(function() {
        //     $("#datatableArticle").DataTable({
        //         "responsive": true,
        //         "autoFill": true,
        //         "fixedColumns": true,
        //         "lengthChange": false,
        //         "autoWidth": false,
        //         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //     }).buttons().container().appendTo('#datatableArticle_wrapper .col-md-6:eq(0)');
        // });
    </script>
@endpush
