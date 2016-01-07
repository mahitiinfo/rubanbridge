@extends('app')
@section('htmlheader_title')
    {!! trans('ruban.import').' '.trans('ruban.task.stitle') !!}
@endsection
@section('contentheader_title')
     {!! trans('ruban.import').' '.trans('ruban.task.stitle') !!}
@endsection
@section('main-content')
    {!! Form::open(['route' => array('ruban.tasks.'.$route,@$card_id,$camp_id),'files'=>'true','class'=>'form-horizontal']) !!}
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
                      {!! Form::label('file', trans('ruban.task.file'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::file('file',array('class'=>'')) !!}
                      </div>
                      <span>Only first five records will be imported.</span>
                      <a href="{!! URL::to('uploads/tasksimport.xls') !!}" >Download sample format</a>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info">{!! trans('ruban.import') !!}</button>
                    <a href="{!! route('ruban.tasks.import') !!}" class="btn btn-danger">{!! trans('ruban.cancel') !!}</a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div>
          </div>
          @endsection
          

