@extends('app')
@section('htmlheader_title')
    {!! trans('ruban.user.title') !!}
@endsection
@section('contentheader_title')
{!! trans('ruban.user.title') !!}
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
          <div class="panel panel-default">
          <div class="panel-heading clearfix">
          @if($createbtn)
              <i class="icon-calendar"></i>
              <a href="{!! route('ruban.users.create') !!}" class="btn btn-info" role="button"><i class="fa fa-plus"> </i>{!! trans('ruban.add').' '.trans('ruban.user.stitle') !!}</a>
              @endif
            </div>
        <table class="table">
          <tr>
            <th>{!! trans('ruban.user.name') !!}</th>
            <th>{!! trans('ruban.group.name') !!}</th>
            <th>{!! trans('ruban.active') !!}</th>
            <th>{!! trans('ruban.action') !!}</th>
            <th>&nbsp;</th>
          </tr>
          @foreach($users as $user)
          <tr>
            <td>{{ @$user->first_name.' '.@$user->last_name }}</td>
            <td>{{ @$user->group->name }}</td>
            <td>{{ (@$user->active=='1'?'Yes':'No') }}</td>
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
                        <li> <a href="{!! route('ruban.users.edit',array($user->id))!!}" ><i class="fa fa-edit"></i>{!! trans('ruban.edit') !!}</a></li>
                        @endif
                         @if($deletebtn)
                        <li><a href="{!! route('ruban.users.delete',array($user->id))!!}" ><i class="fa fa-remove"></i>{!! trans('ruban.delete') !!}</a> </li>
                      @endif
                      </ul>
                    </div>
                    @elseif($editbtn)
                       <a href="{!! route('ruban.users.edit',array($user->id))!!}" ><i class="fa fa-edit"></i>{!! trans('ruban.edit') !!}</a>
                        @elseif($deletebtn)
                        <a href="{!! route('ruban.users.delete',array($user->id))!!}"><i class="fa fa-remove"></i>{!! trans('ruban.delete') !!}</a>
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
