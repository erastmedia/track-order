@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('plugins.TempusDominusBootstrap4', true)
@section('plugins.DateRangePicker', true)
@section('plugins.Datatables', true)
@section('plugins.Select2', true)
@section('plugins.Toastr', true)

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title text-bold">Track Your Order</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @if (Auth::user()->kodebuyer == 'adm')
                    <input type="hidden" id="kodebuyer_user" name="kodebuyer_user" value="adm">
                    <div class="col-md-5">
                        <p class="text-bold">Buyer</p>
                        <div class="form-group">
                            <select class="form-control select2 select2-hidden-accessible text-md" style="width: 100%;" tabindex="1" aria-hidden="true" id="buyer_ID" name="buyer_ID">
                                @foreach ($buyers as $kodebuyer => $namabuyer)
                                    <option value="{{ $kodebuyer }}">{{ $namabuyer }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @else
                        
                            <input type="hidden" id="kodebuyer_user" name="kodebuyer_user" value="{{ Auth::user()->kodebuyer }}">
                        @endif      
                        <div class="col-md-7">
                            <p><b>Custom Number</b></p>
                            <div class="input-group form-group">
                                <input id="searchByName" type="text" class="form-control" placeholder="Insert your Custom Number ...">
                                <span class="input-group-append">
                                    <button id="btnSearch" type="button" class="btn bg-gradient-primary"><b>Track this Order!</b></button>
                                    <button id="btnShowAll" type="button" class="btn bg-gradient-pink"><b>Show All Data</b></button>
                                    <button id="btnFilter" type="button" class="btn bg-gradient-secondary"><b>Advanced Filter</b></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="divorderlist" class="card card-danger" id="divorderlist">
            <div class="card-header m-0">
                    <h3 class="card-title text-bold">Your Order List</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
            </div>
            
            <div class="card-body pt-0 pr-2 pl-2 pb-2">
                    <table id="table-receive" class="table table-bordered table-hover table-stripped table-sm text-sm data-table display" style="width:100%">
                    <thead>
                        <tr class="text-center bg-gradient-info">
                        <th style="width: 12%;">CUSTOM NUMBER</th>
                        <th style="width: 13%;">CUSTOMER NAME</th>
                        <th style="width: 5%;">QTY</th>
                        <th style="width: 10%;">TYPE</th>
                        <th style="width: 10%;">ORDER DATE<br>(mm/dd/yy)</th>
                        <th style="width: 10%;">RECEIVE DATE<br>(mm/dd/yy)</th>
                        <th style="width: 10%;">STATUS</th>
                        <th style="width: 30%;">NOTES</th>
                        </tr>
                    </thead>
                    <tbody id="table-receivebody">
                    </tbody>
                    </table>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-cost">
        <div class="modal-dialog modal-md">
             <div class="modal-content">
                  <div class="modal-header pt-1 pb-1 item-center bg-gradient-info">
                       <h5 class="modal-title text-bold">Invoice Details</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="false">&times;</span>
                       </button>
                  </div>
                  <div class="modal-body">
                       <table id="invoice" class="table table-bordered table-hover text-xs table-sm table-stripped data-table display" style="width: 100%;">
                            <thead>
                                 <tr class="text-center bg-gradient-secondary">
                                      <th style="width: 4%;">No.</th>
                                      <th style="width: 76%;">Notes</th>
                                      <th style="width: 20%;">Charge ($)</th>
                                 </tr>
                            </thead>
                            <tbody id="invoicebody">
                            </tbody>
                            <tfoot>
                                 <tr>
                                      <th colspan="2" class="text-right"><b></b>TOTAL</b></th>
                                      <th></th>
                                 </tr>
                            </tfoot>
                       </table>
                  </div>
             </div>
        </div>
   </div>

   <div class="modal fade" id="modal-filter">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Advanced Data Filter</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                            <div class="col-sm-12">
                                <div class="card card-danger collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Order Date Range</h3>
                                        <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>From : </label>
                                                        <input type="date" class="form-control" data-date-format="Y-m-d" name="tglawalform" id="tglawalform">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>To : </label>
                                                        <input type="date" class="form-control" data-date-format="Y-m-d" name="tglakhirform" id="tglakhirform">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button id="btnFilterDate" type="button" class="btn btn-block bg-gradient-primary btn-lg">Show By Order Date Range</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">All Order</h3>
                                        <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: block;">
                                        <div class="row">
                                                <div class="col-sm-12">
                                                    <label>Status : </label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="customRadio1" value="1" name="statusprod" checked>
                                                        <label for="customRadio1" class="custom-control-label">On Process</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="customRadio2" value="2" name="statusprod">
                                                        <label for="customRadio2" class="custom-control-label">Pending</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" id="customRadio3" value="4" name="statusprod">
                                                    <label for="customRadio3" class="custom-control-label">Shipped</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" id="customRadio4" value="3" name="statusprod">
                                                    <label for="customRadio4" class="custom-control-label">Cancel</label>
                                                </div>
                                            </div>
                                            </div>
                                        <div class="row">&nbsp;<br /></div>
                                        <div class="row">
                                                <div class="col-sm-12">
                                                    <button id="btnFilterAll" type="button" class="btn btn-block bg-gradient-primary btn-lg">Show All Order Data</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $currentUser = json_encode(['kodebuyer' => auth()->user()->kodebuyer]);
@endphp

@stop

@section('footer')
    <footer class="main-footer text-xs">
        <div class="float-right d-none d-xs-block">
            <b>Version</b> 2.0.0
        </div>
        <strong>Copyright &copy; 2024 <a href="https://indokores.com">PT INDOKORES SAHABAT</a>.</strong> All rights
        reserved.
    </footer>
@stop

@section('css')
<link rel="stylesheet" href="/css/customs.css" />
@stop
@section('js')
{{-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script> --}}
<script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.24/dataRender/datetime.js"></script>
<script>

    var table = null;
    var stat_prod = 0;
    var currentUser = {!! $currentUser !!};

    $(document).ready(function () {

        $("#buyer_ID").select2({
            theme: 'bootstrap4',
            placeholder: "Choose Buyer",
            allowClear: true
        })

        $("#buyer_ID").val('').trigger('change');
        stat_prod = $("input[name='statusprod']:checked").val();
        if (table != null) {
            table.destroy();
        }

    });

    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });

    $('#buyer_ID').change(function () {
        kodebuyer = $(this).val();
        if(!kodebuyer){
            kodebuyer = "";
        }
        console.log(kodebuyer);
    });

    $('input[type=radio][name=statusprod]').change(function() {
        stat_prod = $("input[name='statusprod']:checked").val();
    });

    $("#btnFilter").click(function(event){
        event.preventDefault();
        $('#modal-filter').modal({backdrop: 'static', keyboard: false})
    });

    $("#btnFilterAll").click(function(event){
        event.preventDefault();
        console.log(kodebuyer);
        console.log(stat_prod);
    });

    $("#btnShowAll").click(function(event){
        event.preventDefault();
        console.log(kodebuyer);
        if (currentUser.kodebuyer=='adm'){
            if(kodebuyer==''){
                toastr["error"]("You have not specified Buyer data as a filter.", "Invalid Data Filter");
                return false;
            }
        }
        
        kodebuyerdetail = kodebuyer;
        if (currentUser.kodebuyer=='adm'){
            // $('#kodebuyer_com').val(kodebuyerdetail);
        } else {
            // kodeBuyerCom.val(currentUser.kodebuyer);
        }
        $('#modal-generate').modal({backdrop: 'static', keyboard: false})
        if (table != null) {
            table.destroy();
        }
        // if (tableprogress != null) {
        //     tableprogress.destroy();
        // }
        // loadEmptyProduksi();
        filterAll(stat_prod);
        table.columns.adjust().draw();
    });

    function filterAll(stat_prod){
        table = $('#table-receive').DataTable({
            "initComplete": function(settings, json) {
                $("#modal-generate").modal('toggle');
            },
            processing: true,
            serverSide: true,
            responsive: true,
            autowidth: false,
            bPaginate: false,
            bFilter: false,
            info: false,
            columnDefs: [
                { width: '12%', targets: 0 },
                { width: '13%', targets: 1 },
                { width: '5%', targets: 2 },
                { width: '10%', targets: 3 },
                { width: '10%', targets: 4 },
                { width: '10%', targets: 5 },
                { width: '10%', targets: 6 },
                { width: '30%', targets: 7 },
            ],
            fixedColumns: true,
            bLengthChange: false,
            lengthMenu: [
                [-1, 15, 20, 25, 50, 100, 200],
                ['All', 15, 20, 25, 50, 100, 200],
            ],
            ajax: {
                url: "{{ route('filterall') }}",
                data: {
                    kode_buyer:kodebuyer,
                    stat_prod:stat_prod
                }
                },
            columns: [
                {
                    data: 'nomororder',
                    name: 'receive.nomororder',
                    className: "text-center details-control",
                },
                {
                    data: 'customer_name', 
                    name: 'receive.customer_name', 
                    className: "text-center details-control"
                },
                {
                    data: 'qty', 
                    name: 'receive.qty', 
                    render: $.fn.dataTable.render.number('.', ',', 0, ''), 
                    className: "text-right details-control"
                },
                {
                    data: 'jenis', 
                    name: 'jenis_order.jenis', 
                    className: "text-center details-control"
                },
                {
                    data: 'tglorder', 
                    name: 'receive.tglorder', 
                    render: $.fn.dataTable.render.moment('MM/DD/YY'), 
                    className: "text-center details-control"
                },
                {
                    data: 'tglmasuk', 
                    name: 'receive.tglmasuk', 
                    render: $.fn.dataTable.render.moment('MM/DD/YY'), 
                    className: "text-center details-control"
                },
                {
                    data: 'status',
                    name: 'receive.status',
                    className: "text-center details-control",
                    searchable: false,
                    render: function(data, type, full, meta) {
                        if (data == 4) {
                            return '<span class="badge bg-success pt-1 pb-1 pl-2 pr-2">SHIPPED<i class="fas fa-truck ml-1"></i></span>';
                        } else if (data == 1) {
                            return '<span class="badge bg-primary pt-1 pb-1 pl-2 pr-2">PROCESS<i class="fas fa-cogs ml-1"></i></span>';
                        } else if (data == 2) {
                            return '<span class="badge bg-secondary pt-1 pb-1 pl-2 pr-2">PENDING<i class="fas fa-hourglass-half ml-1"></i></span>';
                        } else if (data == 3) {
                            return '<span class="badge bg-danger pt-1 pb-1 pl-2 pr-2">CANCEL<i class="fas fa-ban ml-1"></i></span>';
                        } else {
                            return data;
                        }
                    }
                },
                {
                    data: 'notes', 
                    name: 'keterangan.notes', 
                    className: "text-left details-control"
                },
            ]
        });
        table.columns.adjust().draw();
    }
</script>
@stop