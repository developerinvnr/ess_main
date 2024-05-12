<?php 
require_once('../AdminUser/config/config.php');
date_default_timezone_set('Asia/Kolkata');
$EmployeeId=$_REQUEST['ei']; $CompanyId=$_REQUEST['ci'];
?>
<html><font color="#FD0000"></font>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Opinion</title>

<link type="text/css" href="css/body.css" rel="stylesheet" />
<link type="text/css" href="css/pro_dropdown_3.css" rel="stylesheet"/>
<script type="text/javascript" src="js/Prototype.js"></script>
<script type="text/javascript" language="javascript">
self.resizeTo(screen.width,screen.height);
self.moveTo(0,0);
function FunCheck(v,vn)
{
 if(document.getElementById("chk"+v).checked==true)
 {
  for(var i=1; i<=5; i++){ if(i!=v){document.getElementById("chk"+i).checked=false;} }
  if(v==5){document.getElementById("iother").readOnly=false;}
  else{document.getElementById("iother").readOnly=true; document.getElementById("iother").value='';}  
  document.getElementById("selcast").value=vn;
 } 
 else{ document.getElementById("selcast").value=''; }
 fundisbtn();
 
}

function FunCh(v,vn)
{
 if(document.getElementById("ch"+v).checked==true && v==4)
 {
  for(var i=1; i<=4; i++)
  { 
   if(i!=v){document.getElementById("ch"+i).checked=false; document.getElementById("sche"+i).value='';} 
  }
  document.getElementById("sche"+v).value=vn;
 } 
 else if(document.getElementById("ch"+v).checked==true && v!=4)
 {
  document.getElementById("ch4").checked=false; document.getElementById("sche4").value='';
  document.getElementById("sche"+v).value=vn;
 }
 else if(document.getElementById("ch"+v).checked==false)
 { document.getElementById("sche"+v).value=''; }
 fundisbtn();  
}

function fundisbtn()
{
if(document.getElementById("selcast").value!='' && (document.getElementById("sche1").value!='' || document.getElementById("sche2").value!='' || document.getElementById("sche3").value!='' || document.getElementById("sche4").value!='')){document.getElementById("btnsub").disabled=false;}else{document.getElementById("btnsub").disabled=true;}
}


function FunOpi(ei,ci)
{ 
 if(document.getElementById("chk5").checked==true && document.getElementById("iother").value=='')
 {alert("please type any other category name"); return false;}
 else
 {
  var agree=confirm("Ready to Submit?")
  if(agree)
  { 
   var url = 'Opinion.php'; var pars = 'action=result22opnjsy&ei='+ei+'&ci='+ci+'&sche1='+document.getElementById("sche1").value+'&sche2='+document.getElementById("sche2").value+'&sche3='+document.getElementById("sche3").value+'&sche4='+document.getElementById("sche4").value;
   var myAjax = new Ajax.Request( url, { method: 'post', parameters: pars, onComplete: show_OpnRes }); 
  }
  else{return false;}
 }
}


function show_OpnRes(originalRequest)
{ document.getElementById('SpanOpninon').innerHTML = originalRequest.responseText; 
  if(document.getElementById('opnreslt2').value==1)
  { alert("Thanks for your selection!"); 
    document.getElementById("btnsub").disabled=true;
	window.close();
  }
  else{ alert("Error...!"); }
}


//btnsub sche selcast
</SCRIPT>
</head>
<body class="body"> 
<center>
<?php $sqlE=mysql_query("select Gender,DOB,Married,MarriageDate,HusWifeName,ProfileCertify from hrm_employee_general g INNER JOIN hrm_employee_personal p ON g.EmployeeID=p.EmployeeID INNER JOIN hrm_employee_family f ON g.EmployeeID=f.EmployeeID INNER JOIN hrm_employee e ON g.EmployeeID=e.EmployeeID where g.EmployeeID=".$EmployeeId, $con); $resE=mysql_fetch_assoc($sqlE); 

$sqljsy=mysql_query("select * from hrm_opinion where EmployeeID=".$EmployeeId." AND OpenionName='jsy'",$con); 
$rjsy=mysql_fetch_assoc($sqljsy); 

