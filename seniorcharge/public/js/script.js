var map, directionsService, directionsRenderer;
var myLatLng
$(document).ready(function (listener) {

    var query = document.getElementById("query").innerText;
    document.getElementById('submitBtn').addEventListener("click",findLocation(query));
    document.getElementById('all').addEventListener("click",returnLocation);
    function returnLocation(){
        var query = document.getElementById("query").innerText;
        findLocation(query);
        document.getElementById('all').style.display = 'none';
        //document.getElementsByClassName('distance').style.display = 'none';
    }
    console.log(document.getElementById('all'))
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
    geoLocationInit();
    var routes = document.getElementsByClassName('route');

    for (var i = 0; i < routes.length; i++){
        routes[i].addEventListener('click', router);
    }

    function router() {
        console.log(this.parentElement.parentElement.parentElement.childNodes[3].childNodes[3].innerText)
        console.log(document.getElementById('current').innerText);

        document.getElementById('all').style.display = 'block';
         directionsService = new google.maps.DirectionsService();
         directionsRenderer = new google.maps.DirectionsRenderer();
         map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            center: {lat: 41.85, lng: -87.65}
        });
        directionsRenderer.setMap(map);
        //directionsRenderer.setPanel(document.getElementById('right-panel'));

        calculateAndDisplayRoute(directionsService, directionsRenderer, this.parentElement.parentElement.parentElement.childNodes[3].childNodes[3].innerText, document.getElementById('current').innerText);

        $.ajax({
                type: 'GET',
                async: false,
                // url:'https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='
                //     +myData.results[0].geometry.location.lat+','+myData.results[0].geometry.location.lng+'|'+lat[i]+','+lng[i]+
                //     '&key=AIzaSyDZsJRAorUhneET2Z6ohhvevUv5h1XQaLI',
                url:'https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/distancematrix/json?origins='
                    +document.getElementById('current').innerText+'&destinations='+this.parentElement.parentElement.parentElement.childNodes[3].childNodes[3].innerText+'&departure_time=now&key=AIzaSyDZsJRAorUhneET2Z6ohhvevUv5h1XQaLI',
                success: function (data) {
                    // console.log(dis[i].innerText);
                    // console.log(data.rows[0].elements[0].distance.text)
                    //distance.push(data.rows[0].elements[0].distance.text)
                    // var txt3 = document.createElement("ul");
                    // txt3.innerText = data.rows[0].elements[0].distance.text;
                    // this.parentElement.parentElement.childNodes[3].after(txt3);
                    var distance = document.getElementsByClassName('distance');
                    for (var i = 0; i < distance.length; i++){
                        distance[i].style.display = 'none';
                        distance[i].innerText =  data.rows[0].elements[0].distance.text;
                    }

                        //dis[index].innerText = data.rows[0].elements[0].distance.text;
                    //console.log(data.rows[0].elements[0].distance.text)

                     //distance.push(data.rows[0].elements[0].distance.text)

                    // $.ajax({
                    //     url:"test.blade.php",
                    //     type: "POST",
                    //     data: {distance: JSON.stringify(distance)},
                    //     success:function (dis) {
                    //         console.log(dis)
                    //     }
                    // })
                },
                error:function (data) {
                    console.log(data)
                }
            });
        this.parentElement.parentElement.parentElement.childNodes[3].childNodes[5].style.display = 'block';
            // console.log( this.parentElement.parentElement.childNodes)

    }

    function calculateAndDisplayRoute(directionsService, directionsRenderer, des, cur) {
        directionsService.route(
            {
                origin: {query: cur},
                destination: {query: des},
                travelMode: 'WALKING'
            },
            function(response, status) {
                if (status === 'OK') {
                    directionsRenderer.setDirections(response);
                } else {
                    window.alert('Directions request failed due to ' + status);
                }
            });
    }
    function geoLocationInit() {
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(success);
        }
        else{
            alter("Browser not supported");
        }
    }

    function success(position) {
        // var latval=position.coords.latitude;
        // var lngval=position.coords.longitude;
        //
        // console.log([latval,lngval]);
        // createMap(myLatLng);

        var geocoder = new google.maps.Geocoder();
        var latlng = {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)};
        geocoder.geocode({ 'location' :latlng  }, function (responses) {

            if (responses && responses.length > 0) {
                // $("#origin").val(responses[1].formatted_address);
                // $("#from_places").val(responses[1].formatted_address);
                //     console.log(responses[1].formatted_address);
                    document.getElementById('current').innerText = responses[1].formatted_address;
                    console.log(document.getElementById('current').innerText)
                // responses[1].formatted_address;
            } else {
                alert("Cannot determine address at this location.")
            }
        });
        //nearbySearch(myLatLng,'school');
        // searchStations(latval,lngval);
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
            //console.log(lat[0],lng[0])

            //var dis = document.getElementsByClassName('distance');
            //console.log(dis[0].innerText);

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
                });
                // google.maps.event.addListener(marker,'click',function (event) {
                //     infowindow.open(map,this);
                //     });
                // google.maps.event.addListener(marker,'click',function (event) {
                //     infowindow.close();
                // })
                 // marker.infowindow.close();
                //var distance = [];
                // this.getDistance(add[i],myData.results[0].formatted_address,dis[i]);
                // (function(index){
                // $.ajax({
                //     type: 'GET',
                //     async: false,
                //     // url:'https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='
                //     //     +myData.results[0].geometry.location.lat+','+myData.results[0].geometry.location.lng+'|'+lat[i]+','+lng[i]+
                //     //     '&key=AIzaSyDZsJRAorUhneET2Z6ohhvevUv5h1XQaLI',
                //     url:'https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/distancematrix/json?origins='
                //         +myData.results[0].formatted_address+'&destinations='+add[i]+'&departure_time=now&key=AIzaSyDZsJRAorUhneET2Z6ohhvevUv5h1XQaLI',
                //     success: function (data) {
                //         // console.log(dis[i].innerText);
                //         // console.log(data.rows[0].elements[0].distance.text)
                //         //distance.push(data.rows[0].elements[0].distance.text)
                //         dis[index].innerText = data.rows[0].elements[0].distance.text;
                //
                //          //distance.push(data.rows[0].elements[0].distance.text)
                //
                //         // $.ajax({
                //         //     url:"test.blade.php",
                //         //     type: "POST",
                //         //     data: {distance: JSON.stringify(distance)},
                //         //     success:function (dis) {
                //         //         console.log(dis)
                //         //     }
                //         // })
                //     },
                //     error:function (data) {
                //         console.log(data)
                //     }
                // });
                // })(i);
                //dis[i].innerText = distance[i];
            }
        //console.log(distance)
        // for(i=0;i<lat.length;i++){
        //     dis[i].innerText = distance[i];
        // }
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
    // function getDistance(add,postcode) {
    //     var distance = [];
    //
    //     $.ajax({
    //         type: 'GET',
    //         async: false,
    //         // url:'https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='
    //         //     +myData.results[0].geometry.location.lat+','+myData.results[0].geometry.location.lng+'|'+lat[i]+','+lng[i]+
    //         //     '&key=AIzaSyDZsJRAorUhneET2Z6ohhvevUv5h1XQaLI',
    //         url:'https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/distancematrix/json?origins='
    //             +postcode+'&destinations='+add+'&departure_time=now&key=AIzaSyDZsJRAorUhneET2Z6ohhvevUv5h1XQaLI',
    //         success: function (data) {
    //             // console.log(dis[i].innerText);
    //             // console.log(data.rows[0].elements[0].distance.text)
    //             distance.push(data.rows[0].elements[0].distance.text)
    //             // dis[i].innerText = data.rows[0].elements[0].distance.text;
    //
    //             //distance.push(data.rows[0].elements[0].distance.text)
    //
    //             // $.ajax({
    //             //     url:"test.blade.php",
    //             //     type: "POST",
    //             //     data: {distance: JSON.stringify(distance)},
    //             //     success:function (dis) {
    //             //         console.log(dis)
    //             //     }
    //             // })
    //         },
    //         error:function (data) {
    //             console.log(data)
    //         }
    //     });
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

