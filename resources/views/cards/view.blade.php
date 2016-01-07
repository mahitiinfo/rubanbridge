@extends('app')

@section('htmlheader_title')
    {!! trans('ruban.card.title') !!}
@endsection
@section('contentheader_title')
{!! trans('ruban.card.title') !!}
@endsection
@section('main-content')
<div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                 @if($card->image<>'' && $card->image<>'0')
                {!! Html::image('uploads/cards/'.$card->image,$card->name,array('class'=>'img-circle','alt'=>$card->name)) !!}
                @else
                {!! Html::image('assets/img/'.str_replace(" ","",strtolower($card->sectorname)).'.png',$card->name,array('class'=>'img-circle','alt'=>$card->name)) !!}      
                @endif
                
                  <h3 class="profile-username text-center">{!! $card->name !!}</h3>
                  <p class="text-muted text-center">{!! $card->regional_district  !!}</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>{!! trans('ruban.card.camps') !!}</b> <a class="pull-right"><b>{!! $plannedcampgoals->camps !!}</b>/{!! $card->camps !!}</a>
                    </li>
                    <li class="list-group-item">
                      <b>{!! trans('ruban.card.people') !!}</b> <a class="pull-right"><b>{!! ($plannedcampgoals->total_villagers)?$plannedcampgoals->total_villagers :0 !!}</b>/{!! $card->total_villagers !!}</a>
                    </li>
                    <li class="list-group-item">
                      <b>{!! trans('ruban.card.orders') !!}</b> <a class="pull-right"><b>{!! ($plannedcampgoals->orders)?$plannedcampgoals->orders:0 !!}</b>/{!! $card->orders !!}</a>
                    </li>
                     <li class="list-group-item">
                      <b>{!! trans('ruban.card.budget') !!}</b> <a class="pull-right"><b>{!! ($plannedcampgoals->budget)?$plannedcampgoals->budget:0 !!}</b>/{!! $card->budget !!}</a>
                    </li>
                    <li class="list-group-item">
                      <b>{!! trans('ruban.card.deliver_time') !!}</b> <a class="pull-right"><b>{!! ($plannedcampgoals->deliver_time)?$plannedcampgoals->deliver_time:0 !!}</b>/{!! $card->deliver_time !!}</a>
                    </li>
                    <li class="list-group-item">
                      <b>{!! trans('ruban.card.start_date') !!}</b> <a class="pull-right">{!! Carbon\Carbon::parse(@$card->start_date)->format('d-m-Y') !!}</a>
                    </li>
                    <li class="list-group-item">
                      <b>{!! trans('ruban.card.end_date') !!}</b> <a class="pull-right">{!! Carbon\Carbon::parse(@$card->end_date)->format('d-m-Y') !!}</a>
                    </li>
                  </ul>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
                  
              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Card Details</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Description</strong>
                  <p class="text-muted">
                   {!! $card->comments !!}
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                  <p class="text-muted">{!! $card->districtname !!}</p>

                  <hr>
                  <strong><i class="fa fa-pencil margin-r-5"></i> Sector</strong>
                  <p>
                    <span class="label label-danger">{!! $card->sectorname !!}</span>
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
                  @if(Auth::user()->group_id==4 && empty($selectedpartner))
                  <li class=""><a data-toggle="tab" href="#partner" aria-expanded="false">Available VLE's</a></li>
                  @endif
                   @if((Auth::user()->group_id==3 || (Auth::user()->group_id==4 && !empty($selectedpartner))) && $project['camps']<>0)
                   <li class=""><a data-toggle="tab" href="#camps" aria-expanded="false">Camps</a></li>
                  @endif
                  @if((Auth::user()->group_id==3 || (Auth::user()->group_id==4 && !empty($selectedpartner))) && $project['camps']==0)
                   <li class=""><a data-toggle="tab" href="#tasks" aria-expanded="false">Tasks</a></li>
                  @endif
                </ul>
                <div class="tab-content">
                  <div id="timeline" class="tab-pane active">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      @if(@$cardtimelines)
                      @foreach($cardtimelines as $ctime=>$ctimeline)
                      <li class="time-label">
                        <span class="bg-green">
                          {!! date('d M, Y',strtotime($ctime)) !!}
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      @foreach($ctimeline as $ctimes)
                      <li>
                      
                        <i class="fa fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> {!! date('H:i',strtotime($ctimes['created_at'])) !!} </span>
                          <h3 class="timeline-header">{!! $ctimes['description'] !!}</h3>
                        </div>
                      </li>
                      @endforeach
                      <!-- END timeline item -->
                      @endforeach
                      @endif
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
                      $cgoal=($campgoals->camps)?$campgoals->camps:0;
                      $cper=($card->camps<>0)?($cgoal/$card->camps)*100:0; ?>
                       <div class="progress-group">
                        <span class="progress-text">Total Camps</span>
                        <span class="progress-number"><b>{!! $cgoal !!}</b>/{!! $card->camps !!}</span>
                        <div class="progress sm">
                          <div style="width: {!! $cper !!}%" class="progress-bar progress-bar-cyan"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <?php
                      $corder=($campgoals->orders)?$campgoals->orders:0;
                      $oper=($card->orders<>0)?($corder/$card->orders)*100:0; ?>
                      <div class="progress-group">
                        <span class="progress-text">Total Orders</span>
                        <span class="progress-number"><b>{!! $corder !!}</b>/{!! $card->orders !!}</span>
                        <div class="progress sm">
                          <div style="width: {!! $oper !!}%" class="progress-bar progress-bar-aqua"></div>
                        </div>
                      </div><!-- /.progress-group -->
                       <?php
                       $cpeople=($campgoals->total_villagers)?$campgoals->total_villagers:0;
                      $oper=($card->total_villagers<>0)?($cpeople/$card->total_villagers)*100:0; ?>
                      <div class="progress-group">
                        <span class="progress-text">Number of Peoples</span>
                        <span class="progress-number"><b>{!! $cpeople !!}</b>/{!! $card->total_villagers !!}</span>
                        <div class="progress sm">
                          <div style="width:{!! $oper !!}%" class="progress-bar progress-bar-red"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <?php
                      $cbudget=($campgoals->budget)?$campgoals->budget:0;
                      $oper=($card->budget<>0)?($cbudget/$card->budget)*100:0; ?>
                      <div class="progress-group">
                        <span class="progress-text">Total Budget</span>
                        <span class="progress-number"><b>{!! $cbudget !!}</b>/{!! $card->budget !!}</span>
                        <div class="progress sm">
                          <div style="width: {!! $oper !!}%" class="progress-bar progress-bar-green"></div>
                        </div>
                      </div><!-- /.progress-group -->
                      <?php
                      $ctime=($campgoals->deliver_time)?$campgoals->deliver_time:0;
                      $oper=($card->deliver_time<>0)?($ctime/$card->deliver_time)*100:0; ?>
                      <div class="progress-group">
                        <span class="progress-text"> Average time to Deliver</span>
                        <span class="progress-number"><b>{!! $ctime !!}</b>/{!! $card->deliver_time !!}</span>
                        <div class="progress sm">
                          <div style="width: {!! $oper !!}%" class="progress-bar progress-bar-yellow"></div>
                        </div>
                      </div><!-- /.progress-group -->
                    </div>
                    </div>
                  </div><!-- /.tab-pane -->
                  
                  @if(Auth::user()->group_id==4 && empty($selectedpartner))
                  
                  <div id="partner" class="tab-pane">
                  {!! Form::open(['route' => ['ruban.cards.assignupdate',$card->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal','id'=>'assignform']) !!}
                   {!! Form::hidden('partner_id','',array('id'=>'partner_id')) !!}
                    <div class="row">
                     <div class="col-md-12">
                      <p class="text-center">
                       
                      </p>
                      <div class="row">
           @if(@$partners)
           @foreach(@$partners as $partnerdetail)
            <?php
          $color= array_rand($colors);
          ?>
          
            <div class="col-md-4">
                          <a style="margin-bottom: 10px;text-align: center;width: 100%;"href="javascript:;" class="btn btn-success" onclick="assgin_vle('{!! $partnerdetail->id !!}');" type="submit">Assign</a>
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <a href="{!! route('ruban.users.profile',array($partnerdetail->id))!!}" >
                <div class="widget-user-header bg-{!! $colors[$color] !!}">
                  <h3 class="widget-user-username">{!! @$partnerdetail->first_name.' '.@$partnerdetail->last_name !!}</h3>
                  <h5 class="widget-user-desc">Founder &amp; CEO</h5>
                </div>
                <div class="widget-user-image">
                @if(@$partnerdetail->image<>'')
                {!! Html::image('uploads/users/'.$partnerdetail->image,$partnerdetail->first_name,array('class'=>'img-circle')) !!}
                @else
                {!! Html::image('assets/img/user1-128x128.jpg',$partnerdetail->first_name,array('class'=>'img-circle')) !!}
                  @endif
                </div>
                </a>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">SALES</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text">FOLLOWERS</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">PRODUCTS</span>
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
                    </div>
                    {!! Form::close() !!}
                  </div><!-- /.tab-pane -->
                  @endif
                  
                  @if((Auth::user()->group_id==3 || (Auth::user()->group_id==4 && !empty($selectedpartner))) && $project['camps']<>0)
                  <div id="camps" class="tab-pane">
                  <div class="panel-heading clearfix">
                  @if($campcreatebtn)
              <i class="icon-calendar"></i>
              <a href="{!! route('ruban.camps.create',array($card->id)) !!}" class="btn btn-info" role="button"><i class="fa fa-plus"> </i>{!! trans('ruban.add').' '.trans('ruban.camp.stitle') !!}</a>
                @endif
            </div>
             <?php
                $options['0']='Planned';
                $options['1']='Completed';
                $options['2']='Incompleted';
                $options['3']='In Progress';
                ?>
                
                   <table class="table">
          <tr>
            <th>{!! trans('ruban.camp.name') !!}</th>
            <th>{!! trans('ruban.camp.start_date') !!}</th>
            <th>{!! trans('ruban.camp.end_date') !!}</th>
            <th>{!! trans('ruban.status') !!}
            <th>{!! trans('ruban.action') !!}
            </th>
            <th>&nbsp;</th>
          </tr>
          @foreach($camps as $camp)
          <tr>
            <td>{{ @$camp['name'] }}</td>
             <td>{{ date('d-m-Y',strtotime(@$camp['start_date'])) }}</td>
              <td>{{ date('d-m-Y',strtotime(@$camp['end_date'])) }}</td>
              <td>{{ $options[$camp['status']] }}</td>
              
              <td>
            <div class="btn-group">
                      <button class="btn btn-info" type="button">{!! trans('ruban.action') !!}</button>
                      <button data-toggle="dropdown" class="btn btn-info dropdown-toggle" type="button" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul role="menu" class="dropdown-menu">
                       @if($campeditbtn)
                        <li> <a href="{!! route('ruban.camps.edit',array($card->id,$camp['id']))!!}" ><i class="fa fa-edit"></i>{!! trans('ruban.edit') !!}</a></li>
                        @endif
                        @if($campimportbtn)
                        <li> <a href="{!! route('ruban.camps.import',array($camp['id']))!!}" ><i class="fa fa-upload"></i>{!! trans('ruban.campimport') !!}</a></li>
                        @endif
                        @if($campviewbtn)
                        <li> <a href="{!! route('ruban.camps.show',array($card->id,$camp['id']))!!}" ><i class="fa fa-list"></i>{!! trans('ruban.view') !!}</a></li>
                        @endif
                        
                         @if($campdeletebtn)
                        <li><a href="{!! route('ruban.camps.delete',array($card->id,$camp['id']))!!}" ><i class="fa fa-remove"></i>{!! trans('ruban.delete') !!}</a></li>
                        @endif
                        @if($taskimportbtn)
                         <li><a href="{!! route('ruban.tasks.taskimport',array($card->id,$camp['id']))!!}" ><i class="fa fa-remove"></i>{!! trans('ruban.taskimport') !!}</a></li>
                         @endif
                         @if($tasklistbtn)
                          <li><a href="{!! route('ruban.tasks.tasklist',array($card->id,$camp['id']))!!}" ><i class="fa fa-remove"></i>Task {!! trans('ruban.view') !!}</a></li>
                          @endif
                      </ul>
                    </div>
                    </td>
          </tr>
          @endforeach
        </table>
                  </div><!-- /.tab-pane -->
                  @endif
                  @if((Auth::user()->group_id==3 || (Auth::user()->group_id==4 && !empty($selectedpartner))) && $project['camps']==0)
                   <div id="tasks" class="tab-pane"> 
                       <div class="panel-heading clearfix">
                        @if($taskcreatebtn)
              <i class="icon-calendar"></i>
              <a href="{!! route('ruban.tasks.create') !!}" class="btn btn-info" role="button"><i class="fa fa-plus"> </i>{!! trans('ruban.add').' '.trans('ruban.task.stitle') !!}</a>
              @endif
               @if($taskimportbtn)
              <i class="icon-calendar"></i>
              <a href="{!! route('ruban.tasks.import') !!}" class="btn btn-info" role="button"><i class="fa fa-plus"> </i>{!! trans('ruban.import').' '.trans('ruban.task.stitle') !!}</a>
              @endif
                       </div>
                    <table class="table">   
                  <tr>
            <th>{!! trans('ruban.task.name') !!}</th>
            <th>{!! trans('ruban.status') !!}
            <th>{!! trans('ruban.action') !!}
            </th>
            <th>&nbsp;</th>
          </tr>      
               @foreach($tasks as $task)
          <tr>
            <td>{{ @$task->title }}</td>
            <td>{{ $task->status }}</td>   
       <td>
       
       @if($taskeditbtn)
        <a href="{!! route('ruban.tasks.edit',array($task->id))!!}" ><i class="fa fa-edit"></i>{!! trans('ruban.edit') !!}</a>
       @endif
                    
                    </td>

             @endforeach      
            </tr>           
                  </table>     
                   </div>
                </div><!-- /.tab-content -->
                @endif
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div>
          
@endsection

@section('page_js')
 <script>
 function assgin_vle(id)
 {
 if(confirm('Are you sure want to assign?'))
 {
 $("#partner_id").val(id);
 $("#assignform").submit();
 }
 return false;
 }
      $(function () {
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

      });
    </script>
@endsection
