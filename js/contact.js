                    
                    
                    var lat = 0;
                    var long = 0;
                    window.onload=getLocation();
                    
                    function initMap()
                    {   
                        var location = {lat: lat, lng: long};
                        var map = new google.maps.Map(document.getElementById("map"),{
                           zoom:12,
                           center: location
                        });
                        var marker = new google.maps.Marker({
                            position:location,
                            map: map
                        });
                    }
                    var x = document.getElementById("demo");
                    function getLocation() 
                    {
                        if (navigator.geolocation) {
                          navigator.geolocation.getCurrentPosition(showPosition);
                        } else { 
                        }
                    }

                    function showPosition(position) 
                    {
                        lat = position.coords.latitude;
                        long = position.coords.longitude;
                        document.getElementById("latitude").value="Latitude: " + lat.toPrecision(5);
                        document.getElementById("longitude").value="Longitude: " + long.toPrecision(5);
                        initMap();
                    }