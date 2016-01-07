@extends('app')

@section('htmlheader_title')
    {!! trans('ruban.create').' '.trans('ruban.project.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.update').' '.trans('ruban.project.stitle') !!}
@endsection

@section('main-content')
    {!! Form::open(['route' => array('ruban.payouts.store',$id),'files'=>'true','class'=>'form-horizontal']) !!}
    
    <!-- /resources/views/projects/partials/_form.blade.php -->
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
                    {!! Form::label('status',trans('ruban.project.payment_status'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! Form::select('payment_status', array('0'=>'Pending','1' => 'Paid'),@$project->payment_status,['class' => 'form-control select2','placeholder'=>'Select a Type']); !!}
                    </div>
                </div>

                    
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info">Update</button>
                
                    <a href="{!! route('ruban.payouts.index') !!}" class="btn btn-danger">{!! trans('ruban.cancel') !!}</a>
                   
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
              
            </div>
          </div>
          
          
          
    {!! Form::close() !!}
@endsection
