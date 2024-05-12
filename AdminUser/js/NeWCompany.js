// JavaScript Document
function NewComUser() { var agreeNew=confirm("Are you sure you want to Create New Company User?");
if (agreeNew) { document.getElementById("Com_detailsNew").style.display = 'none'; document.getElementById("ComNewUser").style.display = 'block'; document.getElementById("Addnew").style.display = 'none'; document.getElementById("AddnewComUser").style.display = 'block'; }}

function validate(Newform)
{
  var ComName = Newform.ComName.value;  var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(ComName);
  if (ComName.length === 0) { alert("You must enter a Company Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field');  return false; }	

  var ComNoOfEmp = Newform.ComNoOfEmp.value;  var Numfilter=/^[0-9]+$/;  var test_num = Numfilter.test(ComNoOfEmp);
  if (ComNoOfEmp.length === 0)  { alert("You must enter a Number Of Employee.."); return false; }	
  if(test_num==false) { alert('Please Enter Only Number in the No. Of Emp Field'); return false; }	


  var ComPhone1 = Newform.ComPhone1.value;   var test_num1 = Numfilter.test(ComPhone1);
  if (ComPhone1.length === 0)  { alert("You must enter a Phone No1..");  return false; }	
  if (ComPhone1.length<10 || ComPhone1.length>10)  { alert("Please enter a Right Formate of Phone No..1");  return false; }
  if(test_num1==false) { alert('Please Enter Only Number in the Phone No1. Field'); return false; }	
  
  var ComPhone2 = Newform.ComPhone2.value;   var test_num2 = Numfilter.test(ComPhone2);
  if (ComPhone2.length === 0)  { alert("You must enter a Phone No2..");  return false; }	
  if (ComPhone2.length<10 || ComPhone2.length>10)  { alert("Please enter a Right Formate of Phone No..2");  return false; }
  if(test_num2==false) { alert('Please Enter Only Number in the Phone No2. Field'); return false; }	
  
  var ComFaxNo = Newform.ComFaxNo.value;   var test_num3 = Numfilter.test(ComFaxNo);
  if (ComFaxNo.length === 0)  { alert("You must enter a FaxNo No..1");  return false; }	
  if (ComFaxNo.length<10 || ComPhone2.length>10)  { alert("Please enter a Right Formate of Fax No..1");  return false; }
  if(test_num3==false) { alert('Please Enter Only Number in the FaxNo Field'); return false; }	
  
  var ComEmail1 = Newform.ComEmail1.value;
  var EmailPattern1 = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var EmailCheck1 = EmailPattern1.test(ComEmail1);
  if (ComEmail1.length === 0)   { alert("You must enter a EmailID1..");   return false; }	
  if(!(EmailCheck1)) { alert("You haven't entered in an valid email address1!");   return false; } 
  
  var ComEmail2 = Newform.ComEmail2.value;
  var EmailPattern2 = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var EmailCheck2 = EmailPattern2.test(ComEmail2);
  if (ComEmail2.length === 0)   { alert("You must enter a EmailID2..");   return false; }	
  if(!(EmailCheck2)) { alert("You haven't entered in an valid email address2!");   return false; } 
  
  var ComPinNo = Newform.ComPinNo.value;   var test_num3 = Numfilter.test(ComPinNo);
  if (ComPinNo.length === 0)  { alert("You must enter a Pin No..");  return false; }	
  if (ComPinNo.length<6 || ComPinNo.length>6)  { alert("Please enter a Right Formate of Pin No..2");  return false; }
  if(test_num3==false) { alert('Please Enter Only Number in the Pin No2. Field'); return false; }	
 
 } 
 
