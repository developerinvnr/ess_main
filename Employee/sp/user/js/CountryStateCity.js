// JavaScript Document
function OpenCountry()
{
document.getElementById("country").style.display = 'block'; document.getElementById("state").style.display = 'none'; document.getElementById("city").style.display = 'none'; document.getElementById("scountry").style.display = 'block'; document.getElementById("sstate").style.display = 'none'; document.getElementById("scity").style.display = 'none';
}

function OpenState()
{
document.getElementById("country").style.display = 'none'; document.getElementById("state").style.display = 'block';document.getElementById("city").style.display = 'none'; document.getElementById("scountry").style.display = 'none'; document.getElementById("sstate").style.display = 'block'; document.getElementById("scity").style.display = 'none';
}
function OpenCity()
{
document.getElementById("country").style.display = 'none'; document.getElementById("state").style.display = 'none'; document.getElementById("city").style.display = 'block'; document.getElementById("scountry").style.display = 'none'; document.getElementById("sstate").style.display = 'none'; document.getElementById("scity").style.display = 'block';
}

function a() { 
document.getElementById("country").style.display = 'block'; document.getElementById("state").style.display = 'none'; document.getElementById("city").style.display = 'none'; document.getElementById("scountry").style.display = 'block'; document.getElementById("sstate").style.display = 'none'; document.getElementById("scity").style.display = 'none';
document.getElementById("ChangeCountry").style.display = 'none';document.getElementById("DeleteCountry").style.display = 'none';
document.getElementById("AddNewCountry").style.display = 'block'; document.getElementById("CountryName").value = '';
}

function b(){ 
document.getElementById("country").style.display = 'none'; document.getElementById("state").style.display = 'block';document.getElementById("city").style.display = 'none'; document.getElementById("scountry").style.display = 'none'; document.getElementById("sstate").style.display = 'block'; document.getElementById("scity").style.display = 'none';
document.getElementById("ChangeState").style.display = 'none';	document.getElementById("DeleteState").style.display = 'none';
document.getElementById("AddNewState").style.display = 'block'; document.getElementById("CouStateSelect").disabled = false; document.getElementById("StateName").value = '';
}

function c(){ 
document.getElementById("country").style.display = 'none'; document.getElementById("state").style.display = 'none'; document.getElementById("city").style.display = 'block'; document.getElementById("scountry").style.display = 'none'; document.getElementById("sstate").style.display = 'none'; document.getElementById("scity").style.display = 'block';
document.getElementById("ChangeCity").style.display = 'none';document.getElementById("DeleteCity").style.display = 'none';
document.getElementById("AddNewCity").style.display = 'block'; document.getElementById("CouStateSelect1").disabled = false; document.getElementById("CouCitySelect").disabled = false;document.getElementById("CityName").value = '';
}