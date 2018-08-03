@extends('master')
@section('title', 'Supplier')
@section('panel-title', 'Supplier')
@section('s', 'active')
@section('li-staff', 'active')
@section('staff', 'true')

@section('content')

<div class="content">
        <div class="container-fluid">
                <a href="/supplier/create" class="btn btn-wd btn-default btn-fill btn-move-right pull-right">
                        Add Supplier    
                    <span class="btn-label">
                            <i class="ti-angle-right"></i>
                        </span>  
                    </a>
                    <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                                <h4>Supplier Infomation</h4>
                            <div class="toolbar">
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <div class="fresh-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th class="disabled-sorting">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{$supplier->name}}</td>
                                        <td>{{$supplier->address}}</td>
                                        <td>{{$supplier->contact}}</td>
                                        <td>{{$supplier->phone}}</td>
                                        <td>{{$supplier->email}}</td>
                                        <td>
                                            <a href="/supplier/{{$supplier->id}}" class="btn btn-simple btn-info btn-icon"><i class="ti-image"></i></a>
                                            <a href="/supplier/{{$supplier->id}}/edit" class="btn btn-simple btn-warning btn-icon edit"><i class="ti-pencil-alt"></i></a>
                                            <a href="/supplier/{{$supplier->id}}" class="btn btn-simple btn-danger btn-icon remove"><i class="ti-close"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                   </tbody>
                                </table>
                            </div>


                        </div>
                    </div><!--  end card  -->
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div>
    </div>

@endsection

@section('script')

<script type="text/javascript">
    $(document).ready(function() {

        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            responsive: true,
            language: {
            search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });
</script>
@endsection



