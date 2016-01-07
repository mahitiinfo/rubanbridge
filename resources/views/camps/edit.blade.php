@extends('app')

@section('htmlheader_title')
     {!! trans('ruban.edit').' '.trans('ruban.camp.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.edit').' '.trans('ruban.camp.stitle') !!}
@endsection

@section('main-content')
    {!! Form::open(['route' => ['ruban.camps.update',$card_id,$camp->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}
        @include('camps/partials/_form', ['submit_text' => trans('ruban.update').' '.trans('ruban.camp.stitle')])
    {!! Form::close() !!}
@endsection
