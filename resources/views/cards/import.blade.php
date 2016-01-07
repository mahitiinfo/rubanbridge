@extends('app')

@section('htmlheader_title')
    {!! trans('ruban.import').' '.trans('ruban.district.stitle') !!}
@endsection
@section('main-content')
    {!! Form::open(['route' => 'ruban.districts.store','files'=>'true','class'=>'form-horizontal']) !!}
        @include('districts/partials/_form', ['submit_text' => trans('ruban.import').' '.trans('ruban.district.stitle')])
    {!! Form::close() !!}
@endsection



