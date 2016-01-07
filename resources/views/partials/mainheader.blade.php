<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
    {!! Html::image('assets/images/logoinner.jpg','Ruban Bridge') !!}
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>R</b>B</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Ruban</b> Bridge</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <p class="head-text">Welcome {!! Auth::getGroup() !!}</a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
               
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        @if(Auth::user()->image<>'')
                {!! Html::image('uploads/users/'.Auth::user()->image,Auth::user()->first_name,array('class'=>'user-image')) !!}
                @else
                {!! Html::image('assets/img/user2-160x160.jpg',Auth::user()->first_name,array('class'=>'user-image')) !!}
                  @endif
                  
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs user-namee">{{ Auth::user()->first_name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                        @if(Auth::user()->image<>'')
                {!! Html::image('uploads/users/'.Auth::user()->image,Auth::user()->first_name,array('class'=>'img-circle')) !!}
                @else
                {!! Html::image('assets/img/user2-160x160.jpg',Auth::user()->first_name,array('class'=>'img-circle')) !!}
                  @endif
                  
                            <p>
                                {{ Auth::user()->first_name }}
                                <small>Member since Nov. 2015</small>
                            </p>
                        </li>
                        <!-- Menu Body
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('ruban.users.profile',array(Auth::user()->id)) }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button 
                -->
            </ul>
        </div>
    </nav>
</header>
