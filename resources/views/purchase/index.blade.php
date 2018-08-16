@extends('master')
@section('title', 'Purchase')
@section('panel-title', 'Purchase')
@section('pc', 'active')
@section('li-import', 'active')
@section('import', 'true')

@section('content')

<div class="content">
        <div class="container-fluid">
            <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <h4>Searching Item you need</h4>
                                <div class="form-group">
                                    <input class="form-control " name="medication" id="medication_name" type="text"  placeholder="Search"/>
                                    <div id="medicationList">

                                    </div>
                                    {{csrf_field()}}
                                </div>
                            </div>
                            <div class="card-content">
                                <table id="bootstrap-table" class="table">
                                    <thead>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Packages</th>
                                        <th>Price/Package</th>
                                        <th>Item Packgaes</th>
                                        <th>Price/Package</th>
                                        <th>Sub Item</th>
                                        <th>Price/Sub-Item</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody id="tbody">
                                    </tbody>
                                </table>
                            <div id="purchaseOption">
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
    // document.getElementById("purchase").disabled = true;
    var $table = $('#bootstrap-table');

        $().ready(function(){
                $table.bootstrapTable({
                toolbar: ".toolbar",
                clickToSelect: true,
                // showRefresh: true,
                // search: true,
                // showToggle: true,
                // showColumns: true,
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

<script type="text/javascript">

$(document).ready(function(){
    
    $('#medication_name').keyup(function(){
        
        var query = $(this).val();
        if(query != ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{route('purchase.fetch')}}",
                method:"POST",
                dataType: 'json',
                data:{query:query, _token: _token},
                success:function(data){
                     $('#medicationList').fadeIn();
                      var str = '<ul class="mydd">';
                        $.each( data, function( keys, values ) {
                            $.each( values, function( key, value ) {
                                if(key=="pro_code"){
                                    str += '<li><a href="#">' + value;
                                }
                                if(key=="pro_name"){
                                    str +=  '-' + value + '</a></li>';
                                    '{{csrf_field()}}'
                                }
                            })
                        })
                        str += '</ul>';
                        // {{csrf_field()}}
                        $('#medicationList').html(str);
                }
            })  
        }
    });

    $(document).on('click','li',function(){
        // alert($(this).value);
        var x = $(this).text();
        var query = x.split("-",1);
        // alert(query);
        if(query != ''){
            var _token = $('input[name="_token"]').val();
            // alert(_token);
            $.ajax({
                url:"{{route('purchase.add')}}",
                method:"POST",
                data:{query:query, _token: _token},
                success:function(data){
                    //  $('#medicationList').fadeIn();
                    var str = '<tr>';
                        $.each( data, function( keys, values ) {
                            $.each( values, function( key, value ) {
                                //  alert(value);
                                if(key=="pro_code"){
                                    str += "<td>" + value + "</td>";
                                }
                                if(key=="pro_name"){
                                    str += "<td>" + value + "</td>";
                                }

                            })
                        })
                        str +='<td class="attrName"><input type="number" class="form-control" name="package"></td>';
                        str +='<td class="attrName"><input type="number" class="form-control" name="packagePrice"></td>';
                        str +='<td class="attrName"><input type="number" class="form-control" name="item"></td>';
                        str +='<td class="attrName"><input type="number" class="form-control" name="itemPrice"></td>';
                        str +='<td class="attrName"><input type="number" class="form-control" name="subitem"></td>';
                        str +='<td class="attrName"><input type="number" class="form-control" name="subPrice"></td>';
                         str += '<td><a href="#" class="btn btn-simple btn-danger btn-icon" id="btnDelete"><i class="ti-close"></i></a></td></tr>';
                         $('#bootstrap-table > tbody').prepend(str);
                         $(".no-records-found").remove();
                         $( "#btnDelete" ).click(function() {
                            $(document).on('click','tr',function(){
                                $(this).remove();
                                
                            });
                        });
                        //  $('#link').html('<a href="#" class="btn btn-wd btn-default btn-fill btn-move-right pull-right" id="purchase">Purchase<span class="btn-label"><i class="ti-angle-right"></i></span></a>');
                         $('#purchaseOption').html(
                            '<fieldset>'
                                        +'<div class="card-content">'
                                        +    '<div class="col-md-3"><label class="control-label">Supplier</label></div> '
                                        +    '<div class="col-md-3"><label class="control-label">Discount</label></div>'
                                        +    '<div class="col-md-3"><label class="control-label">Tax</label></div>'
                                        +    '<div class="col-md-3"><label class="control-label">Payment Method</label></div>'   
                                        +'<div class="form-group">'
                                        +    '<div class="col-md-3">'
                                        +            '<select  class="form-control" data-style="btn btn-defuil btn-block" title="Supplier" data-size="5" name="supplier">'
                                        +               ' @foreach($suppliers as $supplier)'
                                        +                '    <option value="{{$supplier->id}}" > {{$supplier->name}} </option>'
                                        +                '@endforeach'
                                        +            '</select>'
                                        +    '</div>'
                                        +     '<div class="col-md-3">'
                                        +            '<input type="number" class="form-control" placeholder="Discount" name="Discount">'
                                        +        '</div>'
                                        +    '<div class="col-md-3">'
                                        +        '<input type="number" class="form-control" placeholder="Tax" name="Tax">'
                                        +    '</div>'
                                        +    '<div class="col-md-3">'
                                        +            '<select  class="form-control" data-style="btn btn-defuil btn-block" title="Payment Method" data-size="5" name="payment">'
                                        +               ' @foreach($payments as $payment)'
                                        +                '    <option value="{{$payment->id}}" > {{$payment->name}} </option>'
                                        +                '@endforeach'
                                        +            '</select>'
                                        +    '</div>'
                                        +'</div>'
                                        +'</div>'
                                    +'</fieldset>'



                            +'<fieldset>'
                                        + '<div class="form-group">'
                                        +   '<div class="card-content">'
                                        +        '<label class="control-label">Remark</label>'
                                        +        '<div class="col-sm-12">'
                                        +            '<textarea class="form-control" placeholder="Say something" rows="5" name="remark"></textarea>'
                                        +        '</div>'
                                        +    '</div>'
                                        +'</div>'
                                    +'</fieldset>'
                                 +   '<br/>'
                             +'<button class="btn btn-wd btn-info btn-fill btn-move-right pull-right" id="purchaseid">Purchase<span class="btn-label"><i class="ti-angle-right"></i></span></button>'
                             +   '<br/>'                                
                             +   '<br/>'
                            );
                }
                
            })  
        }

         $('#medication_name').val('');
        $('#medicationList').fadeOut();
    });
});
</script>

@endsection



