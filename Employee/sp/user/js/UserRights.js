// JavaScript Document
function DisplayMenu() { 
if(document.MenuFormCheck.MenuShow.checked==true)
  {document.MenuFormCheck.MasterCheck.disabled=false; document.MenuFormCheck.ProCheck.disabled=false; document.MenuFormCheck.UtilCheck.disabled=false; document.MenuFormCheck.QueryCheck.disabled=false; document.MenuFormCheck.PMSCheck.disabled=false; document.MenuFormCheck.RecruitCheck.disabled=false;document.MenuFormCheck.SeparCheck.disabled=false; document.MenuFormCheck.ReportCheck.disabled=false; document.MenuFormCheck.TDSCheck.disabled=false;}
else if(document.MenuFormCheck.MenuShow.checked==false)
       {document.MenuFormCheck.MasterCheck.disabled=true; document.MenuFormCheck.ProCheck.disabled=true; document.MenuFormCheck.UtilCheck.disabled=true; document.MenuFormCheck.QueryCheck.disabled=true; document.MenuFormCheck.PMSCheck.disabled=true; document.MenuFormCheck.RecruitCheck.disabled=true;document.MenuFormCheck.SeparCheck.disabled=true; document.MenuFormCheck.ReportCheck.disabled=true; document.MenuFormCheck.TDSCheck.disabled=true;}}

function DisplayBut() { 
if(document.MenuFormCheck.MasterCheck.checked==true || document.MenuFormCheck.ProCheck.checked==true || document.MenuFormCheck.UtilCheck.checked==true || document.MenuFormCheck.QueryCheck.checked==true || document.MenuFormCheck.PMSCheck.checked==true || document.MenuFormCheck.RecruitCheck.checked==true || document.MenuFormCheck.SeparCheck.checked==true || document.MenuFormCheck.ReportCheck.checked==true || document.MenuFormCheck.TDSCheck.checked==true)  {document.MenuFormCheck.MenuCheck.disabled=false;}
else if(document.MenuFormCheck.MasterCheck.checked==false && document.MenuFormCheck.ProCheck.checked==false && document.MenuFormCheck.UtilCheck.checked==false && document.MenuFormCheck.QueryCheck.checked==false && document.MenuFormCheck.PMSCheck.checked==false && document.MenuFormCheck.RecruitCheck.checked==false && document.MenuFormCheck.SeparCheck.checked==false && document.MenuFormCheck.ReportCheck.checked==false && document.MenuFormCheck.TDSCheck.checked==false)  {document.MenuFormCheck.MenuCheck.disabled=false;} }

function SubMenuMasForm() {document.getElementById("master").style.display = 'block'; document.getElementById("processing").style.display = 'none';
document.getElementById("utility").style.display = 'none'; document.getElementById("pms").style.display = 'none';
document.getElementById("recruitment").style.display = 'none'; document.getElementById("separation").style.display = 'none';
document.getElementById("report").style.display = 'none'; document.getElementById("tds").style.display = 'none'; 
document.getElementById("query").style.display = 'none';}

function SubMenuProForm() { document.getElementById("master").style.display = 'none'; document.getElementById("processing").style.display = 'block';
document.getElementById("utility").style.display = 'none'; document.getElementById("pms").style.display = 'none';
document.getElementById("recruitment").style.display = 'none'; document.getElementById("separation").style.display = 'none';
document.getElementById("report").style.display = 'none'; document.getElementById("tds").style.display = 'none'; 
document.getElementById("query").style.display = 'none';}

function SubMenuUtilForm() { document.getElementById("master").style.display = 'none'; document.getElementById("processing").style.display = 'none';
document.getElementById("utility").style.display = 'block'; document.getElementById("pms").style.display = 'none';
document.getElementById("recruitment").style.display = 'none'; document.getElementById("separation").style.display = 'none';
document.getElementById("report").style.display = 'none'; document.getElementById("tds").style.display = 'none'; 
document.getElementById("query").style.display = 'none';}

function SubMenuQueryForm() { document.getElementById("master").style.display = 'none'; document.getElementById("processing").style.display = 'none';
document.getElementById("utility").style.display = 'none'; document.getElementById("pms").style.display = 'none';
document.getElementById("recruitment").style.display = 'none'; document.getElementById("separation").style.display = 'none';
document.getElementById("report").style.display = 'none'; document.getElementById("tds").style.display = 'none'; 
document.getElementById("query").style.display = 'block';}

function SubMenuPmsForm() { document.getElementById("master").style.display = 'none'; document.getElementById("processing").style.display = 'none';
document.getElementById("utility").style.display = 'none'; document.getElementById("pms").style.display = 'block';
document.getElementById("recruitment").style.display = 'none'; document.getElementById("separation").style.display = 'none';
document.getElementById("report").style.display = 'none'; document.getElementById("tds").style.display = 'none';
document.getElementById("query").style.display = 'none';}

function SubMenuRecForm() { document.getElementById("master").style.display = 'none'; document.getElementById("processing").style.display = 'none';
document.getElementById("utility").style.display = 'none'; document.getElementById("pms").style.display = 'none';
document.getElementById("recruitment").style.display = 'block'; document.getElementById("separation").style.display = 'none';
document.getElementById("report").style.display = 'none'; document.getElementById("tds").style.display = 'none'; 
document.getElementById("query").style.display = 'none';}

function SubMenuSepForm() { document.getElementById("master").style.display = 'none'; document.getElementById("processing").style.display = 'none';
document.getElementById("utility").style.display = 'none'; document.getElementById("pms").style.display = 'none';
document.getElementById("recruitment").style.display = 'none'; document.getElementById("separation").style.display = 'block';
document.getElementById("report").style.display = 'none'; document.getElementById("tds").style.display = 'none'; 
document.getElementById("query").style.display = 'none';}

function SubMenuRepForm() { document.getElementById("master").style.display = 'none'; document.getElementById("processing").style.display = 'none';
document.getElementById("utility").style.display = 'none'; document.getElementById("pms").style.display = 'none';
document.getElementById("recruitment").style.display = 'none'; document.getElementById("separation").style.display = 'none';
document.getElementById("report").style.display = 'block'; document.getElementById("tds").style.display = 'none'; 
document.getElementById("query").style.display = 'none';}

function SubMenuTdsForm() { document.getElementById("master").style.display = 'none'; document.getElementById("processing").style.display = 'none';
document.getElementById("utility").style.display = 'none'; document.getElementById("pms").style.display = 'none';
document.getElementById("recruitment").style.display = 'none'; document.getElementById("separation").style.display = 'none';
document.getElementById("report").style.display = 'none'; document.getElementById("tds").style.display = 'block'; 
document.getElementById("query").style.display = 'none';}