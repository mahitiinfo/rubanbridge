@extends('app')
@section('htmlheader_title')
    {!! trans('ruban.district.stitle') !!}
@endsection
@section('contentheader_title')
{!! trans('ruban.district.stitle') !!}
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
          <div class="panel-heading clearfix">
          @if($importbtn)
              <i class="icon-calendar"></i>
              <a href="{!! route('ruban.districts.import') !!}" class="btn btn-info" role="button"><i class="fa fa-plus"> </i>{!! trans('ruban.import').' '.trans('ruban.district.stitle') !!}</a>
              @endif
            </div>
        <table class="table">
          <tr>
            <th>{!! trans('ruban.district.district') !!}</th>
            <th>{!! trans('ruban.action') !!}</th>
            <th>&nbsp;</th>
          </tr>
          @foreach($districts as $district)
          <tr>
            <td>{{ @$district->district }}</td>
            <td>
             @if($deletebtn)
                        <a href="{!! route('ruban.districts.delete',array($district->id))!!}" class="btn btn-info" ><i class="fa fa-remove"></i>{!! trans('ruban.delete') !!}</a>
                        @endif
                    
                    </td>
          </tr>
          @endforeach
        </table>
          <div>
        </div>
    </div>
</div>
@endsection
