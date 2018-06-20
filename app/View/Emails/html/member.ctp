<div style="background: #e5e5e5;padding: 20px; text-align: center;font-family: Lucida Sans Unicode">

	<p style="text-align: left;font-weight: bold;"><?php echo date('d M, Y');?></p>
	<p style="text-align: left;font-weight: bold;color: green;padding-top: 5px;">Subject: Trainer will not be available at your booking time.</p>
	
	<p style="text-align: left;">Dear <?php echo  $data['Member']['name'];?>,</p>
	
	<p style="text-align: left;">This is for your kind  information that due to unavoidable circumstances the  trainer <?php echo  $data['Trainee']['name'];?>  you have chosen for slot:<?php echo  $data['Booking']['slot'];?>.<?php echo date('l,F j, Y',strtotime($data['Booking']['time']));?> <?php echo date('h:i:s A',strtotime($data['Booking']['time']));?> will not be available to accompany you.
	</p>
	<p style="text-align: left;">We are very sorry for the inconvenience may cause to you for it.</p>
	<p style="text-align: left;">Thanks for your co-operation.</p>
	
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
