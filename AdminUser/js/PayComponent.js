// JavaScript Document
function addNew()
{
document.getElementById("AddNewBtn").style.display = 'none'; document.getElementById("AddNewCompo").style.display = 'block';
document.getElementById("CompoName").disabled = false; document.getElementById("CompoCode").disabled = false; document.getElementById("CompoType").disabled = false; 
document.getElementById("ConPF").disabled = false; document.getElementById("Lumpsum").disabled = false; document.getElementById("Prorata").disabled = false;
document.getElementById("ConPTax").disabled = false; document.getElementById("ConESIC").disabled = false; document.getElementById("ConTDS").disabled = false; 
document.getElementById("ConArrCalcu").disabled = false; document.getElementById("EstimateTDS").disabled = false; document.getElementById("DedIncTax").disabled = false;
}
function changeV()
{
document.getElementById("Changebtn").style.display = 'none'; document.getElementById("ChangeCompo").style.display = 'block'; document.getElementById("DeleteCompo").disabled = true;
document.getElementById("CompoName1").disabled = true; document.getElementById("CompoCode1").disabled = true; document.getElementById("CompoType1").disabled = true; 
document.getElementById("ConPF1").disabled = false; document.getElementById("Lumpsum1").disabled = false; document.getElementById("Prorata1").disabled = false;
document.getElementById("ConPTax1").disabled = false; document.getElementById("ConESIC1").disabled = false; document.getElementById("ConTDS1").disabled = false; 
document.getElementById("ConArrCalcu1").disabled = false; document.getElementById("EstimateTDS1").disabled = false; document.getElementById("DedIncTax1").disabled = false;
}

function Checked()
{
if(document.getElementById("ConPF").checked == true) { document.getElementById("ConPF").value = 'Y'; } else { document.getElementById("ConPF").value = 'N'; }
if(document.getElementById("Lumpsum").checked == true) { document.getElementById("Lumpsum").value = 'Y'; } else { document.getElementById("Lumpsum").value = 'N'; }
if(document.getElementById("Prorata").checked == true) { document.getElementById("Prorata").value = 'Y'; } else { document.getElementById("Prorata").value = 'N'; }
if(document.getElementById("ConPTax").checked == true) { document.getElementById("ConPTax").value = 'Y'; } else { document.getElementById("ConPTax").value = 'N'; }
if(document.getElementById("ConESIC").checked == true) { document.getElementById("ConESIC").value = 'Y'; } else { document.getElementById("ConESIC").value = 'N'; }
if(document.getElementById("ConTDS").checked == true) { document.getElementById("ConTDS").value = 'Y'; } else { document.getElementById("ConTDS").value = 'N'; }
if(document.getElementById("ConArrCalcu").checked == true) { document.getElementById("ConArrCalcu").value = 'Y'; } else { document.getElementById("ConArrCalcu").value = 'N'; }
if(document.getElementById("EstimateTDS").checked == true) { document.getElementById("EstimateTDS").value = 'Y'; } else { document.getElementById("EstimateTDS").value = 'N'; }
if(document.getElementById("DedIncTax").checked == true) { document.getElementById("DedIncTax").value = 'Y'; } else { document.getElementById("DedIncTax").value = 'N'; }
}

function Checked_1()
{
if(document.getElementById("ConPF1").checked == true) { document.getElementById("ConPF1").value = 'Y'; } else { document.getElementById("ConPF1").value = 'N'; }
if(document.getElementById("Lumpsum1").checked == true) { document.getElementById("Lumpsum1").value = 'Y'; } else { document.getElementById("Lumpsum1").value = 'N'; }
if(document.getElementById("Prorata1").checked == true) { document.getElementById("Prorata1").value = 'Y'; } else { document.getElementById("Prorata1").value = 'N'; }
if(document.getElementById("ConPTax1").checked == true) { document.getElementById("ConPTax1").value = 'Y'; } else { document.getElementById("ConPTax1").value = 'N'; }
if(document.getElementById("ConESIC1").checked == true) { document.getElementById("ConESIC1").value = 'Y'; } else { document.getElementById("ConESIC1").value = 'N'; }
if(document.getElementById("ConTDS1").checked == true) { document.getElementById("ConTDS1").value = 'Y'; } else { document.getElementById("ConTDS1").value = 'N'; }
if(document.getElementById("ConArrCalcu1").checked == true) { document.getElementById("ConArrCalcu1").value = 'Y'; } else { document.getElementById("ConArrCalcu1").value = 'N'; }
if(document.getElementById("EstimateTDS1").checked == true) { document.getElementById("EstimateTDS1").value = 'Y'; } else { document.getElementById("EstimateTDS1").value = 'N'; }
if(document.getElementById("DedIncTax1").checked == true) { document.getElementById("DedIncTax1").value = 'Y'; } else { document.getElementById("DedIncTax1").value = 'N'; }
}
