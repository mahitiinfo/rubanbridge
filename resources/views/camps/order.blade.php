@extends('app')
@section('htmlheader_title')
    {!! trans('ruban.order.title') !!}
@endsection
@section('contentheader_title')
{!! trans('ruban.order.title') !!}
@endsection
@section('main-content')
<?php
                $options['0']='Inprogress';
                $options['1']='Completed';
                $options['2']='Delayed';
               
                ?>
                
<div class="container">
    <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
          <div class="panel-heading clearfix">
            </div>
        <table class="table">
          <tr>
            <th>{!! trans('ruban.order.name') !!}</th>
            <th>{!! trans('ruban.status') !!}</th>
            <th>&nbsp;</th>
          </tr>
          @foreach($orders as $order)
          <tr>
            <td>{{ @$order['order_id'] }}</td>
            <td>{{ $order['status'] }}</td>
            <td>
            
            
                    </td>
          </tr>
          @endforeach
        </table>
        </div>
    </div>
</div>
@endsection
