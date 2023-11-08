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
            <h2 class="main-content-title tx-24 mg-b-5">Categoria</h2>
            {{-- <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Maps & Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">DataTable</li>
            </ol> --}}
        </div>
        <div class="d-flex">
            <div class="justify-content-center">
                <button type="button" class="btn btn-white btn-icon-text my-2 mr-2" data-target="#modal_competition_new" data-toggle="modal">
                        <i class="fe fe-plus-square mr-2"></i> Nueva Categoria
                    </button>
                {{-- <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
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
                        <h6 class="main-content-label mb-1">Categorias</h6>
                        <p class="text-muted card-sub-title"></p>
                    </div>
                    <div class="table-responsive">
                        <table id="table_competition" class="table table-bordered border-t0 key-buttons text-nowrap w-100 " >
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cinturon</th>
                                    <th>Genero</th>
                                    <th>Accion</th>
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
    <div class="modal" id="modal_competition_new">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content modal-content-demo">
                <form id="form_new_competition" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h6 class="modal-title"><i class="fe fe-plus-square mr-2"></i> Nueva Categoria</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Categoria</p>
                                    <select name="category_id" class="form-control select2" id="category_id_new" placeholder="category_id" required>
                                        <option value="">Selecciona una Categoria</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}"><?PHP echo ucfirst($category->name);?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Cinturones</p>
                                    <select name="belt_id" class="form-control select2" id="belt_id_new" placeholder="Cinturon" required>
                                        <option value="">Selecciona Cinturon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Genero</p>
                                    <select name="gender_id" class="form-control select2" id="gender_id_new" placeholder="Genero">
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                        <option value="Mix">Mixto</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="submit">Save</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                    </div>
                </form>
			</div>
		</div>
	</div>
	<!--End Large Modal -->

    <!-- Large Modal -->
	<div class="modal" id="modal_edit_category">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title" id="modal-title-user">Edit</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
                <form id="form_edit_competition" method="POST">
                    @csrf
                    <div class="modal-body">
                        <h6>Edit</h6>
                        <input type="hidden" id="id_edit" name="id">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <p class="mg-b-10">Categoria</p>
                                    <select name="category_id" class="form-control select2" id="category_id" placeholder="category_id" required>
                                        <option value="">Selecciona una Categoria</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}"><?PHP echo ucfirst($category->name);?></option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Cinturones</p>
                                    <select name="belt_id" class="form-control select2" id="belt_id" placeholder="Cinturon" required>
                                        <option value="">Selecciona Cinturon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="mg-b-10">Genero</p>
                                    <select name="gender_id" class="form-control select2" id="gender_id" placeholder="Genero">
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                        <option value="Mix">Mixto</option>
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

        let columnas = [
            {
                data: 'category_id',
                render: function (data, type, row, meta) {
                    return row.category.name;
                }
            },
            {
                data: 'belt_id',
                render: function (data, type, row, meta) {
                     return row.belt.name;
                }
            },
            {
                data: 'gender',
                render: function (data, type, row, meta) {
                    if (data == 'F') {
                        return 'Femenino';
                    }
                    if (data == 'M') {
                        return 'Masculino';
                    }
                    if (data == 'Mix') {
                        return 'Mixto';
                    }
                }
            },
            {
                data: 'id',
                orderable: false,
                render: function ( data, type, row) {
                    return '<div aria-label="Basic example" class="btn btn-group" role="group"><button class="btn ripple btn-success btn-icon btn-sm open_modal" data-target="#modal_edit_category" value="'+data+'"> <i class="fe fe-edit"></i> </button><button class="btn ripple btn-danger btn-icon btn-sm" value="'+data+'" onclick="swalWarning('+data+')"> <i class="fe fe-trash-2"></i></button></div>';
                },
            }
        ];

        function swalWarning(id) {
            swal({
                title: "¿Seguro?",
                text: "No podrá recuperar este archivo!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-danger",
                confirmButtonText: "Sí, bórralo!",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url: "{{ route('category.destroy') }}",
                    method: 'delete',
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        swal("Eliminado!", "Su archivo ha sido borrado.", "success");
                        table_competition.ajax.reload();
                    },
                    error: function(result) {
                        swal("Cancelado", "Tu archivo está a salvo", "error");
                    }
                });
            });
        }

        $(document).ready(function (e) {
            table_competition = $("#table_competition").DataTable({
                ajax: {
                    url: "{{ route('category.index') }}",
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

        $('#category_id_new').on('change', function() {
            const id = $(this).val();

            $.ajax({
                url: "{{ route('category.belts') }}",
                type: 'POST',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(result) {
                    var belts = [];

                    result.forEach(element => {
                        belts.push({
                            id: element.belt.id,
                            text: element.belt.name
                        });
                    });

                    $('#belt_id_new').empty().trigger('change')

                    $('#belt_id_new').select2({
                        data: belts,
                    });
                },
                error: function(result) {
                    // Show an alert with the result
                    new Noty({
                        type: "danger",
                        text: result.message
                    }).show();
                }
            });
        })

        $( "#form_new_competition" ).submit( function(e){
            $("#global-loader").css("display", "block");
            $.ajax({
                url: "{{ route('category.store') }}",
                method: 'post',
                data: $('#form_new_competition').serialize(),
                success: function(data) {
                    $('#modal_competition_new').modal('hide');
                    $("#global-loader").css("display", "none");
                    // notify({
                    //     msg: "<b>Success:</b> Bien hecho detalles enviados con éxito",
                    //     type: "success"
                    // });
                    $('#form_new_competition')[0].reset();
                    table_competition.ajax.reload();
                },
                error: function(data, XMLHttpRequest, textStatus, errorThrown) {
                    let errors = data.responseJSON.errors;
                    $("#global-loader").css("display", "none");

                    Object.entries(errors).forEach(([key, value]) => {
                        notif({
                            msg: "<b>Oops!</b> "+value[0],
                            type: "error",
                        });
                    });
                }
            });
            e.preventDefault();
        });

        $(document).on('click','.open_modal',function(){
            var url = "/category/edit";
            var id= $(this).val();
            $.get(url + '/' + id, function (data) {
                //success data
                searchBelt(data.category_id, data.belt_id)

                $('#modal-title-user').html('<i class="fe fe-edit"></i> Editar Competencia: '+data.category.name);
                $('#id_edit').val(data.id);
                $('#category_id').val(data.category_id);
                $('#belt_id').val(data.belt_id);
                $('#gender_id').val(data.gender);
                $('#modal_edit_category').modal('show');
            })
        });

        function searchBelt(category_id, belt_id) {
            $.ajax({
                url: "{{ route('category.belts') }}",
                type: 'POST',
                data: {
                    id: category_id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(result) {
                    var belts = [];

                    result.forEach(element => {
                        belts.push({
                            id: element.belt.id,
                            text: element.belt.name
                        });
                    });

                    $('#belt_id').empty().trigger('change')

                    $('#belt_id').select2({
                        data: belts,
                    });

                    $('#belt_id').val(belt_id);
                    $('#belt_id').trigger('change');
                },
                error: function(result) {
                    // Show an alert with the result
                    new Noty({
                        type: "danger",
                        text: result.message
                    }).show();
                }
            });
        }

        $('#category_id').on('change', function() {
            const id = $(this).val();

            $.ajax({
                url: "{{ route('category.belts') }}",
                type: 'POST',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(result) {
                    var belts = [];

                    result.forEach(element => {
                        belts.push({
                            id: element.belt.id,
                            text: element.belt.name
                        });
                    });

                    $('#belt_id').empty().trigger('change')

                    $('#belt_id').select2({
                        data: belts,
                    });
                },
                error: function(result) {
                    // Show an alert with the result
                    new Noty({
                        type: "danger",
                        text: result.message
                    }).show();
                }
            });
        })

        $( "#form_edit_competition" ).submit( function(e){
            $.ajax({
                url: "{{ route('category.update') }}",
                method: 'post',
                data: $('#form_edit_competition').serialize(),
                beforeSend: function() {
                    // aqui muestra el loading
                    $("#global-loader").css("display", "block");
                },
                success: function(data) {
                    $("#global-loader").css("display", "none");
                    $('#modal_edit_category').modal('hide');
                    // notif({
                    //     msg: "<b>Success:</b> Well done Details edited successfully",
                    //     type: "success"
                    // });
                    table_competition.ajax.reload();
                },
                error: function(data, XMLHttpRequest, textStatus, errorThrown) {
                    let errors = data.responseJSON.errors;
                    $("#global-loader").css("display", "none");
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