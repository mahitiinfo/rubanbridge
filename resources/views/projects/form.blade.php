@extends('app')

@section('htmlheader_title')
    {!! trans('ruban.create').' '.trans('ruban.project.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.create').' '.trans('ruban.project.stitle') !!}
@endsection

@section('main-content')
    {!! Form::open(['route' => 'ruban.projects.store','files'=>'true','class'=>'form-horizontal','id'=>'projectval']) !!}
        @include('projects/partials/_form', ['submit_text' => trans('ruban.create').' '.trans('ruban.project.stitle')])
    {!! Form::close() !!}
@endsection
