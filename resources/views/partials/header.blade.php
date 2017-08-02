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
            <a class="navbar-brand name-style" href="{{route('product.index')}}"><span class="glyphicon glyphicon-home"></span> ShopTa</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form" method="GET" action="{{ route('search') }}" role="search">
                        <div class="input-group add-on">
                            <input type="text" name="titlesearch" class="form-control" placeholder="Search Product Name" value="{{ old('titlesearch') }}">
                            <div class="input-group-btn">
                               <button class="btn btn-success">Search</button>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  {{ Auth::check() ? Auth::user()->username : 'UserAccount' }}<span class="caret"></span></a>
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
