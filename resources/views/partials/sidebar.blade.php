<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
            @if(Auth::user()->image<>'')
                {!! Html::image('uploads/users/'.Auth::user()->image,Auth::user()->first_name,array('class'=>'img-circle')) !!}
                @else
                {!! Html::image('assets/img/user2-160x160.jpg',Auth::user()->first_name,array('class'=>'img-circle')) !!}
                  @endif
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->first_name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{!! trans('ruban.home') !!}</span></a></li>
            @if(Auth::getUser()->group_id<>3)
            <li><a href="{!! route('ruban.projects.index') !!}"><i class='fa fa-link'></i> <span>{!! trans('ruban.project.stitle') !!}</span></a></li>
            <li><a href="{!! route('ruban.cards.index') !!}"><i class='fa fa-link'></i> <span>{!! trans('ruban.card.stitle') !!}</span></a></li>
            @endif
            @if(Auth::getUser()->group_id==3)
            <li><a href="{!! route('ruban.tasks.index') !!}"><i class='fa fa-link'></i> <span>{!! trans('ruban.task.stitle') !!}</span></a></li>
            @endif
            @if(Auth::getUser()->group_id==1)
            <li><a href="{!! route('ruban.groups.index') !!}"><i class='fa fa-link'></i> <span>{!! trans('ruban.group.stitle') !!}</span></a></li>
            <li><a href="{!! route('ruban.users.index') !!}"><i class='fa fa-link'></i> <span>{!! trans('ruban.user.stitle') !!}</span></a></li>
            <li><a href="{!! route('ruban.districts.index') !!}"><i class='fa fa-link'></i> <span>{!! trans('ruban.district.stitle') !!}</span></a></li>
            <li><a href="{!! route('ruban.permissions.index') !!}"><i class='fa fa-link'></i> <span>{!! trans('ruban.permission.stitle') !!}</span></a></li>
            @endif
            @if(Auth::getUser()->group_id<>3)
            <li><a href="{!! route('ruban.payouts.index') !!}"><i class='fa fa-link'></i> <span>{!! trans('ruban.payout.stitle') !!}</span></a></li>
             <li><a href="{!! route('ruban.disputes.index') !!}"><i class='fa fa-link'></i> <span>{!! trans('ruban.dispute.stitle') !!}</span></a></li>
              @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
