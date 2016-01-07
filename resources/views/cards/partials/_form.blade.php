 @if(@$card->start_date)
                      <?php 
                      $start_date=Carbon\Carbon::parse(@$card->start_date)->format('d-m-Y');
                      $end_date=Carbon\Carbon::parse(@$card->end_date)->format('d-m-Y');
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
                      {!! Form::label('project_id', trans('ruban.project.stitle'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::select('project_id',@$projects,@$card->project_id,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label('name', trans('ruban.card.name'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('name',@$card->name,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('camps', trans('ruban.card.camps'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('camps',@$card->camps,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('total_villagers', trans('ruban.card.total_villagers'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('total_villagers',@$card->total_villagers,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('camps', trans('ruban.card.budget'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('budget',@$card->budget,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('orders', trans('ruban.card.orders'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('orders',@$card->orders,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('deliver_time', trans('ruban.card.deliver_time'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('deliver_time',@$card->deliver_time,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('start_date', trans('ruban.card.start_date'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('start_date',@$start_date,array('class'=>'form-control','readonly'=>'readonly')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('end_date', trans('ruban.card.end_date'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::text('end_date',@$end_date,array('class'=>'form-control','readonly'=>'readonly')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('comments', trans('ruban.card.comments'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10">
                        {!! Form::textarea('comments',@$card->comments,array('class'=>'form-control')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                   {!! Form::label('image', trans('ruban.card.image'),array('class'=>'col-md-2 control-label')) !!}
                     <div class="col-md-10">
                     {!! Form::file('image') !!}
                    </div>
                    @if(@$card->image<>'')
                    {!! Html::image('uploads/cards/'.@$card->image,'',array('width'=>'200')) !!}
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('active',trans('ruban.active'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! Form::select('active', array('1' => 'Yes','0' => 'No' ),@$card->active,['class' => 'form-control select2']); !!}
                    </div>
                </div>
               <div class="form-group">
                    {!! Form::label('status',trans('ruban.status'),['class' => 'col-md-2 control-label']) !!}
                    <div class="col-md-10">
                    {!! Form::select('status', array('0'=>'In Progress','1' => 'Completed','2' => 'In Completed'),@$card->status,['class' => 'form-control select','placeholder'=>'Select a Type']); !!}
                    </div>
                </div>
                
                <div class="form-group">
                      {!! Form::label('sector_id', trans('ruban.card.sector'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10" id="sectordiv">
                        
                      </div>
                    </div>
                    <div class="form-group">
                      {!! Form::label('state_id', trans('ruban.card.state'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10" id="statediv">
                     
                        
                      </div>
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label('district_id', trans('ruban.card.regional_district'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10" id="districtdiv">
                     
                        
                      </div>
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label('taluk_id', trans('ruban.card.rtaluk'),array('class'=>'col-md-2 control-label')) !!}
                      <div class="col-sm-10" id="talukdiv">
                     
                        
                      </div>
                    </div>
                    
                    
                    <div id="googleMap" style="width:100%;height:380px;"></div>
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info">{!! @$submit_text !!}</button>
                    
                    <a href="{!! route('ruban.cards.index') !!}" class="btn btn-danger">{!! trans('ruban.cancel') !!}</a>
                  
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->
              
            </div>
          </div>
           {!! Form::hidden('sector_id',@$card->sector_id,array('class'=>'form-control')) !!}
                      {!! Form::hidden('district_id',@$card->district_id,array('class'=>'form-control')) !!}
                      {!! Form::hidden('state_id',@$card->state_id,array('class'=>'form-control')) !!}
                      {!! Form::hidden('taluk_id',@$card->taluk_id,array('class'=>'form-control')) !!}
          <?php
if(@$branch->latitude)
{
  $lat=@$branch->latitude;
}
else
{
  $lat='12.961448';
}
if(@$branch->longitude)
{
  $long=$branch->longitude;
}
else
{
  $long='77.585041';
}
?>

@section('page_js')
<script>
var polys =[];
  var map;
  var markersArray = [];
  function initMap()
  {
    var latlng = new google.maps.LatLng('<?php echo @$lat; ?>','<?php echo @$long; ?>');
    var myOptions = {
      zoom: 13,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("googleMap"), myOptions);
            //for the geo data
            geocoder = new google.maps.Geocoder();
            // add a click event handler to the map object
            google.maps.event.addListener(map, "click", function(event)
            {
                // place a marker
                placeMarker(event.latLng);

                // display the lat/lng in your form's lat/lng fields
                document.getElementById("latitude").value = event.latLng.lat();
                document.getElementById("longitude").value = event.latLng.lng();
                getAddress(event.latLng);
              });

          //get the address of location 
          function getAddress(latLng) {
            geocoder.geocode( {'latLng': latLng},
              function(results, status) {
                if(status == google.maps.GeocoderStatus.OK) {
                  if(results[0]) {
                    document.getElementById("address").value = results[0].formatted_address;
                  }
                  else {
                    document.getElementById("address").value = "No results";
                  }
                }
                else {
                  document.getElementById("address").value = status;
                }
              });
          }
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.
// Create the search box and link it to the UI element.
var input = document.getElementById('pac-input');
var searchBox = new google.maps.places.SearchBox(input);
map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });
  var markersArray = [];
  // [START region_getplaces]
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markersArray.forEach(function(marker) {
      marker.setMap(null);
    });
    markersArray = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        size: new google.maps.Size(12, 12),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      markersArray.push(new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.name,
        position: place.geometry.location
      }));

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
function placeMarker(location) {
            // first remove all markers if there are any
            deleteOverlays();

            var marker = new google.maps.Marker({
              position: location, 
              map: map
            });

            // add marker in markers array
            markersArray.push(marker);

            map.setCenter(location);
          }

        // Deletes all markers in the array by removing references to them
        function deleteOverlays() {
          if (markersArray) {
            for (i in markersArray) {
              markersArray[i].setMap(null);
            }
            markersArray.length = 0;
          }
        }
        // google.maps.event.addDomListener(window, 'load', initMap);
        
init();
        function changedetect(district,sectorid,state,taluk) {
         var selectedValues = district;//$(".changeselect2 :selected").val(); 
        var sector=sectorid;//$("#sector_id :selected").val();
         // console.log(selectedValues);
         // return false;
         var bounds = new google.maps.LatLngBounds();
         var i, tmp,
        myOptions = {
            zoom: 9,
            center: new google.maps.LatLng('<?php echo @$lat; ?>','<?php echo @$long; ?>'),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        },
        map = new google.maps.Map(document.getElementById("googleMap"), myOptions);
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
         $.ajax({
            type: "POST",
            url: "{!! route('ruban.districts.ajax') !!}",
            data: {values: selectedValues,sector:sector,state:state,taluk:taluk},
            success: function( msg ) {
              var message=jQuery.parseJSON(msg);
              
    // Loop through our array of markers & place each one on the map  
    
    jQuery.each(message, function(key, obj) {
    
    var infoWindowContent = 
        ['<div class="info_content">' +
        '<h3>'+message[key].district+'</h3>' +
        '<p>Taluk : '+message[key].taluk+'</p>' + 
        '<p>Village : '+message[key].name+'</p>' + 
        '<p>Total Population : '+message[key].population+'</p>' + 
        '<p>Male Population : '+message[key].malepopulation+'</p>' + 
        '<p>Female Population : '+message[key].femalepopulation+'</p>' +        '</div>'
    ];
    
        var position = new google.maps.LatLng(message[key].latitude, message[key].longtitude);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title:message[key].village
        });
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds)
              
      
      
            
              // console.log(message[key].location);
              polys[i++] = message[key].location;
              
              // console.log(key); // should be 'foo' following by 'bar'
          });
          
          
         
            }
        });
       }

// for the polygon to draw
  function init()
  {
     var i, tmp,
        myOptions = {
            zoom: 12,
            center: new google.maps.LatLng('<?php echo @$lat; ?>','<?php echo @$long; ?>'),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        },
        map = new google.maps.Map(document.getElementById("googleMap"), myOptions);
    for (i = 0; i < polys.length; i++) {
        tmp = parsePolyStrings(polys[i]);
console.log(tmp);
        if (tmp.length) {
            polys[i] = new google.maps.Polygon({
                paths : tmp,
                strokeColor : '#FF0000',
                strokeOpacity : 0.8,
                strokeWeight : 2,
                fillColor : '#FF0000',
                fillOpacity : 0.35
            });
            polys[i].setMap(map);
        }
    }
    var markers=[];
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
        

///get the parsed array from WKT points
       function parsePolyStrings(ps) {
    var i, j, lat, lng, tmp, tmpArr,
        arr = [],
        //match '(' and ')' plus contents between them which contain anything other than '(' or ')'
        m = ps.match(/\([^\(\)]+\)/g);
    if (m !== null) {
        for (i = 0; i < m.length; i++) {
            //match all numeric strings
            tmp = m[i].match(/-?\d+\.?\d*/g);
            if (tmp !== null) {
                //convert all the coordinate sets in tmp from strings to Numbers and convert to LatLng objects
                for (j = 0, tmpArr = []; j < tmp.length; j+=2) {
                    lat = Number(tmp[j]);
                    lng = Number(tmp[j + 1]);
                    tmpArr.push(new google.maps.LatLng(lat, lng));
                }
                arr.push(tmpArr);
            }
        }
    }
    //array of arrays of LatLng objects, or empty array
    return arr;
}
//

  }
      </script>
          {!! Html::style('assets/plugins/datepicker/datepicker3.css') !!}
          {!! Html::script('assets/plugins/datepicker/bootstrap-datepicker.js') !!}
          <script>
  $(function () {
  //changedetect();
  var projectid=$("#project_id option:selected").val();
  setdistrict(projectid)
  $("#project_id").on('change',function(){
  var projectid=$("#project_id option:selected").val();
  setdistrict(projectid)
  });
    //Datepicker
    $('#start_date,#end_date').datepicker({
    format: 'dd-mm-yyyy'
})



  });
  
  function setdistrict(projectid)
  {
   $.ajax({
            type: "POST",
            url: "{!! route('ruban.projects.ajax') !!}",
            data: {projectid: projectid,_token:'{!! csrf_token() !!}'},
            success: function( msg ) {
            
            var message=jQuery.parseJSON(msg);
            
            $("#sectordiv").html(message.sectorname);
            $("#districtdiv").html(message.districtname);
            $("#statediv").html(message.state);
            $("#talukdiv").html(message.taluk);
            $("#sector_id").val(message.sector_id);
            $("#district_id").val(message.district_id);
            $("#state_id").val(message.state_id);
            $("#taluk_id").val(message.taluk_id);
            changedetect(message.district_id,message.sector_id,message.district_id,message.taluk_id)
            
            }
            });
  }
</script>
          @endsection
          
