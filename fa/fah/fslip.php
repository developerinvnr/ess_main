<?php require_once('../../Employee/sp/user/config/config.php');   
$sal=mysql_query("select * from fa_salary where SalId=".$_REQUEST['si'],$con); $resS=mysql_fetch_assoc($sal); 
$sql=mysql_query("select f.*,CountryName,StateName,HqName from fa_details f inner join hrm_headquater h on f.HqId=h.HqId inner join hrm_state s on h.StateId=s.StateId inner join hrm_country c on s.CountryId=c.CountryId where f.FaId=".$resS['FaId'],$con); $res=mysql_fetch_assoc($sql);

if($resS['Month']==1){$Month='January';}elseif($resS['Month']==2){$Month='February';}elseif($resS['Month']==3){$Month='March';}elseif($resS['Month']==4){$Month='April';}elseif($resS['Month']==5){$Month='May';}elseif($resS['Month']==6){$Month='June';}elseif($resS['Month']==7){$Month='July';}elseif($resS['Month']==8){$Month='August';}elseif($resS['Month']==9){$Month='September';}elseif($resS['Month']==10){$Month='October';}elseif($resS['Month']==11){$Month='November';}elseif($resS['Month']==12){$Month='December';} 

if($resS['exts']=='pdf') 
{  
 fopen('../../Employee/sp/user/f_slip/'.$resS['Slip'],"r"); 
 header('Content-type:application/pdf'); 
 readfile('../../Employee/sp/user/f_slip/'.$resS['Slip']);  
} 
elseif($resS['exts']=='jpg' OR $resS['exts']=='jpeg' OR $resS['exts']=='png')
{	
 echo '<img src="../../Employee/sp/user/f_slip/'.$resS["Slip"].'" style="width:500px;height:450px;"/>';
}

?>