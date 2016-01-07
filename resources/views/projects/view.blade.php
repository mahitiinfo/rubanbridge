@extends('app')

@section('htmlheader_title')
    {!! trans('ruban.project.title') !!}
@endsection
@section('contentheader_title')
{!! trans('ruban.project.title') !!}
@endsection
@section('main-content')
<div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                @if($project->image<>'' && $project->image<>'0')
                {!! Html::image('uploads/projects/'.$project->image,$project->name,array('class'=>'img-circle','alt'=>$project->name)) !!}
                @else
                {!! Html::image('assets/img/'.str_replace(" ","",strtolower($project->sectorname)).'.png',$project->name,array('class'=>'img-circle','alt'=>$project->name)) !!}      
                @endif
                
                  <h3 class="profile-username text-center">{!! $project->name !!}</h3>
                  <p class="text-muted text-center">{!! $project->regional_district  !!}</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>{!! trans('ruban.project.camps') !!}</b> <a class="pull-right"><b>{!! ($plancampgoals->camps)?$plancampgoals->camps:0 !!}</b>/{!! $project->camps !!}</a>
                    </li>
                    <li class="list-group-item">
                      <b>{!! trans('ruban.project.people') !!}</b> <a class="pull-right"><b>{!! ($plancampgoals->total_villagers)?$plancampgoals->total_villagers:0 !!}</b>/{!! $project->total_villagers !!}</a>
                    </li>
                    <li class="list-group-item">
                      <b>{!! trans('ruban.project.orders') !!}</b> <a class="pull-right"><b>{!! ($plancampgoals->orders)?$plancampgoals->orders:0 !!}</b>/{!! $project->orders !!}</a>
                    </li>
                     <li class="list-group-item">
                      <b>{!! trans('ruban.project.budget') !!}</b> <a class="pull-right"><b>{!! ($plancampgoals->budget)?$plancampgoals->budget:0 !!}</b>/{!! $project->budget !!}</a>
                    </li>
                    <li class="list-group-item">
                      <b>{!! trans('ruban.project.deliver_time') !!}</b> <a class="pull-right"><b>{!! ($plancampgoals->deliver_time)?$plancampgoals->deliver_time:0 !!}</b>/{!! $project->deliver_time !!}</a>
                    </li>
                    <li class="list-group-item">
                      <b>{!! trans('ruban.project.start_date') !!}</b> <a class="pull-right">{!! Carbon\Carbon::parse(@$project->start_date)->format('d-m-Y') !!}</a>
                    </li>
                    <li class="list-group-item">
                      <b>{!! trans('ruban.project.end_date') !!}</b> <a class="pull-right">{!! Carbon\Carbon::parse(@$project->end_date)->format('d-m-Y') !!}</a>
                    </li>
                  </ul>

                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Project Description</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Description</strong>
                  <p class="text-muted">
                    {!! $project->comments !!}
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                  <p class="text-muted">{!! $project->districtname !!}</p>

                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Sector</strong>
                  <p>
                    <span class="label label-danger">{!! $project->sectorname !!}</span>
                  </p>
                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Cards</strong>
                  <p>
                  @if(@$cards)
                  @foreach($cards as $card)
                    <span class="label label-success"><a style="color: #fff;text-decoration: none;" href="{!! route('ruban.cards.show',array($card->id))!!}" ><i class="fa fa-view"></i>{!! $card->name !!}</a></span>
                    @endforeach
                    @endif
                  </p>

                  <hr>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class=""><a data-toggle="tab" href="#timeline" aria-expanded="false">Timeline</a></li>
                  <li class=""><a data-toggle="tab" href="#goal" aria-expanded="false">Goal Completion</a></li>
                   <li class=""><a data-toggle="tab" href="#card" aria-expanded="false">Cards</a></li>
                </ul>
                <div class="tab-content">
                  <div id="timeline" class="tab-pane active">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      @if(@$timelines)
                      @foreach($timelines as $time=>$timeline)
                      <li class="time-label">
                        <span class="bg-green">
                          {!! date('d M, Y',strtotime($time)) !!}
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      @foreach($timeline as $times)
                      <li>
                      
                        <i class="fa fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> {!! date('H:i',strtotime($times['created_at'])) !!} </span>
                          <h3 class="timeline-header">{!! $times['description'] !!}</h3>
                        </div>
                      </li>
                      @endforeach
                      <!-- END timeline item -->
                      @endforeach
                      @endif
                      <!-- timeline item -->
                      
                      <!-- END timeline item -->
                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                    </ul>
                  </div><!-- /.tab-pane -->
                  <div id="goal" class="tab-pane">
                    <div class="row">
                     <div class="col-md-9">
                      <p class="text-center">
                        <strong>Goal Completion</strong>
                      </p>
                      
                      <?php
                      
                      $cper=($project->camps<>0)?($campgoals->camps/$project->camps)*100:0; ?>
                       <div class="progress-group">
                        <span class="progress-text">Total Camps</span>
                        <span class="progress-number"><b>{!! ($campgoals->camps)?$campgoals->camps:0 !!}</b>/{!! $project->camps !!}</span>
                        <div class="progress sm">
                          <div style="width: {!! $cper !!}%" class="progress-bar progress-bar-cyan"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <?php
                      $oper=($project->orders<>0)?($campgoals->orders/$project->orders)*100:0; ?>
                      <div class="progress-group">
                        <span class="progress-text">Total Orders</span>
                        <span class="progress-number"><b>{!! ($campgoals->orders)?$campgoals->orders:0 !!}</b>/{!! $project->orders !!}</span>
                        <div class="progress sm">
                          <div style="width: {!! $oper !!}%" class="progress-bar progress-bar-aqua"></div>
                        </div>
                      </div><!-- /.progress-group -->
                       <?php
                      $oper=($project->total_villagers<>0)?($campgoals->total_villagers/$project->total_villagers)*100:0; ?>
                      <div class="progress-group">
                        <span class="progress-text">Number of Peoples</span>
                        <span class="progress-number"><b>{!! ($campgoals->total_villagers)?$campgoals->total_villagers:0 !!}</b>/{!! $project->total_villagers !!}</span>
                        <div class="progress sm">
                          <div style="width:{!! $oper !!}%" class="progress-bar progress-bar-red"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <?php
                      $oper=($project->budget<>0)?($campgoals->budget/$project->budget)*100:0; ?>
                      <div class="progress-group">
                        <span class="progress-text">Total Budget</span>
                        <span class="progress-number"><b>{!! ($campgoals->budget)?$campgoals->budget:0 !!}</b>/{!! $project->budget !!}</span>
                        <div class="progress sm">
                          <div style="width: {!! $oper !!}%" class="progress-bar progress-bar-green"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <?php
                      $oper=($project->deliver_time<>0)?($campgoals->deliver_time/$project->deliver_time)*100:0; ?>
                      <div class="progress-group">
                        <span class="progress-text"> Average time to Deliver</span>
                        <span class="progress-number"><b>{!! ($campgoals->deliver_time)?$campgoals->deliver_time:0 !!}</b>/{!! $project->deliver_time !!}</span>
                        <div class="progress sm">
                          <div style="width: {!! $oper !!}%" class="progress-bar progress-bar-yellow"></div>
                        </div>
                      </div><!-- /.progress-group -->
                    </div>
                    </div>
                  </div><!-- /.tab-pane -->
                  
                  <!-------cards view------------>
                  <div id="card" class="tab-pane">
                    <div class="row">
          @if($cards)
          @foreach($cards as $card)
          <?php
          $color= array_rand($colors);
          ?>
            <div class="col-md-6">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <a href="{!! route('ruban.cards.show',array($card->id))!!}" >
                <div class="widget-user-header bg-{!! $colors[$color] !!}">
                  <h3 class="widget-user-username"> {!! $card->name !!}</h3>
                  <h5 class="widget-user-desc">{!! $card->regional_district !!}</h5>
                </div>
                <div class="widget-user-image">
                
                 @if($card->image<>'' && $card->image<>0)
                {!! Html::image('uploads/cards/'.$card->image,$card->name,array('class'=>'img-circle','alt'=>$card->name)) !!}
                @else
                {!! Html::image('assets/img/'.str_replace(" ","",strtolower($card->sectorname)).'.png',$card->name,array('class'=>'img-circle','alt'=>$card->name)) !!}      
                @endif
                </div>
                </a>
                <div class="box-footer">
                  <div class="row">
                  
                    <div class="col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{!! $card->camps !!}</h5>
                        <span class="description-text">{!! trans('ruban.card.camps') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{!! $card->total_villagers !!}</h5>
                        <span class="description-text">{!! trans('ruban.card.people') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3">
                      <div class="description-block">
                        <h5 class="description-header">{!! $card->orders !!}</h5>
                        <span class="description-text">{!! trans('ruban.card.order') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3">
                      <div class="description-block">
                        <h5 class="description-header">{!! $card->budget !!}</h5>
                        <span class="description-text">{!! trans('ruban.card.budget') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div>
              </div><!-- /.widget-user -->
            </div><!-- /.col -->
            
            @endforeach
            @endif
            </div>
                    </div>   
                   
                  
                  <!------card view----->
                  
                  
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div>
          
@endsection
