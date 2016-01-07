<!-- /resources/views/projects/partials/_form.blade.php -->
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
                      {!! Form::label('name', trans('ruban.project.name'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('name',@$project->name,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('sector_id', trans('ruban.project.sector'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::select('sector_id',$sectors,@$project->sector_id,array('class'=>'form-control select2')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('state_id', trans('ruban.project.state'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::select('state_id',$states,@$project->state_id,array('class'=>'form-control','placeholder'=>'Select State')) !!}
                        
                      </div>
                    </div> 
                    <div class="form-group">
                      {!! Form::label('district_id', trans('ruban.project.district_id'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::select('district_id',$districts,@$project->district_id,array('class'=>'form-control','placeholder'=>'Select District')) !!}
                      </div>
                    </div> 
                    <div class="form-group">
                      {!! Form::label('taluk_id', trans('ruban.project.taluk_id'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::select('taluk_id',$taluks,@$project->taluk_id,array('class'=>'form-control','placeholder'=>'Select Taluk')) !!}
                      </div>
                    </div> 
                    
                    
                    
                    
              
                    <div class="form-group">
                      {!! Form::label('camps', trans('ruban.project.camps'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('camps',@$project->camps,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('total_villagers', trans('ruban.project.total_villagers'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('total_villagers',@$project->total_villagers,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('camps', trans('ruban.project.budget'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('budget',@$project->budget,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('orders', trans('ruban.project.orders'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('orders',@$project->orders,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('deliver_time', trans('ruban.project.deliver_time'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('deliver_time',@$project->deliver_time,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('start_date', trans('ruban.project.start_date'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                      @if(@$project->start_date)
                      <?php 
                      $start_date=Carbon\Carbon::parse(@$project->start_date)->format('d-m-Y');
                      $end_date=Carbon\Carbon::parse(@$project->end_date)->format('d-m-Y');
                      ?>
                      @endif
                        {!! Form::text('start_date',@$start_date,array('class'=>'form-control','readonly'=>'readonly')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('end_date', trans('ruban.project.end_date'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('end_date',@$end_date,array('class'=>'form-control','readonly'=>'readonly')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('comments', trans('ruban.project.comments'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::textarea('comments',@$project->comments,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                   {!! Form::label('image', trans('ruban.project.image'),array('class'=>'col-md-2 control-label')) !!}
                     <div class="col-md-10">
                     {!! Form::file('image') !!}
                    </div>
                    @if(@$project->image<>'')
                    {!! Html::image('uploads/projects/'.@$project->image,'',array('width'=>'200')) !!}
                    @endif
                </div>
                
                <div class="form-group">
                    {!! Form::label('status',trans('ruban.status'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! Form::select('status', array('0'=>'New Project','1' => 'Ongoing Project','2' => 'Completed Project' ),@$project->status,['class' => 'form-control select','placeholder'=>'Select a Type']); !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('active',trans('ruban.active'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! Form::select('active', array('1' => 'Yes','0' => 'No' ),@$project->active,['class' => 'form-control select2']); !!}
                    </div>
                </div>
                    
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info">{!! @$submit_text !!}</button>
                
                    <a href="{!! route('ruban.projects.index') !!}" class="btn btn-danger">{!! trans('ruban.cancel') !!}</a>
                   
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
              
            </div>
          </div>
          @section('page_js')
          {!! Html::style('assets/plugins/datepicker/datepicker3.css') !!}
          {!! Html::script('assets/plugins/datepicker/bootstrap-datepicker.js') !!}
          <script>
  $(function () {
    //Datepicker
    $('#start_date,#end_date').datepicker({
    format: 'dd-mm-yyyy'
})



  });
</script>

<script type="text/javascript">    
    $(document).ready(function() {
    $("#state_id").on('change',function() {
        var selected=$("#state_id option:selected").val();
        $.post( "{!! route('ruban.districts.getdistrict') !!}",{id:selected,_token:'{!! csrf_token() !!}'}, function( data ) {
        $( "#district_id" ).html( data );
        });
    });
    });
    
</script>
<script type="text/javascript">    
    $(document).ready(function() {
    $("#district_id").on('change',function() {
        var selected=$("#district_id option:selected").val();
        $.post( "{!! route('ruban.districts.gettaluk') !!}",{id:selected,_token:'{!! csrf_token() !!}'}, function( data ) {
        $( "#taluk_id" ).html( data );
        });
    });
    });
    
</script>
<script>
 $(document).ready(function() {
 
$("#projectval").validate(
   { 
     rules:{
       name:{required:true},
       taluk_id:{required:true},
       state_id:{required:true},
       district_id:{required:true},
        camps:{required:true},
       orders:{required:true},
       budget:{required:true},
       total_villagers:{required:true},
       deliver_time:{required:true},
       status:{required:true}
       },
       
       
     messages:{
       name:{
         required:"Project name is required"
       },
       taluk_id:{
         required:"Taluk is required"
       },
       state_id:{
         required:"State is required"
         
       },
       district_id:{
         required:"District is required"
         
       },
       camps:{
         required:"Camps is required"
         
       },
      orders:{
         required:"Orders is required"
       },
       budget:{
         required:"Budget is required"
       },
       total_villagers:{
         required:"Total villagers is required"
       },
       deliver_time:{
         required:"Deliver_time is required"
       },
       status:{
         required:"Status is required"
       }
       
       
       
     }
   });
   });
 
</script>
          @endsection
          
            
          
          
