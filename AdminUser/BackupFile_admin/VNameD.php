<?php
require_once('config/config.php');
if(isset($_POST['VNameD']) && $_POST['VNameD']!="")
{	  $VNameD = $_POST['VNameD'];
	  $sqlVNameD = mysql_query("select * from hrm_vendordetail WHERE VendorNameId=".$VNameD, $con) or die(mysql_error());  $resVNameD = mysql_fetch_array($sqlVNameD); ?>
<table>
   <tr>
	 
	  <td align="left">
	    <table border="0" width="650">
	      <tr>
		   <td class="td1" style="font-size:11px; width:90px;" valign="top">Company Name:</td>
		   <td class="td1" style="font-size:11px; width:100px;" valign="top">
		   <input type="hidden" name="VendorNameId" id="VendorNameId" value="<?php echo $VNameD; ?>" />
		   <input type="hidden" name="VendorDetailId" id="VendorDetailId" value="<?php if($resVNameD['VendorDetailId']=='') { echo '0'; } else {echo $resVNameD['VendorDetailId'];}?>" />
		   <input name="VCompanyName" id="VCompanyName" style="font-size:11px; width:140px; height:18px;" value="<?php echo $resVNameD['VCompanyName']; ?>" disabled/></td>
		   <td class="td1" style="font-size:11px; width:70px;" valign="top">Policy Date:</td>
		   <td class="td1" style="font-size:11px; width:190px; height:18px;" valign="top">
		   <input name="VPolicyDate" id="VPolicyDate" style="font-size:11px; width:150px; height:18px;" value="<?php echo $resVNameD['VPolicyDate']; ?>" disabled/>
		   <button id="f_btn1" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
           cal.manageFields("f_btn1", "VPolicyDate", "%d-%m-%Y");</script></td>
		 </tr>
		 <tr>
		   <td class="td1" style="font-size:11px; width:90px;" valign="top">Policy Number:</td>
		   <td class="td1" style="font-size:11px; width:100px;" valign="top">
		   <input name="VPolicyNo" id="VPolicyNo" style="font-size:11px; width:140px; height:18px;" value="<?php echo $resVNameD['VPolicyNo']; ?>" disabled/></td>
		   <td class="td1" style="font-size:11px; width:70px;" valign="top">Policy Name:</td>
		   <td class="td1" style="font-size:11px; width:190px; height:18px;" valign="top">
		   <input name="VPolicyName" id="VPolicyName" style="font-size:11px; width:180px; height:18px;" value="<?php echo $resVNameD['VPolicyName']; ?>" disabled/></td>
		 </tr>
		 <tr>
		   <td class="td1" style="font-size:11px; width:90px;" valign="top">Valid From:</td>
		   <td class="td1" style="font-size:11px; width:100px;" valign="top">
		   <input name="VValidfrom" id="VValidfrom" style="font-size:11px; width:140px; height:18px;" value="<?php echo $resVNameD['VVaildFrom']; ?>" disabled/>
		   <button id="f_btn2" class="CalenderButton"></button></td>
		   <td class="td1" style="font-size:11px; width:70px;" valign="top">Valid To:</td>
		   <td class="td1" style="font-size:11px; width:190px; height:18px;" valign="top">
		   <input name="VValidto" id="VValidto" style="font-size:11px; width:150px; height:18px;" value="<?php echo $resVNameD['VVaildTo']; ?>" disabled/>
		   <button id="f_btn3" class="CalenderButton"></button><script type="text/javascript">  var cal = Calendar.setup({ onSelect:  function(cal) { cal.hide()}, showTime: true }); 
           cal.manageFields("f_btn2", "VValidfrom", "%d-%m-%Y");  cal.manageFields("f_btn3", "VValidto", "%d-%m-%Y");</script></td>
		 </tr>
		
		</table>
	  </td>
    </tr>
	<?php //-------------------------------------------LIC Close--------------------------------------------------- ?>
	<tr>
	  <td align="left"><table border="0" width="650">
	      <tr><td class="td1" style="font-size:11px; width:119px;" valign="top">Address:</td>
		   <td class="td1" style="font-size:11px; width:490px;" valign="top" colspan="3">
		   <input name="VAddrress" id="VAddrress" style="font-size:11px; width:522px; height:18px;" value="<?php echo $resVNameD['VAddress']; ?>" disabled/></td>
		 </tr></table>
	  </td>
    </tr>
	<tr>
	  <td align="left"><table border="0" width="700">
	      <tr>
<?php if($resVNameD['CityId']!=''){$sqlCity=mysql_query("select hrm_country.CountryId,CountryName,hrm_state.StateId,StateName,CityName from hrm_city INNER JOIN hrm_state ON hrm_city.StateId=hrm_state.StateId INNER JOIN hrm_country ON hrm_state.CountryId=hrm_country.CountryId where CityId=".$resVNameD['CityId'], $con); $resCity=mysql_fetch_assoc($sqlCity); }?>		  
		   <td class="td1" style="font-size:11px; width:115px;" valign="top">Country:</td>
		   <td class="td1" style="font-size:11px; width:155px;" valign="top">
		   <select style="font-size:11px; width:150px; height:18px;" id="VCountry" name="VCountry" onChange="SelectCountry1(this.value)" disabled>
		   <option value="<?php echo $resCity['CountryId']; ?>"><?php echo $resCity['CountryName']; ?></option>
		   <?php $sqlCountry=mysql_query("select * from hrm_country", $con); while($resCountry=mysql_fetch_array($sqlCountry)) {?>
		   <option value="<?php echo $resCountry['CountryId']; ?>"><?php echo $resCountry['CountryName']; ?></option><?php } ?>
		   </select></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">State:</td>
		   <td class="td1" style="font-size:11px; width:130px; height:18px;" valign="top">
		   <span id="Venstate">
		   <select style="font-size:11px; width:125px; height:18px;" id="VState" name="VState" onChange="SelectState1(this.value)" disabled>
		   <option value="<?php echo $resCity['StateId']; ?>"><?php echo $resCity['StateName']; ?></option>
	       </select></span></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">City:</td>
		   <td class="td1" style="font-size:11px; width:160px;" valign="top"><span id="Vencity">
		   
		   
		   <select style="font-size:11px; width:165px; height:18px;" id="VCity" name="VCity" disabled>
		   <option value="<?php echo $resVNameD['CityId']; ?>"><?php  echo $resCity['CityName']; ?></option>
	       </select></span></td>
		 </tr>
		 </table>
	  </td>
    </tr>
	<tr>
	  <td align="left"><table border="0" width="700">
	      <tr>
		   <td class="td1" style="font-size:11px; width:115px;" valign="top">Contact_1 Name:</td>
		   <td class="td1" style="font-size:11px; width:155px;" valign="top">
		   <input style="font-size:11px; width:150px; height:18px;" id="Contact1_Name" value="<?php echo $resVNameD['VPersonName1']; ?>" name="Contact1_Name" disabled/></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">No:</td>
		   <td class="td1" style="font-size:11px; width:130px; height:18px;" valign="top">
		   <input style="font-size:11px; width:125px; height:18px;" id="Contact1_No" value="<?php echo $resVNameD['VPersonNo1']; ?>" name="Contact1_No" disabled/></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">Desig:</td>
		   <td class="td1" style="font-size:11px; width:160px;" valign="top">
		   <input style="font-size:11px; width:165px; height:18px;" id="Contact1_Desig" value="<?php echo $resVNameD['VPersonDesig1']; ?>" name="Contact1_Desig" disabled/></td>
		 </tr>
		 </table>
	  </td>
    </tr>
	<tr>
	  <td align="left"><table border="0" width="700">
	      <tr>
		   <td class="td1" style="font-size:11px; width:115px;" valign="top">Contact_2 Name:</td>
		   <td class="td1" style="font-size:11px; width:155px;" valign="top">
		   <input style="font-size:11px; width:150px; height:18px;" id="Contact2_Name" value="<?php echo $resVNameD['VPersonName2']; ?>" name="Contact2_Name" disabled/></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">No:</td>
		   <td class="td1" style="font-size:11px; width:130px; height:18px;" valign="top">
		   <input style="font-size:11px; width:125px; height:18px;" id="Contact2_No" value="<?php echo $resVNameD['VPersonNo2']; ?>" name="Contact2_No" disabled/></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">Desig:</td>
		   <td class="td1" style="font-size:11px; width:160px;" valign="top">
		   <input style="font-size:11px; width:165px; height:18px;" id="Contact2_Desig" value="<?php echo $resVNameD['VPersonDesig2']; ?>" name="Contact2_Desig" disabled/></td>
		 </tr>
		 </table>
	  </td>
    </tr>
	<tr>
	  <td align="left"><table border="0" width="700">
	      <tr>
		   <td class="td1" style="font-size:11px; width:115px;" valign="top">Contact_3 Name:</td>
		   <td class="td1" style="font-size:11px; width:155px;" valign="top">
		   <input style="font-size:11px; width:150px; height:18px;" id="Contact3_Name" value="<?php echo $resVNameD['VPersonName3']; ?>" name="Contact3_Name" disabled/></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">No:</td>
		   <td class="td1" style="font-size:11px; width:130px; height:18px;" valign="top">
		   <input style="font-size:11px; width:125px; height:18px;" id="Contact3_No" value="<?php echo $resVNameD['VPersonNo3']; ?>" name="Contact3_No" disabled/></td>
		   <td class="td1" style="font-size:11px; width:45px;" valign="top" align="left">Desig:</td>
		   <td class="td1" style="font-size:11px; width:160px;" valign="top">
		   <input style="font-size:11px; width:165px; height:18px;" id="Contact3_Desig" value="<?php echo $resVNameD['VPersonDesig3']; ?>" name="Contact3_Desig" disabled/></td>
		 </tr>
		 </table>
	  </td>
	  
	 </tr>
  </table>


<?php } ?>
	 
