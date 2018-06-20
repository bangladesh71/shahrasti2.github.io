 <style>
.x-navigation li > ul li > a {
   
    font-size: 15px !important;
   
}
.x-navigation li > a {

    font-size: 17px !important;
 
}
</style>
<ul id="nav" class="x-navigation x-navigation-open">

<?php //if($current_user['role']==1){?>
	<?php if($current_user['role']==1){  ?>
	<li class="active">
        <?php 
        echo $this->Html->link ( '<span class="fa fa-dashboard"></span><span class="xn-text">Dashboard</span>', array ('controller'=>'users','action' => 'dashbrd'),array('escape'=>false) );
        ?>
    </li>
	<?php }  ?>

	<li class="">
		<?php
		echo $this->Html->link ( '<span class="fa fa-picture-o"></span><span class="xn-text">Complain List</span>', array ('controller'=>'entryforms','action' => 'index'),array('escape'=>false) );
		?>
	</li>

	<li class="">
		<?php
		echo $this->Html->link ( '<span class="fa fa-fighter-jet"></span><span class="xn-text">Quick Service</span>', array ('controller'=>'entryforms','action' => 'quick_service'),array('escape'=>false) );
		?>
	</li>

	<li class="">
		<?php
		echo $this->Html->link ( '<span class="fa fa-comment-o"></span><span class="xn-text">Feedback</span>', array ('controller'=>'entryforms','action' => 'feedback'),array('escape'=>false) );
		?>
	</li>

	<li>
		<?php
		echo $this->Html->link ( '<span class="fa fa-users"></span><span class="xn-text">Profiles</span>', array ('controller'=>'subcategories','action' => 'index'),array('escape'=>false) );
		?>
	</li>

	<li>
		<?php
		echo $this->Html->link ( '<span class="fa fa-search" aria-hidden="true"></span><span class="xn-text">Profile Search</span>', array ('controller'=>'subcategories','action' => 'search'),array('escape'=>false) );
		?>
	</li>

	<li class="xn-openable"><a href="#"><i class="fa fa-gear"></i> <span class="xn-text">Settings</span></a>
    	<ul>



			<li>
				<?php
				echo $this->Html->link ( 'Problems', array ('controller'=>'problems','action' => 'index'),array('escape'=>false) );
				?>
			</li>

			<li>
				<?php
				echo $this->Html->link ( 'Main Category', array ('controller'=>'maincategories','action' => 'index'),array('escape'=>false) );
				?>
			</li>

			<li>
				<?php
				echo $this->Html->link ( 'Child Category', array ('controller'=>'childcategories','action' => 'index'),array('escape'=>false) );
				?>
			</li>

			<li>
				<?php
					echo $this->Html->link ( 'Designations', array ('controller'=>'designations','action' => 'index'),array('escape'=>false) );
				?>
			</li>

			<?php if($current_user['role']==1){  ?>
				<li class="">
					<?php
					echo $this->Html->link ( '<span class="xn-text">Users</span>', array ('controller'=>'users','action' => 'index'),array('escape'=>false) );
					?>
				</li>
			<?php }  ?>

		</ul>
	</li>

	<?php if($current_user['role']!=3 ){  ?>
	<li class="xn-openable"><a href="#"><i class="fa fa-thumb-tack"></i> <span class="xn-text">Report</span></a>
    	<ul>

	        <li>
		        <?php 
		        	echo $this->Html->link ( 'At a glance', array ('controller'=>'users','action' => 'dashbrd'),array('escape'=>false) );
		        ?>
	        </li>

			<li>
				<?php
				echo $this->Html->link ( 'Archive', array ('controller'=>'entryforms','action' => 'lifetimedone'),array('escape'=>false) );
				?>
			</li>
	        
		</ul>
	</li>
	<?php }?>
	
