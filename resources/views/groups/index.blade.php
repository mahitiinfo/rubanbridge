@extends('app')

@section('htmlheader_title')
    {!! trans('ruban.group.title') !!}
@endsection
@section('contentheader_title')
{!! trans('ruban.group.title') !!}
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
          <div class="panel-heading clearfix">
              @if($createbtn)
              <i class="icon-calendar"></i>
              <a href="{!! route('ruban.groups.create') !!}" class="btn btn-info" role="button"><i class="fa fa-plus"> </i>{!! trans('ruban.add').' '.trans('ruban.group.stitle') !!}</a>
              @endif
            </div>
        <table class="table">
          <tr>
            <th>{!! trans('ruban.group.name') !!}</th>
            <th>{!! trans('ruban.active') !!}</th>
            <th>{!! trans('ruban.action') !!}</th>
            <th>&nbsp;</th>
          </tr>
          @foreach($groups as $group)
          <tr>
            <td>{{ @$group->name }}</td>
            <td>{{ (@$group->active=='1'?'Yes':'No') }}</td>
            <td>
             @if($editbtn && $deletebtn)
            <div class="btn-group">
                      <button class="btn btn-info" type="button">{!! trans('ruban.action') !!}</button>
                      <button data-toggle="dropdown" class="btn btn-info dropdown-toggle" type="button" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">{!! trans('ruban.dropdown') !!}</span>
                      </button>
                      <ul role="menu" class="dropdown-menu">
                      @if($editbtn)
                        <li> <a href="{!! route('ruban.groups.edit',array($group->id))!!}" ><i class="fa fa-edit"></i>{!! trans('ruban.edit') !!}</a></li>
                        @endif
                        @if($deletebtn)
                        <li><a href="{!! route('ruban.groups.delete',array($group->id))!!}" ><i class="fa fa-remove"></i>{!! trans('ruban.delete') !!}</a></li>
                        @endif
                      </ul>
                    </div>
                     @elseif($editbtn)
                       <a href="{!! route('ruban.groups.edit',array($group->id))!!}" ><i class="fa fa-edit"></i>{!! trans('ruban.edit') !!}</a>
                        @elseif($deletebtn)
                        <a href="{!! route('ruban.groups.delete',array($group->id))!!}" ><i class="fa fa-remove"></i>{!! trans('ruban.delete') !!}</a>
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
