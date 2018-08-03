<title>Pharmacy | Login</title>
@include('layouts.header')
{{-- @section('title', 'Login') --}}

    <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="../dashboard/overview.html">Pharmacy Management System</a>
            </div>
    </nav>

    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" data-color="blue" data-image="../../assets/img/background/background-2.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="#" action="#">
                                <div class="card" data-background="color" data-color="blue">
                                    <div class="card-header">
                                        <h3 class="card-title">Login</h3>
                                    </div>
                                    <div class="card-content">
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" placeholder="Enter email" class="form-control input-no-border">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" placeholder="Password" class="form-control input-no-border">
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button type="submit" class="btn btn-fill btn-wd ">Let's go</button>
                                        <div class="forgot">
                                            <a href="#pablo">Forgot your password?</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer footer-transparent">
                <div class="container">
                    <div class="copyright">
                        &copy; <script>document.write(new Date().getFullYear())</script>,All rights reserved</a>
                    </div>
                </div>
            </footer>

    @include('layouts.footerlink')

	<script type="text/javascript">
        $().ready(function(){
            demo.checkFullPageBackgroundImage();

            setTimeout(function(){
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
	</script>
