<!DOCTYPE html>
<html>
<head>
	<title>Current Location </title>
</head>
<body>
	<h1>Lets Trace your Location.</h1>
	<button onClick="getLocation()" >get location</button>
	<div id="output"></div>
	<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
<!-- 	<script src="bootstrap/dist/js/bootstrap.min.js"></script> -->
	<script >
		
		var x = document.getElementById('output');
		function getLocation(){
			if (navigator.geolocation){
				navigator.geolocation.getCurrentPosition(showPosition,showError);
			}else{
				x.innerHTML = "Browser not Support";
			}
		}
			function showPosition(position){

					x.innerHTML= "latitude= "+position.coords.latitude;
					x.innerHTML +="<br />"
					x.innerHTML += "longitude= "+position.coords.longitude;

					var locAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng=22.12,77.122&sensor=true&key=AIzaSyA5FxV9n5v8kWniZHHik9zXPCD7da4QO50";
			  
			   
/*x.innerHTML = locAPI;*/

					$.get({
						url : locAPI,
						success : function(data){
							console.log(data);

							x.innerHTML = locAPI;
							x.innerHTML = data.results[0].address_components[1].long_name+", ";
							x.innerHTML += data.results[0].address_components[0].long_name+", ";
							x.innerHTML += data.results[0].address_components[0].long_name;
						}
					});
			}

			//show error 
			function showError(error){
						switch(error.code){
							case error.PERMISSION_DENIED :
							x.innerHTML = "code: "+error.code+" User dont want to share location";
							break;

							case error.POSITION_UNAVAILABLE :
							x.innerHTML = "code: "+error.code+" User location IS NOT AVAILABLE" ;
							break;

							case error.TIMEOUT :
							x.innerHTML = "code: "+error.code+"TIMEOUT";
							break;

							case error.UNKNOWN_ERROE :
							x.innerHTML = "code: "+error.code+"THERE IS SOMETING  UNKNOWN ERROR ";
							break;
						}

					}
	</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrIepVIGEGWfNRCwi1oCpi-EWjYIzowHE&callback=myMap"></script>
</body>
</html>