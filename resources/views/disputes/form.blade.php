@extends('app')

@section('htmlheader_title')
    {!! trans('ruban.create').' '.trans('ruban.dispute.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.create').' '.trans('ruban.dispute.stitle') !!}
@endsection

@section('main-content')
    {!! Form::open(['route' => 'ruban.disputes.store','files'=>'true','class'=>'form-horizontal']) !!}
        @include('disputes/partials/_form', ['submit_text' => trans('ruban.create').' '.trans('ruban.dispute.stitle')])
    {!! Form::close() !!}
@endsection
