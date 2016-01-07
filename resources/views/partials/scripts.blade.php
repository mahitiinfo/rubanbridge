<!-- REQUIRED JS SCRIPTS -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
<!-- jQuery 2.1.4 -->
{!! Html::script('assets/plugins/jQuery/jQuery-2.1.4.min.js') !!}    
<!-- Bootstrap 3.3.2 JS -->
{!! Html::script('assets/js/bootstrap.min.js') !!}    
<!-- AdminLTE App -->
{!! Html::script('assets/js/app.min.js') !!}    
{!! Html::script('assets/plugins/select2/select2.full.js') !!}    
{!! Html::script('assets/js/jquery.validate.min.js') !!}  
<script>
    $(function(){
      // turn the element to select2 select style
      $('.select2').select2();
    });
  </script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
