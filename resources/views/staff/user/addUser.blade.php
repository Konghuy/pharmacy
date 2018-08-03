@extends('master')
@section('title', 'User')
@section('panel-title', 'Add user')
@section('u', 'active')
@section('li-staff', 'active')
@section('staff', 'true')

@section('content')

<div class="content">
    <div class="container-fluid">
            <a href="#" class="btn btn-wd btn-default btn-fill btn-move-left pull-right">
                    <span class="btn-label">
                        <i class="ti-angle-left"></i>
                    </span>  Back to List
                </a>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form id="registerFormValidation" action="" method="" novalidate="">
                        <div class="card-header">
                            <h4 class="card-title ">
                                Add User
                            </h4>
                        </div>

                        <div class="card-content">
                            <div class="form-group">
                                <label class="control-label">
                                    First Name <star>*</star>
                                </label>
                                <input class="form-control "
                                       name="firstName"
                                       type="text"
                                       required="true"
                                       autocomplete="off"
                                       placeholder="First Name"
                                />
                            </div>
                        </div>

                            <div class="card-content">
                                <div class="form-group">
                                    <label class="control-label">
                                        Last Name <star>*</star>
                                    </label>
                                    <input class="form-control"
                                           name="lst"
                                           type="text"
                                           required="true"
                                           autocomplete="off"
                                           placeholder="Last Name"
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
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password <star>*</star></label>
                                <input class="form-control"
                                       name="password"
                                       id="registerPassword"
                                       type="password"
                                       required="true"
                                       placeholder="Password"
                                />
                            </div>
                            <div class="form-group">
                                <label class="control-label">Confirm Password <star>*</star></label>
                                <input class="form-control"
                                       name="password_confirmation"
                                       id="registerPasswordConfirmation"
                                       type="password"
                                       required="true"
                                       equalTo="#registerPassword"
                                       placeholder="Confirm Password"
                                />
                            </div>
                            <div class="category"><star>*</star> Required fields</div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info btn-fill pull-right">Register</button>
                            <div class="form-group pull-left">
                                <label class="checkbox">
                                    <input type="checkbox" data-toggle="checkbox" value="subscribe">
                                    Subscribe to newsletter
                                </label>
                            </div>
                            <div class="clearfix"></div>
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
            $('#loginFormValidation').validate();
            $('#allInputsFormValidation').validate();
        });
    </script>
@endsection



