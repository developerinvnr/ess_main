// JavaScript Document
function OpenVtype() 
{ document.getElementById("type").style.display = 'block'; document.getElementById("name").style.display = 'none'; document.getElementById("details").style.display = 'none'; document.getElementById("Vtype").style.display = 'block'; document.getElementById("Vname").style.display = 'none'; document.getElementById("Vdetails").style.display = 'none';
document.getElementById("msg").style.display = 'none'; }

function OpenVname() 
{ document.getElementById("type").style.display = 'none'; document.getElementById("name").style.display = 'block'; document.getElementById("details").style.display = 'none'; document.getElementById("Vtype").style.display = 'none'; document.getElementById("Vname").style.display = 'block'; document.getElementById("Vdetails").style.display = 'none'; document.getElementById("msg").style.display = 'none'; }

function OpenVdetails() 
{ document.getElementById("type").style.display = 'none'; document.getElementById("name").style.display = 'none'; document.getElementById("details").style.display = 'block'; document.getElementById("Vtype").style.display = 'none'; document.getElementById("Vname").style.display = 'none'; document.getElementById("Vdetails").style.display = 'block';
document.getElementById("msg").style.display = 'none'; }

function CallVTypeId(v)
{ var VTypeId = document.getElementById("VTypeId").value; var ID = parseFloat(document.getElementById("VTypeId").value=v);
if(ID==2){document.getElementById("LIC").style.display = 'block';} else if(ID!=2){document.getElementById("LIC").style.display = 'none';} }

function Updetails() 
{ document.getElementById("UpdateVdetailsbtn").style.display = 'none'; document.getElementById("UpdateVdetails").style.display = 'block';
  document.getElementById("VCompanyName").disabled = false; document.getElementById("VPolicyNo").disabled = false; document.getElementById("VPolicyName").disabled = false;
  document.getElementById("VValidfrom").disabled = false; document.getElementById("VValidto").disabled = false; document.getElementById("VAddrress").disabled = false;
  document.getElementById("VCountry").disabled = false; document.getElementById("VState").disabled = false; document.getElementById("VCity").disabled = false;
  document.getElementById("Contact1_Name").disabled = false; document.getElementById("Contact1_No").disabled = false; document.getElementById("Contact1_Desig").disabled = false;
  document.getElementById("Contact2_Name").disabled = false; document.getElementById("Contact2_No").disabled = false; document.getElementById("Contact2_Desig").disabled = false;
  document.getElementById("Contact3_Name").disabled = false; document.getElementById("Contact3_No").disabled = false; document.getElementById("Contact3_Desig").disabled = false;
}
