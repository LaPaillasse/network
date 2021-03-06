<?php
global $userpro;
$requests = get_option('userpro_verify_requests');
if (is_array($requests) && $requests != '' && !empty($requests) ) {
$count = count($requests);
} else {
$count = 0;
}
?>

<h3><?php _e('Users Requesting Verified Status','userpro'); ?> <span><?php echo $count; ?></span></h3>
<div class="upadmin-panel">

<?php
if (is_array($requests) && $requests != '' && !empty($requests) ) :
$requests = array_reverse($requests);
?>

<?php foreach( $requests as $user_id) : $user = get_userdata($user_id); if ($user) : ?>
<div class="upadmin-pending-verify">
	<div class="upadmin-pending-img"><a href="<?php echo $userpro->permalink($user_id); ?>" target="_blank"><?php echo get_avatar( $user_id, 64 ); ?></a></div>
	<div><a href="<?php echo $userpro->permalink($user_id); ?>" target="_blank"><?php echo userpro_profile_data('display_name', $user_id); ?></a></div>
	<div><span><?php echo $user->user_email; ?></span></div>
	<div>
		<a href="#" class="button button-primary upadmin-verify" data-user="<?php echo $user_id; ?>"><?php _e('Verify','userpro'); ?></a>
		<a href="#" class="button upadmin-unverify" data-user="<?php echo $user_id; ?>"><?php _e('Reject','userpro'); ?></a>
	</div>
</div>
<?php else : $this->delete_pending_request($user_id); endif; endforeach; ?>

<?php endif; ?>

</div>

<?php	$users = get_users(array(
		'meta_key'     => '_account_status',
		'meta_value'   => 'pending_admin',
		'meta_compare' => '=',
	));
	?>
	
<h3><?php _e('Users Awaiting Manual Approval','userpro'); ?> <span><?php echo count($users); ?></span></h3>
<div class="upadmin-panel">

<?php
	if (!empty($users)){
		foreach($users as $user) {
			$user_id = $user->ID;
		
		?>
			
			<div class="upadmin-pending-verify">
				<div class="upadmin-pending-img"><a href="<?php echo $userpro->permalink($user_id); ?>" target="_blank"><?php echo get_avatar( $user_id, 64 ); ?></a></div>
				<div><a href="<?php echo $userpro->permalink($user_id); ?>" target="_blank"><?php echo userpro_profile_data('display_name', $user_id); ?></a></div>
				<div><span><?php echo $user->user_email; ?></span></div>
				<div>
					<a href="#" class="button button-primary upadmin-user-approve" data-user="<?php echo $user_id; ?>"><?php _e('Approve','userpro'); ?></a>
					<a href="#" class="button upadmin-user-deny" data-user="<?php echo $user_id; ?>"><?php _e('Delete user','userpro'); ?></a>
				</div>
			</div>

		<?php
		}
	}
?>
</div>

<?php	$users = get_users(array(
		'meta_key'     => '_account_status',
		'meta_value'   => 'pending',
		'meta_compare' => '=',
	));
	?>
	
<h3><?php _e('Users Awaiting E-mail Validation','userpro'); ?> <span><?php echo count($users); ?></span></h3>
<div class="upadmin-panel">

<?php
	if (!empty($users)){
		foreach($users as $user) {
			$user_id = $user->ID;
		
		?>
			
			<div class="upadmin-pending-verify">
				<div class="upadmin-pending-img"><a href="<?php echo $userpro->permalink($user_id); ?>" target="_blank"><?php echo get_avatar( $user_id, 64 ); ?></a></div>
				<div><a href="<?php echo $userpro->permalink($user_id); ?>" target="_blank"><?php echo userpro_profile_data('display_name', $user_id); ?></a></div>
				<div><span><?php echo $user->user_email; ?></span></div>
				<div>
					<a href="#" class="button button-primary upadmin-user-approve" data-user="<?php echo $user_id; ?>"><?php _e('Activate','userpro'); ?></a>
					<a href="#" class="button upadmin-user-deny" data-user="<?php echo $user_id; ?>"><?php _e('Delete user','userpro'); ?></a>
				</div>
			</div>

		<?php
		}
	}
?>

</div>