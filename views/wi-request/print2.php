<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include "connect.php";
									$g=$_GET['id'];?>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
     <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- TABLE TOOLS CSS -->
	<link rel="stylesheet" type="text/css" href="../css/dataTables.tableTools.css">
	
	<!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<!-- DataTables Responsive CSS  -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">	
<title><?php echo"$g";?></title>
<?php

									$result = mysql_query("SELECT * FROM `dcn_ver` WHERE ver_serno ='$g'");
									while($row = mysql_fetch_array($result)) {?>
									
</head>

<body>
<div id="printwrap">

<div id="printhead" >
<?PHP echo "<H4><B>$row[ver_serno]</B></H4><br/>";?>
</div>

<br/>
<div id="printbody">
<h1 align="center"><strong>Lembar Instruksi DCN</strong></h1>
<br/><br/>
<table width="100%" border="0">
  <tr>
    <td width="13%">DATE</td>
    <td width="1%">:</td>
    <td width="86%"><STRONG><?PHP echo "$row[ver_tgl]"; ?></STRONG></td>
  </tr>
  <tr>
    <td>DCN NO</td>
    <td>:</td>
    <td><STRONG><?PHP echo "$row[ver_dcnno]";?></STRONG></td>
  </tr>
  <tr>
    <td>DCN TYPE</td>
    <td>:</td>
    <td><STRONG><?PHP echo "$row[ver_type]";?></STRONG></td>
  </tr>
  <tr>
    <td>MODEL</td>
    <td>:</td>
    <td><STRONG><?PHP echo "$row[ver_model]";?></STRONG></td>
  </tr>
  <tr>
    <td>EFF DATE</td>
    <td>:</td>
    <td> <STRONG><?PHP echo "$row[ver_eff]";?></STRONG></td>
  </tr>
  <tr>
    <td>PIC </td>
    <td>:</td>
    <td><STRONG><?PHP echo "$row[ver_pic]"; ?></STRONG></td>
  </tr>
  <tr>
    <td>PURPOSE</td>
    <td>:</td>
    <td>UPDATE DCN &amp; VERIFIKASI</td>
  </tr>
</table>
<br/>

<table width="100%" border="0">
  <tr>
    <td width="2%">A. </td>
    <td width="100%">SECTION</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
       <h4> <input type="checkbox" checked="checked">&nbsp;&nbsp;<STRONG><?PHP echo "$row[ver_section]";?></STRONG></h4>
        
    </td>
    
  </tr>
  
</table>

<table width="100%" border="0">
  <tr>
    <td width="3%">B.</td>
    <td colspan="5">VERIFIKASI</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td colspan="5">1. WI/ SETLIST</td>
    </tr>
  <tr valign="top">
    <td>&nbsp;</td>
    <td width="3%" valign="top">1.1</td>
    <td width="18%" valign="top"> DOC. NO WI / SETLIST</td>
    <td width="1%" valign="top">:</td>
    <td width="43%" valign="top"><STRONG><?PHP echo "$row[ver_wi_no]";?> - <?PHP echo "$row[ver_wi_title]";?></STRONG></td>
    <td width="32%" valign="top">REV. [ <strong><?PHP echo "$row[ver_wi_rev]";?></strong> ]</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td align="center">1.2</td>
    <td>WI MAKER</td>
    <td>:</td>
    <td><strong><?PHP echo "$row[ver_wi_maker]";?></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td align="center">1.3</td>
    <td>ISSUE DATE</td>
    <td>:</td>
    <td>____-____-________<small>(Diisi PE ADMIN)</small></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td align="center">1.4</td>
    <td>SER NO RECORD</td>
    <td>:</td>
    <td>
        <input type="checkbox" checked="checked">&nbsp;&nbsp;  <STRONG><?PHP echo "$row[ver_sn]<br/>";?></STRONG></td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">2. COST DATA</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td width="3%" align="center">2.1</td>
    <td width="18%">STCF</td>
    <td width="1%">:</td>
    <td width="58%">
      <input type="checkbox" checked="checked">&nbsp;&nbsp;<STRONG><?PHP echo "$row[ver_st]<br/>";?></STRONG></td>
    <td width="17%">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td height="30">&nbsp;</td>
    <td width="4%" align="center">2.2</td>
    <td width="18%">MCF</td>
    <td width="1%">:</td>
    <td width="58%">
      <input type="checkbox" checked="checked">&nbsp;&nbsp;<STRONG><?PHP echo "$row[ver_mc]<br/>";?></STRONG></td>
    <td width="17%">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="19">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">3. PROGRAM MESIN</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td width="765">
      <input type="checkbox" checked="checked">&nbsp;&nbsp;<STRONG><?PHP echo "$row[ver_prog]<br/>";?></STRONG></td>
    
      
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="19">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">4. SAMPLE</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td width="765">
      <input type="checkbox" checked="checked">&nbsp;&nbsp;<STRONG><?PHP echo "$row[ver_sample]<br/>";?></STRONG></td> 
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="19">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">5. DCI REPLY</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td width="765">
      <input type="checkbox" checked="checked">&nbsp;&nbsp;<STRONG><?PHP echo "$row[ver_dci]<br/>";?></STRONG></td> 
  </tr>
</table>


<br/>
  COMMENT:<BR>
  ..........................................................................................................................................................................................................................................................</p>
<p>..........................................................................................................................................................................................................................................................</p>
<p>..........................................................................................................................................................................................................................................................</p>
<br>
<?PHP
									}
								
									?>
<br>
<br>

<table width="100%" border="1">
  <tr>
    <td align="center"><STRONG>ISSUE</STRONG></td>
    <td align="center"><STRONG>CHECK 1</STRONG></td>
    <td align="center"><STRONG>CHECK 2</STRONG></td>
    <td align="center"><STRONG>APPROVAL</STRONG></td>
    <td align="center"><STRONG>RECIVED</STRONG></td>
  </tr>
  <tr>
    <td height="60">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><STRONG>PE ADMIN</STRONG></td>
    <td align="center"><STRONG>WI MAKER</STRONG></td>
    <td align="center"><STRONG>PE SECTION</STRONG></td>
    <td align="center"><STRONG>PE HEAD</STRONG></td>
    <td align="center"><STRONG>PE ADMIN</STRONG></td>
  </tr>
</table>
<BR/>
</div>
Record E-001 Rev.07<BR>
No: <?PHP $g=$_GET['id'];
									$result = mysql_query("SELECT * FROM `dcn_ver` WHERE ver_serno ='$g'");
									while($row = mysql_fetch_array($result)) { echo "<b>$row[ver_serno]</b>";}?>
<!--*)pastikan Lembar Instruksi DCN terisi semua-->
</div>

</body>
</html>