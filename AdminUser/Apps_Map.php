
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>-->
<!--<link rel="stylesheet" type="text/css" href="./style.css" />-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />
	
   
  </head>
  <body onload="FunMapPram('<?=$_REQUEST['FD']?>','<?=$_REQUEST['TD']?>',<?=$_REQUEST['e']?>)">
	<div class="container">
	
		<div id="map" style="height:450px;"></div> 
		<!--<section id="map" style="height:450px;"></section> class="offset-3 col-6"-->
		
		<?php /***************** Display If MultiStyle Open ***********/ ?>
		<div style="display: block;">
      <div class="controls zoom-control">
        <button class="zoom-control-in" title="Zoom In">+</button>
        <button class="zoom-control-out" title="Zoom Out">-</button>
      </div>
      <div class="controls maptype-control maptype-control-is-map">
        <button class="maptype-control-map" title="Show road map">Map</button>
        <button
          class="maptype-control-satellite"
          title="Show satellite imagery"
        >
          Satellite
        </button>
      </div>
      <div class="controls fullscreen-control">
        <button title="Toggle Fullscreen">
          <div
            class="fullscreen-control-icon fullscreen-control-top-left"
          ></div>
          <div
            class="fullscreen-control-icon fullscreen-control-top-right"
          ></div>
          <div
            class="fullscreen-control-icon fullscreen-control-bottom-left"
          ></div>
          <div
            class="fullscreen-control-icon fullscreen-control-bottom-right"
          ></div>
        </button>
      </div>
    </div>
    <?php /***************** Display If MultiStyle close ***********/ ?>
		
		
		<br />
		<p>Total Distance : <span id="total_distance"></span></p>
	</div> <!--AIzaSyDF2yYgo9uNdiKdVSrSpO9sUL1CAaDdSXg-->
	
 <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF9JTiDNVF34goBzwjfxPDNiO9WYYvQQA&callback=initMap&libraries=&v=weekly"></script>

	<script>
		
		function calculateDistance(lat1, lon1, lat2, lon2){
			var p = 0.017453292519943295;
			var c = Math.cos;
			var a = 0.5 - c((lat2 - lat1) * p)/2 + 
				  c(lat1 * p) * c(lat2 * p) * 
				  (1 - c((lon2 - lon1) * p))/2;
			return 12742 * Math.asin(Math.sqrt(a));
		}	
	
