<div style="background: #e5e5e5;padding: 20px; text-align: center;font-family: Lucida Sans Unicode">

	<p style="text-align: left;font-weight: bold;"><?php echo date('d M, Y');?></p>
	<p style="text-align: left;font-weight: bold;color: green;padding-top: 5px;">Subject: AEEA Club Tennis Court Reservation.</p>
	
	<p style="text-align: left;">Dear Member,</p>
	<?php $weekDays=array('1'=>'Saturday','2'=>'Sunday','3'=>'Monday','4'=>'Tuesday','5'=>'Wednesday','6'=>'Thursday','7'=>'Friday');?>
	<p style="text-align: left;"> You have reserved the squash court for <?php echo date('l,F j, Y',strtotime($data['datetime']));?> <?php echo date('h:i:s A',strtotime($data['datetime']));?>. 
	</p>
	<p style="text-align: left;">To view or cancel please log-in to your account and click on My Reservation.</p>
	<p style="text-align: left;">Thank you.</p>
	
	<table style="width: 100%">
		<tr>
			<td align="right" colspan="2"><b>ADMIN AEEA</b></td>
		</tr>
	</table>
	
	<table style="width: 100%">
	<tr>
		<td align="right">
			<img src="http://ipsitasoft.com/americanclubs/img/logo-admin-sm.png" width="40" alt="ONLINE TENNIS AND SQUASH BOOKING SYSTEM" >
			<span style="position: relative;bottom: 15px;">American Embassy Employees' Association</span>
		</td>
	</tr>
	</table>
	
	</div>
