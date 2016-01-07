@extends('app')

@section('htmlheader_title')
    {!! trans('ruban.create').' '.trans('ruban.card.stitle') !!}
@endsection

@section('contentheader_title')
     {!! trans('ruban.create').' '.trans('ruban.card.stitle') !!}
@endsection

@section('main-content')
    {!! Form::open(['route' => 'ruban.cards.store','files'=>'true','class'=>'form-horizontal']) !!}
        @include('cards/partials/_form', ['submit_text' => trans('ruban.create').' '.trans('ruban.card.stitle')])
    {!! Form::close() !!}
@endsection
