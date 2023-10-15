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
            <h2 class="main-content-title tx-24 mg-b-5">Competencia</h2>
            {{-- <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Maps & Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">DataTable</li>
            </ol> --}}
        </div>
        <div class="d-flex">
            <div class="justify-content-center">
                {{-- <button type="button" class="btn btn-white btn-icon-text my-2 mr-2" data-target="#modal_competition_new" data-toggle="modal">
                        <i class="fe fe-plus-square mr-2"></i> Nueva Competencia
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
                        <h6 class="main-content-label mb-1">Competencias</h6>
                        <p class="text-muted card-sub-title"></p>
                    </div>
                    <div class="table-responsive">
                        <table id="table_competition" class="table table-bordered border-t0 key-buttons text-nowrap w-100 " >
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Kata</th>
                                    <th>Kumite</th>
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
@section('modal')
    <!-- Large Modal -->
	<div class="modal" id="modal_edit_competition">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title" id="modal-title-user">Edit</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
                <form id="form_edit_competition" method="POST">
                    @csrf
                    <div class="modal-body">
                    <input type="hidden" id="id_type" name="id_type">
                    <input type="hidden" id="competition_id" name="competition_id">
                        <h6>1er Lugar</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="mg-b-10">Nombre y Apellido</p>
                                    <input type="text" class="form-control" id="full_name_first" name="first[full_name]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Dojo</p>
                                    <input type="text" class="form-control" id="dojo_first" name="first[dojo]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Organizacion</p>
                                    <input type="text" class="form-control" id="organization_first" name="first[organization]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Estado</p>
                                    <select name="first[state]" class="form-control select2" id="state_first">
                                        <option value="">Selecciona un Estado</option>
                                        @foreach ($states as $state)
                                            <option value="{{$state->id}}" selected><?PHP echo ucfirst($state->state);?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h6>2do Lugar</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="mg-b-10">Nombre y Apellido</p>
                                    <input type="text" class="form-control" id="full_name_two" name="two[full_name]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Dojo</p>
                                    <input type="text" class="form-control" id="dojo_two" name="two[dojo]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Organizacion</p>
                                    <input type="text" class="form-control" id="organization_two" name="two[organization]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Estado</p>
                                    <select name="two[state]" id="state_two" class="form-control select2">
                                        <option value="">Selecciona un Estado</option>
                                        @foreach ($states as $state)
                                            <option value="{{$state->id}}" selected><?PHP echo ucfirst($state->state);?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h6>3er Lugar</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="mg-b-10">Nombre y Apellido</p>
                                    <input type="text" class="form-control" id="full_name_three" name="three[full_name]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Dojo</p>
                                    <input type="text" class="form-control" id="dojo_three" name="three[dojo]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Organizacion</p>
                                    <input type="text" class="form-control" id="organization_three" name="three[organization]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Estado</p>
                                    <select id="state_three" class="form-control select2" name="three[state]">
                                        <option value="">Selecciona un Estado</option>
                                        @foreach ($states as $state)
                                            <option value="{{$state->id}}" selected><?PHP echo ucfirst($state->state);?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h6>4to Lugar</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p class="mg-b-10">Nombre y Apellido</p>
                                    <input type="text" class="form-control" id="full_name_four" name="four[full_name]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Dojo</p>
                                    <input type="text" class="form-control" id="dojo_four" name="four[dojo]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Organizacion</p>
                                    <input type="text" class="form-control" id="organization_four" name="four[organization]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Estado</p>
                                    <select id="state_four" class="form-control select2" name="four[state]">
                                        <option value="">Selecciona un Estado</option>
                                        @foreach ($states as $state)
                                            <option value="{{$state->id}}" selected><?PHP echo ucfirst($state->state);?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="submit">Save changes</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
	<!--End Large Modal -->
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
        var text = null;
        let columnas = [
            {
                data: 'category_id',
                render: function (data, type, row, meta) {
                    if (row.gender == 'F') {
                        text = 'Femenino';
                    }
                    if (row.gender == 'M') {
                        text =  'Masculino';
                    }
                    return row.category.name + ' - '+row.belt.name+ ' - '+text;
                }
            },
            {
                data: 'id',
                orderable: false,
                render: function ( data, type, row) {
                    return '<div aria-label="Basic example" class="btn btn-group" role="group"><button class="btn ripple btn-success btn-icon btn-sm open_modal" data-target="#modal_edit_competition" data-type="kata" value="'+data+'"> <i class="fe fe-edit"></i> </button></div>';
                },
            },
            {
                data: 'id',
                orderable: false,
                render: function ( data, type, row) {
                    return '<div aria-label="Basic example" class="btn btn-group" role="group"><button class="btn ripple btn-success btn-icon btn-sm open_modal" data-target="#modal_edit_competition" data-type="Kumite" value="'+data+'"> <i class="fe fe-edit"></i> </button></div>';
                },
            }
        ];

        $(document).ready(function (e) {
            table_competition = $("#table_competition").DataTable({
                ajax: {
                    url: "{{ route('competition.index') }}",
                    type: 'get',
                    dataSrc:""
                },
                columns: columnas,
                responsive: true,
                processing: true,
                searching: true,
                bInfo: true,
                pagingType: "simple_numbers",
                lengthChange: true,
                pageLength: 50,
                order: [
                    [0, 'desc'],
                ],
            });
        })


        $(document).on('click','.open_modal',function(){
            $('#form_edit_competition')[0].reset();
            var url = "/competition/edit";
            var competition_id= $(this).val();
            var type= $(this).data('type');
            $.get(url + '/' + competition_id + '/' + type, function (data) {

                $('#modal-title-user').html('<i class="fe fe-edit"></i> Categoria: '+data.competition.category.name+' - '+data.competition.belt.name +' - '+data.competition.gender);
                $('#competition_id').val(competition_id);
                $('#id_type').val(type);

                if (data['positions'].length != 0) {

                    if (data['positions']) {
                        $.each( data['positions'], function( key, value ) {

                            if (value.positions == 1) {
                                $('#full_name_first').val(value.full_name);
                                $('#dojo_first').val(value.dojo);
                                $('#organization_first').val(value.organization);
                                $('#state_first').val(value.state_id);
                            }
                            if (value.positions == 2) {
                                $('#full_name_two').val(value.full_name);
                                $('#dojo_two').val(value.dojo);
                                $('#organization_two').val(value.organization);
                                $('#state_two').val(value.state_id);
                            }
                            if (value.positions == 3) {
                                $('#full_name_three').val(value.full_name);
                                $('#dojo_three').val(value.dojo);
                                $('#organization_three').val(value.organization);
                                $('#state_three').val(value.state_id);
                            }
                            if (value.positions == 4) {
                                $('#full_name_four').val(value.full_name);
                                $('#dojo_four').val(value.dojo);
                                $('#organization_four').val(value.organization);
                                $('#state_four').val(value.state_id);
                            }
                            console.log( key + ": " + value.positions );
                        });
                    }
                }
                //success data
                $('#modal_edit_competition').modal('show');
            })
        });

        $( "#form_edit_competition" ).submit( function(e){
            $.ajax({
                url: "{{ route('competition.update') }}",
                method: 'post',
                data: $('#form_edit_competition').serialize(),
                beforeSend: function() {
                    // aqui muestra el loading
                    //$("#global-loader").css("display", "block");
                },
                success: function(data) {
                   // $("#global-loader").css("display", "none");
                    $('#modal_edit_competition').modal('hide');
                    // notif({
                    //     msg: "<b>Success:</b> Well done Details edited successfully",
                    //     type: "success"
                    // });
                    $('#form_edit_competition')[0].reset();
                    table_competition.ajax.reload();
                },
                error: function(data, XMLHttpRequest, textStatus, errorThrown) {
                    let errors = data.responseJSON.errors;
                    //$("#global-loader").css("display", "none");
                    Object.entries(errors).forEach(([key, value]) => {
                        // notif({
                        //     msg: "<b>Oops!</b> "+value[0],
                        //     type: "error",
                        // });
                    });
                }
            });
            e.preventDefault();
        });
    </script>
@endsection