?> 
<table>
<tr>
 <td valign="top" align="center">
 <table border="0" style="width:100%;float:none;" cellpadding="0">
  <tr>
   <td valign="top" style="width:100%;"> 
   <table style="width:100%;" border="0">
    <tr>
<?php //******************** Main Body Main Body Open Open *************************** ?>
<td style="width:100%;" valign="top">
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
 <table style="width:100%;font-family:Times New Roman;font-size:16px;">
  <tr>
   <td align="center" style="width:100%;">
    <div class="col-md-10 well" align="center" style="box-shadow: 5px 10px 30px #888888;">
<legend class="bgc" style="color:#fff;padding-top:10px;padding-bottom:10px;border-top-left-radius:10px; width:100%; border-top-right-radius:10px;vertical-align:middle;"><span style="color:#008A00;font-size:20px;font-weight:bold;">Government Social Security Schemes : Pradhan Mantri Jan Suraksha Yojna.</span></legend></div>
   </td>
  </tr>
  <tr><td style="height:10px;"></td></tr>
  <tr>
   <td align="center" style="width:100%;font-size:20px;color:#CA0000;height:35px;vertical-align:middle;">
   <b>
   Have you opted for these Government Social Security Schemes yet? (Information is gathered for statistical purpose)<br>
   <font style="font-size:17px;">क्या आपने सामाजिक सुरक्षा योजनओं का चयन किया हैं ?</font>
   </b>
   </td>
  </tr>
  <tr>
   <td align="center" style="width:100%;font-size:18px;color:#000;">
   Information gathered is for Statistical use only.<br>
   <font style="font-size:14px;">यहां एकत्र की गई जानकारी केवल सांख्यिकीय डेटा उपयोग के लिए है|</font>
   </td>
  </tr> 
  <tr>
   <td align="center">
 <?php if(date("Y-m-d H:i:s")<='2050-12-31 23:59:59'){ ?>  
 <!-------------------------- OPEN OPEN -------------------------------->
 
<table border="0" style="text-align:center;">
<?php //$sql=mysql_query("",$con); $res=mysql_fetch_assoc($sql); ?> 		
	
<tr>
 <td style="font-family:Times New Roman;color:#000000;width:750px;font-size:18px;text-align:center;">
<table border="1" width="750" id="TEmp" cellpadding="5" align="center" style="background-color:#FFAEFF;">
<tr>
 <td>
  &nbsp;&nbsp;&nbsp;<b>Select the category you belong to</b><p>
  &nbsp; <input type="checkbox" id="chk1" onClick="FunCheck(1,'General')" disabled <?php if($rjsy['Cast']=='General'){echo 'checked';}?>> General<br>
  &nbsp; <input type="checkbox" id="chk2" onClick="FunCheck(2,'OBC')" disabled <?php if($rjsy['Cast']=='OBC'){echo 'checked';}?>> OBC<br>
  &nbsp; <input type="checkbox" id="chk3" onClick="FunCheck(3,'SC')" disabled <?php if($rjsy['Cast']=='SC'){echo 'checked';}?>> SC<br>
  &nbsp; <input type="checkbox" id="chk4" onClick="FunCheck(4,'ST')" disabled <?php if($rjsy['Cast']=='ST'){echo 'checked';}?>> ST<br>
  &nbsp; <input type="checkbox" id="chk5" onClick="FunCheck(5,'Any Other')" disabled <?php if($rjsy['Cast']=='Any Other'){echo 'checked';}?>> Any Other &nbsp;<input type="text" id="iother" style="width:200px;background-color:#FFAEFF;border-left:hidden;border-right:hidden;border-top:hidden; border-bottom-color:#000000;border-bottom-style:solid;" maxlength="15" value="<?=$rjsy['CastOther'];?>" readonly/>
  <p><br><input type="hidden" id="selcast" value="<?=$rjsy['Cast'];?>" />
  
  &nbsp;&nbsp;&nbsp;<b>Please tick the Social Security Schemes opted by you. (Check below for Schemes details)</b> कृपया आपके द्वारा चुने गए सोशल सिक्योरिटी स्कीम पर निशान लगाएं। (योजनाओं के विवरण के लिए नीचे देखें)<p>
  &nbsp; <input type="checkbox" id="ch3" onClick="FunCh(3,'APY')" <?php if($rjsy['Scheme3']=='APY'){echo 'checked disabled';}?> > Atal Pension Yojna (APY)<br>
  &nbsp; <input type="checkbox" id="ch1" onClick="FunCh(1,'PMJJBY')" <?php if($rjsy['Scheme1']=='PMJJBY'){echo 'checked disabled';}?>> Pradhan Mantri Jeevan Jyoti Bima Yojna (PMJJBY)<br>
  &nbsp; <input type="checkbox" id="ch2" onClick="FunCh(2,'PMSBY')" <?php if($rjsy['Scheme2']=='PMSBY'){echo 'checked disabled';}?>> Pradhan Mantri Suraksha Bima Yojna (PMSBY)<br>
  &nbsp; <input type="checkbox" id="ch4" onClick="FunCh(4,'NDS')" <?php if($rjsy['Scheme4']=='NDS'){echo 'checked'; }?> disabled> Not opted for above Schemes<br>
  <p>
  <input type="hidden" id="sche1" value="<?=$rjsy['Scheme1'];?>" />
  <input type="hidden" id="sche2" value="<?=$rjsy['Scheme2'];?>" />
  <input type="hidden" id="sche3" value="<?=$rjsy['Scheme3'];?>" />
  <input type="hidden" id="sche4" value="<?=$rjsy['Scheme4'];?>" />
 </td>
</tr>
<tr><td>&nbsp;&nbsp;<input type="button" style="width:90px;" id="btnsub" value="submit" onClick="FunOpi(<?php echo $EmployeeId.','.$CompanyId; ?>)" disabled="disabled"/></td></tr>

</table>
   </td>
  </tr>	
  <tr><td>&nbsp;</td></tr>
  <tr>
  <td style="width:1000px; text-align:justify;">
   <center><b style="font-size:18px;color:#006BD7;">[Atal Pension Yojana (APY)]</b></center><p>

<b>1.</b> Atal Pension Yojana (APY) is open to all bank account holders. The Central Government would also co-contribute 50% of the total contribution or Rs. 1000 per annum, whichever is lower, to each eligible subscriber, for a period of 5 years, i.e., from Financial Year 2015-16 to 2019-20, who join the APY before 31st December, 2015, and who are not members of any statutory social security scheme and who are not income tax payers. Therefore, APY will be focussed on all citizens in the unorganised sector.<p>

<b>2.</b> Under APY, the monthly pension would be available to the subscriber, and after him to his spouse and after their death, the pension corpus, as accumulated at age 60 of the subscriber, would be returned to the nominee of the subscriber.<p>

<b>3.</b> Under the APY, the subscribers would receive the fixed minimum pension of Rs. 1000 per month, Rs. 2000 per month, Rs. 3000 per month, Rs. 4000 per month, Rs. 5000 per month, at the age of 60 years, depending on their contributions, which itself would be based on the age of joining the APY. Therefore, the benefit of minimum pension would be guaranteed by the Government. However, if higher investment returns are received on the contributions of subscribers of APY, higher pension would be paid to the subscribers.<p>

<b>4.</b> A subscriber joining the scheme of Rs. 1,000 monthly pension at the age of 18 years would be required to contribute Rs. 42 per month. However, if he joins at age 40, he has to contribute Rs. 291 per month. Similarly, a subscriber joining the scheme of Rs. 5,000 monthly pension at the age of 18 years would be required to contribute Rs. 210 per month. However, if he joins at age 40, he has to contribute Rs. 1,454 per month. Therefore, it is better to join early in the Scheme. The contribution levels, the age of entry and the pension amounts are available in a table given in frequently asked questions (FAQs) on APY, which is available on www.jansuraksha.gov.in.<p>

<b>5.</b> The minimum age of joining APY is 18 years and maximum age is 40 years. Therefore, minimum period of contribution by any subscriber under APY would be 20 years or more.<p>

<center><img src="images/About-APY-2.jpg" style="width:1000px; height:500px;" /></center><p>

<center>*************************</center>
<p><p>


<center><b style="font-size:18px;color:#006BD7;">[Pradhan Mantri Jeevan Jyoti Bima Yojana (PMJJBY)]</b></center>
<p>

<b>1.</b> Government through the Budget Speech announced three ambitious Social Security Schemes pertaining to the Insurance and Pension Sectors, namely Pradhan MantriJeevanJyotiBimaYojana (PMJJBY), Pradhan Mantri Suraksha BimaYojana (PMSBY)and an the Atal Pension Yojana (APY) to move towards creating a universal social security system, targeted especially for the poor and the under-privileged. Hon’ble Prime Minister launched PMJJBY and PMSBY schemes nationally in Kolkata on 9th May, 2015.<p>

<b>2.</b> The Pradhan MantriJeevanJyotiBimaYojana (PMJJBY) is a one year life insurance scheme, renewable from year to year, offering coverage for death due to any reason and is available to people in the age group of 18 to 50 years( life cover upto age 55) having a savings bank account who give their consent to join and enable auto-debit. The risk cover on the lives of the enrolled persons has commenced from 1st June 2015.<p>

<b>3.</b> Under PMJJBY scheme, life cover of Rs. 2 lakhs is available for a one year period stretching from 1st June to 31st May at a premium of Rs.330/- per annum per member and is renewable every year. It is offered / administered through LIC and other Indian private Life Insurance companies. For enrolment banks have tied up with insurance companies. Participating Bank is the Master policy holder.

<b>4.</b> The assurance on the life of the member shall terminate on any of the following events and no benefit will become payable there under: <br>

&nbsp;1) On attaining age 55 years (age near birth day) subject to annual renewal up to that date (entry, however, will not be possible beyond the age of 50 years).<br>
&nbsp;2) Closure of account with the Bank or insufficiency of balance to keep the insurance in force.<br>
&nbsp;3) A person can join PMJJBY with one Insurance company with one bank account only.<p>