// document.getElementById("checkBtn").addEventListener("click",ifAll);
//
//     function ifAll() {
//         var hours = document.getElementsByClassName('hour');
//
//         for(h of hours){
//                 if (h.innerText == 0){
//                         h.parentElement.parentElement.style.display = "none";
//                 }
//         }
// }
//
// document.getElementById("reset").addEventListener("click",reSet);
//
//     function reSet() {
//         var hours = document.getElementsByClassName('hour');
//
//         for(h of hours){
//             if (h.innerText == 0){
//                 h.parentElement.parentElement.style.display = "table-row";
//             }
//         }
//     }

    document.getElementById("write").addEventListener("click",displayReview);
    function displayReview() {
        var form = document.getElementById('reviewForm');

        if (form.style.display == 'none'){
            form.style.display = 'block';
        }
    }

const stars = document.querySelector(".ratings").children;
const ratingValue = document.querySelector("#rating");
let index;
    for(let i=0; i<stars.length; i++){
        stars[i].addEventListener("mouseover",function () {
            // console.log(i)
            for (let j=0; j<stars.length;j++){
                stars[j].classList.remove("fa-star")
                stars[j].classList.add("fa-star-o")
            }
            for (let j=0; j<=i;j++){
                stars[j].classList.remove("fa-star-o")
                stars[j].classList.add("fa-star")
            }
        })
        stars[i].addEventListener("click",function () {
            ratingValue.value=i+1;
            // console.log(ratingValue);
            index=i;
        })
        stars[i].addEventListener("mouseout",function () {
            for (let j=0;j<stars.length;j++){
                stars[j].classList.remove("fa-star");
                stars[j].classList.add("fa-star-o");
            }
            for (let j=0; j<=index;j++){
                stars[j].classList.remove("fa-star-o")
                stars[j].classList.add("fa-star")
            }
        })
    }

    // $(document).ready(function () {
    //     $('input:checkbox').click(function () {
    //         $('input:checkbox').not(this).prop('checked',false)
    //     });
    // });
$("input:checkbox").on('click', function() {
    // in the handler, 'this' refers to the box clicked on
    var $box = $(this);
    if ($box.is(":checked")) {
        // the name of the box is retrieved using the .attr() method
        // as it is assumed and expected to be immutable
        var group = "input:checkbox[name='" + $box.attr("name") + "']";
        // the checked state of the group/box on the other hand will change
        // and the current value is retrieved using .prop() method
        $(group).prop("checked", false);
        $box.prop("checked", true);
    } else {
        $box.prop("checked", false);
    }
});



