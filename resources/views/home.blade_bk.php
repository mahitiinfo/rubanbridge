@extends('app')

@section('htmlheader_title')
    Dashboard
@endsection
@section('main-content')
<div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">CPU Traffic</span>
                  <span class="info-box-number">90<small>%</small></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Likes</span>
                  <span class="info-box-number">41,410</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sales</span>
                  <span class="info-box-number">760</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">New Members</span>
                  <span class="info-box-number">2,000</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div>
          
          <!--Widget -->
          <h2 class="page-header">{!! trans('ruban.project.ongoing') !!}</h2>
          <div class="row">
          @if($oprojects)
          @foreach($oprojects as $project)
          <?php
          $color= array_rand($colors);
          ?>
            <div class="col-md-6">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <a href="{!! route('ruban.projects.show',array($project->id))!!}" >
                <div class="widget-user-header bg-{!! $colors[$color] !!}">
                  <h3 class="widget-user-username"> {!! $project->name !!}</h3>
                  <h5 class="widget-user-desc">{!! $project->regional_district !!}</h5>
                </div>
                <div class="widget-user-image">
                 @if($project->image<>'' && $project->image<>0)
                {!! Html::image('uploads/projects/'.$project->image,$card->name,array('class'=>'img-circle','alt'=>$card->name)) !!}
                @else
                {!! Html::image('assets/img/'.str_replace(" ","",strtolower($project->sectorname)).'.png',$project->name,array('class'=>'img-circle','alt'=>$project->name)) !!}      
                @endif
                </div>
                </a>
                <div class="box-footer">
                  <div class="row">
                  
                    <div class="col-xs-6 col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{!! $project->camps !!}</h5>
                        <span class="description-text">{!! trans('ruban.project.camps') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-xs-6 col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{!! $project->total_villagers !!}</h5>
                        <span class="description-text">{!! trans('ruban.project.people') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-xs-6 col-sm-3">
                      <div class="description-block">
                        <h5 class="description-header">{!! $project->orders !!}</h5>
                        <span class="description-text">{!! trans('ruban.project.order') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-xs-6 col-sm-3">
                      <div class="description-block">
                        <h5 class="description-header">{!! $project->budget !!}</h5>
                        <span class="description-text">{!! trans('ruban.project.budget') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.widget-user -->
            </div><!-- /.col -->
            
            @endforeach
            @endif
            </div>
            
            <h2 class="page-header">{!! trans('ruban.project.completed') !!}</h2>
            
           <div class="row">
          @if($cprojects)
          @foreach($cprojects as $project)
          <?php
          $color1= array_rand($colors);
          ?>
            <div class="col-md-6">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <a href="{!! route('ruban.projects.show',array($project->id))!!}" >
                <div class="widget-user-header bg-{!! $colors[$color1] !!}">
                  <h3 class="widget-user-username">{!! $project->name !!}</h3>
                  <h5 class="widget-user-desc">{!! $project->regional_district !!}</h5>
                </div>
                <div class="widget-user-image">
                                  @if($project->image<>'' && $project->image<>0)
                {!! Html::image('uploads/projects/'.$project->image,$card->name,array('class'=>'img-circle','alt'=>$card->name)) !!}
                @else
                {!! Html::image('assets/img/'.str_replace(" ","",strtolower($project->sectorname)).'.png',$project->name,array('class'=>'img-circle','alt'=>$project->name)) !!}      
                @endif
                </div>
                </a>
                <div class="box-footer">
                  <div class="row">
                  
                    <div class="col-xs-6 col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{!! $project->camps !!}</h5>
                        <span class="description-text">{!! trans('ruban.project.camps') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-xs-6 col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{!! $project->total_villagers !!}</h5>
                        <span class="description-text">{!! trans('ruban.project.people') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-xs-6 col-sm-3">
                      <div class="description-block">
                        <h5 class="description-header">{!! $project->orders !!}</h5>
                        <span class="description-text">{!! trans('ruban.project.order') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-xs-6 col-sm-3">
                      <div class="description-block">
                        <h5 class="description-header">{!! $project->budget !!}</h5>
                        <span class="description-text">{!! trans('ruban.project.budget') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.widget-user -->
            </div><!-- /.col -->
            
            @endforeach
            @endif
            </div>
          
@endsection
