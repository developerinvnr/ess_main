<?php 
  if($Qyy==2013){$sy1=1; $sy2=2;}elseif($Qyy==2014){$sy1=2; $sy2=3;}elseif($Qyy==2015){$sy1=3; $sy2=4;}elseif($Qyy==2016){$sy1=4; $sy2=5;}elseif($Qyy==2017){$sy1=5; $sy2=6;}
  elseif($Qyy==2018){$sy1=6; $sy2=7;}elseif($Qyy==2019){$sy1=7; $sy2=8;}
  elseif($Qyy==2020){$sy1=8; $sy2=9;}elseif($Qyy==2021){$sy1=9; $sy2=10;}elseif($Qyy==2022){$sy1=10; $sy2=11;}elseif($Qyy==2023){$sy1=11; $sy2=12;}
  elseif($Qyy==2024){$sy1=12; $sy2=13;}
  if($Qyy2==2013){$cy1=1; $cy2=2;}elseif($Qyy2==2014){$cy1=2; $cy2=3;}elseif($Qyy2==2015){$cy1=3; $cy2=4;}elseif($Qyy2==2016){$cy1=4; $cy2=5;}elseif($Qyy2==2017){$cy1=5; $cy2=6;}
  elseif($Qyy2==2018){$cy1=6; $cy2=7;}elseif($Qyy2==2019){$cy1=7; $cy2=8;}
  elseif($Qyy2==2020){$cy1=8; $cy2=9;}elseif($Qyy2==2021){$cy1=9; $cy2=10;}elseif($Qyy2==2022){$cy1=10; $cy2=11;}elseif($Qyy2==2023){$cy1=11; $cy2=12;}
  elseif($Qyy2==2024){$cy1=12; $cy2=13;}
  
  //echo "select SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details where ProductID=".$res['ProductId']." AND YearId=".$sy1.'<br/>';
  
  $Qsy1=mysql_query("select SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$sy1." where ProductID=".$res['ProductId']." AND YearId=".$sy1, $con); 
  $Qsy2=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9 from hrm_sales_sal_details_".$sy2." where ProductID=".$res['ProductId']." AND YearId=".$sy2, $con); $Qr_sy1=mysql_fetch_assoc($Qsy1); $Qr_sy2=mysql_fetch_assoc($Qsy2);
  $Qcy1=mysql_query("select SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$cy1." where ProductID=".$res['ProductId']." AND YearId=".$cy1, $con); 
  $Qcy2=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9 from hrm_sales_sal_details_".$cy2." where ProductID=".$res['ProductId']." AND YearId=".$cy2, $con); $Qr_cy1=mysql_fetch_assoc($Qcy1); $Qr_cy2=mysql_fetch_assoc($Qcy2);


if($QQ==0)
{
  
  if($Qmm==1)
  {
    if($Qmm2==1){ $Tott=$Qr_sy1['tm10'];}
	elseif($Qmm2==2){ $Tott=$Qr_sy1['tm10']+$Qr_sy1['tm11'];}
    elseif($Qmm2==3){ $Tott=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12'];}
    elseif($Qmm2==4){ $Tott=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1'];}
    elseif($Qmm2==5){ $Tott=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2'];}
    elseif($Qmm2==6){ $Tott=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3'];}
    elseif($Qmm2==7){ $Tott=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4'];}
    elseif($Qmm2==8){ $Tott=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5'];}
    elseif($Qmm2==9){ $Tott=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  }
  elseif($Qmm==2)
  {
    if($Qmm2==2){ $Tott=$Qr_sy1['tm11'];}
    elseif($Qmm2==3){ $Tott=$Qr_sy1['tm11']+$Qr_sy1['tm12'];}
    elseif($Qmm2==4){ $Tott=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1'];}
    elseif($Qmm2==5){ $Tott=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2'];}
    elseif($Qmm2==6){ $Tott=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3'];}
    elseif($Qmm2==7){ $Tott=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4'];}
    elseif($Qmm2==8){ $Tott=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5'];}
    elseif($Qmm2==9){ $Tott=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  }
  elseif($Qmm==3)
  { 
    if($Qmm2==3){ $Tott=$Qr_sy1['tm12'];}
    elseif($Qmm2==4){ $Tott=$Qr_sy1['tm12']+$Qr_sy2['tm1'];}
    elseif($Qmm2==5){ $Tott=$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2'];}
    elseif($Qmm2==6){ $Tott=$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3'];}
    elseif($Qmm2==7){ $Tott=$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4'];}
    elseif($Qmm2==8){ $Tott=$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']; }
    elseif($Qmm2==9){ $Tott=$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  }
  elseif($Qmm==4)
  {
    if($Qmm2==4){ $Tott=$Qr_sy2['tm1'];}
    elseif($Qmm2==5){ $Tott=$Qr_sy2['tm1']+$Qr_sy2['tm2'];}
    elseif($Qmm2==6){ $Tott=$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3'];}
    elseif($Qmm2==7){ $Tott=$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4'];}
    elseif($Qmm2==8){ $Tott=$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5'];}
    elseif($Qmm2==9){ $Tott=$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  }
  elseif($Qmm==5)
  {
    if($Qmm2==5){ $Tott=$Qr_sy2['tm2'];}
    elseif($Qmm2==6){ $Tott=$Qr_sy2['tm2']+$Qr_sy2['tm3'];}
    elseif($Qmm2==7){ $Tott=$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4'];}
    elseif($Qmm2==8){ $Tott=$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5'];}
    elseif($Qmm2==9){ $Tott=$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  }
  elseif($Qmm==6)
  {
    if($Qmm2==6){ $Tott=$Qr_sy2['tm3'];}
    elseif($Qmm2==7){ $Tott=$Qr_sy2['tm3']+$Qr_sy2['tm4'];}
    elseif($Qmm2==8){ $Tott=$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5'];}
    elseif($Qmm2==9){ $Tott=$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  }
  elseif($Qmm==7)
  {
    if($Qmm2==7){ $Tott=$Qr_sy2['tm4'];}
    elseif($Qmm2==8){ $Tott=$Qr_sy2['tm4']+$Qr_sy2['tm5'];}
    elseif($Qmm2==9){ $Tott=$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  }
  elseif($Qmm==8)
  {
    if($Qmm2==8){ $Tott=$Qr_sy2['tm5'];}
    elseif($Qmm2==9){ $Tott=$Qr_sy2['tm5']+$Qr_sy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  }
  elseif($Qmm==9)
  {
    if($Qmm2==9){ $Tott=$Qr_sy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Qr_sy2['tm6']+$Qr_sy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  }
  elseif($Qmm==10)
  {
    if($Qmm2==10){ $Tott=$Qr_sy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Qr_sy2['tm7']+$Qr_sy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  }
  elseif($Qmm==11)
  {
    if($Qmm2==11){ $Tott=$Qr_sy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  }
  elseif($Qmm==12){  if($Qmm2==12){ $Tott=$Qr_sy2['tm9'];}  }
}
/***********************************************/
if($QQ==1)
{
  
  if($Qmm==1){ $Tot1=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']; }
  elseif($Qmm==2){$Tot1=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']; }
  elseif($Qmm==3){$Tot1=$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  elseif($Qmm==4){$Tot1=$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  elseif($Qmm==5){$Tot1=$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  elseif($Qmm==6){$Tot1=$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  elseif($Qmm==7){$Tot1=$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']; }
  elseif($Qmm==8){ $Tot1=$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']; }
  elseif($Qmm==9){$Tot1=$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  elseif($Qmm==10){$Tot1=$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  elseif($Qmm==11){$Tot1=$Qr_sy2['tm8']+$Qr_sy2['tm9'];}
  elseif($Qmm==12){ $Tot1=$Qr_sy2['tm9']; }
    if($Qmm2==1){ $Tott=$Tot1+$Qr_cy1['tm10'];}
	elseif($Qmm2==2){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11'];}
    elseif($Qmm2==3){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12'];}
    elseif($Qmm2==4){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1'];}
    elseif($Qmm2==5){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2'];}
    elseif($Qmm2==6){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3'];}
    elseif($Qmm2==7){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4'];}
    elseif($Qmm2==8){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5'];}
    elseif($Qmm2==9){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7']+$Qr_cy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7']+$Qr_cy2['tm8']+$Qr_cy2['tm9'];}
}
/**********************************************************/

if($QQ==2)
{
  if($Qyy==2013){$sy12=2; $sy22=3;}elseif($Qyy==2014){$sy12=3; $sy22=4;}elseif($Qyy==2015){$sy12=4; $sy22=5;}
  elseif($Qyy==2016){$sy12=5; $sy22=6;}elseif($Qyy==2017){$sy12=6; $sy22=7;}elseif($Qyy==2018){$sy12=7; $sy22=8;}elseif($Qyy==2019){$sy12=8; $sy22=9;}
  elseif($Qyy==2020){$sy12=9; $sy22=10;}elseif($Qyy==2021){$sy12=10; $sy22=11;}elseif($Qyy==2022){$sy12=11; $sy22=12;}elseif($Qyy==2023){$sy12=12; $sy22=13;}
  elseif($Qyy==2024){$sy12=13; $sy22=14;}
  $Qsy12=mysql_query("select SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$sy12." where ProductID=".$res['ProductId']." AND YearId=".$sy12, $con); 
  $Qsy22=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9 from hrm_sales_sal_details_".$sy22." where ProductID=".$res['ProductId']." AND YearId=".$sy22, $con); $Qr_sy12=mysql_fetch_assoc($Qsy12); $Qr_sy22=mysql_fetch_assoc($Qsy22);
  
  $Tot2=$Qr_sy12['tm10']+$Qr_sy12['tm11']+$Qr_sy12['tm12']+$Qr_sy22['tm1']+$Qr_sy22['tm2']+$Qr_sy22['tm3']+$Qr_sy22['tm4']+$Qr_sy22['tm5']+$Qr_sy22['tm6']+$Qr_sy22['tm7']+$Qr_sy22['tm8']+$Qr_sy22['tm9'];
  if($Qmm==1){ $Tot1=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2;}
  elseif($Qmm==2) {$Tot1=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2;}
  elseif($Qmm==3){ $Tot1=$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2; }
  elseif($Qmm==4){$Tot1=$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2; }
  elseif($Qmm==5){$Tot1=$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2; }
  elseif($Qmm==6){$Tot1=$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2;}
  elseif($Qmm==7){$Tot1=$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2;}
  elseif($Qmm==8){$Tot1=$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2;}
  elseif($Qmm==9){$Tot1=$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2;}
  elseif($Qmm==10){$Tot1=$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2;}
  elseif($Qmm==11){$Tot1=$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2;}
  elseif($Qmm==12){$Tot1=$Qr_sy2['tm9']+$Tot2;}
    if($Qmm2==1){ $Tott=$Tot1+$Qr_cy1['tm10'];}
	elseif($Qmm2==2){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11'];}
    elseif($Qmm2==3){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12'];}
    elseif($Qmm2==4){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1'];}
    elseif($Qmm2==5){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2'];}
    elseif($Qmm2==6){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3'];}
    elseif($Qmm2==7){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4'];}
    elseif($Qmm2==8){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5'];}
    elseif($Qmm2==9){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7']+$Qr_cy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7']+$Qr_cy2['tm8']+$Qr_cy2['tm9'];}
}

/***************************************************************************/

if($QQ==3)
{
  if($Qyy==2013){$sy12=2; $sy22=3; $sy13=3; $sy23=4;} elseif($Qyy==2014){$sy12=3; $sy22=4; $sy13=4; $sy23=5; }elseif($Qyy==2015){$sy12=4; $sy22=5; $sy13=5; $sy23=6;}  
  elseif($Qyy==2016){$sy12=5; $sy22=6; $sy13=6; $sy23=7;}  elseif($Qyy==2017){$sy12=6; $sy22=7; $sy13=7; $sy23=8;}
  elseif($Qyy==2018){$sy12=7; $sy22=8; $sy13=8; $sy23=9;}  elseif($Qyy==2019){$sy12=8; $sy22=9; $sy13=9; $sy23=10;}  elseif($Qyy==2020){$sy12=9; $sy22=10; $sy13=10; $sy23=11;}
  elseif($Qyy==2021){$sy12=10; $sy22=11; $sy13=11; $sy23=12;}  elseif($Qyy==2022){$sy12=11; $sy22=12; $sy13=12; $sy23=13;}
  elseif($Qyy==2023){$sy12=12; $sy22=13; $sy13=13; $sy23=14;}  elseif($Qyy==2024){$sy12=13; $sy22=14; $sy13=14; $sy23=15;}
  
  $Qsy12=mysql_query("select SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$sy12." where ProductID=".$res['ProductId']." AND YearId=".$sy12, $con); 
  $Qsy22=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9 from hrm_sales_sal_details_".$sy22." where ProductID=".$res['ProductId']." AND YearId=".$sy22, $con); $Qr_sy12=mysql_fetch_assoc($Qsy12); $Qr_sy22=mysql_fetch_assoc($Qsy22);
  $Qsy13=mysql_query("select SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$sy13." where ProductID=".$res['ProductId']." AND YearId=".$sy13, $con); 
  $Qsy23=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9 from hrm_sales_sal_details_".$sy23." where ProductID=".$res['ProductId']." AND YearId=".$sy23, $con); $Qr_sy13=mysql_fetch_assoc($Qsy13); $Qr_sy23=mysql_fetch_assoc($Qsy23);
  
  $Tot2=$Qr_sy12['tm10']+$Qr_sy12['tm11']+$Qr_sy12['tm12']+$Qr_sy22['tm1']+$Qr_sy22['tm2']+$Qr_sy22['tm3']+$Qr_sy22['tm4']+$Qr_sy22['tm5']+$Qr_sy22['tm6']+$Qr_sy22['tm7']+$Qr_sy22['tm8']+$Qr_sy22['tm9'];
  $Tot3=$Qr_sy13['tm10']+$Qr_sy13['tm11']+$Qr_sy13['tm12']+$Qr_sy23['tm1']+$Qr_sy23['tm2']+$Qr_sy23['tm3']+$Qr_sy23['tm4']+$Qr_sy23['tm5']+$Qr_sy23['tm6']+$Qr_sy23['tm7']+$Qr_sy23['tm8']+$Qr_sy23['tm9'];
  if($Qmm==1){ $Tot1=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3; }
  elseif($Qmm==2){ $Tot1=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3; }
  elseif($Qmm==3){$Tot1=$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3;}
  elseif($Qmm==4){$Tot1=$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3; }
  elseif($Qmm==5){$Tot1=$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3; }
  elseif($Qmm==6){$Tot1=$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3; }
  elseif($Qmm==7){$Tot1=$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3; }
  elseif($Qmm==8){$Tot1=$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3;}
  elseif($Qmm==9){$Tot1=$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3; }
  elseif($Qmm==10){$Tot1=$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3; }
  elseif($Qmm==11){$Tot1=$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3; }
  elseif($Qmm==12){$Tot1=$Qr_sy2['tm9']+$Tot2+$Tot3;}
    if($Qmm2==1){ $Tott=$Tot1+$Qr_cy1['tm10'];}
	elseif($Qmm2==2){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11'];}
    elseif($Qmm2==3){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12'];}
    elseif($Qmm2==4){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1'];}
    elseif($Qmm2==5){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2'];}
    elseif($Qmm2==6){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3'];}
    elseif($Qmm2==7){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4'];}
    elseif($Qmm2==8){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5'];}
    elseif($Qmm2==9){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7']+$Qr_cy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7']+$Qr_cy2['tm8']+$Qr_cy2['tm9'];}
}

/**************************************************************************/

if($QQ==4)
{
  if($Qyy==2013){$sy12=2; $sy22=3; $sy13=3; $sy23=4; $sy14=4; $sy24=5;} elseif($Qyy==2014){$sy12=3; $sy22=4; $sy13=4; $sy23=5; $sy14=5; $sy24=6; }
  elseif($Qyy==2015){$sy12=4; $sy22=5; $sy13=5; $sy23=6; $sy14=6; $sy24=7; }  elseif($Qyy==2016){$sy12=5; $sy22=6; $sy13=6; $sy23=7; $sy14=7; $sy24=8; }
  elseif($Qyy==2017){$sy12=6; $sy22=7; $sy13=7; $sy23=8; $sy14=8; $sy24=9; }  elseif($Qyy==2018){$sy12=7; $sy22=8; $sy13=8; $sy23=9; $sy14=9; $sy24=10; }
  elseif($Qyy==2019){$sy12=8; $sy22=9; $sy13=9; $sy23=10; $sy14=10; $sy24=11; }  elseif($Qyy==2020){$sy12=9; $sy22=10; $sy13=10; $sy23=11; $sy14=11; $sy24=12; }
  elseif($Qyy==2021){$sy12=10; $sy22=11; $sy13=11; $sy23=12; $sy14=12; $sy24=13; }  elseif($Qyy==2022){$sy12=11; $sy22=12; $sy13=12; $sy23=13; $sy14=13; $sy24=14; }
  elseif($Qyy==2023){$sy12=12; $sy22=13; $sy13=13; $sy23=14; $sy14=14; $sy24=15; }  elseif($Qyy==2024){$sy12=13; $sy22=14; $sy13=14; $sy23=15; $sy14=15; $sy24=16; }
  
  $Qsy12=mysql_query("select SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$sy12." where ProductID=".$res['ProductId']." AND YearId=".$sy12, $con); 
  $Qsy22=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9 from hrm_sales_sal_details_".$sy22." where ProductID=".$res['ProductId']." AND YearId=".$sy22, $con); $Qr_sy12=mysql_fetch_assoc($Qsy12); $Qr_sy22=mysql_fetch_assoc($Qsy22);
  $Qsy13=mysql_query("select SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$sy13." where ProductID=".$res['ProductId']." AND YearId=".$sy13, $con); 
  $Qsy23=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9 from hrm_sales_sal_details_".$sy23." where ProductID=".$res['ProductId']." AND YearId=".$sy23, $con); $Qr_sy13=mysql_fetch_assoc($Qsy13); $Qr_sy23=mysql_fetch_assoc($Qsy23);
  $Qsy14=mysql_query("select SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$sy14." where ProductID=".$res['ProductId']." AND YearId=".$sy14, $con); 
  $Qsy24=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9 from hrm_sales_sal_details_".$sy24." where ProductID=".$res['ProductId']." AND YearId=".$sy24, $con); $Qr_sy14=mysql_fetch_assoc($Qsy14); $Qr_sy24=mysql_fetch_assoc($Qsy24);
  
  $Tot2=$Qr_sy12['tm10']+$Qr_sy12['tm11']+$Qr_sy12['tm12']+$Qr_sy22['tm1']+$Qr_sy22['tm2']+$Qr_sy22['tm3']+$Qr_sy22['tm4']+$Qr_sy22['tm5']+$Qr_sy22['tm6']+$Qr_sy22['tm7']+$Qr_sy22['tm8']+$Qr_sy22['tm9'];
  $Tot3=$Qr_sy13['tm10']+$Qr_sy13['tm11']+$Qr_sy13['tm12']+$Qr_sy23['tm1']+$Qr_sy23['tm2']+$Qr_sy23['tm3']+$Qr_sy23['tm4']+$Qr_sy23['tm5']+$Qr_sy23['tm6']+$Qr_sy23['tm7']+$Qr_sy23['tm8']+$Qr_sy23['tm9'];
  $Tot4=$Qr_sy14['tm10']+$Qr_sy14['tm11']+$Qr_sy14['tm12']+$Qr_sy24['tm1']+$Qr_sy24['tm2']+$Qr_sy24['tm3']+$Qr_sy24['tm4']+$Qr_sy24['tm5']+$Qr_sy24['tm6']+$Qr_sy24['tm7']+$Qr_sy24['tm8']+$Qr_sy24['tm9'];
  if($Qmm==1){ $Tot1=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4;}
  elseif($Qmm==2){$Tot1=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4; }
  elseif($Qmm==3){ $Tot1=$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4;}
  elseif($Qmm==4){$Tot1=$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4; }
  elseif($Qmm==5){$Tot1=$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4;}
  elseif($Qmm==6){$Tot1=$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4;}
  elseif($Qmm==7){$Tot1=$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4;}
  elseif($Qmm==8){$Tot1=$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4;}
  elseif($Qmm==9){$Tot1=$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4;}
  elseif($Qmm==10){$Tot1=$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4; }
  elseif($Qmm==11){$Tot1=$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4; }
  elseif($Qmm==12){$Tot1=$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4;}
    if($Qmm2==1){ $Tott=$Tot1+$Qr_cy1['tm10'];}
	elseif($Qmm2==2){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11'];}
    elseif($Qmm2==3){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12'];}
    elseif($Qmm2==4){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1'];}
    elseif($Qmm2==5){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2'];}
    elseif($Qmm2==6){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3'];}
    elseif($Qmm2==7){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4'];}
    elseif($Qmm2==8){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5'];}
    elseif($Qmm2==9){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7']+$Qr_cy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7']+$Qr_cy2['tm8']+$Qr_cy2['tm9'];}
}

/*****************************************************************************/

if($QQ==5)
{
  if($Qyy==2013){$sy12=2; $sy22=3; $sy13=3; $sy23=4; $sy14=4; $sy24=5; $sy15=5; $sy25=6; } 
  elseif($Qyy==2014){$sy12=3; $sy22=4; $sy13=4; $sy23=5; $sy14=5; $sy24=6; $sy15=6; $sy25=7; }
  elseif($Qyy==2015){$sy12=4; $sy22=5; $sy13=5; $sy23=6; $sy14=6; $sy24=7; $sy15=7; $sy25=8; }
  elseif($Qyy==2016){$sy12=5; $sy22=6; $sy13=6; $sy23=7; $sy14=7; $sy24=8; $sy15=8; $sy25=9; }
  elseif($Qyy==2017){$sy12=6; $sy22=7; $sy13=7; $sy23=8; $sy14=8; $sy24=9; $sy15=9; $sy25=10; }
  elseif($Qyy==2018){$sy12=7; $sy22=8; $sy13=8; $sy23=9; $sy14=9; $sy24=10; $sy15=10; $sy25=11; }
  elseif($Qyy==2019){$sy12=8; $sy22=9; $sy13=9; $sy23=10; $sy14=10; $sy24=11; $sy15=11; $sy25=12; }
  elseif($Qyy==2020){$sy12=9; $sy22=10; $sy13=10; $sy23=11; $sy14=11; $sy24=12; $sy15=12; $sy25=13; }
  elseif($Qyy==2021){$sy12=10; $sy22=11; $sy13=11; $sy23=12; $sy14=12; $sy24=13; $sy15=13; $sy25=14; }
  elseif($Qyy==2022){$sy12=11; $sy22=12; $sy13=12; $sy23=13; $sy14=13; $sy24=14; $sy15=14; $sy25=15; }
  elseif($Qyy==2023){$sy12=12; $sy22=13; $sy13=13; $sy23=14; $sy14=14; $sy24=15; $sy15=15; $sy25=16; }
  elseif($Qyy==2024){$sy12=13; $sy22=14; $sy13=14; $sy23=15; $sy14=15; $sy24=16; $sy15=16; $sy25=17; }
  
  $Qsy12=mysql_query("select SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$sy12." where ProductID=".$res['ProductId']." AND YearId=".$sy12, $con); 
  $Qsy22=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9 from hrm_sales_sal_details_".$sy22." where ProductID=".$res['ProductId']." AND YearId=".$sy22, $con); $Qr_sy12=mysql_fetch_assoc($Qsy12); $Qr_sy22=mysql_fetch_assoc($Qsy22);
  $Qsy13=mysql_query("select SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$sy13." where ProductID=".$res['ProductId']." AND YearId=".$sy13, $con); 
  $Qsy23=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9 from hrm_sales_sal_details_".$sy23." where ProductID=".$res['ProductId']." AND YearId=".$sy23, $con); $Qr_sy13=mysql_fetch_assoc($Qsy13); $Qr_sy23=mysql_fetch_assoc($Qsy23);
  $Qsy14=mysql_query("select SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$sy14." where ProductID=".$res['ProductId']." AND YearId=".$sy14, $con); 
  $Qsy24=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9 from hrm_sales_sal_details_".$sy24." where ProductID=".$res['ProductId']." AND YearId=".$sy24, $con); $Qr_sy14=mysql_fetch_assoc($Qsy14); $Qr_sy24=mysql_fetch_assoc($Qsy24);
  $Qsy15=mysql_query("select SUM(M10) as tm10,SUM(M11) as tm11,SUM(M12) as tm12 from hrm_sales_sal_details_".$sy15." where ProductID=".$res['ProductId']." AND YearId=".$sy15, $con); 
  $Qsy25=mysql_query("select SUM(M1) as tm1,SUM(M2) as tm2,SUM(M3) as tm3,SUM(M4) as tm4,SUM(M5) as tm5,SUM(M6) as tm6,SUM(M7) as tm7,SUM(M8) as tm8,SUM(M9) as tm9 from hrm_sales_sal_details_".$sy25." where ProductID=".$res['ProductId']." AND YearId=".$sy25, $con); $Qr_sy15=mysql_fetch_assoc($Qsy15); $Qr_sy25=mysql_fetch_assoc($Qsy25);

  $Tot2=$Qr_sy12['tm10']+$Qr_sy12['tm11']+$Qr_sy12['tm12']+$Qr_sy22['tm1']+$Qr_sy22['tm2']+$Qr_sy22['tm3']+$Qr_sy22['tm4']+$Qr_sy22['tm5']+$Qr_sy22['tm6']+$Qr_sy22['tm7']+$Qr_sy22['tm8']+$Qr_sy22['tm9'];
  $Tot3=$Qr_sy13['tm10']+$Qr_sy13['tm11']+$Qr_sy13['tm12']+$Qr_sy23['tm1']+$Qr_sy23['tm2']+$Qr_sy23['tm3']+$Qr_sy23['tm4']+$Qr_sy23['tm5']+$Qr_sy23['tm6']+$Qr_sy23['tm7']+$Qr_sy23['tm8']+$Qr_sy23['tm9'];
  $Tot4=$Qr_sy14['tm10']+$Qr_sy14['tm11']+$Qr_sy14['tm12']+$Qr_sy24['tm1']+$Qr_sy24['tm2']+$Qr_sy24['tm3']+$Qr_sy24['tm4']+$Qr_sy24['tm5']+$Qr_sy24['tm6']+$Qr_sy24['tm7']+$Qr_sy24['tm8']+$Qr_sy24['tm9'];
  $Tot5=$Qr_sy15['tm10']+$Qr_sy15['tm11']+$Qr_sy15['tm12']+$Qr_sy25['tm1']+$Qr_sy25['tm2']+$Qr_sy25['tm3']+$Qr_sy25['tm4']+$Qr_sy25['tm5']+$Qr_sy25['tm6']+$Qr_sy25['tm7']+$Qr_sy25['tm8']+$Qr_sy25['tm9'];
  if($Qmm==1){$Tot1=$Qr_sy1['tm10']+$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4+$Tot5; }
  elseif($Qmm==2){$Tot1=$Qr_sy1['tm11']+$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4+$Tot5;}
  elseif($Qmm==3){ $Tot1=$Qr_sy1['tm12']+$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4+$Tot5;}
  elseif($Qmm==4){$Tot1=$Qr_sy2['tm1']+$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4+$Tot5;}
  elseif($Qmm==5){$Tot1=$Qr_sy2['tm2']+$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4+$Tot5; }
  elseif($Qmm==6){$Tot1=$Qr_sy2['tm3']+$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4+$Tot5;}
  elseif($Qmm==7){$Tot1=$Qr_sy2['tm4']+$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4+$Tot5; }
  elseif($Qmm==8){$Tot1=$Qr_sy2['tm5']+$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4+$Tot5; }
  elseif($Qmm==9){$Tot1=$Qr_sy2['tm6']+$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4+$Tot5;}
  elseif($Qmm==10){$Tot1=$Qr_sy2['tm7']+$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4+$Tot5;}
  elseif($Qmm==11){$Tot1=$Qr_sy2['tm8']+$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4+$Tot5;}
  elseif($Qmm==12){$Tot1=$Qr_sy2['tm9']+$Tot2+$Tot3+$Tot4+$Tot5;}
    if($Qmm2==1){ $Tott=$Tot1+$Qr_cy1['tm10'];}
	elseif($Qmm2==2){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11'];}
    elseif($Qmm2==3){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12'];}
    elseif($Qmm2==4){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1'];}
    elseif($Qmm2==5){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2'];}
    elseif($Qmm2==6){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3'];}
    elseif($Qmm2==7){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4'];}
    elseif($Qmm2==8){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5'];}
    elseif($Qmm2==9){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6'];}
    elseif($Qmm2==10){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7'];}
    elseif($Qmm2==11){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7']+$Qr_cy2['tm8'];}
    elseif($Qmm2==12){ $Tott=$Tot1+$Qr_cy1['tm10']+$Qr_cy1['tm11']+$Qr_cy1['tm12']+$Qr_cy2['tm1']+$Qr_cy2['tm2']+$Qr_cy2['tm3']+$Qr_cy2['tm4']+$Qr_cy2['tm5']+$Qr_cy2['tm6']+$Qr_cy2['tm7']+$Qr_cy2['tm8']+$Qr_cy2['tm9'];}
	
}
?>
 