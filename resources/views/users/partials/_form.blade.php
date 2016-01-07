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
                      {!! Form::label('group_id', trans('ruban.user.group_id'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::select('group_id',@$groups,@$user->group_id,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('first_name', trans('ruban.user.first_name'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('first_name',@$user->first_name,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('last_name', trans('ruban.user.last_name'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('last_name',@$user->last_name,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('email', trans('ruban.user.email'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('email',@$user->email,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('password', trans('ruban.user.password'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::password('password',array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    
                     <div class="form-group" style="display:none" id="distdiv">
                      {!! Form::label('district_id', trans('ruban.district.stitle'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::select('district_id[]',@$districts,@$districtsselected,array('class'=>'form-control select2','multiple'=>'true','style'=>'width:100%')) !!}
                      </div>
                    </div>
                    <div class="form-group" style="display:none" id="secdiv">
                      {!! Form::label('sector_id', trans('ruban.card.sector'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::select('sector_id[]',@$sectors,@$sectorsselected,array('class'=>'form-control select2','multiple'=>'true','style'=>'width:100%')) !!}
                      </div>
                    </div>
                    
                <div class="form-group">
                    {!! Form::label('active',trans('ruban.active'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! Form::select('active', array('1' => 'Yes','0' => 'No' ),@$user->active,['class' => 'form-control select','placeholder'=>'Select a Type']); !!}
                    </div>
                </div>
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info">{!! @$submit_text !!}</button>
                    <a href="{!! route('ruban.users.index') !!}" class="btn btn-danger">{!! trans('ruban.cancel') !!}</a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
              
            </div>
          </div>
          
          @section('page_js')
          <script type="text/javascript">    
        $(document).ready(function() {
        var selected=$("#group_id option:selected").val();
        setpartner(selected);
        $("#group_id").on('change',function() {
        var selected=$("#group_id option:selected").val();
        setpartner(selected);        
        });
    
    });
    function setpartner(id)
    {
        $("#distdiv").hide();
        $("#secdiv").hide();
        if(id==3)
        {
            $("#distdiv").show();
            $("#secdiv").show();
        }
    
    }
</script>
          @endsection
          
