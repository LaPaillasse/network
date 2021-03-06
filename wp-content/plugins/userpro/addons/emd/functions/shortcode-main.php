<?php

	/* Filter shortcodes args */
	add_filter('userpro_shortcode_args', 'userpro_ed_shortcodes_arg', 99);
	function userpro_ed_shortcodes_arg($args){
		$args['emd_filters'] = 1;
		$args['emd_thumb'] = 200;
		$args['emd_social'] = 1;
		$args['emd_bio'] = 1;
		$args['emd_fields'] = 'first_name,last_name,gender,country';
		$args['emd_layout'] = userpro_ed_get_option('emd_layout');
		$args['emd_per_page'] = userpro_ed_get_option('emd_per_page');
		$args['emd_col_width'] = userpro_ed_get_option('emd_col_width');
		$args['emd_col_margin'] = userpro_ed_get_option('emd_col_margin');
		$args['emd_accountstatus'] = 'Search by account status';
		$args['emd_photopreference'] = 'Photo Preference';
		$args['emd_country'] = 'Search by Country,dropdown';
		$args['emd_gender'] = 'Gender,radio';
		$args['emd_paginate'] = 1;
		$args['emd_paginate_top'] = 1;
		return $args;
	}

	/* Add extension shortcodes */
	add_action('userpro_custom_template_hook', 'userpro_ed_shortcodes', 99 );
	function userpro_ed_shortcodes($args) {
		global $userpro, $userpro_emd;
		extract($args);
		
		if ($args['template'] == 'emd') {
			
			if (locate_template('userpro/' . $template . '.php') != '') {
				include get_template_directory() . '/userpro/'. $template . '.php';
			} else {
				include userpro_ed_path . "templates/$template.php";
			}
			
		}
	
	}