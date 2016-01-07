u@extends('app')
@section('htmlheader_title')
    {!! trans('ruban.import').' '.trans('ruban.order.stitle') !!}
@endsection
@section('contentheader_title')
     {!! trans('ruban.import').' '.trans('ruban.order.stitle') !!}
@endsection
@section('main-content')
    {!! Form::open(['route' => array('ruban.camps.orderimport',$camp_id),'files'=>'true','class'=>'form-horizontal']) !!}
<div class="row">
            <!-- left column -->
           <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    <div class="form-group">
                      {!! Form::label('file', trans('ruban.camp.file'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::file('fileimport',array('class'=>'')) !!}
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info">{!! trans('ruban.import') !!}</button>
                    <a href="{!! route('ruban.cards.show',array($card->card_id)) !!}" class="btn btn-danger">{!! trans('ruban.cancel') !!}</a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div>
          </div>
          @endsection
