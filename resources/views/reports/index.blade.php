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
                                    <th>Oro</th>
                                    <th>Plata </th>
                                    <th>Bronce</th>
                                    <th>Total</th>
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
        }else if (url == 'reports.organization'){
            url = "{{ route('reports.organization') }}"
        }else if (url == 'reports.dojo.formation'){
            url = "{{ route('reports.dojo.formation') }}"
        }else if (url == 'reports.dojo.dev'){
            url = "{{ route('reports.dojo.dev') }}"
        }

        let columnas = [
            {
                data: 'dojo',
                className: 'text-center',
                render: function (data, type, row, meta) {
                    return data;
                }
            },
            {
                data: 'gold',
                className: 'text-center',
                render: function (data, type, row, meta) {
                     return data;
                }
            },
            {
                data: 'silver',
                className: 'text-center',
                render: function (data, type, row, meta) {
                     return data;
                }
            },
            {
                data: 'bronze',
                className: 'text-center',
                render: function (data, type, row, meta) {
                     return data;
                }
            },
            {
                data: 'dojo',
                className: 'text-center',
                render: function (data, type, row, meta) {
                    $total = (row.gold * 10) +(row.silver * 7) +(row.bronze * 3);
                     return $total;
                }
            },
        ];

        $(document).ready(function (e) {
            table_competition = $("#table_competition").DataTable({
                dom: 'Bfrtip',
               // buttons: ['excel', 'pdf'],
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        customize: function ( doc ) {
                            doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split(''),
                            doc.content[1].alignment = 'center';
                            doc.content.splice( 1, 0, {
                                margin: [ 0, 0, 0, 12 ],
                                alignment: 'center',
                                image: 'data:image/png;base64,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'
                            } );
                        }
                    }
                ],
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