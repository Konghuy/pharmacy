@extends('master')
@section('title', 'Create Medication')
@section('panel-title', 'Create medication')
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
                    </span>  Back to List
                </a>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form id="registerFormValidation" action="/medication" method="POST" novalidate="">
                        {{csrf_field()}}
                        <div class="card-header">
                            <h4 class="card-title ">
                                Add new medication
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
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div>

                            <fieldset>
                                <div class="card-content">
                                        <div class="col-md-4"><label class="control-label">Package</label></div> 
                                        <div class="col-md-4"><label class="control-label">Qty</label></div>
                                        <div class="col-md-4"><label class="control-label">Selling Price</label></div>        
                                <div class="form-group">
                                    <div class="col-md-4">
                                            <select class="selectpicker" data-style="btn btn-defuil btn-block" title="Select Package" data-size="5" name="package"/>
                                                @foreach($packages as $package)
                                                    <option value="{{$package->id}}" > {{$package->name}} </option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <input type="number" class="form-control" placeholder="Qty package" name="qtyPackage">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="number" class="form-control" placeholder="Selling Price" name="pricePackageSelling">
                                            {{-- <span class="input-group-addon">.00</span> --}}
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                    <div class="card-content">
                                            <div class="col-md-4"><label class="control-label">Item in package</label></div> 
                                            <div class="col-md-4"><label class="control-label">Qty</label></div>
                                            <div class="col-md-4"><label class="control-label">Selling Price</label></div>        
                                    <div class="form-group">
                                        <div class="col-md-4">
                                                <select class="selectpicker" data-style="btn btn-defuil btn-block" title="Select item in package" data-size="5" name="itemPackage"/>
                                                @foreach($packages as $package)
                                                    
                                                    <option value="{{$package->id}}" > {{$package->name}} </option>
                                                  
                                                @endforeach
                                                </select>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <input type="number" class="form-control" placeholder="Qty item package" name="qtyItem">
                                            </div>
                                        </div>
                               
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="number" class="form-control" placeholder="Selling Price" name="priceItemSelling">
                                                {{-- <span class="input-group-addon">.00</span> --}}
                                            </div>
                                        </div>
                                        
                                    </div>
                                    </div>
                            </fieldset>

                                <fieldset>
                                        <div class="card-content">
                                                <div class="col-md-4"><label class="control-label">Sub-Item in Box</label></div> 
                                                <div class="col-md-4"><label class="control-label">Qty</label></div>
                                                <div class="col-md-4"><label class="control-label">Selling Price</label></div>       
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                    <select class="selectpicker" data-style="btn btn-defuil btn-block" title="Select Sub-item in box" data-size="5" name="subItem"/>
                                                    @foreach($packages as $package)
                                                        <option value="{{$package->id}}" > {{$package->name}} </option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                            <div class="col-md-4">
                                                <div>
                                                    <input type="number" class="form-control" placeholder="Qty sub-item " name="qtySubItem">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="number" class="form-control" placeholder="Selling Price" name="priceSubItemSelling">
                                                    {{-- <span class="input-group-addon">.00</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                </fieldset>

                                    <fieldset>
                                        <div class="card-content">
                                            <div class="col-md-4"><label class="control-label">Rank number</label></div> 
                                            <div class="col-md-4"><label class="control-label">Weight</label></div>
                                            <div class="col-md-4"><label class="control-label">Discount</label></div>    
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                    <select class="selectpicker" data-style="btn btn-defuil btn-block" title="Ranking Number" data-size="5" name="rank_num"/>
                                                        @foreach($ranking as $rank)
                                                            <option value="{{$rank->id}}" > {{$rank->name}} </option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="col-md-4">
                                                <div>
                                                    <input type="number" class="form-control" placeholder="Weight" name="weight">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="number" id="DS" class="form-control" placeholder="Discount" name="discount">
                                                    {{-- <span class="input-group-addon">.00</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </fieldset>

                                     <fieldset>
                                        <div class="card-content">
                                            <div class="col-md-6"><label class="control-label">Manufacturing date</label></div>
                                            <div class="col-md-6"><label class="control-label">Expired date</label></div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control datepicker" placeholder="Manufacturing date" name="manuDate"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control datepicker" placeholder="Expired Date" name="expireDate"/>
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
                                                    <textarea class="form-control" placeholder="Say something" rows="5" name="remark"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <br/>
                                    
                            <div class="card-footer">
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Create</button>
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



