<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
        </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            
            <p class="navbar-brand">@yield('panel-title')</p>
            
        </div>
        <div class="collapse navbar-collapse">

            <!-- <form class="navbar-form navbar-left navbar-search-form" role="search">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" value="" class="form-control" placeholder="Search...">
                </div>
            </form> -->

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#stats" class="dropdown-toggle btn-magnify" data-toggle="dropdown">
                        <i class="ti-shopping-cart"></i>
                            Sale
                        <span class="label label-info">{{saletoday()}}</span>
                    </a>
                </li>

                <li>
                    <a href="#stats" class="dropdown-toggle btn-magnify" data-toggle="dropdown">
                        <i class="ti-truck"></i>
                            Purchase
                        <span class="label label-info">{{purchasetoday()}}</span>
                    </a>
                </li>

                <li>
                    <a href="/stockInfo" class="dropdown-toggle btn-magnify" data-toggle="dropdown">
                        <i class="ti-support"></i>
                            Stock
                        <span class="label label-info">{{stockAlert()}}</span>
                    </a>
                </li>

                <li>
                    <a class="dropdown-toggle btn-magnify" data-toggle="dropdown" href="/expired">
                        <i class="ti-support"></i>
                            Expire
                        <span class="label label-info">{{expiredAlert()}}</span>
                    </a>
                </li>

                <!-- <li class="dropdown">
                    <a href="#notifications" class="dropdown-toggle btn-rotate" data-toggle="dropdown">
                        <i class="ti-bell"></i>
                        <span class="notification">5</span>
                        <p class="hidden-md hidden-lg">
                            Notifications
                            <b class="caret"></b>
                        </p>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#not1">Notification 1</a></li>
                        <li><a href="#not2">Notification 2</a></li>
                        <li><a href="#not3">Notification 3</a></li>
                        <li><a href="#not4">Notification 4</a></li>
                        <li><a href="#another">Another notification</a></li>
                    </ul>
                </li> -->
                <li>
                    <a href="#settings" class="btn-rotate">
                        <i class="ti-settings"></i>
                        <!-- <p class="hidden-md hidden-lg"> -->
                            Settings
                        <!-- </p> -->
                    </a>
                </li>
                <li>
                    <a href="#user" class="btn-magnify">
                        <i class="ti-lock"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>