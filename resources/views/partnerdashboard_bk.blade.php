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
          <h2 class="page-header">{!! trans('ruban.card.assigned') !!}</h2>
          <div class="row">
          @if($acards)
          @foreach($acards as $card)
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
                  
                    <div class="col-xs-6 col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{!! $card->camps !!}</h5>
                        <span class="description-text">{!! trans('ruban.project.camps') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-xs-6 col-sm-3 border-right">
                      <div class="description-block">
                        <h5 class="description-header">{!! $card->total_villagers !!}</h5>
                        <span class="description-text">{!! trans('ruban.project.people') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-xs-6 col-sm-3">
                      <div class="description-block">
                        <h5 class="description-header">{!! $card->orders !!}</h5>
                        <span class="description-text">{!! trans('ruban.project.order') !!}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-xs-6 col-sm-3">
                      <div class="description-block">
                        <h5 class="description-header">{!! $card->budget !!}</h5>
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
