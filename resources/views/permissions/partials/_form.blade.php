<?php $options=array('create'=>'create','edit'=>'edit','view'=>'view','delete'=>'delete','update'=>'update');
if(@$permission->permissions)
{
$json=json_decode($permission->permissions);
foreach($json as $value)
{
$newarray[]=str_replace(strtolower($permission->name).'.','',$value);
$options[str_replace(strtolower($permission->name).'.','',$value)]=str_replace(strtolower($permission->name).'.','',$value);
}
} ?>
<div class="row">
            <!-- left column -->
           <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                    
                    <div class="form-group">
                      {!! Form::label('name', trans('ruban.permission.name'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('name',@$permission->name,array('class'=>'form-control')) !!}
                      </div>
                    </div>

                <div class="form-group">
                    {!! Form::label('permissions',trans('ruban.permission.title'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! Form::select('permissions[]',$options,@$newarray,['multiple'=>'true','class' => 'form-control js-example-tags','id'=>'permission-tags']) !!}
                    </div>
                </div>
                    
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info">{!! @$submit_text !!}</button>
                    <a href="{!! route('ruban.permissions.index') !!}" class="btn btn-danger">{!! trans('ruban.cancel') !!}</a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
              
            </div>
          </div>
          @section('page_js')
          <script>
          $(function() {

        $(".js-example-tags").select2({
      tags: true
    })

});
</script>

@endsection
