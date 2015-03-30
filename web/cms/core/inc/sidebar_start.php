<?php
	$Perch       = Perch::fetch();
	$Settings    = PerchSettings::fetch();
	$Users       = new PerchUsers;
	$CurrentUser = $Users->get_current_user();
?>
<div class="sidebar">
    <ul class="metanav">
		<?php
        	if ($CurrentUser->has_priv('perch.settings')) {
	    ?>
	    <li>
	        <a href="<?php echo PerchUtil::html(PERCH_LOGINPATH); ?>/core/settings/" class="icon settings<?php if ($Perch->get_section()=='core/settings') echo ' selected'; ?>"><span><?php echo PerchLang::get('Settings'); ?></span></a>
	    </li>
	    <?php
            }

		if (!defined('PERCH_AUTH_PLUGIN') || !PERCH_AUTH_PLUGIN) { ?>
	    <li><a href="<?php echo PerchUtil::html(PERCH_LOGINPATH); ?>/core/account/" class="<?php if ($Perch->get_section()=='core/account') echo 'selected ';?>icon account"><span><?php echo PerchLang::get('My Account'); ?></span></a></li>
		<?php }// auth plugin 
			
			if (PERCH_RUNWAY) echo '<li><a href="#" class="icon search"><span>'.PerchLang::get('Search').'</span></a></li>';

			if ($Settings->get('helpURL')->settingValue()) {
				echo '<li><a href="'.PerchUtil::html($Settings->get('helpURL')->settingValue()).'" class="icon help"><span>'.PerchLang::get('Help').'</span></a></li>';
            }else{
				echo '<li><a href="'.PERCH_LOGINPATH.'/core/help/" class="icon help"><span>'.PerchLang::get('Help').'</span></a></li>';
            }



		?>
		<li><a href="<?php echo PerchUtil::html(PERCH_LOGINPATH); ?>/?logout=1" class="icon logout"><span><?php echo PerchLang::get('Log out'); ?></span></a></li>
    </ul>

    <?php
    	echo '<a id="logo" href="'.PERCH_LOGINPATH . '">';

			$logo = $Settings->get('logoPath')->settingValue();
			if ($logo) {
				echo '<img src="'.PerchUtil::html($logo).'"  class="logo" alt="Logo" />';
			}else{
				if (PERCH_RUNWAY) {
					echo '<img src="'.PERCH_LOGINPATH.'/core/runway/assets/img/logo.png" width="180" class="logo" alt="Perch Runway" />';
				}else{
					echo '<img src="'.PERCH_LOGINPATH.'/core/assets/img/logo.png" width="110" class="logo" alt="Perch" />';
				}
				
			}

        echo '</a>';

        if (PERCH_RUNWAY) {
        	$results = false;
        	$PerchAdminSearch = new PerchAdminSearch;
        	$class = '';
		    if (PerchUtil::get('q')) {	
		    	$results = $PerchAdminSearch->search(PerchUtil::get('q'), array());
		    	$class = ' focus';
		    }

    		echo '<div class="searchbox'.$class.'">
    				<form method="get">
    					<div class="icon search">
    						<input type="text" name="q" class="text" placeholder="'.PerchLang::get('Search').'" value="'.PerchUtil::html(PerchUtil::get('q', ''), true).'" />';
    						foreach ($_GET as $fkey=>$fvalue) {
    							if ($fkey!='q') {
    						    	echo '<input type="hidden" name="'.PerchUtil::html($fkey, true).'" value="'.PerchUtil::html($fvalue, true).'" />';
    							}
    						}
    		echo '		</div>
    				</form>';
	    			echo $results;
    		echo '</div>';
    	} // Search
    ?>
    <div class="helptext">
        <h2 class="icon help">
        	<?php
        		if ($Settings->get('helpURL')->settingValue()) {
					echo '<a href="'.PerchUtil::html($Settings->get('helpURL')->settingValue()).'">'.PerchLang::get('Help &amp; Support').'</a>';
	            }else{
					echo '<a href="'.PERCH_LOGINPATH.'/core/help/">'.PerchLang::get('Help &amp; Support').'</a>';
	            }
        	?>
        </h2>