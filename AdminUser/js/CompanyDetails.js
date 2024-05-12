// JavaScript Document
function ChangeCom() 
{
document.getElementById("SaveChange").style.display = 'block';	document.getElementById("Change").style.display = 'none'; document.getElementById("ComName").disabled=false; document.getElementById("ComNoOfEmp").disabled=false; document.getElementById("ComPhone1").disabled=false; document.getElementById("ComPhone2").disabled=false; document.getElementById("ComFaxNo").disabled=false; document.getElementById("ComWebsite").disabled=false; document.getElementById("ComEmail1").disabled=false; document.getElementById("ComEmail2").disabled=false; document.getElementById("ComCountry").disabled=false; document.getElementById("ComState").disabled=false; document.getElementById("ComCity").disabled=false; document.getElementById("ComPinNo").disabled=false; document.getElementById("Addoffice").disabled=false;document.getElementById("Addoffice_Add").disabled=false;document.getElementById("Regoffice").disabled=false;document.getElementById("Regoffice_Add").disabled=false; document.getElementById("ComComment").disabled=false; 
}



function ChangeForm() { var agreeEdit=confirm("Are you sure you want to Change Company record?");
if (agreeEdit) { document.getElementById("Com_details").style.display = 'none'; document.getElementById("Com_detailsEdit").style.display = 'block'; }}
 
function validate(Editform)
{ 
  var ComName = Editform.ComName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(ComName);
  if (ComName.length === 0) { alert("You must enter a Company Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field');  return false; }	

  var ComNoOfEmp = Editform.ComNoOfEmp.value;  var Numfilter=/^[0-9]+$/;  var test_num = Numfilter.test(ComNoOfEmp);
  if (ComNoOfEmp.length === 0)  { alert("You must enter a Number Of Employee.."); return false; }	
  if(test_num==false) { alert('Please Enter Only Number in the No. Of Emp Field'); return false; }	


  var ComPhone1 = Editform.ComPhone1.value;   var test_num1 = Numfilter.test(ComPhone1);
  if (ComPhone1.length === 0)  { alert("You must enter a Phone No1..");  return false; }	
  if (ComPhone1.length<10 || ComPhone1.length>11)  { alert("Please enter a Right Formate of Phone No..1");  return false; }
  if(test_num1==false) { alert('Please Enter Only Number in the Phone No1. Field'); return false; }	
  
  var ComPhone2 = Editform.ComPhone2.value;   var test_num2 = Numfilter.test(ComPhone2);
  if (ComPhone2.length === 0)  { alert("You must enter a Phone No2..");  return false; }	
  if (ComPhone2.length<10 || ComPhone2.length>11)  { alert("Please enter a Right Formate of Phone No..2");  return false; }
  if(test_num2==false) { alert('Please Enter Only Number in the Phone No2. Field'); return false; }	
  
  var ComFaxNo = Editform.ComFaxNo.value;   var test_num3 = Numfilter.test(ComFaxNo);
  if (ComFaxNo.length === 0)  { alert("You must enter a FaxNo No..1");  return false; }	
  if (ComFaxNo.length<10 || ComPhone2.length>11)  { alert("Please enter a Right Formate of Fax No..1");  return false; }
  if(test_num3==false) { alert('Please Enter Only Number in the FaxNo Field'); return false; }	
  
  var ComEmail1 = Editform.ComEmail1.value;
  var EmailPattern1 = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var EmailCheck1 = EmailPattern1.test(ComEmail1);
  if (ComEmail1.length === 0)   { alert("You must enter a EmailID1..");   return false; }	
  if(!(EmailCheck1)) { alert("You haven't entered in an valid email address1!");   return false; } 
  
  var ComEmail2 = Editform.ComEmail2.value;
  var EmailPattern2 = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var EmailCheck2 = EmailPattern2.test(ComEmail2);
  if (ComEmail2.length === 0)   { alert("You must enter a EmailID2..");   return false; }	
  if(!(EmailCheck2)) { alert("You haven't entered in an valid email address2!");   return false; } 
  
  var ComPinNo = Editform.ComPinNo.value;   var test_num3 = Numfilter.test(ComPinNo);
  if (ComPinNo.length === 0)  { alert("You must enter a Pin No..");  return false; }	
  if (ComPinNo.length<6 || ComPinNo.length>6)  { alert("Please enter a Right Formate of Pin No..2");  return false; }
  if(test_num3==false) { alert('Please Enter Only Number in the Pin No2. Field'); return false; }	
 
 }

