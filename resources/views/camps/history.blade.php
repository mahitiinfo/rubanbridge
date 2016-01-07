@extends('app')
@section('htmlheader_title')
    {!! trans('ruban.camp.stitle') !!}
@endsection
@section('contentheader_title')
"{!! $camp->name !!}" Daily Updates
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
          <div class="panel-heading clearfix">
          <a href="{!! route('ruban.cards.show',array($card->id))!!}" ><i class="fa fa-backward"></i> Back</a>
            </div>
        <table class="table">
          <tr>
            <th>{!! trans('ruban.camp.no_of_villages_covered') !!}</th>
            <th>{!! trans('ruban.camp.village_details') !!}</th>
            <th>{!! trans('ruban.camp.total_registration') !!}</th>
            <th>{!! trans('ruban.camp.total_sales') !!}</th>
            <th>{!! trans('ruban.camp.sales_value') !!}</th>
            <th>{!! trans('ruban.camp.today_expenses') !!}</th>
            <th>{!! trans('ruban.camp.average_time_to_deliver') !!}</th>
            <th>{!! trans('ruban.camp.updated_date') !!}</th>
          </tr>
          @foreach($dailycamps as $dailycamp)
          <tr>
            <td>{!! @$dailycamp['no_of_villages_covered'] !!}</td>
            <td>{!! @$dailycamp['village_details'] !!}</td>
            <td>{!! @$dailycamp['no_of_people'] !!}</td>
            <td>{!! @$dailycamp['actual_orders'] !!}</td>
            <td>{!! @$dailycamp['order_value'] !!}</td>
            <td>{!! @$dailycamp['actual_budget'] !!}</td>
            <td>{!! @$dailycamp['actual_deliver_time'] !!}</td>
            <td>{!! @$dailycamp['updated_date'] !!}</td>
          </tr>
          @endforeach
        </table>
          <div>
        </div>
    </div>
</div>
@endsection
