<?php
namespace app\control;

use phplib\core\control;

class indexControl extends control {

	
	public function indexAct() {
		echo 'welcome use phplib_mvc!~';
        echo '<pre>';
	    print_r(get_included_files());

        print_r(\phplib\phplib::getEnv());
	}
}
