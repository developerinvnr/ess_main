                                      //Ajax Query Replys User
function ReplyToQU(value) 
{ var d1=document.getElementById("FromQ2").value; var d2=document.getElementById("ToQ2").value; 
  var url = 'ReplyToQU.php';	 var pars = 'UserType='+value+'&d1='+d1+'&d2='+d2;	 
  var myAjax = new Ajax.Request(
	url, 
	{	method: 'post', 
		parameters: pars, 
		onComplete: show_ReplyToQU
	});
}
function show_ReplyToQU(originalRequest)
{ document.getElementById('ReplyToQUSpan').innerHTML = originalRequest.responseText; }



function PopupCenter(pageURL, title,w,h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}

function ChangeBtnU(value,value2)
{ if(value=="") {document.getElementById("QId").value=value2; document.getElementById("SaveW").style.display='none'; document.getElementById("SaveR").style.display='none'; 
                     document.getElementById("SaveForw").style.display='none'; document.getElementById("ReplyText").style.display='none';}
  else if(value==0) {document.getElementById("QId").value=value2; document.getElementById("SaveW").style.display='none'; document.getElementById("SaveR").style.display='none'; 
                     document.getElementById("SaveForw").style.display='none'; document.getElementById("ReplyText").style.display='none';}
  else if(value==1) {document.getElementById("QId").value=value2; document.getElementById("SaveW").style.display='block';  document.getElementById("SaveR").style.display='none'; 
                     document.getElementById("SaveForw").style.display='none'; document.getElementById("ReplyText").style.display='none';}
  else if(value==2) {document.getElementById("QId").value=value2; document.getElementById("SaveW").style.display='none';  document.getElementById("SaveR").style.display='block'; 
                     document.getElementById("SaveForw").style.display='none'; document.getElementById("ReplyText").style.display='block';}					 
  else if(value==3) {document.getElementById("QId").value=value2; document.getElementById("SaveW").style.display='none';  document.getElementById("SaveR").style.display='none'; 
                     document.getElementById("SaveForw").style.display='block'; document.getElementById("ReplyText").style.display='none';}					 
}
