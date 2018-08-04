@extends('master')
@section('title', 'Role')
@section('panel-title', 'Role')
@section('r', 'active')
@section('li-staff', 'active')
@section('staff', 'true')

@section('content')

<div class="content">
        <div class="container-fluid">
                <a href="/role/create" class="btn btn-wd btn-default btn-fill btn-move-right pull-right">
                        Add Role    
                    <span class="btn-label">
                            <i class="ti-angle-right"></i>
                        </span>  
                    </a>
                    <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                                <h4>Roles Infomation</h4>
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
                                    @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->description}}</td>
                                        <td>
                                            <a href="/role/{{$role->id}}" class="btn btn-simple btn-info btn-icon"><i class="ti-image"></i></a>
                                            <a href="/role/{{$role->id}}/edit" class="btn btn-simple btn-warning btn-icon edit"><i class="ti-pencil-alt"></i></a>
                                            <a href="/role/{{$role->id}}" class="btn btn-simple btn-danger btn-icon remove"><i class="ti-close"></i></a>
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
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            responsive: true,
            language: {
            search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });


        var table = $('#datatables').DataTable();
        //  // Edit record
        //  table.on( 'click', '.edit', function () {
        //     $tr = $(this).closest('tr');

        //     var data = table.row($tr).data();
        //     alert( 'You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.' );
        //  } );

        //  // Delete a record
        //  table.on( 'click', '.remove', function (e) {
        //     $tr = $(this).closest('tr');
        //     table.row($tr).remove().draw();
        //     e.preventDefault();
        //  } );

        // //Like record
        // table.on( 'click', '.like', function () {
        //     alert('You clicked on Like button');
        //  });

    });
</script>

@endsection



