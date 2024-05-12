// JavaScript Document
function validate(formEfamily)
{  
  var FatherName = formEfamily.FatherName.value;   var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(FatherName);
  if (FatherName.length ===0 ) { alert("Please enter father name Field.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the father Name Field');  return false; } 
  var FatherDob = formEfamily.FatherDob.value; 
  if(FatherName!=''){ if (FatherDob.length ===0 ) { alert("Please enter father dob.");  return false; } }
  if(FatherDob!=''){if (FatherName.length ===0 && FatherDob.length >=0)  { alert("Please enter father name Field.");  return false; } }
  var FatherQuali = formEfamily.FatherQuali.value; 
  if(FatherName!=''){ if (FatherQuali.length ===0 ) { alert("Please enter father qualification.");  return false; } }
  if(FatherQuali!=''){if (FatherName.length ===0 && FatherQuali.length >=0)  { alert("Please enter father name Field.");  return false; } }
  var FatherOccu = formEfamily.FatherOccu.value;  
  if(FatherName!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool1 = filter.test(FatherOccu);
  if (FatherOccu.length ===0 ) { alert("Please enter Father Occupation.");  return false; }
  if(test_bool1==false) { alert('Please Enter Only Alphabets in the Father Occupation Field');  return false; } }
  if(FatherOccu!=''){if (FatherName.length ===0 && FatherOccu.length >=0)  { alert("Please enter father name Field.");  return false; } }
  
  var MotherName = formEfamily.MotherName.value;   var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(MotherName);
  if (MotherName.length ===0 ) { alert("Please enter mother name Field.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the mother Name Field');  return false; } 
  var MotherDob = formEfamily.MotherDob.value; 
  if(MotherName!=''){ if (MotherDob.length ===0 ) { alert("Please enter mother dob.");  return false; } }
  if(MotherDob!=''){if (MotherName.length ===0 && MotherDob.length >=0)  { alert("Please enter mother name Field.");  return false; } }
  var MotherQuali = formEfamily.MotherQuali.value; 
  if(MotherName!=''){ if (MotherQuali.length ===0 ) { alert("Please enter mother qualification.");  return false; } }
  if(MotherQuali!=''){if (MotherName.length ===0 && MotherQuali.length >=0)  { alert("Please enter mother name Field.");  return false; } }
  var MotherOccu = formEfamily.MotherOccu.value;  
  if(MotherName!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool1 = filter.test(MotherOccu);
  if (MotherOccu.length ===0 ) { alert("Please enter Mother Occupation.");  return false; }
  if(test_bool1==false) { alert('Please Enter Only Alphabets in the Mother Occupation Field');  return false; } }
  if(MotherOccu!=''){if (MotherName.length ===0 && MotherOccu.length >=0)  { alert("Please enter mother name Field.");  return false; } }
  
  /* var HusWifeName = formEfamily.HusWifeName.value; 
  if(HusWifeName!='') {   var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(HusWifeName);
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Husband/Wife Name Field');  return false; } }
  var HusWifeDob = formEfamily.HusWifeDob.value; 
  if(HusWifeName!=''){ if (HusWifeDob.length ===0 ) { alert("Please enter Husband/Wife dob.");  return false; } }
  if(HusWifeDob!=''){if (HusWifeName.length ===0 && HusWifeDob.length >=0)  { alert("Please enter Husband/Wife name Field.");  return false; } }
  var HusWifeQuali = formEfamily.HusWifeQuali.value; 
  if(HusWifeName!=''){ if (HusWifeQuali.length ===0 ) { alert("Please enter Husband/Wife qualification.");  return false; } }
  if(HusWifeQuali!=''){if (HusWifeName.length ===0 && HusWifeQuali.length >=0)  { alert("Please enter Husband/Wife name Field.");  return false; } }
  var HusWifeOccu = formEfamily.HusWifeOccu.value;  
  if(HusWifeName!=''){ var filter=/^[a-zA-Z. /]+$/; var test_bool1 = filter.test(HusWifeOccu);
  if (HusWifeOccu.length ===0 ) { alert("Please enter HusWife Occupation.");  return false; }
  if(test_bool1==false) { alert('Please Enter Only Alphabets in the HusWife Occupation Field');  return false; } }
  if(HusWifeOccu!=''){if (HusWifeName.length ===0 && HusWifeOccu.length >=0)  { alert("Please enter Husband/Wife name Field.");  return false; } } */
  
  
  var AnyRelation1 = formEfamily.AnyRelation1.value; 
  var AnyRelationName1 = formEfamily.AnyRelationName1.value; 
  if(AnyRelation1!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName1);
  if (AnyRelationName1.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName1!=''){if (AnyRelation1==0 && AnyRelationName1.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob1 = formEfamily.AnyRelationDob1.value; 
  if(AnyRelation1!=0){ if (AnyRelationDob1.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob1!=''){if (AnyRelation1==0 && AnyRelationDob1.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation1Quali = formEfamily.AnyRelation1Quali.value; 
  if(AnyRelation1!=0){ if (AnyRelation1Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation1Quali!=''){if (AnyRelation1==0 && AnyRelation1Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation1Occu = formEfamily.AnyRelation1Occu.value;  
  if(AnyRelation1!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool1 = filter.test(AnyRelation1Occu);
  if (AnyRelation1Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool1==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation1Occu!=''){if (AnyRelation1==0 && AnyRelation1Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }
  
  var AnyRelation2 = formEfamily.AnyRelation2.value; 
  var AnyRelationName2 = formEfamily.AnyRelationName2.value; 
  if(AnyRelation2!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName2);
  if (AnyRelationName2.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName2!=''){if (AnyRelation1==0 && AnyRelationName2.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob2 = formEfamily.AnyRelationDob2.value; 
  if(AnyRelation2!=0){ if (AnyRelationDob2.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob2!=''){if (AnyRelation2==0 && AnyRelationDob2.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation2Quali = formEfamily.AnyRelation2Quali.value; 
  if(AnyRelation2!=0){ if (AnyRelation2Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation2Quali!=''){if (AnyRelation2==0 && AnyRelation2Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation2Occu = formEfamily.AnyRelation2Occu.value;  
  if(AnyRelation2!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool2 = filter.test(AnyRelation2Occu);
  if (AnyRelation2Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool2==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation2Occu!=''){if (AnyRelation2==0 && AnyRelation2Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

 var AnyRelation2 = formEfamily.AnyRelation2.value; 
  var AnyRelationName2 = formEfamily.AnyRelationName2.value; 
  if(AnyRelation2!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName2);
  if (AnyRelationName2.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName2!=''){if (AnyRelation1==0 && AnyRelationName2.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob2 = formEfamily.AnyRelationDob2.value; 
  if(AnyRelation2!=0){ if (AnyRelationDob2.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob2!=''){if (AnyRelation2==0 && AnyRelationDob2.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation2Quali = formEfamily.AnyRelation2Quali.value; 
  if(AnyRelation2!=0){ if (AnyRelation2Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation2Quali!=''){if (AnyRelation2==0 && AnyRelation2Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation2Occu = formEfamily.AnyRelation2Occu.value;  
  if(AnyRelation2!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool2 = filter.test(AnyRelation2Occu);
  if (AnyRelation2Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool2==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation2Occu!=''){if (AnyRelation2==0 && AnyRelation2Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }


var AnyRelation4 = formEfamily.AnyRelation4.value; 
  var AnyRelationName4 = formEfamily.AnyRelationName4.value; 
  if(AnyRelation4!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName4);
  if (AnyRelationName4.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName4!=''){if (AnyRelation1==0 && AnyRelationName4.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob4 = formEfamily.AnyRelationDob4.value; 
  if(AnyRelation4!=0){ if (AnyRelationDob4.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob4!=''){if (AnyRelation4==0 && AnyRelationDob4.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation4Quali = formEfamily.AnyRelation4Quali.value; 
  if(AnyRelation4!=0){ if (AnyRelation4Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation4Quali!=''){if (AnyRelation4==0 && AnyRelation4Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation4Occu = formEfamily.AnyRelation4Occu.value;  
  if(AnyRelation4!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool4 = filter.test(AnyRelation4Occu);
  if (AnyRelation4Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool4==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation4Occu!=''){if (AnyRelation4==0 && AnyRelation4Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation5 = formEfamily.AnyRelation5.value; 
  var AnyRelationName5 = formEfamily.AnyRelationName5.value; 
  if(AnyRelation5!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName5);
  if (AnyRelationName5.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName5!=''){if (AnyRelation1==0 && AnyRelationName5.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob5 = formEfamily.AnyRelationDob5.value; 
  if(AnyRelation5!=0){ if (AnyRelationDob5.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob5!=''){if (AnyRelation5==0 && AnyRelationDob5.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation5Quali = formEfamily.AnyRelation5Quali.value; 
  if(AnyRelation5!=0){ if (AnyRelation5Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation5Quali!=''){if (AnyRelation5==0 && AnyRelation5Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation5Occu = formEfamily.AnyRelation5Occu.value;  
  if(AnyRelation5!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool5 = filter.test(AnyRelation5Occu);
  if (AnyRelation5Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool5==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation5Occu!=''){if (AnyRelation5==0 && AnyRelation5Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation6 = formEfamily.AnyRelation6.value; 
  var AnyRelationName6 = formEfamily.AnyRelationName6.value; 
  if(AnyRelation6!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName6);
  if (AnyRelationName6.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName6!=''){if (AnyRelation1==0 && AnyRelationName6.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob6 = formEfamily.AnyRelationDob6.value; 
  if(AnyRelation6!=0){ if (AnyRelationDob6.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob6!=''){if (AnyRelation6==0 && AnyRelationDob6.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation6Quali = formEfamily.AnyRelation6Quali.value; 
  if(AnyRelation6!=0){ if (AnyRelation6Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation6Quali!=''){if (AnyRelation6==0 && AnyRelation6Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation6Occu = formEfamily.AnyRelation6Occu.value;  
  if(AnyRelation6!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool6 = filter.test(AnyRelation6Occu);
  if (AnyRelation6Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool6==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation6Occu!=''){if (AnyRelation6==0 && AnyRelation6Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation7 = formEfamily.AnyRelation7.value; 
  var AnyRelationName7 = formEfamily.AnyRelationName7.value; 
  if(AnyRelation7!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName7);
  if (AnyRelationName7.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName7!=''){if (AnyRelation1==0 && AnyRelationName7.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob7 = formEfamily.AnyRelationDob7.value; 
  if(AnyRelation7!=0){ if (AnyRelationDob7.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob7!=''){if (AnyRelation7==0 && AnyRelationDob7.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation7Quali = formEfamily.AnyRelation7Quali.value; 
  if(AnyRelation7!=0){ if (AnyRelation7Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation7Quali!=''){if (AnyRelation7==0 && AnyRelation7Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation7Occu = formEfamily.AnyRelation7Occu.value;  
  if(AnyRelation7!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool7 = filter.test(AnyRelation7Occu);
  if (AnyRelation7Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool7==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation7Occu!=''){if (AnyRelation7==0 && AnyRelation7Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation8 = formEfamily.AnyRelation8.value; 
  var AnyRelationName8 = formEfamily.AnyRelationName8.value; 
  if(AnyRelation8!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName8);
  if (AnyRelationName8.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName8!=''){if (AnyRelation1==0 && AnyRelationName8.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob8 = formEfamily.AnyRelationDob8.value; 
  if(AnyRelation8!=0){ if (AnyRelationDob8.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob8!=''){if (AnyRelation8==0 && AnyRelationDob8.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation8Quali = formEfamily.AnyRelation8Quali.value; 
  if(AnyRelation8!=0){ if (AnyRelation8Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation8Quali!=''){if (AnyRelation8==0 && AnyRelation8Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation8Occu = formEfamily.AnyRelation8Occu.value;  
  if(AnyRelation8!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool8 = filter.test(AnyRelation8Occu);
  if (AnyRelation8Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool8==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation8Occu!=''){if (AnyRelation8==0 && AnyRelation8Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation9 = formEfamily.AnyRelation9.value; 
  var AnyRelationName9 = formEfamily.AnyRelationName9.value; 
  if(AnyRelation9!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName9);
  if (AnyRelationName9.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName9!=''){if (AnyRelation1==0 && AnyRelationName9.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob9 = formEfamily.AnyRelationDob9.value; 
  if(AnyRelation9!=0){ if (AnyRelationDob9.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob9!=''){if (AnyRelation9==0 && AnyRelationDob9.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation9Quali = formEfamily.AnyRelation9Quali.value; 
  if(AnyRelation9!=0){ if (AnyRelation9Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation9Quali!=''){if (AnyRelation9==0 && AnyRelation9Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation9Occu = formEfamily.AnyRelation9Occu.value;  
  if(AnyRelation9!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool9 = filter.test(AnyRelation9Occu);
  if (AnyRelation9Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool9==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation9Occu!=''){if (AnyRelation9==0 && AnyRelation9Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation10 = formEfamily.AnyRelation10.value; 
  var AnyRelationName10 = formEfamily.AnyRelationName10.value; 
  if(AnyRelation10!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName10);
  if (AnyRelationName10.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName10!=''){if (AnyRelation1==0 && AnyRelationName10.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob10 = formEfamily.AnyRelationDob10.value; 
  if(AnyRelation10!=0){ if (AnyRelationDob10.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob10!=''){if (AnyRelation10==0 && AnyRelationDob10.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation10Quali = formEfamily.AnyRelation10Quali.value; 
  if(AnyRelation10!=0){ if (AnyRelation10Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation10Quali!=''){if (AnyRelation10==0 && AnyRelation10Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation10Occu = formEfamily.AnyRelation10Occu.value;  
  if(AnyRelation10!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool10 = filter.test(AnyRelation10Occu);
  if (AnyRelation10Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool10==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation10Occu!=''){if (AnyRelation10==0 && AnyRelation10Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation11 = formEfamily.AnyRelation11.value; 
  var AnyRelationName11 = formEfamily.AnyRelationName11.value; 
  if(AnyRelation11!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName11);
  if (AnyRelationName11.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName11!=''){if (AnyRelation1==0 && AnyRelationName11.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob11 = formEfamily.AnyRelationDob11.value; 
  if(AnyRelation11!=0){ if (AnyRelationDob11.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob11!=''){if (AnyRelation11==0 && AnyRelationDob11.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation11Quali = formEfamily.AnyRelation11Quali.value; 
  if(AnyRelation11!=0){ if (AnyRelation11Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation11Quali!=''){if (AnyRelation11==0 && AnyRelation11Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation11Occu = formEfamily.AnyRelation11Occu.value;  
  if(AnyRelation11!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool11 = filter.test(AnyRelation11Occu);
  if (AnyRelation11Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool11==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation11Occu!=''){if (AnyRelation11==0 && AnyRelation11Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation12 = formEfamily.AnyRelation12.value; 
  var AnyRelationName12 = formEfamily.AnyRelationName12.value; 
  if(AnyRelation12!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName12);
  if (AnyRelationName12.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName12!=''){if (AnyRelation1==0 && AnyRelationName12.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob12 = formEfamily.AnyRelationDob12.value; 
  if(AnyRelation12!=0){ if (AnyRelationDob12.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob12!=''){if (AnyRelation12==0 && AnyRelationDob12.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation12Quali = formEfamily.AnyRelation12Quali.value; 
  if(AnyRelation12!=0){ if (AnyRelation12Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation12Quali!=''){if (AnyRelation12==0 && AnyRelation12Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation12Occu = formEfamily.AnyRelation12Occu.value;  
  if(AnyRelation12!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool12 = filter.test(AnyRelation12Occu);
  if (AnyRelation12Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool12==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation12Occu!=''){if (AnyRelation12==0 && AnyRelation12Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation13 = formEfamily.AnyRelation13.value; 
  var AnyRelationName13 = formEfamily.AnyRelationName13.value; 
  if(AnyRelation13!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName13);
  if (AnyRelationName13.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName13!=''){if (AnyRelation1==0 && AnyRelationName13.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob13 = formEfamily.AnyRelationDob13.value; 
  if(AnyRelation13!=0){ if (AnyRelationDob13.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob13!=''){if (AnyRelation13==0 && AnyRelationDob13.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation13Quali = formEfamily.AnyRelation13Quali.value; 
  if(AnyRelation13!=0){ if (AnyRelation13Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation13Quali!=''){if (AnyRelation13==0 && AnyRelation13Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation13Occu = formEfamily.AnyRelation13Occu.value;  
  if(AnyRelation13!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool13 = filter.test(AnyRelation13Occu);
  if (AnyRelation13Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool13==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation13Occu!=''){if (AnyRelation13==0 && AnyRelation13Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation14 = formEfamily.AnyRelation14.value; 
  var AnyRelationName14 = formEfamily.AnyRelationName14.value; 
  if(AnyRelation14!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName14);
  if (AnyRelationName14.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName14!=''){if (AnyRelation1==0 && AnyRelationName14.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob14 = formEfamily.AnyRelationDob14.value; 
  if(AnyRelation14!=0){ if (AnyRelationDob14.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob14!=''){if (AnyRelation14==0 && AnyRelationDob14.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation14Quali = formEfamily.AnyRelation14Quali.value; 
  if(AnyRelation14!=0){ if (AnyRelation14Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation14Quali!=''){if (AnyRelation14==0 && AnyRelation14Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation14Occu = formEfamily.AnyRelation14Occu.value;  
  if(AnyRelation14!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool14 = filter.test(AnyRelation14Occu);
  if (AnyRelation14Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool14==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation14Occu!=''){if (AnyRelation14==0 && AnyRelation14Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation15 = formEfamily.AnyRelation15.value; 
  var AnyRelationName15 = formEfamily.AnyRelationName15.value; 
  if(AnyRelation15!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName15);
  if (AnyRelationName15.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName15!=''){if (AnyRelation1==0 && AnyRelationName15.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob15 = formEfamily.AnyRelationDob15.value; 
  if(AnyRelation15!=0){ if (AnyRelationDob15.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob15!=''){if (AnyRelation15==0 && AnyRelationDob15.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation15Quali = formEfamily.AnyRelation15Quali.value; 
  if(AnyRelation15!=0){ if (AnyRelation15Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation15Quali!=''){if (AnyRelation15==0 && AnyRelation15Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation15Occu = formEfamily.AnyRelation15Occu.value;  
  if(AnyRelation15!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool15 = filter.test(AnyRelation15Occu);
  if (AnyRelation15Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool15==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation15Occu!=''){if (AnyRelation15==0 && AnyRelation15Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation16 = formEfamily.AnyRelation16.value; 
  var AnyRelationName16 = formEfamily.AnyRelationName16.value; 
  if(AnyRelation16!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName16);
  if (AnyRelationName16.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName16!=''){if (AnyRelation1==0 && AnyRelationName16.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob16 = formEfamily.AnyRelationDob16.value; 
  if(AnyRelation16!=0){ if (AnyRelationDob16.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob16!=''){if (AnyRelation16==0 && AnyRelationDob16.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation16Quali = formEfamily.AnyRelation16Quali.value; 
  if(AnyRelation16!=0){ if (AnyRelation16Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation16Quali!=''){if (AnyRelation16==0 && AnyRelation16Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation16Occu = formEfamily.AnyRelation16Occu.value;  
  if(AnyRelation16!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool16 = filter.test(AnyRelation16Occu);
  if (AnyRelation16Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool16==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation16Occu!=''){if (AnyRelation16==0 && AnyRelation16Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation17 = formEfamily.AnyRelation17.value; 
  var AnyRelationName17 = formEfamily.AnyRelationName17.value; 
  if(AnyRelation17!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName17);
  if (AnyRelationName17.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName17!=''){if (AnyRelation1==0 && AnyRelationName17.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob17 = formEfamily.AnyRelationDob17.value; 
  if(AnyRelation17!=0){ if (AnyRelationDob17.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob17!=''){if (AnyRelation17==0 && AnyRelationDob17.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation17Quali = formEfamily.AnyRelation17Quali.value; 
  if(AnyRelation17!=0){ if (AnyRelation17Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation17Quali!=''){if (AnyRelation17==0 && AnyRelation17Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation17Occu = formEfamily.AnyRelation17Occu.value;  
  if(AnyRelation17!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool17 = filter.test(AnyRelation17Occu);
  if (AnyRelation17Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool17==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation17Occu!=''){if (AnyRelation17==0 && AnyRelation17Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

var AnyRelation18 = formEfamily.AnyRelation18.value; 
  var AnyRelationName18 = formEfamily.AnyRelationName18.value; 
  if(AnyRelation18!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName18);
  if (AnyRelationName18.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName18!=''){if (AnyRelation1==0 && AnyRelationName18.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob18 = formEfamily.AnyRelationDob18.value; 
  if(AnyRelation18!=0){ if (AnyRelationDob18.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob18!=''){if (AnyRelation18==0 && AnyRelationDob18.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation18Quali = formEfamily.AnyRelation18Quali.value; 
  if(AnyRelation18!=0){ if (AnyRelation18Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation18Quali!=''){if (AnyRelation18==0 && AnyRelation18Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation18Occu = formEfamily.AnyRelation18Occu.value;  
  if(AnyRelation18!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool18 = filter.test(AnyRelation18Occu);
  if (AnyRelation18Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool18==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation18Occu!=''){if (AnyRelation18==0 && AnyRelation18Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

  var AnyRelation19 = formEfamily.AnyRelation19.value; 
  var AnyRelationName19 = formEfamily.AnyRelationName19.value; 
  if(AnyRelation19!=0) { var filter=/^[a-zA-Z. /]+$/; var test_bool = filter.test(AnyRelationName19);
  if (AnyRelationName19.length ===0 ) { alert("Please enter name.");  return false; }
  if(test_bool==false) { alert('Please Enter Only Alphabets in the Relation Field');  return false; } }
  if(AnyRelationName19!=''){if (AnyRelation1==0 && AnyRelationName19.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelationDob19 = formEfamily.AnyRelationDob19.value; 
  if(AnyRelation19!=0){ if (AnyRelationDob19.length ===0 ) { alert("Please enter Relation dob.");  return false; } }
  if(AnyRelationDob19!=''){if (AnyRelation19==0 && AnyRelationDob19.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation19Quali = formEfamily.AnyRelation19Quali.value; 
  if(AnyRelation19!=0){ if (AnyRelation19Quali.length ===0 ) { alert("Please enter Relation qualification.");  return false; } }
  if(AnyRelation19Quali!=''){if (AnyRelation19==0 && AnyRelation19Quali.length >=0)  { alert("Please select Relation Field.");  return false; } }
  var AnyRelation19Occu = formEfamily.AnyRelation19Occu.value;  
  if(AnyRelation19!=0){ var filter=/^[a-zA-Z. /]+$/; var test_bool19 = filter.test(AnyRelation19Occu);
  if (AnyRelation19Occu.length ===0 ) { alert("Please enter Relation Occupation.");  return false; }
  if(test_bool19==false) { alert('Please Enter Only Alphabets in the Relation Occupation Field');  return false; } }
  if(AnyRelation19Occu!=''){if (AnyRelation19==0 && AnyRelation19Occu.length >=0)  { alert("Please select Relation  Field.");  return false; } }

}

