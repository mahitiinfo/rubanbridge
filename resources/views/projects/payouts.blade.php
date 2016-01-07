@extends('app')

@section('htmlheader_title')
    {!! trans('ruban.payout.title') !!}
@endsection
@section('contentheader_title')
{!! trans('ruban.payout.title') !!}
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
          <div class="panel-heading clearfix">
            </div>
        <table class="table">
          <tr>
            <th>{!! trans('ruban.project.name') !!}</th>
            <th>{!! trans('ruban.project.payment_status') !!}</th>
            <th>{!! trans('ruban.project.paid_on') !!}</th>
            <th>{!! trans('ruban.project.no_of_disputes') !!}</th>
            
            <th>{!! trans('ruban.action') !!}</th>
            
            <th>&nbsp;</th>
          </tr>
          @foreach($payouts as $payout)
          <tr>
            <td>{{ @$payout['name'] }}</td>
         <td>{{ @$status[$payout['payment_status']] }}</td>
          <td>{{ (@$payout['payment_date']<>'')?date('jS M Y',strtotime(@$payout['payment_date'])):'NA' }}</td>
           <td> <a href="{!! route('ruban.disputes.project',array($payout['id']))!!}" ><i class="fa fa-view"></i>{{ @$payout['dispute'] }} </a> </td>
            <td>
                @if(@$payout['payment_status']==1 && @$payout['dispute']==0)
                <a href="{!! route('ruban.projects.show',array($payout['id']))!!}" ><i class="fa fa-view"></i>View </a>
                @elseif(@$payout['payment_status']==0 && @$payout['dispute']==0)
                <a href="{!! route('ruban.payouts.payment',array($payout['id']))!!}" ><i class="fa fa-view"></i>Make Payment</a>
                @elseif(@$payout['payment_status']==0 && @$payout['dispute']!=0)
                <a href="{!! route('ruban.projects.show',array($payout['id']))!!}" ><i class="fa fa-view"></i>View</a>
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
