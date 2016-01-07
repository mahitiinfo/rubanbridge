@extends('app')

@section('htmlheader_title')
     {!! trans('ruban.edit').' '.trans('ruban.dispute.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.edit').' '.trans('ruban.dispute.stitle') !!}
@endsection

@section('main-content')
    {!! Form::open(['route' => ['ruban.disputes.update',$dispute->id],'method'=>'PUT','files'=>'true','class'=>'form-horizontal']) !!}
        @include('disputes/partials/_form', ['submit_text' => trans('ruban.update').' '.trans('ruban.dispute.stitle')])
    {!! Form::close() !!}
@endsection
