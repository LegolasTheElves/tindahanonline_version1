<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
            <a class="navbar-brand name-style" href="{{route('product.index')}}">TindahanOnline</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form" role="search">
                        <div class="input-group add-on">
                            <input class="form-control" placeholder="Search" name="search" id="srch-term" type="text">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
                <li>
                    <a href="{{route('product.shoppingCart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
        <span class="label label-danger">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
        </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> User Manager<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(Auth::check())
                        <li><a href="{{route('user.profile')}}">User Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('user.logout')}}">Loguot</a></li>
                        @else
                        <li><a href="{{route('user.signup')}}">User SignUp</a></li>
                        <li><a href="{{route('user.signin')}}">User SignIn</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
