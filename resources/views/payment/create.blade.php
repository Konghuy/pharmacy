@extends('master')
@section('title', 'Create Category')
@section('panel-title', 'Create Category')
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
                    </span>  Back to List
                </a>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form id="registerFormValidation" action="/payment" method="POST" novalidate="">
                        {{csrf_field()}}
                        <div class="card-header">
                            <h4 class="card-title ">
                                Create Payment
                            </h4>
                        </div>

                        <div class="card-content">
                            <div class="form-group">
                                <label class="control-label">
                                    Name <star>*</star>
                                </label>
                                <input class="form-control "
                                       name="title"
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
                                        Description <star>*</star>
                                    </label>
                                    <input class="form-control"
                                           name="description"
                                           type="text"
                                           required="true"
                                           autocomplete="off"
                                           placeholder="Description"
                                        />
                                </div>
                                
                        </div>

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
            $('#loginFormValidation').validate();
            $('#allInputsFormValidation').validate();
        });
    </script>
@endsection



