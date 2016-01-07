@extends('app')
@section('htmlheader_title')
    {!! trans('ruban.dispute.title') !!}
@endsection
@section('contentheader_title')
{!! trans('ruban.dispute.title') !!}
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
          <div class="panel-heading clearfix">
          @if($createbtn)
              <i class="icon-calendar"></i>
              <a href="{!! route('ruban.disputes.create') !!}" class="btn btn-info" role="button"><i class="fa fa-plus"> </i>{!! trans('ruban.add').' '.trans('ruban.dispute.stitle') !!}</a>
                @endif
            </div>
        <table class="table">
          <tr>
            <th>{!! trans('ruban.project.stitle') !!}</th>
            <th>{!! trans('ruban.status') !!}</th>
            <th>{!! trans('ruban.dispute.date') !!}</th>
            <th>{!! trans('ruban.dispute.reason') !!} </th>
            <th>{!! trans('ruban.action') !!}
            </th>
            <th>&nbsp;</th>
          </tr>
          @foreach($disputes as $dispute)
          <tr>
            <td>{{ @$dispute['name'] }}</td>
            <td>{{ $status[@$dispute['status']] }}</td>
           <td>{{ date('jS M Y',strtotime(@$dispute['created_at'])) }}</td>
           <td>{{ @$dispute['reason'] }}</td>
            <td>
            
            @if($editbtn && $viewbtn)
            
            <div class="btn-group">
                      <button class="btn btn-info" type="button">{!! trans('ruban.action') !!}</button>
                      <button data-toggle="dropdown" class="btn btn-info dropdown-toggle" type="button" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul role="menu" class="dropdown-menu">
                        <li> <a href="{!! route('ruban.disputes.edit',array($dispute['id']))!!}" ><i class="fa fa-edit"></i>{!! trans('ruban.edit') !!}</a></li>
                         <li> <a href="{!! route('ruban.disputes.show',array($dispute['id']))!!}" ><i class="fa fa-edit"></i>{!! trans('ruban.view') !!}</a></li>
                      
                      </ul>
                    </div>
                    @elseif($editbtn)
                        <a href="{!! route('ruban.disputes.edit',array($dispute['id']))!!}" ><i class="fa fa-edit"></i>{!! trans('ruban.edit') !!}</a>
                        @elseif($viewbtn)
                        <a href="{!! route('ruban.disputes.show',array($dispute['id']))!!}" ><i class="fa fa-edit"></i>{!! trans('ruban.view') !!}</a>
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
