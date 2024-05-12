// ActionScript Document
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
	document.getElementById("DeptName").disabled = true;
    document.getElementById("DesigName").disabled = false;
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


  
function DGD_Designation(value){ document.getElementById("AddNewDeptGradeDesig").disabled = false; }  
  
 
							 //ClickDesig
function ClickDesig(value1){
	document.getElementById("tableSubDGD").style.display = 'none';
	document.getElementById("ChangeDeptGradeDesig").style.display = 'block';
	document.getElementById("DeleteDeptGradeDesig").style.display = 'block';
	document.getElementById("AddNewDeptGradeDesig").style.display = 'none'; 
	var CompanyId=document.getElementById("CompanyId").value;
	var DeptID=document.getElementById("DeptID").value;
	var url = 'DGDChange.php';	var pars = 'id='+value1+'&Cid='+CompanyId+'&DeptId='+DeptID;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewDGD_Change
	});
}
function show_NewDGD_Change(originalRequest)
{ document.getElementById('SubDGD').innerHTML = originalRequest.responseText; }


                                         // CostCenter
function selectCostCenter(value){ 
    document.getElementById("ChangeCostCenter").style.display = 'block';
	document.getElementById("DeleteCostCenter").style.display = 'block';
	document.getElementById("AddNewCostCenter").style.display = 'none';
	var url = 'GetCostCenter.php';	var pars = 'CCid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewCC
	});
}
function show_NewCC(originalRequest)
{ document.getElementById('CostCenter').innerHTML = originalRequest.responseText; }


