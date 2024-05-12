<?php 
session_start();
if($_SESSION['login'] = true){require_once('config/config.php');} else {$msg= "Session Expiry...............";}

//require_once('config/config.php');
include("../function.php");
if(check_user()==false){header('Location:../index.php');}
require_once('logcheck.php');
if($_SESSION['logCheckUser']!=$logadmin){header('Location:../index.php');}
if($_SESSION['login'] = true){require_once('AdminMenuSession.php');} else {$msg= "Session Expiry...............";}
date_default_timezone_set('Asia/Calcutta');
?>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php include_once('../Title.php'); ?></title>

<link type="text/css" href="css/body.css" rel="stylesheet"/>
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<style>.font4 { color:#1FAD34; font-family:Georgia; font-size:15px;} .All{font-size:11px; height:18px;} .All_80{font-size:11px; height:18px; width:80px;} .All_50{font-size:11px; height:18px; width:50px;} .All_100{font-size:11px; height:18px; width:100px;} .All_120{font-size:11px; height:18px; width:120px;} .All_150{font-size:11px; height:18px; width:150px;}.All_200{font-size:11px; height:18px; width:200px;} .All_350{font-size:11px; height:18px; width:350px;} .th{font-family:Times New Roman;font-size:12px;font-weight:bold;text-align:center;color:#FFFFFF; background-color:#376A9D;height:26px;} 

.tdl{font-family:Times New Roman;font-size:14px;color:#000000;}
.tdr{font-family:Times New Roman;font-size:12px;text-align:right;color:#000000;}
.tdc{font-family:Times New Roman;font-size:12px;text-align:center;color:#000000;}
.selecti{font-family:Times New Roman;font-size:12px;background-color:#DDFFBB;}
.inner_table{height:550px;overflow-y:auto;width:auto;}
</style>
<link rel="stylesheet" type="text/css" href="src/css/jscal2.css"/><?php /* Calander Open */?>
<link rel="stylesheet" type="text/css" href="src/css/border-radius.css"/>
<link rel="stylesheet" type="text/css" href="src/css/steel/steel.css"/>
<script type="text/javascript" src="src/js/jscal2.js"></script>
<script type="text/javascript" src="src/js/lang/en.js"></script><?php /* Calander Close */ ?>	

<script type="text/javascript" src="js/stuHover.js"></script>
<!--<script type="text/javascript" src="js/Prototype.js"></script>-->
<script src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery.freezeheader.js"></script>
<Script type="text/javascript">
$(document).ready(function () { $("#table1").freezeHeader({ 'height': '500px' }); })
					
function SelectDeptEmp(v)
{ var Sts=document.getElementById("StsE").value; 
  var x="Apps_Loction.php?act=search&DpId="+v+"&s="+Sts+"&e=0"; window.location=x; }
  				
function SelectStsEmp(v)
{ var Dep=document.getElementById("DepartmentE").value; 
  var x="Apps_Loction.php?act=search&DpId="+Dep+"&s="+v+"&e=0"; window.location=x; }	
  
function SelectEmp(e)
{ var Dep=document.getElementById("DepartmentE").value; var Sts=document.getElementById("StsE").value;
  var FD=document.getElementById("FD").value; var TD=document.getElementById("TD").value;
  var x="Apps_Loction.php?act=search&DpId="+Dep+"&s="+Sts+"&e="+e+"&FD="+FD+"&TD="+TD; window.location=x; }	  			

</Script>     
</head>
<body class="body" onload="FunMapPram('<?=$_REQUEST['FD']?>','<?=$_REQUEST['TD']?>',<?=$_REQUEST['e']?>)">
<table class="table">
<tr>
 <td>
  <table class="menutable"><tr><td><?php if($_SESSION['login'] = true){ require_once("AMenu.php"); } ?></td></tr></table>
 </td>
</tr>
<tr>
 <td>
  <table width="100%" style="margin-top:0px;" border="0">
    <tr>
	  <td valign="top"><?php if($_SESSION['login'] = true){ require_once("AWelcome.php"); } ?></td>
	</tr>
	 <tr>
	  <td valign="top" align="center" width="100%" id="MainWindow">
	  
<?php //*******************************************************************************************?>
<?php //****************START*****START*****START******START******START*************************************?>
<?php //*******************************************************************************************?>
	  
<table border="0" style="margin-top:0px; width:100%; height:400px;">
	<tr>
	    <td align="right" width="1%">&nbsp;</td>
		<?php if(($_SESSION['UserType']=='S' OR $_SESSION['UserType']=='A' OR $_SESSION['UserType']=='U') AND $_SESSION['login'] = true) { ?>
		
		<td width="100%" valign="top">
		   <table border="0" width="90%">
			 <tr><td>
				    <table border="0">
		            <tr>
					   <td style="width:250px;" class="heading">Ess-Mobile Location Tracking</td>
	                   
					   <td class="tdc" style="width:110px;"><b>Status :</b><br>
<?php if($_REQUEST['s']=='A'){$sts='Active';}elseif($_REQUEST['s']=='D'){$sts='Dective';}else{$sts='All';} ?>
                       <select style="font-size:11px; width:100px; height:21px; background-color:#DDFFBB; display:block;" name="StsE" id="StsE" onChange="SelectStsEmp(this.value)">
		<option value="<?php echo $_REQUEST['s']; ?>"><?php echo $sts; ?></option>
<?php if($_REQUEST['s']!='A'){?><option value="A" >Active</option><?php } ?>
<?php if($_REQUEST['s']!='D'){?><option value="D" >Dective</option><?php } ?>
<?php if($_REQUEST['s']!='ALL'){?><option value="All" >ALL</option><?php } ?>
					   </select>
					   </td>
					   <td class="tdc" style="width:120px;"><b>From Date :</b><br>
		<input style="font-size:12px; width:100px;height:21px;text-align:center;background-color:#DDFFBB;" id="FD" name="FD" value="<?php if(isset($_REQUEST['FD'])){echo $_REQUEST['FD'];}else{ echo date("d-m-Y"); } ?>" readonly/>
						 </td>
						 <td class="tdc" style="width:120px;"><b>To Date :</b><br>
		<input style="font-size:12px; width:100px; height:21px;text-align:center;background-color:#DDFFBB;" id="TD" name="TD" value="<?php if(isset($_REQUEST['TD'])){echo $_REQUEST['TD'];}else{ echo date("d-m-Y"); } ?>" readonly/>
  <script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
  cal.manageFields("FD", "FD", "%d-%m-%Y");  cal.manageFields("TD", "TD", "%d-%m-%Y");</script>
						 </td>
					   <td class="tdc" style="width:130px;"><b>Department :</b><br>
                       
                       <select style="font-size:11px; width:120px; height:21px; background-color:#DDFFBB; display:block;" name="DepartmentE" id="DepartmentE" onChange="SelectDeptEmp(this.value)"><?php if($_REQUEST['DpId'] AND $_REQUEST['DpId']!='') { if($_REQUEST['DpId']=='All'){$DN='ALL';} else { $SqlDep=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." AND DepartmentId=".$_REQUEST['DpId'], $con); $ResDep=mysql_fetch_array($SqlDep); $DN=$ResDep['DepartmentCode']; }?><option value="<?php echo $_REQUEST['DpId']; ?>"><?php echo '&nbsp;'.$DN;?></option><?php } else { ?><option value="" style="margin-left:0px; background-color:#84D9D5;" selected>Select Department</option><?php } ?>   
<?php $SqlDepartment=mysql_query("select * from hrm_department where CompanyId=".$CompanyId." order by DepartmentName ASC", $con); while($ResDepartment=mysql_fetch_array($SqlDepartment)) { ?><option value="<?php echo $ResDepartment['DepartmentId']; ?>"><?php echo $ResDepartment['DepartmentCode'];?></option><?php } ?>
<option value="All" >ALL</option></select>
	  <input type="hidden" name="ComId" id="ComId" value="<?php echo $CompanyId; ?>" /> 
                      </td>
					  
					  <td class="tdc" style="width:250px;"><b>Employee :</b><br>
					  
                       <select style="font-size:11px; width:250px; height:21px; background-color:#DDFFBB; display:block;" name="EmpE" id="EmpE" onChange="SelectEmp(this.value)">
					   <?php if($_REQUEST['e']==0){?><option value="0" selected>Select</option><?php } ?>
					   
<?php if($_REQUEST['s']=='All'){ $stsCon="e.EmpStatus!='De'"; }else{ $stsCon="e.EmpStatus='".$_REQUEST['s']."'"; }
if($_REQUEST['DpId']=='All'){ $deptCon="1=1"; }else{ $deptCon="g.DepartmentId=".$_REQUEST['DpId']; }

$sqlE = mysql_query("SELECT e.EmployeeID, EmpCode, Fname, Sname, Lname, DesigName, Gender, Married, DR FROM hrm_employee e INNER JOIN hrm_employee_general g ON e.EmployeeID=g.EmployeeID INNER JOIN hrm_employee_personal p ON e.EmployeeID=p.EmployeeID INNER JOIN hrm_designation de ON g.DesigId=de.DesigId WHERE ".$stsCon." AND ".$deptCon." AND e.CompanyId=".$CompanyId." order by e.EmpCode ASC", $con); while($resE = mysql_fetch_assoc($sqlE)){ 
//if($resE['DR']=='Y'){$MS='Dr.';} elseif($resE['Gender']=='M'){$MS='Mr.';} elseif($resE['Gender']=='F' AND $resE['Married']=='Y'){$MS='Mrs.';} elseif($resE['Gender']=='F' AND $resE['Married']=='N'){$MS='Miss.';} ?>
<option value="<?=$resE['EmployeeID']?>" <?php if($resE['EmployeeID']==$_REQUEST['e']){echo 'selected';}?>><?=$resE['Fname'].' '.$resE['Sname'].' '.$resE['Lname'].' - '.ucwords(strtolower($resE['DesigName']))?></option><?php } ?>
                      </td>
					  
					  <td style="width:10px;">&nbsp;</td>
					  
	                  
	                  <!--<td class="tdl" style="background-color:#FFFF6C;text-align:center;width:200px;">Submission of Resignation</td>-->
		           </tr>
                   </table>
				</td>
			 </tr>
			 
			 
			 
<?php if($_REQUEST['FD']!='' && $_REQUEST['TD']!='' && $_REQUEST['e']!='') { ?>		 
 <tr>
   <td valign="top" style="width:100%;"> 
    <table style="width:100%;" border="0" cellspacing="1">
	 <tr>
	  <td class="th" style="width:35%;font-size:14px;">Records</td>
	  <td class="th" style="width:65%;font-size:14px;">Geo Location</td>
	 </tr>
	 <tr>
	  <td style="vertical-align:top;">
	   <!--<div style="max-height:500px;overflow:scroll;">-->
	   <table id="table1" border="1" style="width:100%;" cellspacing="1">
	    <div class="thead">
        <thead>
		<tr>
		 <td class="th" style="width:13%;">DateTime</td>
	     <td class="th" style="width:11%;">Latitude</td>
		 <td class="th" style="width:11%;">Longitude</td>
		</tr>
		</thead>
		</div>
<?php $con2=mysql_connect('localhost','vnrseed2_geolocation','vnrseed2_geolocation');
      $db=mysql_select_db('vnrseed2_geolocation', $con2); 
	  $sql=mysql_query("select * from data_geolocation where DTime>='".date("Y-m-d 00:00:00",strtotime($_REQUEST['FD']))."' AND DTime<='".date("Y-m-d 23:59:59",strtotime($_REQUEST['TD']))."' AND EmpId=".$_REQUEST['e']." order by DTime asc", $con2);
	  while($res=mysql_fetch_assoc($sql)){ ?>
		<div class="tbody">
        <tbody>
		<tr style="background-color:#FFFFFF;">
		 <td class="tdc"><?=date("d-m-Y H:i:s",strtotime($res['DTime']))?></td>
	     <td class="tdc"><?=$res['DLat']?></td>
		 <td class="tdc"><?=$res['DLong']?></td>
		</tr>
		</tbody>
		</div>
<?php } ?>		
	   </table>
	   <!--</div>-->
	  </td>
	  
	 
	   <td>
	   <table border="1" style="width:100%;" cellspacing="1">
	    <tr>
		 <td class="tdc" style="width:100%;vertical-align:top;">
		  <?php //require_once('Apps_map.php'); ?>
		  
		  
<?php /******************** Map Open ******************************/ ?>
<?php /******************** Map Open ******************************/ ?>
<?php /******************** Map Open ******************************/ ?>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>-->
<!--<link rel="stylesheet" type="text/css" href="./style.css" />-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />

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
	
 <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCX-IBGudyr19-E7zrx1PTGqy0PEVwX5wQ&callback=initMap&libraries=&v=weekly"></script>

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
{	//alert("aa");
    mapOptions: [{mapTypeId: google.maps.MapTypeId.SATELLITE}] 
 
	// This example adds an animated symbol to a polyline.
		var route = [];
		//fetch('http://vnrdev.in/flutterMap/')
		fetch('Apps_MapJson.php?fd='+fd+'&td='+td+'&ei='+ei)
		  .then(response => response.json())
		  .then(data => {
		      
		      //alert(data);
		      
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

<?php /********************* Map Close ****************************/ ?>
<?php /********************* Map Close ****************************/ ?>
<?php /********************* Map Close ****************************/ ?>
		  
		  
		 </td>
		</tr>
	   </table>
	  </td>
	 
	 </tr>
	</table>
   </td>	
 </tr>
<?php } ?>				
		   </table>  		
		</td>
		
        <?php } ?>
		<?php //-------------------------------------------------------------------------------------------------------- ?>
		
		<td align="left" width="20%">&nbsp;</td>
	</tr>
</table>
		
<?php //****************************************************************************************?>
<?php //*************END*****END*****END******END******END**********************?>
<?php //******************************************************************************************?>
		
	  </td>
	</tr>
	
  </table>
 </td>
</tr>
</table>
</body>
</html>