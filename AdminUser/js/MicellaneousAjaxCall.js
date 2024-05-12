// ActionScript Document
                                      // Category
function selectCategory(value){ 
    document.getElementById("ChangeCategory").style.display = 'block';
	document.getElementById("DeleteCategory").style.display = 'block';
	document.getElementById("AddNewCategory").style.display = 'none';
	var url = 'GetCategory.php';	var pars = 'Caid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewCategory
	});
}
function show_NewCategory(originalRequest)
{ document.getElementById('Category').innerHTML = originalRequest.responseText; }

   
                                      // Section
function selectSection(value){ 
    document.getElementById("ChangeSection").style.display = 'block';
	document.getElementById("DeleteSection").style.display = 'block';
	document.getElementById("AddNewSection").style.display = 'none';
	var url = 'GetSection.php';	var pars = 'Secid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewSection
	});
}
function show_NewSection(originalRequest)
{ document.getElementById('Section').innerHTML = originalRequest.responseText; }


                                     // Select Country
function selectCountry(value){ 
    document.getElementById("ChangeCountry").style.display = 'block';
	document.getElementById("DeleteCountry").style.display = 'block';
	document.getElementById("AddNewCountry").style.display = 'none';
	var url = 'GetCountry.php';	var pars = 'Couid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewCountry
	});
}
function show_NewCountry(originalRequest)
{ document.getElementById('CountrySpan').innerHTML = originalRequest.responseText; }


                                     // Select CouState
function selectCouState(value){ 
    document.getElementById("CouStateSelect").disabled = true;
	document.getElementById("StateName").disabled = false;
	var url = 'GetCouState.php';	var pars = 'CSid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewCouState
	});
}
function show_NewCouState(originalRequest)
{ document.getElementById('CouStateSpan').innerHTML = originalRequest.responseText; }


                                //selectState

function selectState(value){ 
    document.getElementById("ChangeState").style.display = 'block';
	document.getElementById("DeleteState").style.display = 'block';
	document.getElementById("AddNewState").style.display = 'none';
	var url = 'GetState.php';	var pars = 'Stid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewState
	});
}
function show_NewState(originalRequest)
{ document.getElementById('StateSpan').innerHTML = originalRequest.responseText; }


                             //selectCouState1

function selectCouState1(value){ 
    document.getElementById("CouStateSelect1").disabled = true;
	var url = 'GetCouState1.php';	var pars = 'CSCid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewCouState1
	});
}
function show_NewCouState1(originalRequest)
{ document.getElementById('CouStateSpan1').innerHTML = originalRequest.responseText; }



                                //selectCouCity
function selectCouCity(value){ 
    document.getElementById("CouCitySelect").disabled = true;
	document.getElementById("CityName").disabled = false;
	var url = 'GetCouCity.php';	var pars = 'Ciid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewConCity
	});
}
function show_NewConCity(originalRequest)
{ document.getElementById('CouStateCitySpan').innerHTML = originalRequest.responseText; }


 //selectState

function selectCity(value){ 
    document.getElementById("ChangeCity").style.display = 'block';
	document.getElementById("DeleteCity").style.display = 'block';
	document.getElementById("AddNewCity").style.display = 'none';
	var url = 'GetCity.php';	var pars = 'Cityid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewCity
	});
}
function show_NewCity(originalRequest)
{ document.getElementById('CitySpan').innerHTML = originalRequest.responseText; }