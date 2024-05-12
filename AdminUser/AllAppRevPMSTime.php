<?php
require_once('config/config.php');
if(isset($_POST['Check']) && $_POST['Check']!="")
{
 if($_POST['Check']=='Check')
 { 
  if($_POST['V']=='App') { 
  $sqlCh = mysql_query("select * from hrm_pms_allow where Appraiser_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row==0){
  $sql3 = mysql_query("insert into hrm_pms_allow(Appraiser_EmployeeID, CompanyId, AssesmentYear, CreatedBy, CreatedDate, YearId) values(".$_POST['E'].", ".$_POST['C'].", ".$_POST['Y'].", ".$_POST['U'].", '".date("Y-m-d")."', ".$_POST['Y'].")",$con); } }

  if($_POST['V']=='Rev') {
  $sqlCh = mysql_query("select * from hrm_pms_allow where Reviewer_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row==0){
  $sql3 = mysql_query("insert into hrm_pms_allow(Reviewer_EmployeeID, CompanyId, AssesmentYear, CreatedBy, CreatedDate, YearId) values(".$_POST['E'].", ".$_POST['C'].", ".$_POST['Y'].", ".$_POST['U'].", '".date("Y-m-d")."', ".$_POST['Y'].")",$con); } } 
  
  if($_POST['V']=='Hod') {
  $sqlCh = mysql_query("select * from hrm_pms_allow where HOD_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row==0){
  $sql3 = mysql_query("insert into hrm_pms_allow(HOD_EmployeeID, CompanyId, AssesmentYear, CreatedBy, CreatedDate, YearId) values(".$_POST['E'].", ".$_POST['C'].", ".$_POST['Y'].", ".$_POST['U'].", '".date("Y-m-d")."', ".$_POST['Y'].")",$con); } } 
 }

 
  if($_POST['Check']=='UnCheck')
 {
  if($_POST['V']=='App') { 
  $sqlCh = mysql_query("select * from hrm_pms_allow where Appraiser_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row>0){
  $sql3 = mysql_query("delete from hrm_pms_allow where Appraiser_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con); } }

  if($_POST['V']=='Rev') {
  $sqlCh = mysql_query("select * from hrm_pms_allow where Reviewer_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row>0){
  $sql3 = mysql_query("delete from hrm_pms_allow where Reviewer_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con); } } 

  
  if($_POST['V']=='Hod') {
  $sqlCh = mysql_query("select * from hrm_pms_allow where HOD_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row>0){
  $sql3 = mysql_query("delete from hrm_pms_allow where HOD_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con); } } 
 } 

 

 if($sql3){ ?> 
 <input type="hidden" id="Check" value="<?php echo $_POST['Check']; ?>" /><input type="hidden" id="Emp" value="<?php echo $_POST['E']; ?>" />
 <input type="hidden" id="SNo" value="<?php echo $_POST['N']; ?>" />
<?php } } ?>


<?php
if(isset($_POST['IncCheck']) && $_POST['IncCheck']!="")
{ 
 if($_POST['IncCheck']=='IncCheck')
 { 
  $sqlCh = mysql_query("select * from hrm_pms_allow_inc where EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row==0){
  $sql3 = mysql_query("insert into hrm_pms_allow_inc(EmployeeID, CompanyId, AssesmentYear, CreatedBy, CreatedDate, YearId) values(".$_POST['E'].", ".$_POST['C'].", ".$_POST['Y'].", ".$_POST['U'].", '".date("Y-m-d")."', ".$_POST['Y'].")",$con); }
 }

  if($_POST['IncCheck']=='IncUnCheck')
 { 
  $sqlCh = mysql_query("select * from hrm_pms_allow_inc where EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row>0){
  $sql3 = mysql_query("delete from hrm_pms_allow_inc where EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con); }
 } 

 if($sql3){ ?> 
 <input type="hidden" id="Check" value="<?php echo $_POST['Check']; ?>" /><input type="hidden" id="Emp" value="<?php echo $_POST['E']; ?>" />
 <input type="hidden" id="SNo" value="<?php echo $_POST['N']; ?>" />
<?php } } ?>





<?php
if(isset($_POST['KRACheck']) && $_POST['KRACheck']!="")
{
 if($_POST['KRACheck']=='KRACheck')
 { 
  if($_POST['V']=='App') { 
  $sqlCh = mysql_query("select * from hrm_pms_allowkra where Appraiser_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row==0){
  $sql3 = mysql_query("insert into hrm_pms_allowkra(Appraiser_EmployeeID, CompanyId, AssesmentYear, CreatedBy, CreatedDate, YearId) values(".$_POST['E'].", ".$_POST['C'].", ".$_POST['Y'].", ".$_POST['U'].", '".date("Y-m-d")."', ".$_POST['Y'].")",$con); } }

  if($_POST['V']=='Rev') {
  $sqlCh = mysql_query("select * from hrm_pms_allowkra where Reviewer_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row==0){
  $sql3 = mysql_query("insert into hrm_pms_allowkra(Reviewer_EmployeeID, CompanyId, AssesmentYear, CreatedBy, CreatedDate, YearId) values(".$_POST['E'].", ".$_POST['C'].", ".$_POST['Y'].", ".$_POST['U'].", '".date("Y-m-d")."', ".$_POST['Y'].")",$con); } } 
  
  if($_POST['V']=='Hod') {
  $sqlCh = mysql_query("select * from hrm_pms_allowkra where HOD_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row==0){
  $sql3 = mysql_query("insert into hrm_pms_allowkra(HOD_EmployeeID, CompanyId, AssesmentYear, CreatedBy, CreatedDate, YearId) values(".$_POST['E'].", ".$_POST['C'].", ".$_POST['Y'].", ".$_POST['U'].", '".date("Y-m-d")."', ".$_POST['Y'].")",$con); } } 
 }

 
  if($_POST['KRACheck']=='KRAUnCheck')
 {
  if($_POST['V']=='App') { 
  $sqlCh = mysql_query("select * from hrm_pms_allowkra where Appraiser_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row>0){
  $sql3 = mysql_query("delete from hrm_pms_allowkra where Appraiser_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con); } }

  if($_POST['V']=='Rev') {
  $sqlCh = mysql_query("select * from hrm_pms_allowkra where Reviewer_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row>0){
  $sql3 = mysql_query("delete from hrm_pms_allowkra where Reviewer_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con); } } 

  
  if($_POST['V']=='Hod') {
  $sqlCh = mysql_query("select * from hrm_pms_allowkra where HOD_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con);
  $row=mysql_num_rows($sqlCh); if($row>0){
  $sql3 = mysql_query("delete from hrm_pms_allowkra where HOD_EmployeeID=".$_POST['E']." AND CompanyId=".$_POST['C']." AND AssesmentYear=".$_POST['Y'], $con); } } 
 } 

 

 if($sql3){ ?> 
 <input type="hidden" id="Check" value="<?php echo $_POST['KRACheck']; ?>" /><input type="hidden" id="Emp" value="<?php echo $_POST['E']; ?>" />
 <input type="hidden" id="SNo" value="<?php echo $_POST['N']; ?>" />
<?php } } ?>