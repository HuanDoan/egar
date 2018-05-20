$(document).ready(function(){
    var inpLng = $('input[name=lat]');
    var inpLat = $('input[name=lng]');

    map = new GMaps({
        div: '#Maps',
        lat: 10.8697373,
        lng: 106.8011863,
        enableNewStyle: true,
        click: function(e) {
            //alert( "Latitude: "+e.latLng.lat()+" "+", longitude: "+e.latLng.lng() );
            inpLat.val(e.latLng.lat());
            inpLng.val(e.latLng.lng());
            addMarker(map, e.latLng.lat(), e.latLng.lng());
          },
      });
    map.addMarker({
        lat: 10.8697373,
        lng: 106.8011863,
        title: 'Đại học Công nghệ thông tin ĐHQG HCM',
        click: function(e) {
          alert('You clicked in this marker');
        }
    });

    $('input[name=search]').keypress(function(e){
        var _this = $(this);
        if ( e.which == 13 ) {
            e.preventDefault();
            GMaps.geocode({
                address: _this.val(),
                callback: function(results, status){
                    if(status == 'OK'){
                        var latlng = results[0].geometry.location;
                        addMarker(map, latlng.lat(), latlng.lng());
                        inpLat.val(latlng.lat());
                        inpLng.val(latlng.lng());
                    }
                }
            });
        }
    });

    $('input[name=lat]').keypress(function(e){
        if ( e.which == 13 ) {
            e.preventDefault();
            var latval = $(this).val();
            var lngval = $('input[name=lng]').val();
            if(latval != '' && lngval != ''){
                addMarker(map, latval, lngval);
            }
        }
    });

    $('input[name=lng]').keypress(function(e){
        if ( e.which == 13 ) {
            e.preventDefault();
            var lngval = $(this).val();
            var latval = $('input[name=lat]').val();
            if(latval != '' && lngval != ''){
                addMarker(map, latval, lngval);
            }
        }
    });
});

function addMarker(mapObj, lat, lng){
    mapObj.removeMarkers();
    mapObj.setCenter(lat, lng);
    mapObj.addMarker({
        lat: lat,
        lng: lng,
    });
}