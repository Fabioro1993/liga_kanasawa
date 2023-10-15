@extends('layouts-verticalmenu-light.master')
@section('css')
    <!-- Internal Sweet-Alert css-->
    <link href="{{URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">

    <!-- Datepicker css -->
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/model-datepicker/css/datepicker.css')}}">

    <!-- Internal DataTables css-->
    <link href="{{URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />

    <!-- Internal Prism css-->
		<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
@endsection
@section('content')

    <!-- Page Header -->
    <div class="page-header">

        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                @foreach($errors->all() as $error)
                    <li><strong>{{ $error }}!</strong></li>
                @endforeach
                </ul>
            </div>
        @endif
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> {{$report}}</h2>
            {{-- <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Maps & Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">DataTable</li>
            </ol> --}}
        </div>
        <div class="d-flex">
            <div class="justify-content-center">
                {{-- <button type="button" class="btn btn-white btn-icon-text my-2 mr-2" data-target="#modal_competition_new" data-toggle="modal">
                        <i class="fe fe-plus-square mr-2"></i> Nueva Categoria
                    </button>
                <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
                    <i class="fe fe-filter mr-2"></i> Filter
                </button>
                <button type="button" class="btn btn-primary my-2 btn-icon-text">
                    <i class="fe fe-download-cloud mr-2"></i> Download Report
                </button> --}}
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">{{$report}}</h6>
                        <p class="text-muted card-sub-title"></p>
                    </div>
                    <div class="table-responsive">
                        <table id="table_competition" class="table table-bordered border-t0 key-buttons text-nowrap w-100 " >
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Total medallas de Oro</th>
                                    <th>Total medallas plata </th>
                                    <th>Total medas bronce</th>
                                    <th>Total sumatoria de puntos de las medallas</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

@endsection
@section('script')
   <!-- Internal Datepicker js -->
	<script src="{{URL::asset('assets/plugins/model-datepicker/js/datepicker.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/model-datepicker/js/main.js')}}"></script>

    <!-- Modal js-->
	<script src="{{URL::asset('assets/js/modal.js')}}"></script>

    <!-- Internal Sweet-Alert js-->
    <script src="{{URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>

    <!-- Moment js-->
    <script src="{{URL::asset('assets/plugins/moment/min/moment.min.js')}}"></script>

    <!-- Internal Data Table js -->
    <script src="{{URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>

    <!-- Internal Clipboard js-->
    <script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>

    <!-- Internal Prism js-->
    <script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>

    <script>

        let url = "{{$url}}";

        if (url == 'reports.dojo') {
            url = "{{ route('reports.dojo') }}"
        }else{
            url = "{{ route('reports.organization') }}"
        }

        let columnas = [
            {
                data: 'dojo',
                render: function (data, type, row, meta) {
                    return data;
                }
            },
            {
                data: 'gold',
                render: function (data, type, row, meta) {
                     return data;
                }
            },
            {
                data: 'silver',
                render: function (data, type, row, meta) {
                     return data;
                }
            },
            {
                data: 'bronze',
                render: function (data, type, row, meta) {
                     return data;
                }
            },
            {
                data: 'dojo',
                render: function (data, type, row, meta) {
                    $total = (row.gold * 10) +(row.silver * 7) +(row.bronze * 3);
                     return $total;
                }
            },
        ];

        $(document).ready(function (e) {
            table_competition = $("#table_competition").DataTable({
                dom: 'Bfrtip',
                buttons: ['excel', 'pdf'],
                ajax: {
                    url: url,
                    type: 'get',
                    dataSrc:""
                },
                columns: columnas,
                responsive: true,
                processing: true,
                searching: true,
                bInfo: true,
                pagingType: "simple_numbers",
                lengthChange: false,
		        //buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
                pageLength: 50,
                order: [
                    [0, 'desc'],
                ],
            });
            table_competition.buttons().container()
	            .appendTo( '#table_competition_wrapper .col-md-6:eq(0)' );
        })
    </script>
@endsection