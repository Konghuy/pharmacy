<div class="logo">
    <a href="#" class="simple-text logo-mini">
        P
    </a>

    <a href="#" class="simple-text logo-normal">
        Pharmacy
    </a>
</div>
<div class="sidebar-wrapper">
    <div class="user">
        <div class="info">
            <div class="photo">
                <img src="../../assets/img/faces/face-2.png" />
            </div>

            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                <span>
                    <p>Seakheng | Admin </p> {{-- User Name | role  --}}
                    <b class="caret"></b>
                </span>
            </a>
            <div class="clearfix"></div>

            <div class="collapse" id="collapseExample">
                <ul class="nav">
                    <li>
                        <a href="#profile">
                            <span class="sidebar-mini">PP</span>  {{-- ti-id-badge --}}
                            <span class="sidebar-normal">Personal Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="#edit">
                            <span class="sidebar-mini ">EP</span>     {{-- ti-write --}}
                            <span class="sidebar-normal">Edit Profile</span>
                        </a>
                    </li>
                    {{-- <li>
                            <a href="#edit">
                                <span class="sidebar-mini ">LO</span>   
                                <span class="sidebar-normal">Logout</span>
                            </a>
                        </li> --}}
                </ul>
            </div>
        </div>
    </div>
    <ul class="nav">
        <li class=@yield('dashboard')>
            <a>
                <i class="ti-panel"></i>
                <p>Dashboard</p>
            </a>
        </li>

        <li class=@yield('pos')>
            <a>
                <i class="ti-shopping-cart"></i>
                <p>POS</p>
            </a>
        </li>

        <li class=@yield('li-medication')>
            <a data-toggle="collapse" href="#medication" aria-expanded=@yield('medication')>
                <i class="ti-support"></i>
                <p>Medication
                   <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="medication" >
                <ul class="nav">
                    <li class=@yield('mi')>
                        <a href="../components/buttons.html">
                            <span class="sidebar-mini">MI</span>
                            <span class="sidebar-normal">Medicine info</span>
                        </a>
                    </li>
                    <li class=@yield('am')>
                        <a href="../components/grid.html">
                            <span class="sidebar-mini">AM</span>
                            <span class="sidebar-normal">Add Midecine</span>
                        </a>
                    </li>
                    <li class=@yield('mc')>
                        <a href="../components/panels.html">
                            <span class="sidebar-mini">MC</span>
                            <span class="sidebar-normal">Medicine Category</span>
                        </a>
                    </li>
                    <li class=@yield('ac')>
                        <a href="../components/sweet-alert.html">
                            <span class="sidebar-mini">AC</span>
                            <span class="sidebar-normal">Add Category</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class=@yield('allSales')>
            <a>
                <i class="ti-money"></i>
                <p>All Sales</p>
            </a>
        </li>

        <li class=@yield('li-import')>
            <a data-toggle="collapse" href="#export" aria-expanded=@yield('import')>
                <i class="ti-truck"></i>
                <p>Import
                   <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="export">
                <ul class="nav">
                    <li class=@yield('pc')>
                        <a href="../components/buttons.html">
                            <span class="sidebar-mini">PC</span>
                            <span class="sidebar-normal">Purchase</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class=@yield('stockAlert')>
            <a>
                <i class="ti-support"></i>
                <p>Stock Alert</p>
            </a>
        </li>

        <li class=@yield('expireAlert')>
            <a>
                <i class="ti-support"></i>
                <p>Expire Alert</p>
            </a>
        </li>

        <li class=@yield('li-report')>
            <a data-toggle="collapse" href="#report" aria-expanded=@yield('report')>
                <i class="ti-agenda"></i>
                <p>
                    Reports
                   <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="report">
                <ul class="nav">
                    <li class=@yield('i')>
                        <a href="../forms/regular.html">
                            <span class="sidebar-mini">I</span>
                            <span class="sidebar-normal">Invoice</span>
                        </a>
                    </li>
                    <li class=@yield('pr')>
                        <a href="../forms/extended.html">
                            <span class="sidebar-mini">PR</span>
                            <span class="sidebar-normal">Purchase Report</span>
                        </a>
                    </li>
                    <li class=@yield('op')>
                        <a href="../forms/validation.html">
                            <span class="sidebar-mini">OP</span>
                            <span class="sidebar-normal">Order Report</span>
                        </a>
                </ul>
            </div>
    
            <li class=@yield('li-staff')>
                <a data-toggle="collapse" href="#staff" aria-expanded=@yield('staff')>
                    <i class="ti-user"></i>
                    <p>
                        Staff
                       <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="staff">
                    <ul class="nav">
                        <li class=@yield('u')>
                            <a href="../forms/regular.html">
                                <span class="sidebar-mini">U</span>
                                <span class="sidebar-normal">User</span>
                            </a>
                        </li>
                        <li class=@yield('r')>
                            <a href="/role">
                                <span class="sidebar-mini">R</span>
                                <span class="sidebar-normal">Roles</span>
                            </a>
                        </li>
                        <li class=@yield('s')>
                            <a href="/supplier">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Suplier</span>
                            </a>
                        </li>
                        <li class=@yield('sp')>
                            <a href="../forms/validation.html">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Set Permission</span>
                            </a>
                        </li>
                    </ul>
                </div>
        </li>
    </ul>
</div>
</div>