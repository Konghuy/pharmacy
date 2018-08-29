@extends('master')
@section('title', 'Expired Alert')
@section('panel-title', 'Product Expired')
@section('expireAlert', 'active')

@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                    <h4>Expired Infomation</h4>
                                <div class="toolbar">
                                    <!--Here you can write extra buttons/actions for the toolbar-->
                                </div>
                                <table id="bootstrap-table" class="table">
                                    <thead>
                               
                                        <th data-field="id" data-sortable="true">ID</th>
                                        <th data-field="code" data-sortable="true">Code</th>
                                        <th data-field="name" data-sortable="true">Name</th>
                                        <th data-field="pk" data-sortable="true">Package</th>
                                        <th data-field="item" data-sortable="true">Item</th>
                                        <th data-field="subItem" data-sortable="true">Sub-Item</th>
                                        <th data-field="status" data-sortable="true">Status</th>
                                        <th data-field="actions" >Actions control</th>
                                    </thead>
                                    <tbody>
                                        @foreach($expired as $expire)
                                        <tr>
                                            <td>{{$expire->id}}</td>
                                            <td>{{$expire->pro_code}}</td>
                                            <td>{{$expire->pro_name}}</td>
                                            <td>N/A</td>
                                            <td>N/A</td>
                                            <td>N/A</td>
                                            <td>Expired</td>
                                            <td>
                                                    <a href="/expired/{{$expire->id}}" class="btn btn-simple btn-info btn-icon"><i class="ti-image"></i></a>
                                                    <a href="/expired/{{$expire->id}}/edit" class="btn btn-simple btn-warning btn-icon edit"><i class="ti-pencil-alt"></i></a>
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









