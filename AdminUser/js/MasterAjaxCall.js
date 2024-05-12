// ActionScript Document
                                           // Country
function SelectCountry(value){ 
	var url = 'State.php';	var pars = 'Cid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_State
	});
}
function show_State(originalRequest)
{ document.getElementById('state').innerHTML = originalRequest.responseText; }

                                            // State
function SelectState(value){ 
	var url = 'City.php';	var pars = 'Sid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_City
	});
}
function show_City(originalRequest)
{ document.getElementById('city').innerHTML = originalRequest.responseText; }

                                           // Company
function clickCompany(value){ 
	var url = 'CreateNewComUser.php';	var pars = 'CUid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewUser
	});
}
function show_NewUser(originalRequest)
{ document.getElementById('CreateUser').innerHTML = originalRequest.responseText; }

                                           // Vendortype
function selectVtype(value){ 
    document.getElementById("ChangeVtype").style.display = 'block';
	document.getElementById("DeleteVtype").style.display = 'block';
	document.getElementById("AddNewVtype").style.display = 'none';
	var url = 'Vtype.php';	var pars = 'VTid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewVT
	});
} 
function show_NewVT(originalRequest)
{ document.getElementById('TypeName').innerHTML = originalRequest.responseText; }

                                          // Vendortype2
function selectVtype2(value){ 
	var url = 'Vtype2.php';	var pars = 'VTid2='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewVT2
	});
}
function show_NewVT2(originalRequest)
{ document.getElementById('VendorName').innerHTML = originalRequest.responseText; }

                                            // VendorName
function selectVName(value){ 
    document.getElementById("ChangeVname").style.display = 'block';
	document.getElementById("DeleteVname").style.display = 'block';
	document.getElementById("AddNewVname").style.display = 'none';
	var url = 'Vname.php';	var pars = 'VNid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewVN
	});
}
function show_NewVN(originalRequest)
{ document.getElementById('VenName').innerHTML = originalRequest.responseText; }


                                            // Vendortype3
function selectVtype3(value){ 
    document.getElementById("VTypeSelect3").disabled = true;
	var url = 'Vtype3.php';	var pars = 'VTid3='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewVT3
	});
}
function show_NewVT3(originalRequest)
{ document.getElementById('VNameD').innerHTML = originalRequest.responseText;}


                                            //selectVNameD
function selectVNameD(value){ 
    document.getElementById("UpdateVdetailsbtn").disabled = false;
	document.getElementById("VNameSelectD").disabled = true;
	var url = 'VNameD.php';	var pars = 'VNameD='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewVNameD
	});
}
function show_NewVNameD(originalRequest)
{ document.getElementById('VDetailsSpan').innerHTML = originalRequest.responseText;}selectVNameD



                                           // Country1
function SelectCountry1(value){ 
	var url = 'State1.php';	var pars = 'Cid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_State1
	});
}
function show_State1(originalRequest)
{ document.getElementById('Venstate').innerHTML = originalRequest.responseText; }

                                            // State1
function SelectState1(value){ 
	var url = 'City1.php';	var pars = 'Sid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_City1
	});
}
function show_City1(originalRequest)
{ document.getElementById('Vencity').innerHTML = originalRequest.responseText; }

 
function selectComponent(value){ 
    document.getElementById("Changebtn").style.display = 'block';
	document.getElementById("ChangeCompo").style.display = 'none';
	document.getElementById("DeleteCompo").style.display = 'block';
	document.getElementById("AddNewBtn").style.display = 'none';
	document.getElementById("AddNewCompo").style.display = 'none';
	document.getElementById("Newtable").style.display = 'none';
	document.getElementById("EditTable").style.display = 'block';
	var url = 'GetPayCompo.php';	var pars = 'Compoid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewCompo
	});
}
function show_NewCompo(originalRequest)
{ document.getElementById('EditTable').innerHTML = originalRequest.responseText; }

