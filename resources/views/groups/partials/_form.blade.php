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
                      {!! Form::label('name', trans('ruban.group.name'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('name',@$group->name,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                <div class="form-group">
                    {!! Form::label('active',trans('ruban.active'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! Form::select('active', array('1' => 'Yes','0' => 'No' ),@$group->active,['class' => 'form-control select','placeholder'=>'Select a Type']); !!}
                    </div>
                </div>
                 <legend>Super User <small>Access Everything</small></legend>
                 {!! Form::select('permissions[superuser]', array('0' => 'No','1' => 'Yes' ),@$userPermissions['superuser'],['class' => 'form-control select','placeholder'=>'Super User']); !!}

            <legend>Module Permissions</legend>
                 @foreach($permissions as $module)
                 <legend>{{ $module['name'] }} </legend>
                 @if(json_decode($module['permissions']))
                 @foreach(json_decode($module['permissions']) as $perm)
                  <div class="form-group">
                    {!! Form::label(ucfirst($perm),trans('ruban.'.str_replace('ruban.','',str_replace(strtolower($module['name']).'.','',$perm))),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    <?php $perm1=str_replace("-",".",$perm); ?>
                    {!! Form::select('permissions['.$perm.']', array('1' => 'Allow','0' => 'Deny'),array_key_exists($perm1,$userPermissions) ? $userPermissions[$perm1] : 0,['class' => 'form-control select','placeholder'=>'Select a Type']); !!}
                    </div>
                </div>
                @endforeach
                @endif
                 @endforeach
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info">{!! @$submit_text !!}</button>
                    <a href="{!! route('ruban.groups.index') !!}" class="btn btn-danger">{!! trans('ruban.cancel') !!}</a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div>
          </div>
          