<b>5.</b> Individuals who exit the scheme at any point may re-join the scheme in future years by paying the annual premium and submitting a self-declaration of good health. Initial enrolment period in the scheme was from 1st May to 31st May ‘2015, which has now been extended up to 31st Aug’ 2015, by this date eligible persons can join the scheme without giving self-certification of good health, even though eligible persons can join the scheme on any date by paying the premium for full year. In case of claim the nominees/heirs of the insured person have to contact respective bank branch where the insured person was having bank account. A death certificate and simple claim form is required to submit and the claim amount will be transferred to nominees account.<p>
<p>
<center>*************************</center>
<p><p>


<center><b style="font-size:18px;color:#006BD7;">[Pradhan Mantri Suraksha Bima Yojana (PMSBY)]</b></center>
<p>


<b>1.</b> Government through the Budget Speech 2015 announced three ambitious Social Security Schemes pertaining to the Insurance and Pension Sectors, namely Pradhan Mantri Jeevan Jyoti Bima Yojana (PMJJBY), Pradhan Mantri Suraksha Bima Yojana (PMSBY) and an the Atal Pension Yojana (APY) to move towards creating a universal social security system, targeted especially for the poor and the under-privileged. Hon’ble Prime Minister will be launched these schemes nationally in Kolkata on 9th May, 2015.<p>

