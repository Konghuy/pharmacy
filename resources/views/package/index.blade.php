@extends('master')
@section('title', 'Category')
@section('panel-title', 'Category')
@section('pk', 'active')
@section('li-medication', 'active')
@section('medication', 'true')

@section('content')

<div class="content">
        <div class="container-fluid">
                <a href="/package/create" class="btn btn-wd btn-default btn-fill btn-move-right pull-right">
                        Add Package    
                    <span class="btn-label">
                            <i class="ti-angle-right"></i>
                        </span>  
                    </a>
                    <div class="clearfix"></div>

        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                                <h4>Package Infomation</h4>
                            <div class="toolbar">
                                <!--Here you can write extra buttons/actions for the toolbar-->
                            </div>
                            <div class="fresh-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th class="disabled-sorting">Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($packages as $package)
                                    <tr>
                                        <td>{{$package->name}}</td>
                                        <td>{{$package->description}}</td>

                                        <td>
                                            <a href="/package/{{$package->id}}" class="btn btn-simple btn-info btn-icon"><i class="ti-image"></i></a>
                                            <a href="/package/{{$package->id}}/edit" class="btn btn-simple btn-warning btn-icon edit"><i class="ti-pencil-alt"></i></a>
                                            <a href="#" class="btn btn-simple btn-danger btn-icon remove" onclick="demo.showSwal('warning-message-and-confirmation')"><i class="ti-close"></i></a>
                                             {{-- /package/{{$package->id}} --}}
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

        </div>
    </div>

@endsection

@section('script')

<script type="text/javascript">
    $(document).ready(function() {

        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            responsive: true,
            language: {
            search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });


        var table = $('#datatables').DataTable();
    });
</script>

@endsection



