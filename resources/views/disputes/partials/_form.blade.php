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
                      {!! Form::label('project_id', trans('ruban.project.stitle'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::select('project_id',@$projects,@$dispute->project_id,array('class'=>'form-control','placeholder'=>'Select Project')) !!}
                      </div>
                    </div>

                <div class="form-group">
                    {!! Form::label('reason',trans('ruban.dispute.reason'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! Form::select('reason', array('Fake order' => 'Fake order','Fake registration' => 'Fake registration','Other'=>'Other' ),@$dispute->reason,['class' => 'form-control select2','placeholder'=>'Select reason']); !!}
                    </div>
                </div>
               <div class="form-group">
                    {!! Form::label('status',trans('ruban.status'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! Form::select('status', array('0'=>'Pending','1' => 'Closed'),@$dispute->status,['class' => 'form-control select','placeholder'=>'Select status']); !!}
                    </div>
                </div>
                
                @if(Auth::user()->group_id==2)
                @if(@$dispute->operator_remarks)
                    <div class="form-group">
                    {!! Form::label('operator_remarks',trans('ruban.dispute.operator_remarks'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! $dispute->operator_remarks !!}
                    </div>
                </div>
                @endif
                    <div class="form-group">
                    {!! Form::label('description',trans('ruban.dispute.description'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! Form::textarea('description',@$dispute->description,['class' => 'form-control']); !!}
                    </div>
                </div>
                 
                
                @endif
             
                @if(Auth::user()->group_id==4)
                @if(@$dispute->description)
                    <div class="form-group">
                    {!! Form::label('description',trans('ruban.dispute.description'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! $dispute->description !!}
                    </div>
                </div>
                @endif
                <div class="form-group">
                    {!! Form::label('operator_remarks',trans('ruban.dispute.operator_remarks'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! Form::textarea('operator_remarks',@$dispute->operator_remarks,['class' => 'form-control']) !!}
                    </div>
                </div>
                
                @endif
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info">{!! @$submit_text !!}</button>
                    
                    <a href="{!! route('ruban.disputes.index') !!}" class="btn btn-danger">{!! trans('ruban.cancel') !!}</a>
                  
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
              
            </div>
          </div>
          
