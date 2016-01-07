<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Dashboard')
        <small>@yield('contentheader_description')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {!! trans('ruban.level') !!}</a></li>
        <li class="active">{!! trans('ruban.here') !!}</li>
    </ol>
</section>
