@extends('master')
@section('title', 'Dashboard')
@section('panel-title', 'Dashboard')
@section('dashboard', 'active')

@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-warning text-center">
                                        <i class="ti-shopping-cart-full"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Sales today</p>
                                        50$
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-angle-double-right"></i> Show Detail
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-success text-center">
                                        <i class="ti-money"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Expend</p>
                                        $75
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-angle-double-right"></i> Show Detail
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="ti-support"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Medication</p>
                                        23
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-angle-double-right"></i> Show Detail
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-info text-center">
                                        <i class="ti-user"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Staff</p>
                                        2
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-angle-double-right"></i> Show detail
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
