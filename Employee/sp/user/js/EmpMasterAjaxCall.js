                                        // SelectDeptEmp
function SelectDeptEmp(value){ 
    var ComId = document.getElementById("ComId").value;
	var url = 'DeptEmp.php';	var pars = 'DPid='+value+'&ComId='+ComId;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewDEGeneral
	});
} 
function show_NewDEGeneral(originalRequest)
{ document.getElementById('DeptEmpName').innerHTML = originalRequest.responseText; }


                                      // ChangeKey
function ChangeKey(value){ 
	var url = 'ChangeEmpPwdF.php';	var pars = 'EMPid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewEMPPass
	});
} 
function show_NewEMPPass(originalRequest)
{ document.getElementById('ChangeEmpPass').innerHTML = originalRequest.responseText; }



                                    //ChangEmpPwd
function ChangEmpPwd(value){ 
	var p1 = document.getElementById("EmpPass1").value;  var filter1=/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;   //var test_bool1 = filter1.test(p1);  
    var p2 = document.getElementById("EmpPass2").value;  //var filter2=/^[0-9a-zA-Z%@$#]+$/; var test_bool2 = filter1.test(p2);
	
	if (p1.length === 0){ alert("Please Enter a new password");  return false; }	
	else if (p2.length === 0){ alert("Please Enter a Confirm new password");  return false; }
	else if (p1.length<6){ alert("Please Enter a minimum 6 characters in password");  return false; }
	else if(!filter1.test(p1)) { alert("password should contain atleast one number and one special character"); return false; }	
	else if(p1!=p2) { alert('The new password and confirm new password fields must be the same, Try Again'); return false; }	
	else if(p1==p2) {
	var url = 'ChangeEmpPwd.php';	var pars = 'id='+value+'&p1='+p1+'&p2='+p2;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewEMPChangePwd
	}); }
} 
function show_NewEMPChangePwd(originalRequest)
{ document.getElementById('msg').innerHTML = originalRequest.responseText; }


function del(value){ 
    var agree=confirm("Are you sure you want to delete employee this record?");
    if (agree) { 
    var url = 'DelEmpRecord.php';	var pars = 'id='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewEMPDel
	});
} }
function show_NewEMPDel(originalRequest)
{ document.getElementById('msg').innerHTML = originalRequest.responseText; }

