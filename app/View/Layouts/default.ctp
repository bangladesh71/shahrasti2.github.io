<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>

    <?php echo $this->Html->charset(); ?>

    <title>
        <?php echo 'শাহরাস্তি উপজেলা, চাঁদপুর।' ?>
    </title>
    <?php
		echo $this->Html->meta('');
		echo $this->Html->css(
				array(

					'theme-default',
					'custom',
                    'rating-star/css/star-rating.min',
                    'rating/star'

				)
			);

		//echo $this->Html->css('cake.generic');


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

</head>
<body>

	<!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if you want to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <?php echo $this->Html->link ('Yes', array ('controller' => 'users', 'action' => 'logout' ),array('escape'=>false,'class'=>'btn btn-success btn-lg') );?>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
    <div class="page-container">
        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar">
            <!-- START X-NAVIGATION -->
            <div class="profile">
                <h4 style="color: #f2fff2; text-align: center">Call Center Automation</h4>
                <div class="profile-image">
                    <?php
                    //pr($current_user);
                    $files='img/upload/user/'.$current_user['id'].'.png';
                    if(is_file($files)){
                        echo $this->Html->image('upload/user/' .$current_user['id'] . '.png',array('style'=>'width:80px; height:85px; margin-left: -25px;'));
                    }else{
                        echo $this->Html->image('no_img.jpg',array('title'=>'No image Available','style'=>'width:80px; height:85px; margin-left: -25px;'));
                    }
                    ?>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"><?php  echo $current_user['name'];?></div>
                    <div class="profile-data-title">
                        Shahrasti, Chandpur.
                    </div>
                </div>
            </div>
            <?php echo $this->element('menu');?>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->


        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <!-- TOGGLE NAVIGATION -->

                <!-- END TOGGLE NAVIGATION -->

                <!-- POWER OFF -->
                <li class="xn-icon-button pull-right last">
                    <a href="#"><span class="fa fa-power-off"></span></a>
                    <ul class="xn-drop-left animated zoomIn">
                        <li><a href='#' class='mb-control' data-box='#mb-signout'><span class='fa fa-sign-out'></span>Sign Out</a> </li>
                    </ul>
                </li>
                <!-- END POWER OFF -->

                <!-- MESSAGES -->

                <!-- END MESSAGES -->

            </ul>
            <!-- END X-NAVIGATION VERTICAL -->

            <!-- START BREADCRUMB
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Forms Stuff</a></li>
                <li><a href="#">Form Layout</a></li>
                <li class="active">Two Column</li>
            </ul>
            END BREADCRUMB -->

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">

                <div class="row">
                    <div class="col-md-12">
	                   	<?php echo $this->Session->flash(); ?>

						<?php echo $this->fetch('content'); ?>

                    </div>
                </div>

            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTENT -->
    </div>

 <footer id="ft">
	<div class="container-fluid bg_4 pd20">
		<div class="pull-right" id="pwrd">Powered by: <span style="color: #00aa00">Inflack Limited</span>  </div>
	</div>
</footer>
<?php echo $this->Html->script(
		array(
			'jquery-1.9.1',
			'plugins/jquery/jquery-ui.min',
			'plugins/bootstrap/bootstrap.min',
			'plugins/icheck/icheck.min',
			'plugins/mcustomscrollbar/jquery.mCustomScrollbar.min',
			'plugins/datatables/jquery.dataTables.min',
			'plugins/bootstrap/bootstrap-file-input',
			'plugins/bootstrap/bootstrap-select',
			'plugins/tagsinput/jquery.tagsinput.min',
			'plugins',
			'actions',
            'pie',
            'rating-star/star-rating.min',
		));?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
