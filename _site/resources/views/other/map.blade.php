<script src="https://maps.google.com/maps/api/js"></script>
<script>
    function regular_map() {

        var latitude = {!! json_encode($fund->latitude) !!};
        var longitude = {!! json_encode($fund->longitude) !!};

        var var_location = new google.maps.LatLng(latitude, longitude);

        var var_mapoptions = {
            center: var_location,
            zoom: 14
        };

        var var_map = new google.maps.Map(document.getElementById("map-container"),var_mapoptions);

        var var_marker = new google.maps.Marker({
            position: var_location,
            map: var_map,
        });
    }
    // Initialize maps
    google.maps.event.addDomListener(window, 'load', regular_map);
</script>