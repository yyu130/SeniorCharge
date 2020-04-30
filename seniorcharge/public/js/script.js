var map;
var myLatLng
$(document).ready(function (listener) {

    var query = document.getElementById("query").innerText;
    document.getElementById('submitBtn').addEventListener("click",findLocation(query));

    // $('submitBtn').click(function () {
    //     $.ajax({
    //         type: 'GET',
    //         url:'https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyDZsJRAorUhneET2Z6ohhvevUv5h1XQaLI',
    //         success: function (data) {
    //             createMap()
    //         },
    //     });
    // })
    function findLocation(query) {
        console.log(query)
        $.ajax({
            type: 'GET',
            url:'https://maps.googleapis.com/maps/api/geocode/json?address='+ query + '+Australia&key=AIzaSyDZsJRAorUhneET2Z6ohhvevUv5h1XQaLI',
            success: function (data) {
                createMap(data);
            },
        });
    }

    //geoLocationInit();
    function geoLocationInit() {
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(success,fail);
        }
        else{
            alter("Browser not supported");
        }
    }

    function success(position) {
        var latval=position.coords.latitude;
        var lngval=position.coords.longitude;

        console.log([latval,lngval]);


        createMap();
        //nearbySearch(myLatLng,'school');
        // searchStations(latval,lngval);
    }

    function fail() {
        alter("if fails");

    }

    function createMap(myData) {
            var longitudes = document.getElementsByClassName('longitude');
            var latitudes = document.getElementsByClassName('latitude');
            var names = document.getElementsByClassName('name');
            var addresses = document.getElementsByClassName('address');
            var opens = document.getElementsByClassName('open');
            var closes = document.getElementsByClassName('close');
            var types = document.getElementsByClassName('type');
            var selectedinfo;

            var lng = []
            var lat = []
            var sname = []
            var add = []
            var open = []
            var close = []
            var type = []
        for(longitude of longitudes){
                //console.log(longitude.innerText)
                lng.push(longitude.innerText);
            }

            for(latitude of latitudes){
                lat.push(latitude.innerText);
            }

            for(n of names){
                sname.push(n.innerText)
            }

            for(address of addresses){
                add.push(address.innerText)
            }

            for (o of opens){
                open.push(o.innerText)
            }

            for (c of closes){
                close.push(c.innerText)
            }

            for (t of types){
                type.push(t.innerText)
            }


            map = new google.maps.Map(document.getElementById('map'), {
            // center: new google.maps.LatLng(myData.results[0].geometry.location.lat,myData.results[0].geometry.location.lng),
                center: new google.maps.LatLng(lat[0],lng[0]),
                zoom: 12
            });
            console.log(lat[0],lng[0])

            for(i=0;i<lat.length;i++){
                var contentString = '<div style="font-weight: bold">' + sname[i] + '</div>' + "<br/>" +add[i] + "<br/>" + open[i] + "-" + close[i] + "<br/>" + type[i]

                var marker=new google.maps.Marker({
                    position: new google.maps.LatLng(lat[i],lng[i]),
                    map: map,
                    title: "Click for more details"
                });

                const infowindow = new google.maps.InfoWindow({
                    content: contentString
                })

                marker.addListener('click',function () {
                    if (selectedinfo != null && selectedinfo.getMap() != null){
                        selectedinfo.close();
                        if (selectedinfo ==infowindow){
                        selectedinfo = null;
                        return
                        }
                    }
                    selectedinfo = infowindow;
                    selectedinfo.open(map,this);
                })
                // google.maps.event.addListener(marker,'click',function (event) {
                //     infowindow.open(map,this);
                //     });
                // google.maps.event.addListener(marker,'click',function (event) {
                //     infowindow.close();
                // })
                 // marker.infowindow.close();

                // $.ajax({
                //     type: 'GET',
                //     // url:'https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='
                //     //     +myData.results[0].geometry.location.lat+','+myData.results[0].geometry.location.lng+'|'+lat[i]+','+lng[i]+
                //     //     '&key=AIzaSyDZsJRAorUhneET2Z6ohhvevUv5h1XQaLI',
                //     url:'https://maps.googleapis.com/maps/api/distancematrix/json?origins='
                //         +myData.results[0].formatted_address+'&destinations='+add[i]+'&departure_time=now&key=AIzaSyDZsJRAorUhneET2Z6ohhvevUv5h1XQaLI',
                //     success: function (data) {
                //         // distance.push(data.rows[0].elements[0].distance.text)
                //         // console.log(distance)
                //         // $.ajax({
                //         //     url:"/search",
                //         //     type: "POST",
                //         //     data: {distance: JSON.stringify(distance)},
                //         //     success:function (dis) {
                //         //         console.log(dis)
                //         //     }
                //         // })
                //         console.log(data)
                //     },
                //     error:function (data) {
                //         console.log(data)
                //     }
                // });
            }

            // var location = [
            //     ['test 1',-37.18961447,145.7081915],
            //     ['test 2',-38.18961447,145.7081915]
            // ]
            //
            // for (i=0;i<location.length;i++){
            //     var marker=new google.maps.Marker({
            //     position: new google.maps.LatLng(location[i][1],location[i][2]),
            //     map: map
            // });}
    }

    // function close() {
    //     if (InfoObj.length > 0){
    //         InfoObj[0].set("marker",null);
    //         InfoObj[0].close();
    //         InfoObj[0].length = 0;
    //     }
    // }

    function createMarker(latlng,icn) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: icn});
    }

    // function nearbySearch(myLatLng,type) {
    //     var request = {
    //         location: myLatLng,
    //         radius: '2500',
    //         type: [type]
    //     };
    //
    //     service = new google.maps.places.PlacesService(map);
    //     service.nearbySearch(request, callback);
    //
    //     function callback(results, status) {
    //
    //         //console.log(results);
    //         if (status == google.maps.places.PlacesServiceStatus.OK) {
    //             for (var i = 0; i < results.length; i++) {
    //                 var place = results[i];
    //                 latlng=place.geometry.location;
    //                 icn='https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
    //                 name=place.name;
    //                 createMarker(latlng,icn,name);
    //             }
    //         }
    //     }
    // }

    // function searchStations(lat,lng) {
    // $.post('http://localhost/api/searchStations',{lat:lat,lng:lng},function (match) {
    //     //console.log(match);
    //     $.each(match,function (i,val) {
    //         var glatval=val.lat;
    //         var glngval=val.lng;
    //         var gname=val.name;
    //         var GLatLng = new google.maps.LatLng(glatval,glngval);
    //         var gicn = "'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'"
    //         createMarker(GLatLng,gicn,gname);
    //     });
    // })
    // }
});

document.getElementById("checkBtn").addEventListener("click",ifAll);

    function ifAll() {
        var hours = document.getElementsByClassName('hour');

        for(h of hours){
                if (h.innerText == 0){
                        h.parentElement.parentElement.style.display = "none";
                }
        }
}

document.getElementById("reset").addEventListener("click",reSet);

    function reSet() {
        var hours = document.getElementsByClassName('hour');

        for(h of hours){
            if (h.innerText == 0){
                h.parentElement.parentElement.style.display = "table-row";
            }
        }
    }



