@extends('master')
@section('title', 'Medication')
@section('panel-title', 'Medication')
@section('mi', 'active')
@section('li-medication', 'active')
@section('medication', 'true')

@section('content')

<div class="content">
        <div class="container-fluid">
                <a href="/medication/create" class="btn btn-wd btn-default btn-fill btn-move-right pull-right">
                        Add Medicine    
                    <span class="btn-label">
                            <i class="ti-angle-right"></i>
                        </span>  
                    </a>
                    <div class="clearfix"></div>
            <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                    <h4>Medicine Infomation</h4>
                                <div class="toolbar">
                                    <!--Here you can write extra buttons/actions for the toolbar-->
                                </div>
                                <table id="bootstrap-table" class="table">
                                    <thead>
                                        {{-- <th data-field="state" data-checkbox="true"></th> --}}
                                        <th data-field="code" data-sortable="true">Code</th>
                                        <th data-field="name" data-sortable="true">Name</th>
                                        <th data-field="category" data-sortable="true">Category</th>
                                        <!-- <th data-field="package" data-sortable="true">Package</th> -->
                                        <!-- <th data-field="qtyPackage" data-sortable="true">Qty package</th>
                                        <th data-field="PackagePrice" data-sortable="true">Price/package </th>
                                        {{-- <th data-field="itemInpackage" data-sortable="true">Item in Package</th> --}}
                                        <th data-field="qtyItem" data-sortable="true">Qty Item</th>
                                        <th data-field="priceItem" data-sortable="true">Price Item</th>
                                        {{-- <th data-field="subItem" data-sortable="true">Sub-Item</th> --}}
                                        <th data-field="qtySubItem" data-sortable="true">Qty Sub-Item</th>
                                        <th data-field="priceSubItem" data-sortable="true">Price Sub Item</th> -->
                                        <th data-field="weight" data-sortable="true">Weight</th>
                                        <th data-field="rank_Num" data-sortable="true">Ranking</th>
                                        <th data-field="manu" data-sortable="true">Manufacturing</th>
                                        <th data-field="Expire" data-sortable="true">Expired</th>
                                        <th data-field="actions" >Actions control</th>
                                    </thead>
                                    <tbody>
                                        @foreach($medications as $medication)
                                        <tr>
                                            <td>{{$medication->pro_code}}</td>
                                            <td>{{$medication->pro_name}}</td>
                                            <td>{{$medication->category->name}}</td>

                                            <!-- <td>{{$medication->package_id}}</td>
                                            <td>{{$medication->items_in_pack}}</td>
                                            <td>{{$medication->item_unit_cost}}</td>

                                            <td>{{$medication->sub_items_in_item}}</td>
                                            <td>{{$medication->sub_item_unit_cost}}</td>
                                            <td>{{$medication->qty}}</td>
                                            <td>{{$medication->price}}</td> -->

                                            <td>{{$medication->weight}}</td> 
                                            <td>{{$medication->rank_number_id}}</td>

                                            <td>{{Carbon\Carbon::parse($medication->manufacturing_date)->format('d/m/Y')}}</td> 
                                            <td>{{Carbon\Carbon::parse($medication->expiry_date)->format('d/m/Y')}}</td>
                                            
                                            <td>
                                                    <a href="/medication/{{$medication->id}}" class="btn btn-simple btn-info btn-icon"><i class="ti-image"></i></a>
                                                    <a href="/medication/{{$medication->id}}/edit" class="btn btn-simple btn-warning btn-icon edit"><i class="ti-pencil-alt"></i></a>
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



