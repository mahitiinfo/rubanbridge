    @if (count($errors) > 0)
  <div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
    There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif


    @if ( Session::has('danger') || Session::has('error') )
    <div class="alert alert-danger alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
    {!! Session::get('danger') !!}
    </div>
    @endif
    
    @if ( Session::has('alert') )
    <div class="alert alert-info alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4><i class="icon fa fa-info"></i> Alert!</h4>
    {!! Session::get('alert') !!}
    </div>
    @endif
    
    @if ( Session::has('warning') )
    <div class="alert alert-warning alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
    {!! Session::get('warning') !!}
    </div>
    @endif
    
    @if ( Session::has('success') )
    <div class="alert alert-success alert-dismissable">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4>    <i class="icon fa fa-check"></i> Alert!</h4>
    {!! Session::get('success') !!}
    </div>
    @endif

