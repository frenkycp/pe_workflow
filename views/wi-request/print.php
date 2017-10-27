<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>

#printwrap{
	/*border-style: solid;*/
	width: 21cm;
	height: 29.7cm;
	/*border-width: 1px;*/
}

body{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}

.top-right{
	float: right;
	padding: 0.3cm 1.2cm 0px 0px;
	width:4cm;
	height:1cm;
	text-align: right;
	font-size: 16px;
}

#text-above-logo{
	padding-top: 10px;
	font-size: 14px;
}

.left-margin{
	padding-left: 0.7cm;
}

.col1{
	width: 170px;
	vertical-align: top;
}

.col2{
	width: 10px;
	vertical-align: top;
}

.col3{
	width: 400px;
	font-style: italic;
	vertical-align: top;
}

/* table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
} */

tr{
	line-height: 25px;
}

.sign-col{
	width: 7cm;
	text-align: center;
}

#sign-table tr th{
	width: 6cm;
	text-align: center;
}

#sign-table tr td{
	text-align: center;
	line-height: 13px;
	font-size: 15px;
}

#form-table tr{
	height: 35px;
}

</style>
</head>
<body>
	<div id="printwrap">
		<div id="header-wrapper" style="width: 21cm; height: 2.3cm">
			<div class="top-right">
				<div>Record No. : <b><?php echo $model->record_no; ?></b></div>
				<div style="padding-top: 2px;">Revisi No. : <?php echo $model->rev_no; ?></div>
			</div>
		</div>
		
		<div class="left-margin">
			<div id="logo">
				<img style="max-width: 190px;" src="<?php echo Yii::$app->urlManager->baseUrl . '/img/logo 250x58.png' ?>" alt="" />
			</div>
			<div id="text-above-logo">
				<div>
					<b>PT. YAMAHA ELECTRONICS MANUFACTURING INDONESIA</b><br />
				</div>
				<div style="padding-top: 3px;">
					PRODUCTION ENGINEERING DEPARTMENT
				</div>
			</div>
		</div>
		
		<div id="doc-title" style="text-align: center; padding-top: 30px;">
			<u><h1><?php echo $model->doc_title; ?></h1></u>
		</div>
		
		<div class="left-margin" style="padding-top: 18px; height: 16cm; max-height: 16cm;">
			<table id="form-table" style="font-size: 15px">
				<tr>
					<td class="col1">TO</td>
					<td class="col2">: </td>
					<td class="col3">PRODUCTION ENGINEERING DEPARTMENT</td>
				</tr>
				<tr>
					<td class="col1">FROM</td>
					<td class="col2">: </td>
					<td class="col3"><?php echo $model->request_from; ?></td>
				</tr>
				<tr>
					<td class="col1">REQUEST DATE</td>
					<td class="col2">: </td>
					<td class="col3"><?php echo date('d - m - Y', strtotime($model->request_date)); ?></td>
				</tr>
				<tr>
					<td class="col1">REQUIRED DATE</td>
					<td class="col2">: </td>
					<td class="col3"><?php echo $model->required_date == NULL ? '-' : date('d - m - Y', strtotime($model->required_date)); ?></td>
				</tr>
				<tr>
					<td class="col1">DOCUMENT NO</td>
					<td class="col2">: </td>
					<td class="col3"><?php echo $model->wi_docno; ?></td>
				</tr>
				<tr>
					<td class="col1">TITLE OF DOCUMENT</td>
					<td class="col2">: </td>
					<td class="col3"><?php echo $model->wi_title; ?></td>
				</tr>
				<tr>
					<td class="col1">PAGE NO</td>
					<td class="col2">: </td>
					<td class="col3"><?php echo $model->page_no; ?></td>
				</tr>
				<tr>
					<td class="col1">CHANGE ITEM</td>
					<td class="col2">: </td>
					<td class="col3"><?php echo $model->change_item; ?></td>
				</tr>
				<tr>
					<td class="col1">REASON</td>
					<td class="col2">: </td>
					<td class="col3"><?php echo $model->reason; ?></td>
				</tr>
			</table>
		</div>
		
		<div style="height: 180px;">
			<table id="sign-table" border="0">
				<tr height="70px;" style="vertical-align: top;">
					<th>MADE BY :</th>
					<th>CHECKED BY :</th>
					<th>APPROVED BY</th>
				</tr>
				<tr height="5px" style="vertical-align: bottom; line-height: 2px;">
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr height="1px" style="line-height: 2px;">
					<td><u>
					<?php 
					for ($i = 1; $i<=25; $i++)
					{
						echo '&nbsp;';
					}
					?></u></td>
					<td><u>
					<?php for ($i = 1; $i<=48; $i++)
					{
						echo '&nbsp;';
					}
					?>
					</u></td>
					<td><u>
					<?php for ($i = 1; $i<=18; $i++)
					{
						echo '&nbsp;';
					}
					?>
					</u></td>
				</tr>
				<tr>
					<td>REQUESTOR</td>
					<td>REQUESTOR DEPT HEAD</td>
					<td>PE DEPT</td>
				</tr>
			</table>
			<div style="position: absolute; top: 978px; left: 75px; width: 100px; text-align: center; font-size: 16px;">
				<?php echo $model->requestor->name; ?>
			</div>
		</div>
		
		<div class="left-margin">
			<div style="font-size: 14px;"><b><u>IMPORTANT:</u></b></div>
			<div style="font-size: 11px; padding-top: 3px;">PLEASE SUBMIT THE REQUEST TO PE DEPT. MINIMAL 5 WORKING DAYS AHEAD BEFORE THE REQUIRED DATE</div>
		</div>
		
	</div>
</body>