// JavaScript Document
function validate(formEexp)
{  
  var CompanyName1 = formEexp.CompanyName1.value;  
  //if(CompanyName1!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName1);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 1 rows');  return false; } }
  var Desig1 = formEexp.Desig1.value;  
  //if(CompanyName1!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool1 = filter.test(Desig1);
  //if (Desig1.length ===0 ) { alert("Please enter designation name Field from 1 rows.");  return false; }
  //if(test_bool1==false) { alert('Please Enter Only Alphabets in the designation Name Field from 1 rows');  return false; } }
  if(Desig1!=''){if (CompanyName1.length ===0 && Desig1.length >=0)  { alert("Please enter company name Field from 1 rows.");  return false; } }
  var ExpFrom1 = formEexp.ExpFrom1.value; 
  if(CompanyName1!=''){  if (ExpFrom1.length ===0 ) { alert("Please enter experiance_from, from 1 rows.");  return false; } }
  if(ExpFrom1!=''){if (CompanyName1.length ===0 && ExpFrom1.length >=0)  { alert("Please enter company name Field from 1 rows.");  return false; } }
  var ExpTo1 = formEexp.ExpTo1.value; 
  if(CompanyName1!=''){  if (ExpTo1.length ===0 ) { alert("Please enter experiance to from 1 rows.");  return false; } }
  if(ExpTo1!=''){if (CompanyName1.length ===0 && ExpTo1.length >=0)  { alert("Please enter company name Field from 1 rows.");  return false; } }
  var Salary1 = formEexp.Salary1.value; 
  //if (CompanyName1!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num1 = Numfilter.test(Salary1);
  //if (Salary1.length ===0 ) { alert("Please enter salary from 1 rows.");  return false; }
  //if(test_num1==false) { alert('Please Enter Only Number in the Salary1 Field from 1 rows'); return false; }}
  //if(Salary1!=''){if (CompanyName1.length ===0 && Salary1.length >=0)  { alert("Please enter company name Field from 1 rows.");  return false; } }
  var Remark1 = formEexp.Remark1.value; 
  if(Remark1!=''){if (CompanyName1.length ===0 && Remark1.length >=0)  { alert("Please enter company name Field from 1 rows.");  return false; } }
  
  var CompanyName2 = formEexp.CompanyName2.value;  
  //if(CompanyName2!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName2);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 2 rows');  return false; } }
  var Desig2 = formEexp.Desig2.value;  
 // if(CompanyName2!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool2 = filter.test(Desig2);
 // if (Desig2.length ===0 ) { alert("Please enter designation name Field from 2 rows.");  return false; }
 // if(test_bool2==false) { alert('Please Enter Only Alphabets in the designation Name Field from 2 rows');  return false; } }
  if(Desig2!=''){if (CompanyName2.length ===0 && Desig2.length >=0)  { alert("Please enter company name Field from 2 rows.");  return false; } }
  var ExpFrom2 = formEexp.ExpFrom2.value; 
  if(CompanyName2!=''){  if (ExpFrom2.length ===0 ) { alert("Please enter experiance_from, from 2 rows.");  return false; } }
  if(ExpFrom2!=''){if (CompanyName2.length ===0 && ExpFrom2.length >=0)  { alert("Please enter company name Field from 2 rows.");  return false; } }
  var ExpTo2 = formEexp.ExpTo2.value; 
  if(CompanyName2!=''){  if (ExpTo2.length ===0 ) { alert("Please enter experiance to from 2 rows.");  return false; } }
  if(ExpTo2!=''){if (CompanyName2.length ===0 && ExpTo2.length >=0)  { alert("Please enter company name Field from 2 rows.");  return false; } }
  var Salary2 = formEexp.Salary2.value; 
  //if (CompanyName2!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num2 = Numfilter.test(Salary2);
 // if (Salary2.length ===0 ) { alert("Please enter salary from 2 rows.");  return false; }
  //if(test_num2==false) { alert('Please Enter Only Number in the Salary2 Field from 2 rows'); return false; }}
  //if(Salary2!=''){if (CompanyName2.length ===0 && Salary2.length >=0)  { alert("Please enter company name Field from 2 rows.");  return false; } }
  var Remark2 = formEexp.Remark2.value; 
  if(Remark2!=''){if (CompanyName2.length ===0 && Remark2.length >=0)  { alert("Please enter company name Field from 2 rows.");  return false; } }

  var CompanyName3 = formEexp.CompanyName3.value;  
  //if(CompanyName3!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName3);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 3 rows');  return false; } }
  var Desig3 = formEexp.Desig3.value;  
  //if(CompanyName3!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool3 = filter.test(Desig3);
 // if (Desig3.length ===0 ) { alert("Please enter designation name Field from 3 rows.");  return false; }
  //if(test_bool3==false) { alert('Please Enter Only Alphabets in the designation Name Field from 3 rows');  return false; } }
  if(Desig3!=''){if (CompanyName3.length ===0 && Desig3.length >=0)  { alert("Please enter company name Field from 3 rows.");  return false; } }
  var ExpFrom3 = formEexp.ExpFrom3.value; 
  if(CompanyName3!=''){  if (ExpFrom3.length ===0 ) { alert("Please enter experiance_from, from 3 rows.");  return false; } }
  if(ExpFrom3!=''){if (CompanyName3.length ===0 && ExpFrom3.length >=0)  { alert("Please enter company name Field from 3 rows.");  return false; } }
  var ExpTo3 = formEexp.ExpTo3.value; 
  if(CompanyName3!=''){  if (ExpTo3.length ===0 ) { alert("Please enter experiance to from 3 rows.");  return false; } }
  if(ExpTo3!=''){if (CompanyName3.length ===0 && ExpTo3.length >=0)  { alert("Please enter company name Field from 3 rows.");  return false; } }
  var Salary3 = formEexp.Salary3.value; 
 // if (CompanyName3!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num3 = Numfilter.test(Salary3);
 // if (Salary3.length ===0 ) { alert("Please enter salary from 3 rows.");  return false; }
  //if(test_num3==false) { alert('Please Enter Only Number in the Salary3 Field from 3 rows'); return false; } }	
  //if(Salary3!=''){if (CompanyName3.length ===0 && Salary3.length >=0)  { alert("Please enter company name Field from 3 rows.");  return false; } }
  var Remark3 = formEexp.Remark3.value; 
  if(Remark3!=''){if (CompanyName3.length ===0 && Remark3.length >=0)  { alert("Please enter company name Field from 3 rows.");  return false; } }
  
  var CompanyName4 = formEexp.CompanyName4.value;  
  //if(CompanyName4!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName4);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 4 rows');  return false; } }
  var Desig4 = formEexp.Desig4.value;  
  //if(CompanyName4!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool4 = filter.test(Desig4);
  //if (Desig4.length ===0 ) { alert("Please enter designation name Field from 4 rows.");  return false; }
  //if(test_bool4==false) { alert('Please Enter Only Alphabets in the designation Name Field from 4 rows');  return false; } }
  if(Desig4!=''){if (CompanyName4.length ===0 && Desig4.length >=0)  { alert("Please enter company name Field from 4 rows.");  return false; } }
  var ExpFrom4 = formEexp.ExpFrom4.value; 
  if(CompanyName4!=''){  if (ExpFrom4.length ===0 ) { alert("Please enter experiance_from, from 4 rows.");  return false; } }
  if(ExpFrom4!=''){if (CompanyName4.length ===0 && ExpFrom4.length >=0)  { alert("Please enter company name Field from 4 rows.");  return false; } }
  var ExpTo4 = formEexp.ExpTo4.value; 
  if(CompanyName4!=''){  if (ExpTo4.length ===0 ) { alert("Please enter experiance to from 4 rows.");  return false; } }
  if(ExpTo4!=''){if (CompanyName4.length ===0 && ExpTo4.length >=0)  { alert("Please enter company name Field from 4 rows.");  return false; } }
  var Salary4 = formEexp.Salary4.value; 
  //if (CompanyName4!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num4 = Numfilter.test(Salary4);
  //if (Salary4.length ===0 ) { alert("Please enter salary from 4 rows.");  return false; }
 // if(test_num4==false) { alert('Please Enter Only Number in the Salary4 Field from 4 rows'); return false; } }	
  //if(Salary4!=''){if (CompanyName4.length ===0 && Salary4.length >=0)  { alert("Please enter company name Field from 4 rows.");  return false; } }
  var Remark4 = formEexp.Remark4.value; 
  if(Remark4!=''){if (CompanyName4.length ===0 && Remark4.length >=0)  { alert("Please enter company name Field from 4 rows.");  return false; } }

  var CompanyName5 = formEexp.CompanyName5.value;  
  //if(CompanyName5!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName5);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 5 rows');  return false; } }
  var Desig5 = formEexp.Desig5.value;  
  ///if(CompanyName5!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool5 = filter.test(Desig5);
  //if (Desig5.length ===0 ) { alert("Please enter designation name Field from 5 rows.");  return false; }
  //if(test_bool5==false) { alert('Please Enter Only Alphabets in the designation Name Field from 5 rows');  return false; } }
  if(Desig5!=''){if (CompanyName5.length ===0 && Desig5.length >=0)  { alert("Please enter company name Field from 5 rows.");  return false; } }
  var ExpFrom5 = formEexp.ExpFrom5.value; 
  if(CompanyName5!=''){  if (ExpFrom5.length ===0 ) { alert("Please enter experiance_from, from 5 rows.");  return false; } }
  if(ExpFrom5!=''){if (CompanyName5.length ===0 && ExpFrom5.length >=0)  { alert("Please enter company name Field from 5 rows.");  return false; } }
  var ExpTo5 = formEexp.ExpTo5.value; 
  if(CompanyName5!=''){  if (ExpTo5.length ===0 ) { alert("Please enter experiance to from 5 rows.");  return false; } }
  if(ExpTo5!=''){if (CompanyName5.length ===0 && ExpTo5.length >=0)  { alert("Please enter company name Field from 5 rows.");  return false; } }
  var Salary5 = formEexp.Salary5.value; 
 // if (CompanyName5!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num5 = Numfilter.test(Salary5);
  //if (Salary5.length ===0 ) { alert("Please enter salary from 5 rows.");  return false; }
  //if(test_num5==false) { alert('Please Enter Only Number in the Salary5 Field from 5 rows'); return false; } }	
  //if(Salary5!=''){if (CompanyName5.length ===0 && Salary5.length >=0)  { alert("Please enter company name Field from 5 rows.");  return false; } }
  var Remark5 = formEexp.Remark5.value; 
  if(Remark5!=''){if (CompanyName5.length ===0 && Remark5.length >=0)  { alert("Please enter company name Field from 5 rows.");  return false; } }
  
   var CompanyName6 = formEexp.CompanyName6.value;  
 // if(CompanyName6!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName6);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 6 rows');  return false; } }
  var Desig6 = formEexp.Desig6.value;  
  //if(CompanyName6!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool6 = filter.test(Desig6);
  //if (Desig6.length ===0 ) { alert("Please enter designation name Field from 6 rows.");  return false; }
  //if(test_bool6==false) { alert('Please Enter Only Alphabets in the designation Name Field from 6 rows');  return false; } }
  if(Desig6!=''){if (CompanyName6.length ===0 && Desig6.length >=0)  { alert("Please enter company name Field from 6 rows.");  return false; } }
  var ExpFrom6 = formEexp.ExpFrom6.value; 
  if(CompanyName6!=''){  if (ExpFrom6.length ===0 ) { alert("Please enter experiance_from, from 6 rows.");  return false; } }
  if(ExpFrom6!=''){if (CompanyName6.length ===0 && ExpFrom6.length >=0)  { alert("Please enter company name Field from 6 rows.");  return false; } }
  var ExpTo6 = formEexp.ExpTo6.value; 
  if(CompanyName6!=''){  if (ExpTo6.length ===0 ) { alert("Please enter experiance to from 6 rows.");  return false; } }
  if(ExpTo6!=''){if (CompanyName6.length ===0 && ExpTo6.length >=0)  { alert("Please enter company name Field from 6 rows.");  return false; } }
  var Salary6 = formEexp.Salary6.value; 
  //if (CompanyName6!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num6 = Numfilter.test(Salary6);
  //if (Salary6.length ===0 ) { alert("Please enter salary from 6 rows.");  return false; }
  //if(test_num6==false) { alert('Please Enter Only Number in the Salary6 Field from 6 rows'); return false; } }
  //if(Salary6!=''){if (CompanyName6.length ===0 && Salary6.length >=0)  { alert("Please enter company name Field from 6 rows.");  return false; } }
  var Remark6 = formEexp.Remark6.value; 
  if(Remark6!=''){if (CompanyName6.length ===0 && Remark6.length >=0)  { alert("Please enter company name Field from 6 rows.");  return false; } }

  var CompanyName7 = formEexp.CompanyName7.value;  
  //if(CompanyName7!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName7);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 7 rows');  return false; } }
  var Desig7 = formEexp.Desig7.value;  
  //if(CompanyName7!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool7 = filter.test(Desig7);
  //if (Desig7.length ===0 ) { alert("Please enter designation name Field from 7 rows.");  return false; }
  //if(test_bool7==false) { alert('Please Enter Only Alphabets in the designation Name Field from 7 rows');  return false; } }
  if(Desig7!=''){if (CompanyName7.length ===0 && Desig7.length >=0)  { alert("Please enter company name Field from 7 rows.");  return false; } }
  var ExpFrom7 = formEexp.ExpFrom7.value; 
  if(CompanyName7!=''){  if (ExpFrom7.length ===0 ) { alert("Please enter experiance_from, from 7 rows.");  return false; } }
  if(ExpFrom7!=''){if (CompanyName7.length ===0 && ExpFrom7.length >=0)  { alert("Please enter company name Field from 7 rows.");  return false; } }
  var ExpTo7 = formEexp.ExpTo7.value; 
  if(CompanyName7!=''){  if (ExpTo7.length ===0 ) { alert("Please enter experiance to from 7 rows.");  return false; } }
  if(ExpTo7!=''){if (CompanyName7.length ===0 && ExpTo7.length >=0)  { alert("Please enter company name Field from 7 rows.");  return false; } }
  var Salary7 = formEexp.Salary7.value; 
  //if (CompanyName7!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num7 = Numfilter.test(Salary7);
  //if (Salary7.length ===0 ) { alert("Please enter salary from 7 rows.");  return false; }
 // if(test_num7==false) { alert('Please Enter Only Number in the Salary7 Field from 7 rows'); return false; } }	
 // if(Salary7!=''){if (CompanyName7.length ===0 && Salary7.length >=0)  { alert("Please enter company name Field from 7 rows.");  return false; } }
  var Remark7 = formEexp.Remark7.value; 
  if(Remark7!=''){if (CompanyName7.length ===0 && Remark7.length >=0)  { alert("Please enter company name Field from 7 rows.");  return false; } }

 var CompanyName8 = formEexp.CompanyName8.value;  
  //if(CompanyName8!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName8);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 8 rows');  return false; } }
  var Desig8 = formEexp.Desig8.value;  
  //if(CompanyName8!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool8 = filter.test(Desig8);
  //if (Desig8.length ===0 ) { alert("Please enter designation name Field from 8 rows.");  return false; }
  //if(test_bool8==false) { alert('Please Enter Only Alphabets in the designation Name Field from 8 rows');  return false; } }
  if(Desig8!=''){if (CompanyName8.length ===0 && Desig8.length >=0)  { alert("Please enter company name Field from 8 rows.");  return false; } }
  var ExpFrom8 = formEexp.ExpFrom8.value; 
  if(CompanyName8!=''){  if (ExpFrom8.length ===0 ) { alert("Please enter experiance_from, from 8 rows.");  return false; } }
  if(ExpFrom8!=''){if (CompanyName8.length ===0 && ExpFrom8.length >=0)  { alert("Please enter company name Field from 8 rows.");  return false; } }
  var ExpTo8 = formEexp.ExpTo8.value; 
  if(CompanyName8!=''){  if (ExpTo8.length ===0 ) { alert("Please enter experiance to from 8 rows.");  return false; } }
  if(ExpTo8!=''){if (CompanyName8.length ===0 && ExpTo8.length >=0)  { alert("Please enter company name Field from 8 rows.");  return false; } }
  var Salary8 = formEexp.Salary8.value; 
  //if (CompanyName8!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num8 = Numfilter.test(Salary8);
  //if (Salary8.length ===0 ) { alert("Please enter salary from 8 rows.");  return false; }
  //if(test_num8==false) { alert('Please Enter Only Number in the Salary8 Field from 8 rows'); return false; } }	
 // if(Salary8!=''){if (CompanyName8.length ===0 && Salary8.length >=0)  { alert("Please enter company name Field from 8 rows.");  return false; } }
  var Remark8 = formEexp.Remark8.value; 
  if(Remark8!=''){if (CompanyName8.length ===0 && Remark8.length >=0)  { alert("Please enter company name Field from 8 rows.");  return false; } }


  var CompanyName9 = formEexp.CompanyName9.value;  
  //if(CompanyName9!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName9);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 9 rows');  return false; } }
  var Desig9 = formEexp.Desig9.value;  
  //if(CompanyName9!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool9 = filter.test(Desig9);
  //if (Desig9.length ===0 ) { alert("Please enter designation name Field from 9 rows.");  return false; }
  //if(test_bool9==false) { alert('Please Enter Only Alphabets in the designation Name Field from 9 rows');  return false; } }
  if(Desig9!=''){if (CompanyName9.length ===0 && Desig9.length >=0)  { alert("Please enter company name Field from 9 rows.");  return false; } }
  var ExpFrom9 = formEexp.ExpFrom9.value; 
  if(CompanyName9!=''){  if (ExpFrom9.length ===0 ) { alert("Please enter experiance_from, from 9 rows.");  return false; } }
  if(ExpFrom9!=''){if (CompanyName9.length ===0 && ExpFrom9.length >=0)  { alert("Please enter company name Field from 9 rows.");  return false; } }
  var ExpTo9 = formEexp.ExpTo9.value; 
  if(CompanyName9!=''){  if (ExpTo9.length ===0 ) { alert("Please enter experiance to from 9 rows.");  return false; } }
  if(ExpTo9!=''){if (CompanyName9.length ===0 && ExpTo9.length >=0)  { alert("Please enter company name Field from 9 rows.");  return false; } }
  var Salary9 = formEexp.Salary9.value; 
  //if (CompanyName9!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num9 = Numfilter.test(Salary9);
  //if (Salary9.length ===0 ) { alert("Please enter salary from 9 rows.");  return false; }
  //if(test_num9==false) { alert('Please Enter Only Number in the Salary9 Field from 9 rows'); return false; } }	
  //if(Salary9!=''){if (CompanyName9.length ===0 && Salary9.length >=0)  { alert("Please enter company name Field from 9 rows.");  return false; } }
  var Remark9 = formEexp.Remark9.value; 
  if(Remark9!=''){if (CompanyName9.length ===0 && Remark9.length >=0)  { alert("Please enter company name Field from 9 rows.");  return false; } }

 var CompanyName10 = formEexp.CompanyName10.value;  
  //if(CompanyName10!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName10);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 10 rows');  return false; } }
  var Desig10 = formEexp.Desig10.value;  
 // if(CompanyName10!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool10 = filter.test(Desig10);
  //if (Desig10.length ===0 ) { alert("Please enter designation name Field from 10 rows.");  return false; }
  //if(test_bool10==false) { alert('Please Enter Only Alphabets in the designation Name Field from 10 rows');  return false; } }
  if(Desig10!=''){if (CompanyName10.length ===0 && Desig10.length >=0)  { alert("Please enter company name Field from 10 rows.");  return false; } }
  var ExpFrom10 = formEexp.ExpFrom10.value; 
  if(CompanyName10!=''){  if (ExpFrom10.length ===0 ) { alert("Please enter experiance_from, from 10 rows.");  return false; } }
  if(ExpFrom10!=''){if (CompanyName10.length ===0 && ExpFrom10.length >=0)  { alert("Please enter company name Field from 10 rows.");  return false; } }
  var ExpTo10 = formEexp.ExpTo10.value; 
  if(CompanyName10!=''){  if (ExpTo10.length ===0 ) { alert("Please enter experiance to from 10 rows.");  return false; } }
  if(ExpTo10!=''){if (CompanyName10.length ===0 && ExpTo10.length >=0)  { alert("Please enter company name Field from 10 rows.");  return false; } }
  var Salary10 = formEexp.Salary10.value; 
  //if (CompanyName10!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num10 = Numfilter.test(Salary10);
  //if (Salary10.length ===0 ) { alert("Please enter salary from 10 rows.");  return false; }
 // if(test_num10==false) { alert('Please Enter Only Number in the Salary10 Field from 10 rows'); return false; }}	
  //if(Salary10!=''){if (CompanyName10.length ===0 && Salary10.length >=0)  { alert("Please enter company name Field from 10 rows.");  return false; } }
  var Remark10 = formEexp.Remark10.value; 
  if(Remark10!=''){if (CompanyName10.length ===0 && Remark10.length >=0)  { alert("Please enter company name Field from 10 rows.");  return false; } }
  
   var CompanyName11 = formEexp.CompanyName11.value;  
  //if(CompanyName11!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName11);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 11 rows');  return false; } }
  var Desig11 = formEexp.Desig11.value;  
  //if(CompanyName11!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool11 = filter.test(Desig11);
  //if (Desig11.length ===0 ) { alert("Please enter designation name Field from 11 rows.");  return false; }
  //if(test_bool11==false) { alert('Please Enter Only Alphabets in the designation Name Field from 11 rows');  return false; } }
  if(Desig11!=''){if (CompanyName11.length ===0 && Desig11.length >=0)  { alert("Please enter company name Field from 11 rows.");  return false; } }
  var ExpFrom11 = formEexp.ExpFrom11.value; 
  if(CompanyName11!=''){  if (ExpFrom11.length ===0 ) { alert("Please enter experiance_from, from 11 rows.");  return false; } }
  if(ExpFrom11!=''){if (CompanyName11.length ===0 && ExpFrom11.length >=0)  { alert("Please enter company name Field from 11 rows.");  return false; } }
  var ExpTo11 = formEexp.ExpTo11.value; 
  if(CompanyName11!=''){  if (ExpTo11.length ===0 ) { alert("Please enter experiance to from 11 rows.");  return false; } }
  if(ExpTo11!=''){if (CompanyName11.length ===0 && ExpTo11.length >=0)  { alert("Please enter company name Field from 11 rows.");  return false; } }
  var Salary11 = formEexp.Salary11.value; 
  //if (CompanyName11!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num11 = Numfilter.test(Salary11);
  //if (Salary11.length ===0 ) { alert("Please enter salary from 11 rows.");  return false; }
  //if(test_num11==false) { alert('Please Enter Only Number in the Salary11 Field from 11 rows'); return false; }}	
  //if(Salary11!=''){if (CompanyName11.length ===0 && Salary11.length >=0)  { alert("Please enter company name Field from 11 rows.");  return false; } }
  var Remark11 = formEexp.Remark11.value; 
  if(Remark11!=''){if (CompanyName11.length ===0 && Remark11.length >=0)  { alert("Please enter company name Field from 11 rows.");  return false; } }
  
  
   var CompanyName12 = formEexp.CompanyName12.value;  
  //if(CompanyName12!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName12);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 12 rows');  return false; } }
  var Desig12 = formEexp.Desig12.value;  
  //if(CompanyName12!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool12 = filter.test(Desig12);
  //if (Desig12.length ===0 ) { alert("Please enter designation name Field from 12 rows.");  return false; }
  //if(test_bool12==false) { alert('Please Enter Only Alphabets in the designation Name Field from 12 rows');  return false; } }
  if(Desig12!=''){if (CompanyName12.length ===0 && Desig12.length >=0)  { alert("Please enter company name Field from 12 rows.");  return false; } }
  var ExpFrom12 = formEexp.ExpFrom12.value; 
  if(CompanyName12!=''){  if (ExpFrom12.length ===0 ) { alert("Please enter experiance_from, from 12 rows.");  return false; } }
  if(ExpFrom12!=''){if (CompanyName12.length ===0 && ExpFrom12.length >=0)  { alert("Please enter company name Field from 12 rows.");  return false; } }
  var ExpTo12 = formEexp.ExpTo12.value; 
  if(CompanyName12!=''){  if (ExpTo12.length ===0 ) { alert("Please enter experiance to from 12 rows.");  return false; } }
  if(ExpTo12!=''){if (CompanyName12.length ===0 && ExpTo12.length >=0)  { alert("Please enter company name Field from 12 rows.");  return false; } }
  var Salary12 = formEexp.Salary12.value; 
  //if (CompanyName12!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num12 = Numfilter.test(Salary12);
  //if (Salary12.length ===0 ) { alert("Please enter salary from 12 rows.");  return false; }
  //if(test_num12==false) { alert('Please Enter Only Number in the Salary12 Field from 12 rows'); return false; }	}
  //if(Salary12!=''){if (CompanyName12.length ===0 && Salary12.length >=0)  { alert("Please enter company name Field from 12 rows.");  return false; } }
  var Remark12 = formEexp.Remark12.value; 
  if(Remark12!=''){if (CompanyName12.length ===0 && Remark12.length >=0)  { alert("Please enter company name Field from 12 rows.");  return false; } }

 var CompanyName13 = formEexp.CompanyName13.value;  
  //if(CompanyName13!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName13);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 13 rows');  return false; } }
  var Desig13 = formEexp.Desig13.value;  
  //if(CompanyName13!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool13 = filter.test(Desig13);
 // if (Desig13.length ===0 ) { alert("Please enter designation name Field from 13 rows.");  return false; }
  //if(test_bool13==false) { alert('Please Enter Only Alphabets in the designation Name Field from 13 rows');  return false; } }
  if(Desig13!=''){if (CompanyName13.length ===0 && Desig13.length >=0)  { alert("Please enter company name Field from 13 rows.");  return false; } }
  var ExpFrom13 = formEexp.ExpFrom13.value; 
  if(CompanyName13!=''){  if (ExpFrom13.length ===0 ) { alert("Please enter experiance_from, from 13 rows.");  return false; } }
  if(ExpFrom13!=''){if (CompanyName13.length ===0 && ExpFrom13.length >=0)  { alert("Please enter company name Field from 13 rows.");  return false; } }
  var ExpTo13 = formEexp.ExpTo13.value; 
  if(CompanyName13!=''){  if (ExpTo13.length ===0 ) { alert("Please enter experiance to from 13 rows.");  return false; } }
  if(ExpTo13!=''){if (CompanyName13.length ===0 && ExpTo13.length >=0)  { alert("Please enter company name Field from 13 rows.");  return false; } }
  var Salary13 = formEexp.Salary13.value; 
  //if (CompanyName13!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num13 = Numfilter.test(Salary13);
  //if (Salary13.length ===0 ) { alert("Please enter salary from 13 rows.");  return false; }
 // if(test_num13==false) { alert('Please Enter Only Number in the Salary13 Field from 13 rows'); return false; }	}
  //if(Salary13!=''){if (CompanyName13.length ===0 && Salary13.length >=0)  { alert("Please enter company name Field from 13 rows.");  return false; } }
  var Remark13 = formEexp.Remark13.value; 
  if(Remark13!=''){if (CompanyName13.length ===0 && Remark13.length >=0)  { alert("Please enter company name Field from 13 rows.");  return false; } }

 var CompanyName14 = formEexp.CompanyName14.value;  
  //if(CompanyName14!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName14);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 14 rows');  return false; } }
  var Desig14 = formEexp.Desig14.value;  
 // if(CompanyName14!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool14 = filter.test(Desig14);
  //if (Desig14.length ===0 ) { alert("Please enter designation name Field from 14 rows.");  return false; }
  //if(test_bool14==false) { alert('Please Enter Only Alphabets in the designation Name Field from 14 rows');  return false; } }
  if(Desig14!=''){if (CompanyName14.length ===0 && Desig14.length >=0)  { alert("Please enter company name Field from 14 rows.");  return false; } }
  var ExpFrom14 = formEexp.ExpFrom14.value; 
  if(CompanyName14!=''){  if (ExpFrom14.length ===0 ) { alert("Please enter experiance_from, from 14 rows.");  return false; } }
  if(ExpFrom14!=''){if (CompanyName14.length ===0 && ExpFrom14.length >=0)  { alert("Please enter company name Field from 14 rows.");  return false; } }
  var ExpTo14 = formEexp.ExpTo14.value; 
  if(CompanyName14!=''){  if (ExpTo14.length ===0 ) { alert("Please enter experiance to from 14 rows.");  return false; } }
  if(ExpTo14!=''){if (CompanyName14.length ===0 && ExpTo14.length >=0)  { alert("Please enter company name Field from 14 rows.");  return false; } }
  var Salary14 = formEexp.Salary14.value; 
  //if (CompanyName14!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num14 = Numfilter.test(Salary14);
  //if (Salary14.length ===0 ) { alert("Please enter salary from 14 rows.");  return false; }
  //if(test_num14==false) { alert('Please Enter Only Number in the Salary14 Field from 14 rows'); return false; }	}
 // if(Salary14!=''){if (CompanyName14.length ===0 && Salary14.length >=0)  { alert("Please enter company name Field from 14 rows.");  return false; } }
  var Remark14 = formEexp.Remark14.value; 
  if(Remark14!=''){if (CompanyName14.length ===0 && Remark14.length >=0)  { alert("Please enter company name Field from 14 rows.");  return false; } }


 var CompanyName15 = formEexp.CompanyName15.value;  
  //if(CompanyName15!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName15);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 15 rows');  return false; } }
  var Desig15 = formEexp.Desig15.value;  
 // if(CompanyName15!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool15 = filter.test(Desig15);
  //if (Desig15.length ===0 ) { alert("Please enter designation name Field from 15 rows.");  return false; }
 // if(test_bool15==false) { alert('Please Enter Only Alphabets in the designation Name Field from 15 rows');  return false; } }
  if(Desig15!=''){if (CompanyName15.length ===0 && Desig15.length >=0)  { alert("Please enter company name Field from 15 rows.");  return false; } }
  var ExpFrom15 = formEexp.ExpFrom15.value; 
  if(CompanyName15!=''){  if (ExpFrom15.length ===0 ) { alert("Please enter experiance_from, from 15 rows.");  return false; } }
  if(ExpFrom15!=''){if (CompanyName15.length ===0 && ExpFrom15.length >=0)  { alert("Please enter company name Field from 15 rows.");  return false; } }
  var ExpTo15 = formEexp.ExpTo15.value; 
  if(CompanyName15!=''){  if (ExpTo15.length ===0 ) { alert("Please enter experiance to from 15 rows.");  return false; } }
  if(ExpTo15!=''){if (CompanyName15.length ===0 && ExpTo15.length >=0)  { alert("Please enter company name Field from 15 rows.");  return false; } }
  var Salary15 = formEexp.Salary15.value; 
 // if (CompanyName15!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num15 = Numfilter.test(Salary15);
  //if (Salary15.length ===0 ) { alert("Please enter salary from 15 rows.");  return false; }
 // if(test_num15==false) { alert('Please Enter Only Number in the Salary15 Field from 15 rows'); return false; }	}
  //if(Salary15!=''){if (CompanyName15.length ===0 && Salary15.length >=0)  { alert("Please enter company name Field from 15 rows.");  return false; } }
  var Remark15 = formEexp.Remark15.value; 
  if(Remark15!=''){if (CompanyName15.length ===0 && Remark15.length >=0)  { alert("Please enter company name Field from 15 rows.");  return false; } }

 var CompanyName16 = formEexp.CompanyName16.value;  
  //if(CompanyName16!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName16);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 16 rows');  return false; } }
  var Desig16 = formEexp.Desig16.value;  
  //if(CompanyName16!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool16 = filter.test(Desig16);
  //if (Desig16.length ===0 ) { alert("Please enter designation name Field from 16 rows.");  return false; }
  //if(test_bool16==false) { alert('Please Enter Only Alphabets in the designation Name Field from 16 rows');  return false; } }
  if(Desig16!=''){if (CompanyName16.length ===0 && Desig16.length >=0)  { alert("Please enter company name Field from 16 rows.");  return false; } }
  var ExpFrom16 = formEexp.ExpFrom16.value; 
  if(CompanyName16!=''){  if (ExpFrom16.length ===0 ) { alert("Please enter experiance_from, from 16 rows.");  return false; } }
  if(ExpFrom16!=''){if (CompanyName16.length ===0 && ExpFrom16.length >=0)  { alert("Please enter company name Field from 16 rows.");  return false; } }
  var ExpTo16 = formEexp.ExpTo16.value; 
  if(CompanyName16!=''){  if (ExpTo16.length ===0 ) { alert("Please enter experiance to from 16 rows.");  return false; } }
  if(ExpTo16!=''){if (CompanyName16.length ===0 && ExpTo16.length >=0)  { alert("Please enter company name Field from 16 rows.");  return false; } }
  var Salary16 = formEexp.Salary16.value; 
  //if (CompanyName16!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num16 = Numfilter.test(Salary16);
  //if (Salary16.length ===0 ) { alert("Please enter salary from 16 rows.");  return false; }
 // if(test_num16==false) { alert('Please Enter Only Number in the Salary16 Field from 16 rows'); return false; }	}
  //if(Salary16!=''){if (CompanyName16.length ===0 && Salary16.length >=0)  { alert("Please enter company name Field from 16 rows.");  return false; } }
  var Remark16 = formEexp.Remark16.value; 
  if(Remark16!=''){if (CompanyName16.length ===0 && Remark16.length >=0)  { alert("Please enter company name Field from 16 rows.");  return false; } }


 var CompanyName17 = formEexp.CompanyName17.value;  
  //if(CompanyName17!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName17);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 17 rows');  return false; } }
  var Desig17 = formEexp.Desig17.value;  
  //if(CompanyName17!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool17 = filter.test(Desig17);
  //if (Desig17.length ===0 ) { alert("Please enter designation name Field from 17 rows.");  return false; }
  //if(test_bool17==false) { alert('Please Enter Only Alphabets in the designation Name Field from 17 rows');  return false; } }
  if(Desig17!=''){if (CompanyName17.length ===0 && Desig17.length >=0)  { alert("Please enter company name Field from 17 rows.");  return false; } }
  var ExpFrom17 = formEexp.ExpFrom17.value; 
  if(CompanyName17!=''){  if (ExpFrom17.length ===0 ) { alert("Please enter experiance_from, from 17 rows.");  return false; } }
  if(ExpFrom17!=''){if (CompanyName17.length ===0 && ExpFrom17.length >=0)  { alert("Please enter company name Field from 17 rows.");  return false; } }
  var ExpTo17 = formEexp.ExpTo17.value; 
  if(CompanyName17!=''){  if (ExpTo17.length ===0 ) { alert("Please enter experiance to from 17 rows.");  return false; } }
  if(ExpTo17!=''){if (CompanyName17.length ===0 && ExpTo17.length >=0)  { alert("Please enter company name Field from 17 rows.");  return false; } }
  var Salary17 = formEexp.Salary17.value; 
  //if (CompanyName17!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num17 = Numfilter.test(Salary17);
  //if (Salary17.length ===0 ) { alert("Please enter salary from 17 rows.");  return false; }
  //if(test_num17==false) { alert('Please Enter Only Number in the Salary17 Field from 17 rows'); return false; }}	
  //if(Salary17!=''){if (CompanyName17.length ===0 && Salary17.length >=0)  { alert("Please enter company name Field from 17 rows.");  return false; } }
  var Remark17 = formEexp.Remark17.value; 
  if(Remark17!=''){if (CompanyName17.length ===0 && Remark17.length >=0)  { alert("Please enter company name Field from 17 rows.");  return false; } }

 var CompanyName18 = formEexp.CompanyName18.value;  
  //if(CompanyName18!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName18);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 18 rows');  return false; } }
  var Desig18 = formEexp.Desig18.value;  
  //if(CompanyName18!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool18 = filter.test(Desig18);
 // if (Desig18.length ===0 ) { alert("Please enter designation name Field from 18 rows.");  return false; }
 // if(test_bool18==false) { alert('Please Enter Only Alphabets in the designation Name Field from 18 rows');  return false; } }
  if(Desig18!=''){if (CompanyName18.length ===0 && Desig18.length >=0)  { alert("Please enter company name Field from 18 rows.");  return false; } }
  var ExpFrom18 = formEexp.ExpFrom18.value; 
  if(CompanyName18!=''){  if (ExpFrom18.length ===0 ) { alert("Please enter experiance_from, from 18 rows.");  return false; } }
  if(ExpFrom18!=''){if (CompanyName18.length ===0 && ExpFrom18.length >=0)  { alert("Please enter company name Field from 18 rows.");  return false; } }
  var ExpTo18 = formEexp.ExpTo18.value; 
  if(CompanyName18!=''){  if (ExpTo18.length ===0 ) { alert("Please enter experiance to from 18 rows.");  return false; } }
  if(ExpTo18!=''){if (CompanyName18.length ===0 && ExpTo18.length >=0)  { alert("Please enter company name Field from 18 rows.");  return false; } }
  var Salary18 = formEexp.Salary18.value; 
 // if (CompanyName18!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num18 = Numfilter.test(Salary18);
  //if (Salary18.length ===0 ) { alert("Please enter salary from 18 rows.");  return false; }
 // if(test_num18==false) { alert('Please Enter Only Number in the Salary18 Field from 18 rows'); return false; }}	
  //if(Salary18!=''){if (CompanyName18.length ===0 && Salary18.length >=0)  { alert("Please enter company name Field from 18 rows.");  return false; } }
  var Remark18 = formEexp.Remark18.value; 
  if(Remark18!=''){if (CompanyName18.length ===0 && Remark18.length >=0)  { alert("Please enter company name Field from 18 rows.");  return false; } }

 var CompanyName19 = formEexp.CompanyName19.value;  
  //if(CompanyName19!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName19);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 19 rows');  return false; } }
  var Desig19 = formEexp.Desig19.value;  
 // if(CompanyName19!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool19 = filter.test(Desig19);
  //if (Desig19.length ===0 ) { alert("Please enter designation name Field from 19 rows.");  return false; }
  //if(test_bool19==false) { alert('Please Enter Only Alphabets in the designation Name Field from 19 rows');  return false; } }
  if(Desig19!=''){if (CompanyName19.length ===0 && Desig19.length >=0)  { alert("Please enter company name Field from 19 rows.");  return false; } }
  var ExpFrom19 = formEexp.ExpFrom19.value; 
  if(CompanyName19!=''){  if (ExpFrom19.length ===0 ) { alert("Please enter experiance_from, from 19 rows.");  return false; } }
  if(ExpFrom19!=''){if (CompanyName19.length ===0 && ExpFrom19.length >=0)  { alert("Please enter company name Field from 19 rows.");  return false; } }
  var ExpTo19 = formEexp.ExpTo19.value; 
  if(CompanyName19!=''){  if (ExpTo19.length ===0 ) { alert("Please enter experiance to from 19 rows.");  return false; } }
  if(ExpTo19!=''){if (CompanyName19.length ===0 && ExpTo19.length >=0)  { alert("Please enter company name Field from 19 rows.");  return false; } }
  var Salary19 = formEexp.Salary19.value; 
  //if (CompanyName19!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num19 = Numfilter.test(Salary19);
  //if (Salary19.length ===0 ) { alert("Please enter salary from 19 rows.");  return false; }
  //if(test_num19==false) { alert('Please Enter Only Number in the Salary19 Field from 19 rows'); return false; }	}
  //if(Salary19!=''){if (CompanyName19.length ===0 && Salary19.length >=0)  { alert("Please enter company name Field from 19 rows.");  return false; } }
  var Remark19 = formEexp.Remark19.value; 
  if(Remark19!=''){if (CompanyName19.length ===0 && Remark19.length >=0)  { alert("Please enter company name Field from 19 rows.");  return false; } }

 var CompanyName20 = formEexp.CompanyName20.value;  
  //if(CompanyName20!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(CompanyName20);
  //if(test_bool==false) { alert('Please Enter Only Alphabets in the Company Name Field from 20 rows');  return false; } }
  var Desig20 = formEexp.Desig20.value;  
  //if(CompanyName20!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool20 = filter.test(Desig20);
  //if (Desig20.length ===0 ) { alert("Please enter designation name Field from 20 rows.");  return false; }
 // if(test_bool20==false) { alert('Please Enter Only Alphabets in the designation Name Field from 20 rows');  return false; } }
  if(Desig20!=''){if (CompanyName20.length ===0 && Desig20.length >=0)  { alert("Please enter company name Field from 20 rows.");  return false; } }
  var ExpFrom20 = formEexp.ExpFrom20.value; 
  if(CompanyName20!=''){  if (ExpFrom20.length ===0 ) { alert("Please enter experiance_from, from 20 rows.");  return false; } }
  if(ExpFrom20!=''){if (CompanyName20.length ===0 && ExpFrom20.length >=0)  { alert("Please enter company name Field from 20 rows.");  return false; } }
  var ExpTo20 = formEexp.ExpTo20.value; 
  if(CompanyName20!=''){  if (ExpTo20.length ===0 ) { alert("Please enter experiance to from 20 rows.");  return false; } }
  if(ExpTo20!=''){if (CompanyName20.length ===0 && ExpTo20.length >=0)  { alert("Please enter company name Field from 20 rows.");  return false; } }
  var Salary20 = formEexp.Salary20.value; 
  //if (CompanyName20!='')  { var Numfilter=/^[0-9. ]+$/;  var test_num20 = Numfilter.test(Salary20);
  //if (Salary20.length ===0 ) { alert("Please enter salary from 20 rows.");  return false; }
  //if(test_num20==false) { alert('Please Enter Only Number in the Salary20 Field from 20 rows'); return false; }	}
  //if(Salary20!=''){if (CompanyName20.length ===0 && Salary20.length >=0)  { alert("Please enter company name Field from 20 rows.");  return false; } }
  var Remark20 = formEexp.Remark20.value; 
  if(Remark20!=''){if (CompanyName20.length ===0 && Remark20.length >=0)  { alert("Please enter company name Field from 20 rows.");  return false; } }


}