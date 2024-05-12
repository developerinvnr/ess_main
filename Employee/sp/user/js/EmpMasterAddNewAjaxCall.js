                                               //DeptSelect
function DeptSelect(value) {  
   var url = 'DeptSelect.php';	var pars = 'Deptid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewDeptSelect
	});
} 
function show_NewDeptSelect(originalRequest)
{ document.getElementById('DesigSpan').innerHTML = originalRequest.responseText; }

/*                                               //DesigSelect
function DesigSelect(value) {  
   var url = 'DesigSelect.php';	var pars = 'Desigid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewDesigSelect
	});
} 
function show_NewDesigSelect(originalRequest)
{ document.getElementById('GradeSpan').innerHTML = originalRequest.responseText; }
*/

                                                //CurrentState
function CurrentState(value) {
   var url = 'StateCurr.php';	var pars = 'Stateid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewStateCurr
	});
} 
function show_NewStateCurr(originalRequest)
{ document.getElementById('EmpCACitySpan').innerHTML = originalRequest.responseText; }
	


                                                //PermanentState
function PermanentState(value) {
   var url = 'PermanentState.php';	var pars = 'Stateid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewPermanentState
	});
} 
function show_NewPermanentState(originalRequest)
{ document.getElementById('EmpPACitySpan').innerHTML = originalRequest.responseText; }

                                                //Selectmode
function Selectmode(value) {
	document.getElementById("TraClass").disabled=false;
    var url = 'Selectmode.php';	var pars = 'Modeid='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewSelectmode
	});
} 
function show_NewSelectmode(originalRequest)
{ document.getElementById('ModeClassSpan').innerHTML = originalRequest.responseText; }

                                       //SelectBasSti
function SelectBasSti(value) {
	    var url = 'SelectBasSti.php';	var pars = 'id='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewSelectBasSti
	});
} 
function show_NewSelectBasSti(originalRequest)
{ document.getElementById('BasSti').innerHTML = originalRequest.responseText; }




                                       //SelectBasSti
function RepSelect(value) { 
	    var url = 'ReportingSelect.php';	var pars = 'id='+value;	var myAjax = new Ajax.Request(
	url, 
	{
		method: 'post', 
		parameters: pars, 
		onComplete: show_NewSelectRepSelect
	});
} 
function show_NewSelectRepSelect(originalRequest)
{ document.getElementById('ReportingSpan').innerHTML = originalRequest.responseText; 
   var RDesigI=document.getElementById("RepDesigId").value; var RDesigI2=document.getElementById("RepDesigF").value=RDesigI;
   var RDesigN=document.getElementById("RepDesigName").value; var RDesigN2=document.getElementById("RepDesigNameF").value=RDesigN;
   var RDesigE=document.getElementById("RepEmailId").value; var RDesigE2=document.getElementById("RepEmailIdF").value=RDesigE;
   var RDesigC=document.getElementById("RepContactNo").value; var RDesigC2=document.getElementById("RepContactNoF").value=RDesigC; 
}
















