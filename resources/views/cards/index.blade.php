@extends('app')
@section('htmlheader_title')
    {!! trans('ruban.card.title') !!}
@endsection
@section('contentheader_title')
{!! trans('ruban.card.title') !!}
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
          <div class="panel-heading clearfix">
          @if($createbtn)
              <i class="icon-calendar"></i>
              <a href="{!! route('ruban.cards.create') !!}" class="btn btn-info" role="button"><i class="fa fa-plus"> </i>{!! trans('ruban.add').' '.trans('ruban.card.stitle') !!}</a>
                @endif
            </div>
             <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#available" aria-expanded="true">{!! trans('ruban.card.available') !!}</a></li>
                   @if(Auth::getUser()->group_id==4)
                  <li class=""><a data-toggle="tab" href="#assigned" aria-expanded="false">{!! trans('ruban.card.assigned') !!}</a></li>
                  @endif
                </ul>
                <div class="tab-content">
                 <div id="available" class="tab-pane active">
        <table class="table">
          <tr>
            <th>{!! trans('ruban.card.name') !!}</th>
            <th>{!! trans('ruban.active') !!}</th>
            <th> @if(Auth::getUser()->group_id==4)
  {!! trans('ruban.partner') !!}
@else
{!! trans('ruban.view') !!}
     @endif</th>
            <th>{!! trans('ruban.action') !!}
            </th>
            <th>&nbsp;</th>
          </tr>
          @foreach($cards as $card)
          <tr>
            <td>{{ @$card->name }}</td>
            <td>{{ (@$card->active=='1'?'Yes':'No') }}</td>
            <td>
                      <a class="btn btn-info" href="{!! route('ruban.cards.show',array($card->id))!!}" ><i class="fa fa-view"></i>
                      
                      @if(Auth::getUser()->group_id==4)
  {!! trans('ruban.partner.assign') !!}
@else
{!! trans('ruban.view') !!}
     @endif
                      </a>
                    </td>
            <td>
            
            @if($editbtn && $deletebtn)
            
            <div class="btn-group">
                      <button class="btn btn-info" type="button">{!! trans('ruban.action') !!}</button>
                      <button data-toggle="dropdown" class="btn btn-info dropdown-toggle" type="button" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul role="menu" class="dropdown-menu">
                      @if($editbtn)
                        <li> <a href="{!! route('ruban.cards.edit',array($card->id))!!}" ><i class="fa fa-edit"></i>{!! trans('ruban.edit') !!}</a></li>
                        @endif
                          @if($deletebtn)
                        <li><a href="{!! route('ruban.cards.delete',array($card->id))!!}" ><i class="fa fa-remove"></i>{!! trans('ruban.delete') !!}</a></li>
                         @endif
                      
                      </ul>
                    </div>
                    @elseif($editbtn)
                        <a href="{!! route('ruban.cards.edit',array($card->id))!!}" ><i class="fa fa-edit"></i>{!! trans('ruban.edit') !!}</a>
                        @elseif($deletebtn)
                        <a href="{!! route('ruban.cards.delete',array($card->id))!!}" ><i class="fa fa-remove"></i>{!! trans('ruban.delete') !!}</a>
                        @endif
                    </td>
          </tr>
          @endforeach
        </table>
        </div>
         @if(Auth::getUser()->group_id==4)
        <div id="assigned" class="tab-pane">
        <table class="table">
          <tr>
            <th>{!! trans('ruban.card.name') !!}</th>
            <th>{!! trans('ruban.active') !!}</th>
            <th> @if(Auth::getUser()->group_id==4)
  {!! trans('ruban.partner') !!}
@else
{!! trans('ruban.view') !!}
     @endif</th>
          </tr>
          @foreach($assignedcards as $card)
          <tr>
            <td>{{ @$card->name }}</td>
            <td>{{ (@$card->active=='1'?'Yes':'No') }}</td>
            <td>
                      <a class="btn btn-info" href="{!! route('ruban.cards.show',array($card->id))!!}" ><i class="fa fa-view"></i>
                      
{!! trans('ruban.view') !!}
                      </a>
                       @if($editbtn)
                         <a href="{!! route('ruban.cards.edit',array($card->id))!!}" ><i class="fa fa-edit"></i>{!! trans('ruban.edit') !!}</a>
                        @endif
                    </td>
          </tr>
          @endforeach
        </table>
        </div>
        @endif
          <div>
        </div>
    </div>
</div>
@endsection
