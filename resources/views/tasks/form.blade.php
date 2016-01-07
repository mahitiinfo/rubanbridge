@extends('app')

@section('htmlheader_title')
    {!! trans('ruban.create').' '.trans('ruban.task.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.create').' '.trans('ruban.task.stitle') !!}
@endsection

@section('main-content')
    {!! Form::open(['route' => array('ruban.tasks.store'),'files'=>'true','class'=>'form-horizontal']) !!}
        @include('tasks/partials/_form', ['submit_text' => trans('ruban.create').' '.trans('ruban.task.stitle')])
    {!! Form::close() !!}
@endsection
