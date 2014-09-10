<?php

	/* Find if a badge exists */
	function userpro_badges_admin_edit(){
		if (isset($_GET['btype']) && isset($_GET['bid'])) {
			$badges = get_option('_userpro_badges');
			if (isset($badges[ $_GET['btype'] ][ $_GET['bid'] ])) {
				return true;
			}
		}
		return false;
	}
	
	/* get badge info in edit mode */
	function userpro_badges_admin_edit_info($var=null){
		$badges = get_option('_userpro_badges');
		if (isset($badges[ $_GET['btype'] ][ $_GET['bid'] ])) {
			if ($var) {
			return $badges[ $_GET['btype'] ][ $_GET['bid'] ][$var];
			} else {
			return $badges[ $_GET['btype'] ][ $_GET['bid'] ];
			}
		}
	}

	/* Show manage badge title */
	function userpro_badges_admin_title(){
		$title = __('Add a New Badge','userpro');
		if ( userpro_badges_admin_edit() )
			$title = __('Editing a Badge','userpro');
		return $title;
	}

	/* Grab users list */
	function userpro_badges_admin_users($got_badges=false){
		if ($got_badges){
			$users = get_users(array(
				'meta_key'     => '_userpro_badges',
				'meta_value'   => '',
				'meta_compare' => '!=',
			));
		} else {
			$users = get_users();
		}
		return $users;
	}
	
	/* Grab post type list */
	function userpro_badges_admin_post_types(){
		$res = null;
		$types = get_post_types( array('public' => true) , 'objects');
		foreach($types as $type){
			$res .= '<option value="'.$type->name.'"';
			if ( userpro_badges_admin_edit() ) $res .= selected($type->name, $_GET['btype'], 0);
			$res .= '>'.$type->labels->menu_name.'</option>';
		}
		return $res;
	}
	
	/* Delete a badge */
	add_action('wp_ajax_nopriv_userpro_delete_user_badge', 'userpro_delete_user_badge');
	add_action('wp_ajax_userpro_delete_user_badge', 'userpro_delete_user_badge');
	function userpro_delete_user_badge(){
		global $userpro_badges;
		if (!current_user_can('manage_options'))
			die();
			
		extract($_POST);
		$output = '';
		
		$userpro_badges->remove_user_badge( $user_id, $badge_url );
		
		$output=json_encode($output);
		if(is_array($output)){ print_r($output); }else{ echo $output; } die;
	}
	
	/* Remove achievement badge */
	add_action('wp_ajax_nopriv_userpro_delete_achievement_badge', 'userpro_delete_achievement_badge');
	add_action('wp_ajax_userpro_delete_achievement_badge', 'userpro_delete_achievement_badge');
	function userpro_delete_achievement_badge(){
		global $userpro_badges;
		if (!current_user_can('manage_options'))
			die();
			
		extract($_POST);
		$output = '';
		
		$userpro_badges->remove_achievement_badge( $btype, $bid );
		
		$output=json_encode($output);
		if(is_array($output)){ print_r($output); }else{ echo $output; } die;
	}