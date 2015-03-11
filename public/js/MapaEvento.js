function initialize() {
  var a =-41.1416606;
  var b =-71.3053098;
  var cord=document.getElementsByName("coordenadas")[0].value;
  var patron="(";
  cord=cord.replace(patron,'');
  cord=cord.replace(")",'');
  //alert(cord);
  var myLatlng = new google.maps.LatLng(a,b);
  alert(myLatlng.lat());
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