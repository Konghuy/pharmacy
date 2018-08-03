@extends('master')
@section('title', 'Edit Supplier')
@section('panel-title', 'Edit supplier')
@section('s', 'active')
@section('li-staff', 'active')
@section('staff', 'true')

@section('content')
{{csrf_field()}}
<div class="content">
    <div class="container-fluid">
            <a href="/supplier" class="btn btn-wd btn-default btn-fill btn-move-left pull-right">
                    <span class="btn-label">
                        <i class="ti-angle-left"></i>
                    </span>  Back
                </a>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <form id="registerFormValidation"  action="/supplier/{{$supplier->id}}" method="PUT" novalidate="">
                        {{csrf_field()}}
                        <div class="card-header">
                            <h4 class="card-title ">
                                Edit Supplier
                            </h4>
                        </div>

                        <div class="card-content">
                            <div class="form-group">
                                <label class="control-label">
                                    Name <star>*</star>
                                </label>
                                <input class="form-control "
                                       name="name"
                                       type="text"
                                       required="true"
                                       autocomplete="off"
                                       placeholder="Name"
                                       value="{{$supplier->name}}"
                                />
                            </div>
                        </div>

                            <div class="card-content">
                                <div class="form-group">
                                    <label class="control-label">
                                        Address <star>*</star>
                                    </label>
                                    <input class="form-control"
                                           name="address"
                                           type="text"
                                           required="true"
                                           autocomplete="off"
                                           placeholder="Address"
                                           value="{{$supplier->address}}"
                                        />
                                </div>
                        </div>

                        <div class="card-content">
                                <div class="form-group">
                                    <label class="control-label">
                                        Contact <star>*</star>
                                    </label>
                                    <input class="form-control"
                                           name="contact"
                                           type="text"
                                           required="true"
                                           autocomplete="off"
                                           placeholder="Contact"
                                           value="{{$supplier->contact}}"
                                        />
                                </div>
                        </div>

                        <div class="card-content">
                                <div class="form-group">
                                    <label class="control-label">
                                        Phone <star>*</star>
                                    </label>
                                    <input class="form-control"
                                           name="phone"
                                           type="number"
                                           required="true"
                                           autocomplete="off"
                                           placeholder="Phone"
                                           value="{{$supplier->phone}}"
                                        />
                                </div>
                        </div>

                        <div class="card-content">
                            <div class="form-group">
                                <label class="control-label">
                                    Email Address <star>*</star>
                                </label>
                                <input class="form-control"
                                       name="email"
                                       type="text"
                                       required="true"
                                       email="true"
                                       autocomplete="off"
                                       placeholder="Email"
                                       value="{{$supplier->email}}"
                                />
                            </div>

                            <div class="card-footer">
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
                            </div>
                            <div class="clearfix"></div>
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
            $('#loginFormValidation').validate();
            $('#allInputsFormValidation').validate();
        });
    </script>
@endsection