<b>2.</b> In light of the fact that a large proportion of the population have no accidental insurance cover, the Pradhan Mantri Suraksha Bima Yojana (PMJJBY) is aimed at covering the uncovered population at an highly affordable premium of just Rs.12 per year. The Scheme will be available to people in the age group 18 to 70 years with a savings bank account who give their consent to join and enable auto-debit on or before 31st May for the coverage period 1st June to 31st May on an annual renewal basis.<p>

<b>3.</b> Under the said scheme, risk coverage available will be Rs. 2 lakh for accidental death and permanent total disability and Rs. 1 lakh for permanent partial disability, for a one year period stretching from 1st June to 31st May. It is offered by Public Sector General Insurance Companies or any other General Insurance Company who are willing to offer the product on similar terms with necessary approvals and tie up with banks for this purpose. Participating Bank will be the Master policy holder on behalf of the participating subscribers. It will be the responsibility of the participating bank to recover the appropriate annual premium in one instalment, as per the option, from the account holders on or before the due date through ‘auto-debit’ process and transfer the amount due to the insurance company.<p> 

<b>4.</b> Individuals who exit the scheme at any point may re-join the scheme in future years by paying the annual premium, subject to conditions. Further, in order to assure a hassle free claim settlement experience for the claimants a simple and subscriber friendly administration & claim settlement process has been put in place.<p>


