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
                      {!! Form::label('card_id', trans('ruban.card.stitle'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::select('card_id',$cards,@$task->card_id,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('camp_id', trans('ruban.camp.stitle'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::select('camp_id',$camps,@$task->camp_id,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('title', trans('ruban.task.name'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('title',@$task->title,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('order_amount', trans('ruban.task.order_amount'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('order_amount',@$task->order_amount,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                     <div class="form-group">
                      {!! Form::label('actual_time_to_deliver', trans('ruban.task.actual_time_to_deliver'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('actual_time_to_deliver',@$task->actual_time_to_deliver,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('description', trans('ruban.task.description'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::textarea('description',@$task->description,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('payment_method', trans('ruban.task.payment_method'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('payment_method',@$task->payment_method,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('address_type', trans('ruban.task.address_type'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('address_type',@$task->address_type,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    
                    
                    <div class="form-group">
                      {!! Form::label('address', trans('ruban.task.address'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::textarea('address',@$task->address,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                <?php
                $options['Created']='Created';
                $options['Delivered']='Delivered';
                $options['Shipped']='Shipped';
               
                ?>
                <div class="form-group">
                      {!! Form::label('status', trans('ruban.task.status'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::select('status',$options,@$task->status,array('class'=>'form-control','Placeholder'=>'Select Status')) !!}
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info">{!! @$submit_text !!}</button>
                    <a href="{!! route('ruban.tasks.index') !!}" class="btn btn-danger">{!! trans('ruban.cancel') !!}</a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
              
            </div>
          </div>
       @section('page_js')
       
       <script type="text/javascript">    
    $(document).ready(function() {
    $("#card_id").on('change',function() {
        var selected=$("#card_id option:selected").val();
        $.post( "{!! route('ruban.camps.getcamp') !!}",{id:selected,_token:'{!! csrf_token() !!}'}, function( data ) {
        $( "#camp_id" ).html( data );
        });
    });
    });
</script>
       
       @endsection  
          
