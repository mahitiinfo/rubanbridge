@extends('app')

@section('htmlheader_title')
    {!! trans('ruban.create').' '.trans('ruban.permission.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.create').' '.trans('ruban.permission.stitle') !!}
@endsection

@section('main-content')
    {!! Form::open(['route' => 'ruban.permissions.store','files'=>'true','class'=>'form-horizontal']) !!}
        @include('permissions/partials/_form', ['submit_text' => trans('ruban.create').' '.trans('ruban.permission.stitle')])
    {!! Form::close() !!}
@endsection
