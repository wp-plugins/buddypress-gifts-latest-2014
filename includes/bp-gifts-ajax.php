<?php


function bpgifts_sendgift_updatedb() {

	global $bp;
	
	$Mypoint = (int)cp_getPoints(cp_currentUser());	
	if($Mypoint <  $_POST['point']){
		echo __('You dont required points to send that Gift. You can choose another gift!', 'bp-gifts');
		exit;
	}

	$action = __(bp_core_get_userlink($bp->loggedin_user->id).' '. __('send ', 'bp-gifts') . $_POST['gift_name'].' '. __('to ','bp-gifts') . bp_core_get_userlink($bp->displayed_user->id));
	

	$content = '<img class="gift-image" src="'. $_POST['gift_path'] .'" /><a href="'.$bp->displayed_user->domain.'">@'.$bp->displayed_user->userdata->user_login.'</a> '.$_POST['gift_message'];

	bp_gifts_record_activity( array( 'type' => 'new_gifts', 'action' => $action, 'user_id' => $bp->loggedin_user->id, 'item_id' => $bp->displayed_user->id, 'content' => $content) );
	
	bp_gifts_record_points();

	echo __('Gifts was sent !'.'<br />', 'bp-gifts');
	echo __($_POST['point'].' Gift points deducted !', 'bp-gifts');

	bp_gifts_send_giftsnotify( $bp->displayed_user->id, $bp->loggedin_user->id );

	
	
	return false;

	

}



add_action( 'wp_ajax_bpgifts_sendgift_updatedb', 'bpgifts_sendgift_updatedb' );



?>