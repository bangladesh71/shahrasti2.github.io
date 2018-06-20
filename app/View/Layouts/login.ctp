<?php
/**
 *
 *
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

$cakeDescription = __d($_SERVER['HTTP_HOST'], "");
	$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'শাহরাস্তি উপজেলা, চাঁদপুর।' ?>
	</title>
	
	 <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
	<?php
		echo $this->Html->meta('');

		echo $this->Html->css(array('normalize','signup-style'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body id="login-bgImage">

<div class="form">
      
     
      
      <div class="tab-content">
        <?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
        
        
      </div><!-- tab-content -->
      
</div> 
			
	
	<?php echo $this->Html->script(array('jquery.min','signup-js'));?>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