<b>5.</b> To ensure that the benefits of this scheme is brought to every uninsured individual, who holds a bank account, wide publicity was given for this social security measure through electronic media, radio, posters, newspapers advertisements etc. Enrollment forms were widely distributed. Highly publicised Enrollment camps were conducted by Banks, and Insurance Companies, mobilising the entire net work of SLBC Co ordinators, state and district level nodal officers, agents and banking correspondents, thereby fully utilising the reach of these channels, for attracting large scale enrolment in the scheme. Between the date of commencement of enrolment on 01st May till the date of launch of the scheme by the PM on 9th May, 4.42 Crore subscribers were enrolled in the PMJJBY scheme.<p>

<b>6.</b> The simplified procedures and the documentary requirements and the procedures to be followed in case of a claim under the policy has been widely publicised through posters and advertisements at every location and point of contact which a claimant is likely to get in touch in case of an accident resulting in a claim under the scheme. An IT enabled, web based system is in the process of being established to keep the claimants informed seamlessly about the progress and status of the claim, till it’s settlement.<p>

<b>7.</b> Claim settlement will be made to the bank account of the insured or his nominee in case of death of the account holder.<p>

<b>8.</b> The enrolment drive is continuing without loss of momentum till date. As on 31st May, that is, on the eve of commencement date of the policy, the number enrolled under PMSBY scheme had reached 7.29 Crores.<p>

<b>9.</b> Immediately after the close of the first phase of enrolments, banks have started the process of auto debit of premium in the accounts of the enrolees and remittance of premium to the insurers. So far premium has been debited to around 65% of the accounts.<p>

<b>10.</b> The enrollment is open till 31st August and the drive is continuing. Till 18th June 2015 the number of enrolled under PMSBY stands at 7.68 Crore.<p>

<b>11.</b> The scheme is expected to serve the goal of financial inclusion by achieving penetration of insurance down to the weaker sections of the society, ensuring their or their family’s financial security, which otherwise gets pulled to the ground in case of any unexpected and unfortunate accident.<p>

  </td>
  </tr>				    
</table>  
 
 
 <!-------------------------- CLOSE CLOSE ------------------------------> 
 <?php } ?>  
   </td>
  </tr>
  <?php $sql=mysql_query("select * from hrm_opinion where EmployeeID=".$EmployeeId." AND OpenionName='mig_ctc'",$con);  $row=mysql_num_rows($sql); $rop=mysql_fetch_assoc($sql); ?>
  <span id="SpanOpninon"></span>
  
  
  <tr>
   <td align="center" style="width:100%;font-size:18px;color:#000;font-family:Times New Roman;">
    <font color="#FF3E3E"><u>Note</u></font> : For more details logon to    <font color="#FF2222"><a href="http://www.jansuraksha.gov.in">http://www.jansuraksha.gov.in</a></font><br>
	<font style="font-size:16px;color:#FF3E3E;"><u>नोट</u> :</font> <font style="font-size:16px;">अधिक जानकारी के लिए लॉगऑन करें </font><font style="font-size:16px;color:#FF2222;"><a href="http://www.jansuraksha.gov.in">http://www.jansuraksha.gov.in</a></font>
   </td>
  </tr> 
 </table>
<!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
</td>

<?php //******************** Main Body Main Body Close Close *************************** ?>
	
	</tr>
	<tr><td style="height:100px;">&nbsp;</td></tr>
   </table>	   
   </td>
  </tr>
 </table> 
 </td>
</tr>
</table>
</center
></body>
</html>

