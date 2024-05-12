// JavaScript Document
 function ChangeBtnU(value,value2)
{ if(value==0) {document.getElementById("QId").value=value2; document.getElementById("SaveC").style.display='none'; 
                     document.getElementById("SaveR").style.display='none'; document.getElementById("ReplyText").style.display='none';}
  else if(value==1) {document.getElementById("QId").value=value2; document.getElementById("SaveC").style.display='none';  
                     document.getElementById("SaveR").style.display='block';  document.getElementById("ReplyText").style.display='block';}	
  else if(value==2) {document.getElementById("QId").value=value2; document.getElementById("SaveC").style.display='block';  
                     document.getElementById("SaveR").style.display='none';  document.getElementById("ReplyText").style.display='none';}
 }
 
 function ChangeBtnMgmt(v1,v2)
{ if(v1==0) {document.getElementById("QId").value=v2; document.getElementById("Value1").value=v1;} 
  else {document.getElementById("QId").value=v2; document.getElementById("Value1").value=v1;}	
 }




function PopupCenter(pageURL, title,w,h) {
var left = (screen.width/2)-(w/2);
var top = (screen.height/2)-(h/2);
var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
}

