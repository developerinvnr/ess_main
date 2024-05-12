// JavaScript Document
function validate(form)
{  //var currpass = form.currpass.value;  //var filter=/^[0-9a-z]+$/;  //var test_bool = filter.test(currpass);
  var pass1 = form.pass1.value;  var filter1=/^[0-9a-z]+$/;  var test_bool1 = filter1.test(pass1);  var pass2 = form.pass2.value;  var filter2=/^[0-9a-z]+$/;
  var test_bool2 = filter1.test(pass2);
  
 // if (currpass.length === 0) { alert("You must enter a Current Password.");  return false; }
	if (pass1.length === 0){ alert("Please Enter a new password  ");  return false; }	
	if(test_bool1==false)  { alert('Please Enter Only numeric and small Alphabets in the new password Field'); return false; }	
}

function validateEdit(formUserEdit)
{
  var Fname = formUserEdit.Fname.value;
  var filter=/^[a-zA-Z./]+$/;
  var test_bool = filter.test(Fname);
  if (Fname.length === 0) { alert("You must enter a First Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the First Name Field');  return false; }
  
  //var Sname = formUserEdit.Sname.value;
  //var filter=/^[a-zA-Z./]+$/;
  //var test_bool = filter.test(Sname);
  //if (Sname.length === 0) { alert("You must enter a Second Name.");  return false; }
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Second Name Field');  return false; }
  
  var Lname = formUserEdit.Lname.value;
  var filter=/^[a-zA-Z./]+$/;
  var test_bool = filter.test(Lname);
  if (Lname.length === 0) { alert("You must enter a Last Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Last Name Field');  return false; }
  
  var Uname = formUserEdit.Uname.value;
  var filter=/^[a-zA-Z./]+$/;
  var test_bool = filter.test(Uname);
  if (Uname.length === 0) { alert("You must enter a User Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the User Name Field');  return false; }
}

function validateNew(formUserNew)
{
  var nFname = formUserNew.nFname.value;
  var filter=/^[a-zA-Z./]+$/;
  var test_bool = filter.test(nFname);
  if (nFname.length === 0) { alert("You must enter a First Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the First Name Field');  return false; }
  
  //var nSname = formUserNew.nSname.value;
  //var filter=/^[a-zA-Z./]+$/;
  //var test_bool = filter.test(nSname);
  //if (Sname.length === 0) { alert("You must enter a Second Name.");  return false; }
 // if(test_bool==false) { alert('Please Enter Only Alphabets in the Second Name Field');  return false; }
  
  var nLname = formUserNew.nLname.value;
  var filter=/^[a-zA-Z./]+$/;
  var test_bool = filter.test(nLname);
  if (nLname.length === 0) { alert("You must enter a Last Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Last Name Field');  return false; }
  
  var nUname = formUserNew.nUname.value;
  var filter=/^[a-zA-Z./]+$/;
  var test_bool = filter.test(nUname);
  if (nUname.length === 0) { alert("You must enter a User Name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the User Name Field');  return false; }
}