function initialize() {
  var a =document.getElementsByName("Latitud")[0].value;
  var b =document.getElementsByName("Longitud")[0].value;
  //alert(cord);
  var myLatlng = new google.maps.LatLng(a,b);
  var mapOptions = {
    zoom: 14,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('mapaevento'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });
}
//-41.1416606, -71.3053098