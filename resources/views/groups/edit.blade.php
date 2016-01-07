@extends('app')

@section('htmlheader_title')
     {!! trans('ruban.edit').' '.trans('ruban.group.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.edit').' '.trans('ruban.group.stitle') !!}
@endsection

@section('main-content')
    {!! Form::open(['route' => ['ruban.groups.update',$group->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}
        @include('groups/partials/_form', ['submit_text' => trans('ruban.update').' '.trans('ruban.group.stitle')])
    {!! Form::close() !!}
@endsection
