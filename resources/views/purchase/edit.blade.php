@extends('master')
@section('title', 'Edit Medicine')
@section('panel-title', 'Edit Medicine')
@section('mi', 'active')
@section('li-medication', 'active')
@section('medication', 'true')

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
                <form id="registerFormValidation"  action="/medication/{{$medication->id}}" method="POST" novalidate="">
                    {{csrf_field()}}
                    {{method_field('put')}}
                        <div class="card-header">
                            <h4 class="card-title ">
                                Edit Medicine
                            </h4>
                        </div>

                        <div class="card-content">
                                <div class="form-group">
                                    <label class="control-label">
                                        Code <star>*</star>
                                    </label>
                                    <input class="form-control "
                                           name="code"
                                           type="text"
                                           required="true"
                                           autocomplete="off"
                                           placeholder="Code Medicine"
                                            value="{{$medication->pro_code}}";
                                    />
                                </div>
                            </div>
    
                                <div class="card-content">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Name <star>*</star>
                                        </label>
                                        <input class="form-control"
                                               name="name"
                                               type="text"
                                               required="true"
                                               autocomplete="off"
                                               placeholder="Name"
                                                value="{{$medication->pro_name}}"
                                            />
                                    </div>
                                </div>
    
                                <div class="card-content">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Category <star>*</star>
                                        </label>
                                        <select class="selectpicker" data-style="btn btn-defuil btn-block" title="Select Category" data-size="5" name="category" required="true">
                                            @foreach($categorys as $category)
                                                @if(($medication->cat_id)===($category->id))
                                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                                @else
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif
                                            @endforeach
                                         </select>
                                    </div>
                                </div>
    
                                <fieldset>
                                    <div class="card-content">
                                        <div class="col-md-4"><label class="control-label">Package</label> </div>
                                        <div class="col-md-4"><label class="control-label">Qty</label> </div>
                                        <div class="col-md-4"><label class="control-label">Selling Price</label> </div>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                                <select class="selectpicker" data-style="btn btn-defuil btn-block" title="Select Package" data-size="5" name="package"/>
                                                    @foreach($packages as $package)
                                                            @if(($medication->package_id)===($package->id))
                                                                <option value="{{$package->id}}" selected> {{$package->name}} </option>
                                                            @else
                                                                <option value="{{$package->id}}" > {{$package->name}} </option>
                                                            @endif
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <input type="number" class="form-control" placeholder="Qty package" name="qtyPackage" value="{{$medication->items_in_pack}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                    <input type="number" class="form-control" placeholder="Selling Price" name="pricePackageSelling" value="{{$medication->item_unit_cost}}">
                                                <span class="input-group-addon">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </fieldset>
    
                                <fieldset>
                                        <div class="card-content">
                                             {{-- <label class="control-label">Item in Package, Qty, Selling Prices</label>  --}}
                                             <div class="col-md-4"><label class="control-label">Item in Package</label> </div>
                                             <div class="col-md-4"><label class="control-label">Qty</label> </div>
                                             <div class="col-md-4"><label class="control-label">Selling Price</label> </div>
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                    <select class="selectpicker" data-style="btn btn-defuil btn-block" title="Select item in package" data-size="5" name="itemPackage"/>
                                                    @foreach($packages as $package)
                                                            @if(($medication->items_in_pack_package_id)===($package->id))
                                                                <option value="{{$package->id}}" selected> {{$package->name}} </option>
                                                            @else
                                                                <option value="{{$package->id}}" > {{$package->name}} </option>
                                                             @endif
                                                    @endforeach
                                                    </select>
                                            </div>
                                            <div class="col-md-4">
                                                <div>
                                                    <input type="number" class="form-control" placeholder="Qty item package" name="qtyItem" value="{{$medication->sub_items_in_item}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                     <input type="number" class="form-control" placeholder="Selling Price" name="priceItemSelling" value="{{$medication->sub_item_unit_cost}}">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        </div>
                                </fieldset>
    
                                    <fieldset>
                                            <div class="card-content">
                                                    <div class="col-md-4"><label class="control-label">Sub-item in box</label> </div>
                                                    <div class="col-md-4"><label class="control-label">Qty</label> </div>
                                                    <div class="col-md-4"><label class="control-label">Selling Price</label> </div>      
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                        <select class="selectpicker" data-style="btn btn-defuil btn-block" title="Select Sub-item in box" data-size="5" name="subItem"/>
                                                        @foreach($packages as $package)
                                                                @if(($medication->sub_items_in_item_package_id)===($package->id))
                                                                    <option value="{{$package->id}}" selected> {{$package->name}} </option>
                                                                @else
                                                                    <option value="{{$package->id}}" > {{$package->name}} </option>
                                                                @endif
                                                        @endforeach
                                                        </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <input type="number" class="form-control" placeholder="Qty sub-item " name="qtySubItem" value="{{$medication->qty}}">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">$</span>
                                                        <input type="number" class="form-control" placeholder="Selling Price" name="priceSubItemSelling" value="{{$medication->price}}">
                                                        <span class="input-group-addon">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                    </fieldset>
    
                                        <fieldset>
                                            <div class="card-content">
                                                    <div class="col-md-4"><label class="control-label">Rank number</label> </div>
                                                    <div class="col-md-4"><label class="control-label">Weight</label> </div>
                                                    <div class="col-md-4"><label class="control-label">Discount</label> </div>     
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                        <select class="selectpicker" data-style="btn btn-defuil btn-block" title="Ranking Number" data-size="5" name="rank_num"/>
                                                            @foreach($ranking as $rank)
                                                                @if(($medication->rank_number_id)===($rank->id))
                                                                    <option value="{{$rank->id}}" selected > {{$rank->name}} </option>
                                                                @else
                                                                    <option value="{{$rank->id}}" > {{$rank->name}} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <input type="number" class="form-control" placeholder="Weight" name="weight" value="{{$medication->weight}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">$</span>
                                                        <input type="number" id="DS" class="form-control" placeholder="Discount" name="discount" value="{{$medication->discount}}">
                                                        <span class="input-group-addon">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </fieldset>
    
                                         <fieldset>
                                            <div class="card-content">
                                                 <div class="col-md-6"><label class="control-label">Manufacturing date</label> </div>
                                                 <div class="col-md-6"><label class="control-label">Expired Date</label> </div>     
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control datepicker" placeholder="Manufacturing date" name="manuDate" value="{{Carbon\Carbon::parse($medication->manufacturing_date)->format('d/m/Y')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control datepicker" placeholder="Expired Date" name="expireDate" value="{{Carbon\Carbon::parse($medication->expiry_date)->format('d/m/Y')}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </fieldset> 
                                    
                                        <fieldset>
                                            <div class="form-group">
                                                <div class="card-content">
                                                    <label class="control-label">Remark</label>
                                                    <div class="col-sm-12">
                                                        <textarea class="form-control" placeholder="Say something" rows="5" name="remark">{{$medication->remark}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <br/>
                                        

                            <div class="card-footer">
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
                            </div>
                            <div class="clearfix"></div>
                            <br>
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
@endsection



