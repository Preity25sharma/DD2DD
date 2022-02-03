
<html>
 <head>
    <title>MapmyIndia Plugin - Search Plugin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="desciption" content="Mapmyindia Search Plugin">
    <script src="https://apis.mapmyindia.com/advancedmaps/v1/196b026b-9137-455e-a657-63d5c3dc2964/map_load?v=1.5"></script>
    <script src="https://apis.mapmyindia.com/advancedmaps/api/196b026b-9137-455e-a657-63d5c3dc2964/map_sdk_plugins"></script>
    <style>
        body{margin: 0}
        #map{
            width: 100%; height: 100vh;margin:0;padding: 0;
        }
        .infoCls_map{margin-top: 60px !important;min-width: 300px}
       
    </style>
    </head>
    <body>
        <div id="map"></div>
        <script>
         /*Map Initialization*/
          var map = new MapmyIndia.Map('map', {center: [28.09, 78.3], zoom: 5, search: false});
          
          /*Search plugin initialization*/
            var optional_config={
                location:[28.61, 77.23],
               /* pod:'City',
                bridge:true,
                tokenizeAddress:true,*
                filter:'cop:9QGXAM',
                distance:true,
                width:300,
                height:300*/
            };
            new MapmyIndia.search(document.getElementById("autocomplete"),optional_config,callback);
            
            /*CALL for fix text - LIKE THIS
             * 
             new MapmyIndia.search("agra",optional_config,callback);
             * 
             * */

            var marker;
            function callback(data) { 
                if(data)
                {
                    if(data.error)
                    {
                        if(data.error.indexOf('responsecode:401')!==-1){
                        /*TOKEN EXPIRED, set new Token ie. 
                         * MapmyIndia.setToken(newToken);
                         */
                        }
                        console.warn(data.error);
                        
                    }
                    else
                    {
                            var dt=data[0];
                            if(!dt) return false;
                            var eloc=dt.eLoc;
                            var lat=dt.latitude,lng=dt.longitude;
                            
                            var place=dt.placeName+(dt.placeAddress?", "+dt.placeAddress:"");
                            //document.getElementById('srceLoc').value=eloc;
                            /*Use elocMarker Plugin to add marker*/
                            
                            if(marker) marker.remove();
                            if(eloc) marker=new MapmyIndia.elocMarker({map:map,eloc:lat?lat+","+lng:eloc,popupHtml:place,popupOptions:{openPopup:true}}).fitbounds();
                    }
                }
              }
              new MapmyIndia.search(document.getElementById("autocomplete1"),optional_config,callback);
              var marker;
            function callback(data) { 
                if(data)
                {
                    if(data.error)
                    {
                        if(data.error.indexOf('responsecode:401')!==-1){
                        /*TOKEN EXPIRED, set new Token ie. 
                         * MapmyIndia.setToken(newToken);
                         */
                        }
                        console.warn(data.error);
                        
                    }
                    else
                    {
                            var dt=data[0];
                            if(!dt) return false;
                            var eloc=dt.eLoc;
                            var lat=dt.latitude,lng=dt.longitude;
                            
                            var place=dt.placeName+(dt.placeAddress?", "+dt.placeAddress:"");
                            document.getElementById('desteLoc').value=eloc;
                            /*Use elocMarker Plugin to add marker*/
                            if(marker) marker.remove();
                            if(eloc) marker=new MapmyIndia.elocMarker({map:map,eloc:lat?lat+","+lng:eloc,popupHtml:place,popupOptions:{openPopup:true}}).fitbounds();
                    }
                }
              }
       </script>
    </body>
</html>
             