function FunMapPram(fd,td,ei)	
{	alert("aa");
    mapOptions: [{mapTypeId: google.maps.MapTypeId.SATELLITE}] 
 
	// This example adds an animated symbol to a polyline.
		var route = [];
		//fetch('http://vnrdev.in/flutterMap/')
		fetch('Apps_MapJson.php?fd='+fd+'&td='+td+'&ei='+ei)
		  .then(response => response.json())
		  .then(data => {
		      
		      alert(data);
		      
			for (let step = 0; step < data.length; step++) {
				var temp = {};
				temp['lat'] = parseFloat(data[step].DLat);
				temp['lng'] = parseFloat(data[step].DLong);
				route.push(temp);
			
				
				
			}
			
			var totalDistance = 0;
			for(var i = 0; i < route.length-1; i++){
				//debugger;
				totalDistance += calculateDistance(route[i]["lat"], route[i]["lng"], route[i+1]["lat"], route[i+1]["lng"]);
				
			}
			console.log('totalDistance :'+ totalDistance.toFixed(2) + 'km');
			document.getElementById("total_distance").innerHTML = totalDistance.toFixed(2) + 'km';
			initMap();
		  });
	
		function initMap() {
			//console.log("i'm called 54");
		  const map = new google.maps.Map(document.getElementById("map"), {
			center: { lat: route[0]['lat'], lng: route[0]['lng'] },
			zoom: 20,
			mapTypeId: "roadmap",
			//mapTypeId: "satellite",
            disableDefaultUI: true,
			
			//zoomControl: false,
            //scaleControl: true,
			
			/**************************
			
			mapTypeControl: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
      position: google.maps.ControlPosition.TOP_CENTER,
    },
    zoomControl: true,
    zoomControlOptions: {
      position: google.maps.ControlPosition.LEFT_CENTER,
    },
    scaleControl: true,
    streetViewControl: true,
    streetViewControlOptions: {
      position: google.maps.ControlPosition.LEFT_TOP,
    },
    fullscreenControl: true,

			
			**************************/
			

		  });
		  
		  
		 

		  
		  
		  initZoomControl(map);
          initMapTypeControl(map);
          initFullscreenControl(map);

		  
		  function initZoomControl(map) {
  document.querySelector(".zoom-control-in").onclick = function () {
    map.setZoom(map.getZoom() + 1);
  };

  document.querySelector(".zoom-control-out").onclick = function () {
    map.setZoom(map.getZoom() - 1);
  };
  map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(
    document.querySelector(".zoom-control")
  );
}

function initMapTypeControl(map) {
  const mapTypeControlDiv = document.querySelector(".maptype-control");

  document.querySelector(".maptype-control-map").onclick = function () {
    mapTypeControlDiv.classList.add("maptype-control-is-map");
    mapTypeControlDiv.classList.remove("maptype-control-is-satellite");
    map.setMapTypeId("roadmap");
  };

  document.querySelector(".maptype-control-satellite").onclick = function () {
    mapTypeControlDiv.classList.remove("maptype-control-is-map");
    mapTypeControlDiv.classList.add("maptype-control-is-satellite");
    map.setMapTypeId("hybrid");
  };
  map.controls[google.maps.ControlPosition.LEFT_TOP].push(mapTypeControlDiv);
}

function initFullscreenControl(map) {
  const elementToSendFullscreen = map.getDiv().firstChild;
  const fullscreenControl = document.querySelector(".fullscreen-control");
  map.controls[google.maps.ControlPosition.RIGHT_TOP].push(fullscreenControl);

  fullscreenControl.onclick = function () {
    if (isFullscreen(elementToSendFullscreen)) {
      exitFullscreen();
    } else {
      requestFullscreen(elementToSendFullscreen);
    }
  };

document.onwebkitfullscreenchange =
    document.onmsfullscreenchange =
    document.onmozfullscreenchange =
    document.onfullscreenchange =
      function () {
        if (isFullscreen(elementToSendFullscreen)) {
          fullscreenControl.classList.add("is-fullscreen");
        } else {
          fullscreenControl.classList.remove("is-fullscreen");
        }
      };
}

function isFullscreen(element) {
  return (
    (document.fullscreenElement ||
      document.webkitFullscreenElement ||
      document.mozFullScreenElement ||
      document.msFullscreenElement) == element
  );
}

function requestFullscreen(element) {
  if (element.requestFullscreen) {
    element.requestFullscreen();
  } else if (element.webkitRequestFullScreen) {
    element.webkitRequestFullScreen();
  } else if (element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if (element.msRequestFullScreen) {
    element.msRequestFullScreen();
  }
}

function exitFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  } else if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}

		  
		  
		  
		  //map.setTilt(45);
		  
		  
		



  

		  
		  
		  const lineSymbol = {
			path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
			scale: 2,
			strokeColor: "#393",
		  };
		  const line = new google.maps.Polyline({
			<!-- path: [ -->
			  <!-- { lat: 21.2290533, lng: 81.652911 }, -->
			  <!-- { lat: 21.6290533, lng: 81.452911 }, -->
			  <!-- { lat: 21.4290533, lng: 81.052911 }, -->
			  <!-- { lat: 21.2290533, lng: 81.652911 }, -->
			<!-- ], -->
			path: route,
			icons: [
			  {
				icon: lineSymbol,
				offset: "100%",
			  },
			],
			map: map,
		  });
		  animateCircle(line);
		  
		  
		} //initMap()

		// Use the DOM setInterval() function to change the offset of the symbol
		// at fixed intervals.
		function animateCircle(line) {
		  let count = 0;
		  window.setInterval(() => {
			count = (count + 1) % 200;
			const icons = line.get("icons");
			icons[0].offset = count / 2 + "%";
			line.set("icons", icons);
		  }, 20);
		}
		
} //function FunMapPram(fd,td,ei)			
		</script>	
  </body>
</html>