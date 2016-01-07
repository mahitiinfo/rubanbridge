@extends('app')
@section('htmlheader_title')
     {!! trans('ruban.edit').' '.trans('ruban.project.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.edit').' '.trans('ruban.project.stitle') !!}
@endsection

@section('main-content')
    {!! Form::open(['route' => ['ruban.projects.update',$project->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}
        @include('projects/partials/_form', ['submit_text' => trans('ruban.update').' '.trans('ruban.project.stitle')])
    {!! Form::close() !!}
@endsection
