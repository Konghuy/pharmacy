@extends('master')
@section('title', 'POS')
@section('panel-title', 'POS')
@section('pos', 'active')

@section('content')

<div class="content">
        <div class="container-fluid">
                <a href="/pos/create" class="btn btn-wd btn-default btn-fill btn-move-right pull-right">
                        Add POS    
                    <span class="btn-label">
                            <i class="ti-angle-right"></i>
                        </span>  
                    </a>
                    <div class="clearfix"></div>
            <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                    <h4>POS Infomation</h4>
                                <div class="toolbar">
                                    <!--Here you can write extra buttons/actions for the toolbar-->
                                </div>
                                <table id="bootstrap-table" class="table">
                                    <thead>
                                    {{-- <th data-field="state" data-checkbox="true"></th> --}}
                                        <th data-field="id" data-sortable="true">ID</th>
                                        <th data-field="supplier" data-sortable="true">User</th>
                                        <th data-field="discount" data-sortable="true">Discount</th>
                                        <th data-field="tax" data-sortable="true">Tax</th>
                                        <th data-field="total" data-sortable="true">Total</th>
                                        <th data-field="manu" data-sortable="true">Order at</th>
                                        <th data-field="actions" >Actions control</th>
                                    </thead>
                                    <tbody>
                                        @foreach($pos as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->created_by}}</td>
                                            <td>{{$order->discount}}</td>
                                            <td>{{$order->tax}}</td>
                                            <td>{{$order->grand_total}}</td>
                                            <td>{{Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</td>                                  
                                            <td>
                                                    <a href="/pos/{{$order->id}}" class="btn btn-simple btn-info btn-icon"><i class="ti-image"></i></a>
                                                    <a href="/pos/{{$order->id}}/edit" class="btn btn-simple btn-warning btn-icon edit"><i class="ti-pencil-alt"></i></a>
                                                    <a href="#" class="btn btn-simple btn-danger btn-icon remove" id="delete" onclick="demo.showSwal('warning-message-and-confirmation')"><i class="ti-close"></i></a>
                                                     <!-- {{-- /package/{{$package->id}} --}} -->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!--  end card  -->
                    </div> <!-- end col-md-12 -->
                </div> <!-- end row -->
        </div>
    </div>

@endsection

@section('script')

<script type="text/javascript">

    var $table = $('#bootstrap-table');

        $().ready(function(){
                $table.bootstrapTable({
                toolbar: ".toolbar",
                clickToSelect: true,
                // showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                searchAlign: 'left',
                pageSize: 8,
                clickToSelect: false,
                pageList: [8,10,25,50,100],

                formatShowingRows: function(pageFrom, pageTo, totalRows){
                    //do nothing here, we don't want to show the text "showing x of y from..."
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'ti-close'
                }
            });

            //activate the tooltips after the data table is initialized
            $('[rel="tooltip"]').tooltip();

            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });
        });

</script>

@endsection









