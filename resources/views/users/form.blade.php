@extends('app')

@section('htmlheader_title')
    {!! trans('ruban.create').' '.trans('ruban.user.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.create').' '.trans('ruban.user.stitle') !!}
@endsection

@section('main-content')
    {!! Form::open(['route' => 'ruban.users.store','files'=>'true','class'=>'form-horizontal']) !!}
        @include('users/partials/_form', ['submit_text' => trans('ruban.create').' '.trans('ruban.user.stitle')])
    {!! Form::close() !!}
@endsection
