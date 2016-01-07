 @if(@$camp->start_date)
                      <?php 
                      $start_date=Carbon\Carbon::parse(@$camp->start_date)->format('d-m-Y');
                      $end_date=Carbon\Carbon::parse(@$camp->end_date)->format('d-m-Y');
                      ?>
                      @endif
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
                      {!! Form::label('name', trans('ruban.camp.name'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                      @if(@$camp->id)
                      {!! @$camp->name !!}
                      @else
                        {!! Form::text('name',@$camp->name,array('class'=>'form-control')) !!}
                        @endif
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('no_of_people', trans('ruban.camp.no_of_people'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                      @if(@$camp->id)
                      {!! @$camp->no_of_people !!}
                      @else
                        {!! Form::text('no_of_people',@$camp->no_of_people,array('class'=>'form-control')) !!}
                        @endif
                      </div>
                    </div>
                   <!-- <div class="form-group">
                      {!! Form::label('target', trans('ruban.camp.target'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                       @if(@$camp->id)
                      {!! @$camp->target !!}
                      @else
                        {!! Form::text('target',@$camp->target,array('class'=>'form-control')) !!}
                        @endif
                      </div>
                    </div>-->
                    <div class="form-group">
                      {!! Form::label('budget', trans('ruban.camp.budget'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                       @if(@$camp->id)
                      {!! @$camp->budget !!}
                      @else
                        {!! Form::text('budget',@$camp->budget,array('class'=>'form-control')) !!}
                        @endif
                      </div>
                    </div>
                    @if(@$camp->id)
                    <div class="form-group">
                      {!! Form::label('actual_budget', trans('ruban.camp.actual_budget'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('actual_budget',@$camp->actual_budget,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    @endif
                    <div class="form-group">
                      {!! Form::label('order', trans('ruban.camp.order'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                       @if(@$camp->id)
                      {!! @$camp->order !!}
                      @else
                        {!! Form::text('order',@$camp->order,array('class'=>'form-control')) !!}
                        @endif
                      </div>
                    </div>
                    @if(@$camp->id)
                    <div class="form-group">
                      {!! Form::label('actual_order', trans('ruban.camp.actual_order'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('actual_orders',@$camp->actual_orders,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    @endif
                     <div class="form-group">
                      {!! Form::label('deliver_time', trans('ruban.camp.deliver_time'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                       @if(@$camp->id)
                      {!! @$camp->order !!}
                      @else
                        {!! Form::text('deliver_time',@$camp->deliver_time,array('class'=>'form-control')) !!}
                        @endif
                      </div>
                    </div>
                    @if(@$camp->id)
                    <div class="form-group">
                      {!! Form::label('actual_deliver_time', trans('ruban.camp.actual_deliver_time'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('actual_deliver_time',@$camp->actual_deliver_time,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    @endif
                    <div class="form-group">
                      {!! Form::label('start_date', trans('ruban.camp.start_date'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('start_date',@$start_date,array('class'=>'form-control','readonly'=>'readonly')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('end_date', trans('ruban.camp.end_date'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('end_date',@$end_date,array('class'=>'form-control','readonly'=>'readonly')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('latitude', trans('ruban.camp.latitude'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('latitude',@$camp->latitude,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('longitude', trans('ruban.camp.longitude'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('longitude',@$camp->longitude,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('address', trans('ruban.camp.address'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::textarea('address',@$camp->address,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    @if(@$camp->id)
                    <div class="form-group">
                      {!! Form::label('comments', trans('ruban.camp.comments'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::textarea('comments',@$camp->comments,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    @endif
                    
                    @if(@$campsdd->id)
                    <div class="form-group">
                      {!! Form::label('village_details', 'Village Details',array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::textarea('village_details',@$camp->village_details,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    @endif
                    
                     
                
                @if(@$camp->id)
                <?php
                $options['0']='Planned';
                $options['1']='Completed';
                $options['2']='Incompleted';
                $options['3']='In Progress';
               
                ?>
                <div class="form-group">
                      {!! Form::label('status', trans('ruban.camp.status'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::select('status',$options,@$camp->status,array('class'=>'form-control','Placeholder'=>'Select Status')) !!}
                      </div>
                    </div>
                
                   @endif 
                    <input id="pac-input" class="controlsmap" type="text" placeholder="Search Box">
                    <div id="googleMap" style="width:100%;height:380px;"></div>
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info">{!! @$submit_text !!}</button>
                    <a href="{!! route('ruban.cards.show',array($card_id)) !!}" class="btn btn-danger">{!! trans('ruban.cancel') !!}</a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
              
            </div>
          </div>
<style>

      .controlsmap {
        margin-top: 16px !important;
        border: 1px solid transparent !important;
        border-radius: 2px 0 0 2px !important;
        box-sizing: border-box !important;
        -moz-box-sizing: border-box !important;
        height: 32px !important;
        outline: none !important;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3) !important;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
.tagit{margin:0 !important;width:100%;float:left;}

    </style>

<?php
if(@$camp->latitude)
{
$lat=@$camp->latitude;
}
else
{
$lat='12.961448';
}
if(@$camp->longitude)
{
$long=$camp->longitude;
}
else
{
$long='77.585041';
}
?>

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
        var map;
        var markers = [];
        var lat=$("#latitude").val();
        var long=      $("#longitude").val(); 
        var geocoder;
        var bounds;

        function initialize() {
                var haightAshbury = new google.maps.LatLng('<?php echo $lat; ?>','<?php echo $long; ?>');
                var mapOptions = {
                zoom: 13,
                center: haightAshbury,
                mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById('googleMap'),
                mapOptions);
                geocoder = new google.maps.Geocoder();
                
                
                //
                
                var bounds = new google.maps.LatLngBounds();
    var myLatLng = new google.maps.LatLng('<?php echo $lat; ?>','<?php echo $long; ?>');
    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map
    });
    bounds.extend(myLatLng);
  map.fitBounds(bounds);
  
  


                // This event listener will call addMarker() when the map is clicked.
                google.maps.event.addListener(map, 'click', function(event) {
                deleteMarkers();
                addMarker(map,event.latLng);
                getAddress(event.latLng);
                $("#latitude").val(event.latLng.lat());
                $("#longitude").val(event.latLng.lng());
                });

                // Adds a marker at the center of the map.
                addMarker(map,haightAshbury);
                
                // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');
                var searchBox = new google.maps.places.SearchBox(input);
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
                });


                 var markers = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {

                var places = searchBox.getPlaces();

                if (places.length == 0) {
                return;
                }
                markers.forEach(function(marker) {
                marker.setMap(null);
                });


                // For each place, get the icon, place name, and location.
                markers = [];
                bounds = new google.maps.LatLngBounds();
                
                places.forEach(function(place) {
                
               $("#latitude").val(place.geometry.location.lat());
                $("#longitude").val(place.geometry.location.lng());
                document.getElementById("address").value = place.name+', '+place.formatted_address;
                
                //add marker
                
                 var marker = new google.maps.Marker({
                position: place.geometry.location,
                map: map
                });
                markers.push(marker);
                var infowindow = new google.maps.InfoWindow();
                google.maps.event.addListener(marker, 'click', function(event) {
                        infowindow.setContent(place.name+', '+place.formatted_address);
                        infowindow.open(map, this);

                });
                

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });

                map.fitBounds(bounds);
                });
                // [END region_getplaces]

        }
        

        // Add a marker to the map and push to the array.
        function addMarker(newmap,location) {
                var marker = new google.maps.Marker({
                position: location,
                map: newmap
                });
                markers.push(marker);
                var infowindow = new google.maps.InfoWindow();
                google.maps.event.addListener(marker, 'click', function(event) {
                        getAddress(event.latLng);
                        $("#latitude").val(event.latLng.lat());
                        $("#longitude").val(event.latLng.lng());
                        geocoder.geocode( {'latLng': event.latLng},
                        function(results, status) {

                        if(status == google.maps.GeocoderStatus.OK) {
                        if(results[0]) {
                        infowindow.setContent(results[0].formatted_address);
                        }
                        else {
                        infowindow.setContent('');
                        }
                        }
                        else {
                        infowindow.setContent(status);
                        }
                        });

                        infowindow.open(map, this);

                });
        }

        // Sets the map on all markers in the array.
        function setAllMap(map) {
                for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
                }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
                setAllMap(null);
        }

        // Shows any markers currently in the array.
        function showMarkers() {
                setAllMap(map);
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
                clearMarkers();
                markers = [];
        }

        function getAddress(latLng) {
                geocoder.geocode( {'latLng': latLng},
                function(results, status) {
                        if(status == google.maps.GeocoderStatus.OK) {
                                if(results[0]) {
                                        document.getElementById("address").value = results[0].formatted_address;
                                }
                                else {
                                        document.getElementById("address").value = "";
                                }
                        }
                        else {
                                document.getElementById("address").value = status;
                        }
                });
        }
        
        function geocodeAddress(geocoder, resultsMap,place) {
        
      
  var address = document.getElementById('pac-input').value;
 //console.log(address);
  geocoder.geocode({'address': address.trim()}, function(results, status) {
  
//  console.log(results);
    if (status === google.maps.GeocoderStatus.OK) {
    addMarker(resultsMap,results[0].geometry.location);
    getAddress(results[0].geometry.location);
     $("#latitude").val(results[0].geometry.location.lat());
                $("#longitude").val(results[0].geometry.location.lng());
                document.getElementById("address").value = results[0].formatted_address;
     
   } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  }); 
}


        google.maps.event.addDomListener(window, 'load', initialize);
</script>
         
          @endsection
          
