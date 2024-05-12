<style>
.h14{font-family:Times New Roman;font-size:14px;color:#FFFFAE;}
.h13{font-family:Times New Roman;font-size:13px;color:#FFFFAE;}
</style>
<table border="0" style="margin-top:-5px;width:1200px; height:20px;">	  
<tr>
  <td align="Left" style="font-family:Times New Roman;color:#C4E1FF;font-size:15px;width:100%;vertical-align:top;font-weight:bold;">
  <i>Welcome :&nbsp;</i><font class="h14"><?php echo $_SESSION['NameE'];?></font>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>EmpCode :&nbsp;</i><font class="h14"><?php echo $_SESSION['EC']; ?></font>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Year :&nbsp;</i><font class="h14"><?php echo $_SESSION['fromdate']; ?></font>
  <font class="h13">to</font><font class="h14"><?php echo $_SESSION['todate']; ?></font>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Company :&nbsp;</i><font class="h14"><?php echo $_SESSION['CompanyName']; ?></font>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../../../Home.php?logout=true" class="top_link" style="text-decoration:none;"><b style="color:#FFCB97;"><u>LogOut</u></b></a> &nbsp;&nbsp;
  </td>  								
</tr>
</table>

