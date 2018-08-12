@extends('master')
@section('title', 'Edit Package')
@section('panel-title', 'Edit Package')
@section('pm', 'active')
@section('li-medication', 'active')
@section('medication', 'true')

@section('content')
{{csrf_field()}}
<div class="content">
    <div class="container-fluid">
            <a href="/payment" class="btn btn-wd btn-default btn-fill btn-move-left pull-right">
                    <span class="btn-label">
                        <i class="ti-angle-left"></i>
                    </span>  Back
                </a>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <form id="registerFormValidation"  action="/payment/{{$payment->id}}" method="POST" novalidate="">
                    {{csrf_field()}}
                    {{method_field('put')}}
                        <div class="card-header">
                            <h4 class="card-title ">
                                Edit Payment
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
                                       value="{{$payment->name}}"
                                />
                            </div>
                        </div>

                            <div class="card-content">
                                <div class="form-group">
                                    <label class="control-label">
                                        Description <star>*</star>
                                    </label>
                                    <input class="form-control"
                                           name="description"
                                           type="text"
                                           required="true"
                                           autocomplete="off"
                                           placeholder="Address"
                                           value="{{$payment->description}}"
                                        />
                                </div>
                        </div>


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
            $('#loginFormValidation').validate();
            $('#allInputsFormValidation').validate();
        });
    </script>
@endsection



