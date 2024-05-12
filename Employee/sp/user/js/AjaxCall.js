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


                                      // Department
function selectDept(value){ 
    document.getElementById("ChangeDept").style.display = 'block';
	document.getElementById("DeleteDept").style.display = 'block';
	document.getElementById("AddNewDept").style.display = 'none';
	var url = 'GetDept.php';	var pars = 'Deptid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewDept
	});
}
function show_NewDept(originalRequest)
{ document.getElementById('Dept').innerHTML = originalRequest.responseText; }


                                     // Head Quater
function selectHQ(value){ 
    document.getElementById("ChangeHQ").style.display = 'block';
	document.getElementById("DeleteHQ").style.display = 'block';
	document.getElementById("AddNewHQ").style.display = 'none';
	var url = 'GetHQ.php';	var pars = 'HQid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewHQ
	});
}
function show_NewHQ(originalRequest)
{ document.getElementById('HQ').innerHTML = originalRequest.responseText; }


                                     // Grade
function selectGrade(value){ 
    document.getElementById("ChangeGrade").style.display = 'block';
	document.getElementById("DeleteGrade").style.display = 'block';
	document.getElementById("AddNewGrade").style.display = 'none';
	var url = 'GetGrade.php';	var pars = 'Gradeid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewGrade
	});
}
function show_NewGrade(originalRequest)
{ document.getElementById('Grade').innerHTML = originalRequest.responseText; }


                                     // Designation
function selectDesig(value){ 
    document.getElementById("ChangeDesig").style.display = 'block';
	document.getElementById("DeleteDesig").style.display = 'block';
	document.getElementById("AddNewDesig").style.display = 'none';
	var url = 'GetDesig.php';	var pars = 'Desigid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewDesig
	});
}
function show_NewDesig(originalRequest)
{ document.getElementById('Desig').innerHTML = originalRequest.responseText; }


                                  
								  // DGD_Dept
function DGD_Dept(value){ 
    document.getElementById("GradeName").disabled = false;
	var url = 'GetDGD_Dept.php';	var pars = 'Did='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewDGD_Dept
	});
}
function show_NewDGD_Dept(originalRequest)
{ document.getElementById('DGD').innerHTML = originalRequest.responseText; }

								  // DGD_Grade
function DGD_Grade(value1){ 
    document.getElementById("DesigName").disabled = false;
    var DeptID=document.getElementById("DeptID").value; 
	var url = 'GetDGD_Grade.php';	var pars = 'Gid='+value1+'&Did='+DeptID; var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewDGD_Grade
	});
}
function show_NewDGD_Grade(originalRequest)
{ document.getElementById('DGD').innerHTML = originalRequest.responseText; }

  
function DGD_Designation(value){ document.getElementById("AddNewDeptGradeDesig").disabled = false; }  
  
  
							 //ClickDesig
function ClickDesig(value1){
	document.getElementById("tableSubDGD").style.display = 'none';
	document.getElementById("ChangeDeptGradeDesig").style.display = 'block';
	document.getElementById("DeleteDeptGradeDesig").style.display = 'block';
	document.getElementById("AddNewDeptGradeDesig").style.display = 'none';
	var CompanyId=document.getElementById("CompanyId").value;
	var url = 'DGDChange.php';	var pars = 'id='+value1+'&Cid='+CompanyId;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewDGD_Change
	});
}
function show_NewDGD_Change(originalRequest)
{ document.getElementById('SubDGD').innerHTML = originalRequest.responseText; }

