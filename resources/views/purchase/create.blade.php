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
                                        <th>ID</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Packages</th>
                                        <th>Price/Package</th>
                                        <th>Item Packgaes</th>
                                        <th>Price/Item</th>
                                        <th>Sub Item</th>
                                        <th>Price/Sub-Item</th>
                                        <!-- <th>Sub total</th> -->
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
        var x = 0;
        if($('#bootstrap-table tbody tr').length > 0){
            if($(".no-records-found").length == 0){
                // console.log('hello');
                var product_id = getData($('input[name="id[]"]'));  
                var count_id = $('input[name="id[]"]').toArray().length;
                // var countID = product_id.lenght;
            }
        }
        var query = $(this).val();
        if(query != ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{route('purchase.fetch')}}",
                method:"POST",
                dataType: 'json',
                data:{query:query, _token: _token, product_id: product_id, count_id: count_id},
                success:function(data){
                     $('#medicationList').fadeIn();
                      var str = '<ul class="mydd">';
                        $.each( data, function( keys, values ) {
                            $.each( values, function( key, value ) {
                                if(key=="pro_code"){
                                    str += '<li class="lst"><a href="#">' + value;
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

    $(document).on('click','.lst',function(){
        var x = $(this).text();
        var query = x.split("-",1);
        if(query != ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{route('purchase.add')}}",
                method:"POST",
                data:{query:query, _token: _token},
                success:function(data){
                //  $('#medicationList').fadeIn();
                    var str = '<tr>';
                        $.each( data, function( keys, values ) {
                            $.each( values, function( key, value ) {
                                if(key=="id"){
                                    str += '<td><input type="hidden" name="id[]" value="'+value+'">' + value + "</td>";
                                }
                                if(key=="pro_code"){
                                    str += "<td>" + value + "</td>";
                                }
                                if(key=="pro_name"){
                                    str += "<td>" + value + "</td>";
                                }

                            })
                        })
                        str +='<td ><input type="number" class="form-control attrName at" min=0 max="5" name="package[]"></td>';
                        str +='<td ><input type="number" class="form-control attrName at" min="0" name="packagePrice[]"></td>';
                        str +='<td ><input type="number" class="form-control attrName at" min="0" name="item[]"></td>';
                        str +='<td ><input type="number" class="form-control attrName at" min="0" name="itemPrice[]"></td>';
                        str +='<td ><input type="number" class="form-control attrName at" min="0" name="subitem[]"></td>';
                        str +='<td ><input type="number" class="form-control attrName at" min="0" name="subPrice[]"></td>';
                        // str +='<td ><input type="number" class="form-control" min="0" name="subtotal[]" disabled></td>';
                         str += '<td><a href="#" class="btn btn-simple btn-danger btn-icon dt" id="btnDelete"><i class="ti-close"></i></a></td></tr>';
                         $('#bootstrap-table > tbody').prepend(str);
                         $(".no-records-found").remove();

                         $( ".dt" ).unbind().click(function() {
                                var delValue = 0;
                                var data = 0;
                                var file = $(this).parent().parent().find('input.attrName');
                                // console.log(file);
                                 var delValue = (file[0].value*file[1].value) + (file[2].value*file[3].value) + (file[4].value*file[5].value);
                                 var data = $('#total').val() - delValue;
                                // alert(data);
                                 $('#total').val(data.toFixed(2));
                                 $(this).parent().parent().remove();
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
                                        +            '<select  class="form-control" data-style="btn btn-defuil btn-block" title="Supplier" id="supplier" data-size="5" name="supplier">'
                                        +               ' @foreach($suppliers as $supplier)'
                                        +                '    <option value="{{$supplier->id}}" > {{$supplier->name}} </option>'
                                        +                '@endforeach'
                                        +            '</select>'
                                        +    '</div>'
                                        +     '<div class="col-md-3">'
                                        +            '<input type="number" class="form-control at" placeholder="Discount" name="Discount" id="discount" min="0">'
                                        +        '</div>'
                                        +    '<div class="col-md-3">'
                                        +        '<input type="number" class="form-control at" placeholder="Tax" name="Tax" min="0" id="tax">'
                                        +    '</div>'
                                        +    '<div class="col-md-3">'
                                        +            '<select  class="form-control" data-style="btn btn-defuil btn-block" title="Payment Method" data-size="5" name="payment" id="payment">'
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
                                        +            '<textarea class="form-control" placeholder="Say something" rows="5" name="remark" id="remark"></textarea>'
                                        +        '</div>'
                                        +    '</div>'
                                        +'</div>'
                                    +'</fieldset>'
                                 +   '<br/>'

                                 +'<div class="col-md-3">'
                                    +'<div class="input-group">'
                                        +'<span class="input-group-addon">Total</span>'
                                        +'<input type="number" class="form-control" placeholder="Total" name="Total" id="total" min="0" disabled style="text-align:right">'
                                        +'<span class="input-group-addon">$</span>'
                                    +'</div>'
                                +'</div>' 
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
<script>
    $("body").delegate('.at','change', function(e){
        e.preventDefault();
        var length = $('.attrName').length/6;
        var i = 0;
        var j=0;
        var index = 0;
        var x = [[[]]];
        var row = $('.attrName').length;

        //Loop data in file add to array
        while(i<length){
            x[i]=[];
            for(j=0; j<6; j++){
                if(index < row){
                    x[i][j]= $('.attrName')[index].value;
                    index++;
                }
            }     
            i++; 
        }
        
        var data = 0;
        var total = 0;
        var subtotal = 0;

        for(data = 0; data < length; data++){
            subtotal = (x[data][0]* x[data][1]) + (x[data][2]* x[data][3])+(x[data][4]* x[data][5]);
            total += subtotal; 
        }
        
        total += - $('#discount').val() - $('#tax').val();
        // $('#total').val(total.toFixed(2));
        $('#total').val(
            <?php
                    
            ?>
        );

        
    });
    $("body").delegate('#purchaseid','click', function(e){
            e.preventDefault();
            var _token = $('input[name="_token"]').val();
            var id_product = getData($('input[name="id[]"]'));
            var packages = getData($('input[name="package[]"]'));
            var packagePrice = getData($('input[name="packagePrice[]"]'));
            var items = getData($('input[name="item[]"]'));
            var itemPrice = getData($('input[name="itemPrice[]"]'));
            var subItem = getData($('input[name="subitem[]"]'));
            var subPrice = getData($('input[name="subPrice[]"]'));
            var supplier_id = $('#supplier').val();
            var tax = $('#tax').val();
            var discount = $('#discount').val();
            var payment = $('#payment').val();
            var remark = $('#remark').val();

            $.ajax({
                url:"{{route('purchase.store')}}",
                method:"POST",
                dataType: 'json',
                data:{id_product:id_product, _token: _token, packages:packages, packagePrice:packagePrice, 
                        items:items, itemPrice:itemPrice, subItem:subItem, subPrice:subPrice, 
                        supplier_id:supplier_id, tax:tax, discount:discount, payment:payment, remark:remark },
                success: function(total) {

                            window.location.href = "/purchase";
                        },
                error: function(data) {
                            var errors = data.responseJSON;
                                console.log(errors);
                        }
                })  

    });

    function getData(params){
        var data = [];

        params.each(function(){
            data.push($(this).val());
        })
        return data;
    }
</script>

@endsection



