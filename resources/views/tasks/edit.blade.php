@extends('app')

@section('htmlheader_title')
     {!! trans('ruban.edit').' '.trans('ruban.task.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.edit').' '.trans('ruban.task.stitle') !!}
@endsection

@section('main-content')
    {!! Form::open(['route' => ['ruban.tasks.update',$task->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}
        @include('tasks/partials/_form', ['submit_text' => trans('ruban.update').' '.trans('ruban.task.stitle')])
    {!! Form::close() !!}
@endsection
