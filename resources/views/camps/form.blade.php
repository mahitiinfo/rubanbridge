@extends('app')

@section('htmlheader_title')
    {!! trans('ruban.create').' '.trans('ruban.camp.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.create').' '.trans('ruban.camp.stitle') !!}
@endsection

@section('main-content')
    {!! Form::open(['route' => array('ruban.camps.store',$card_id),'files'=>'true','class'=>'form-horizontal']) !!}
        @include('camps/partials/_form', ['submit_text' => trans('ruban.create').' '.trans('ruban.camp.stitle')])
    {!! Form::close() !!}
@endsection
