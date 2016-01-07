@extends('app')

@section('htmlheader_title')
     {!! trans('ruban.edit').' '.trans('ruban.user.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.update') !!} Profile
@endsection

@section('main-content')

<div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
               <!--   <img alt="User profile picture" src="{ { $user->image } }" class="profile-user-img img-responsive img-circle">-->
                  <div class="widget-user-image">
                                  {!! Html::image('uploads/users/'.$user->image,$user->name,array('class'=>'profile-user-img img-responsive img-circle','alt'=>$user->image)) !!}
                </div>
                  <h3 class="profile-username text-center">{!! $user->first_name.' '.$user->last_name !!}</h3>
                  <p class="text-muted text-center"> {!! $user->company_name!!}</p>

                  <ul class="list-group list-group-unbordered">
                  @foreach($districtsselected as $key=>$districts)
                    <li class="list-group-item">
                    <b>District </b> <a class="pull-right"> {!! $key !!}</a>
                    </li>
                   <?php $cnt=1; ?> @foreach($districts as $district)
                    <li class="list-group-item">
                    @if($cnt==1)
                   <b>Sector</b>
                   @else
                   <b>&nbsp;</b>
                   @endif
                    <a class="pull-right"> {!! $district  !!}</a>
                    </li>
                  <?php  $cnt ++; ?>
                    @endforeach
                    @endforeach
                  </ul>

                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Me</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Company</strong>
                  <p class="text-muted">
                  {!! $user->company_name!!}
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
                  <p class="text-muted">{!! $user->address!!}</p>

                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Pancard</strong>
                  <p>
                    <p class="text-muted">{!! $user->pancard!!}</p>
                  </p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                 
                  <li class="active"><a data-toggle="tab" href="#settings" aria-expanded="false">My Profile</a></li>
                </ul>
               
                  <div id="settings" class="tab-pane active">
                    {!! Form::open(['route' => ['ruban.users.profile',$user->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}
                    
                    <div class="form-group">
                      {!! Form::label('first_name', trans('ruban.user.first_name'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('first_name',@$user->first_name,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('last_name', trans('ruban.user.last_name'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                          {!! Form::text('last_name',@$user->last_name,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    
                        <div class="form-group">
                      {!! Form::label('company_name', trans('ruban.user.company_name'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('company_name',@$user->company_name,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label('address', trans('ruban.user.address'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                         {!! Form::textarea('address',@$user->address,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label('pancard', trans('ruban.user.pancard'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                       {!! Form::text('pancard',@$user->pancard,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                     <div class="form-group">
                   {!! Form::label('image', trans('ruban.user.image'),array('class'=>'col-md-2 control-label')) !!}
                     <div class="col-md-10">
                     {!! Form::file('image') !!}
                    </div>
                    
                </div>
                    
                    
                    
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button class="btn btn-danger" type="submit">Update</button>
                        </div>
                      </div>
                   {!! Form::close() !!}
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div>
@endsection
