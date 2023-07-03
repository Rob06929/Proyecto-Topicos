<!DOCTYPE html>
<html> 
<head> 
    <title>Draw Circles using Google Map API</title> 
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDhgSSTzKOzLw-maUH2Q6DxF_7EBAQkdU0"></script>
    <!--PLEASE NOTE: As of June 22 2016, Google Maps require an API key.
    * GET YOUR API KEY FROM ... https://developers.google.com/maps/documentation/javascript/get-api-key
    * ONCE YOU GET THE KEY, REPLACE 'js?sensor=false' IN THE ABOVE URL WITH "js?key=YOUR_NEW_API_KEY".--> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software de Denuncias</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>


    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-gradient-to-r from-neutral-50 to-green-500">
        <div class="sm:fixed sm:top-0 sm:left-0 p-6 text-right">
                <img src="img/escudo.png"  width="200" height="300"  alt="escudo de santa cruz de la sierra">
        </div>

        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                <a href="{{route('login')}}" class="font-semibold text-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                <a href="{{route('register')}}" class="ml-4 font-semibold text-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Sistema de Registro de Denuncias en Santa Cruz de la Sierra</h1>
            </div>
            <div class="flex items-start justify-start h-screen w-screen bg-green-100 flex-col p-4">
        
                <div id="mapContainer" class="my-3 mx-8 border-2 border-neutral-950 rounded-lg shadow-2xl" style="width:1100px;height:850px;"></div>
    
                <div class="ml-8 flex items-center">
                    <div class="flex">
                        <label for="opciones" class="block text-gray-700">Radio de busqueda</label>
                        <select id="opciones_radio" name="opciones" class="border border-gray-300 rounded ml-1">
                          <option value="100" selected>100 metros</option>
                          <option value="500">500 metros</option>
                          <option value="1000">1000 metros</option>
                          <option value="1500">1500 metros</option>
                          
                        </select>
                    </div>
                    
    
                </div>
            
            </div>

        </div>
    </div>


    
</body>

<script>
    let colorDenuncias={
        "1":"amarillo",
        "2":"azul",
        "3":"rojo"
    }

    let radio=100;

    let listaDenuncias=[
        {
            "long":-17.764815658242302,
            "lat":-63.14758807547891,
            "titulo":"titulo de denuncia",
            "descripcion":"descripcion de la denuncia"
        },
        {
           
            "long": -17.79246533947284,
            "lat":-63.18785592105194,
            "titulo":"titulo de denuncia",
            "descripcion":"descripcion de la denuncia"
        }
    ];

    const selectElement = document.getElementById('opciones_radio');

    
    // LOCATION IN LATITUDE AND LONGITUDE.
    var center = new google.maps.LatLng(-17.78629,-63.18117 );     

    function initialize() {
        // MAP ATTRIBUTES.
        var mapAttr = {
            center: center,
            zoom: 15,
            mapTypeId: "satellite"
        };

        // THE MAP TO DISPLAY.
        var map = new google.maps.Map(document.getElementById("mapContainer"), mapAttr);

        var circle = new google.maps.Circle({
            center: center,
            map: map,
            radius: radio,          // IN METERS.
            fillColor: '#FF6600',
            fillOpacity: 0.3,
            strokeColor: "#FF6600",
            strokeWeight: 2,
            strokeOpacity: 0.8,     // DON'T SHOW CIRCLE BORDER.
        });

        selectElement.addEventListener('change', function() {
            radio = selectElement.value;
            console.log(radio); // Imprimir el valor de la opción seleccionada cuando cambia el valor del select
            //circle.setMap(null);
            circle.setRadius(parseInt(radio));

        });
        
       
        var markers=[];

        var datos= {};//json_encode($datos) ;
        // Iterar sobre el array en JavaScript
            for (var i = 0; i < datos.length; i++) {
                    let pos={ lat: parseFloat(datos[i]["latitud"]), lng: parseFloat(datos[i]["longitud"]) };
                    const marker = new google.maps.Marker({
                        position: pos,
                        map,
                        icon: "/images/marker-"+colorDenuncias[datos[i]["id_tipo"]]+".png",
                        title:datos[i]["titulo"],
                    });
                    console.log(colorDenuncias[datos[i]["id_tipo"]]);
        
                    markers.push(marker);
                    
            }

            for (let i = 0; i < datos.length; i++) {
                let pos={ lat: parseFloat(datos[i]["latitud"]), lng: parseFloat(datos[i]["longitud"]) };

                const element = markers[i];
                const infowindow = new google.maps.InfoWindow({
                    content: "content"+i,
                    ariaLabel: datos[i]["titulo"],
                });
            

                markers[i].addListener("click", () => {
                    infowindow.open({
                    anchor: markers[i],
                    map,
                    });
        });
    }
    
        
    }
        /*const myLatlng = { lat:-17.78629, lng:-63.18117 };

        let infoWindow = new google.maps.InfoWindow({
            content: "Click the map to get Lat/Lng!",
            position: myLatlng,
        });

        infoWindow.open(map);
        // Configure the click listener.
        map.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
        });
        infoWindow.setContent(
        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
        );
        infoWindow.open(map);*
        });
    }*/

    /* Function for adding a marker to the page.
    function addMarker(location) {
        marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }

    // Testing the addMarker function
    CentralPark = new google.maps.LatLng(37.7699298, -122.4469157);
    addMarker(CentralPark);*/

      // Create the initial InfoWindow.


    google.maps.event.addDomListener(window, 'load', initialize);
</script>
</html>