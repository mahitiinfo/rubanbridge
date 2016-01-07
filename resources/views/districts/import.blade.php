@extends('app')
@section('htmlheader_title')
    {!! trans('ruban.import').' '.trans('ruban.district.stitle') !!}
@endsection
@section('contentheader_title')
     {!! trans('ruban.import').' '.trans('ruban.district.region') !!}
@endsection
@section('main-content')
    {!! Form::open(['route' => 'ruban.districts.import','files'=>'true','class'=>'form-horizontal']) !!}
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
                      {!! Form::label('file', trans('ruban.district.file'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::file('fileimport',array('class'=>'')) !!}
                      </div>
                      <a href="{!! URL::to('uploads/villageimport.xls') !!}" >Download sample format</a>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info">{!! trans('ruban.import') !!}</button>
                    <a href="{!! route('ruban.districts.index') !!}" class="btn btn-danger">{!! trans('ruban.cancel') !!}</a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div>
          </div>
          @endsection
          

