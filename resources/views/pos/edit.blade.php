@extends('master')
@section('title', 'Purchase')
@section('panel-title', 'Purchase')
@section('pc', 'active')
@section('li-import', 'active')
@section('import', 'true')

@section('content')
{{csrf_field()}}
<div class="content">
    <div class="container-fluid">
            <a href="/medication" class="btn btn-wd btn-default btn-fill btn-move-left pull-right">
                    <span class="btn-label">
                        <i class="ti-angle-left"></i>
                    </span>  Back
                </a>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <form id="registerFormValidation"  method="POST" novalidate="">
                    {{csrf_field()}}
                    {{method_field('put')}}
                        <div class="card-header">
                            <h4 class="card-title">
                                Edit Purhcase
                            </h4>
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
                                        <!-- <th>Action</th> -->
                                    </thead>
                                    <tbody>
                                    @foreach($purchaseItems as $purchaseItem)
                                        <tr>    
                                            <input type="hidden" name="id[]" value="{{$purchaseItem->product_id}}"></td>
                                            <td>{{$purchaseItem->product_id}}</td>
                                            <td>{{$purchaseItem->purchase_id}}</td>
                                            <td>{{$purchaseItem->purchase_id}}</td>
                                            <td ><input type="number" class="form-control attrName at" min="0" name="package[]" value="{{$purchaseItem->purchase_items_in_pack}}"></td>
                                            <td ><input type="number" class="form-control attrName at" min="0" name="packagePrice[]"  value="{{$purchaseItem->purchase_items_unit_cost}}"></td>
                                            <td ><input type="number" class="form-control attrName at" min="0" name="item[]" value="{{$purchaseItem->purchase_sub_items_in_item}}"></td>
                                            <td ><input type="number" class="form-control attrName at" min="0" name="itemPrice[]" value="{{$purchaseItem->purchase_sub_items_unit_cost}}"></td>
                                            <td ><input type="number" class="form-control attrName at" min="0" name="subitem[]" value="{{$purchaseItem->purchase_qty}}"></td>
                                            <td ><input type="number" class="form-control attrName at" min="0" name="subPrice[]" value="{{$purchaseItem->purchase_price}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <fieldset>
                                        <div class="card-content">
                                            <div class="col-md-3"><label class="control-label">Supplier</label></div>
                                            <div class="col-md-3"><label class="control-label">Discount</label></div>
                                            <div class="col-md-3"><label class="control-label">Tax</label></div>
                                            <div class="col-md-3"><label class="control-label">Payment Method</label></div>   
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                   <select  class="form-control" data-style="btn btn-defuil btn-block" title="Supplier" id="supplier" data-size="5" name="supplier">
                                                       @foreach($suppliers as $supplier)
                                                            @if($purchase->suppiler_id==$supplier->id)
                                                                <option value="{{$supplier->id}}" selected> {{$supplier->name}} </option>
                                                            @else
                                                                <option value="{{$supplier->id}}" > {{$supplier->name}} </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                            </div>
                                             <div class="col-md-3">
                                                    <input type="number" class="form-control at" placeholder="Discount" name="Discount" id="discount" min="0" value="{{$purchase->discount}}">
                                                </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control at" placeholder="Tax" name="Tax" min="0" id="tax" value ="{{$purchase->tax}}">
                                            </div>
                                            <div class="col-md-3">
                                                    <select  class="form-control" data-style="btn btn-defuil btn-block" title="Payment Method" data-size="5" name="payment" id="payment">
                                                        @foreach($payments as $payment)
                                                            @if($purchase->payment_method_id==$payment->id)
                                                                <option value="{{$payment->id}}" selected> {{$payment->name}} </option>
                                                            @else
                                                            <option value="{{$payment->id}}"> {{$payment->name}} </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        </div>
                                    </fieldset>
                            <fieldset>
                                        <div class="form-group">
                                           <div class="card-content">
                                                <label class="control-label">Remark</label>
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" placeholder="Say something" rows="5" name="remark" id="remark">{{$purchase->remark}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <br/>

                                 <div class="col-md-3">
                                    <div class="input-group">
                                        <span class="input-group-addon">Total</span>
                                        <input type="number" class="form-control" placeholder="Total" name="Total" id="total" min="0" disabled style="text-align:right" value="{{$purchase->grand_total}}">
                                        <span class="input-group-addon">$</span>
                                    </div>
                                </div>
                             <button class="btn btn-wd btn-info btn-fill btn-move-right pull-right" id="purchaseid">Update<span class="btn-label"><i class="ti-angle-right"></i></span></button>
                                <br/>                               
                               <br/>
                            
                            </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

    <script type="text/javascript">
        $().ready(function(){
            $('#registerFormValidation').validate();
            demo.initFormExtendedDatetimepickers();
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
        $('#total').val(total.toFixed(2));  
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
            var total = $('#total').val();
            var discount = $('#discount').val();
            var payment = $('#payment').val();
            var remark = $('#remark').val();

            $.ajax({
                url:"/purchase/{{$purchase->id}}",
                method:"PATCH",
                dataType: 'json',
                data:{id_product:id_product, _token: _token, packages:packages, packagePrice:packagePrice, 
                        items:items, itemPrice:itemPrice, subItem:subItem, subPrice:subPrice, total:total,
                        supplier_id:supplier_id, tax:tax, discount:discount, payment:payment, remark:remark },
                success: function(data) {
                            // console.log('success: '+ data);
                            // console.log(data);
                            // // console.log(total);
                            window.location.href = "/purchase";
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



