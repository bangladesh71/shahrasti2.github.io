<?php echo sprintf(__('Hello %s \n\n'), $user['Staff']['first_name'] . ' ' . $user['Staff']['last_name']); ?>,

<?php
    echo sprintf(__('Your username: %s'), $user['User']['username']);
    echo sprintf(__('Your password: %s'), $user['User']['password']);
?>

<?php echo __('You should change password periodic.'); ?>

<?php echo sprintf(__('IP Address: %s'), $_SERVER['REMOTE_ADDR']); ?>