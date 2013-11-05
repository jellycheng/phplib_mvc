<?php
namespace app\control;

use phplib\core\control;

class indexControl extends control {

	
	public function indexAct() {
		echo 'welcome use phplib_mvc!~';

        echo '<pre>';
        print_r(get_included_files());

        print_r(\phplib\phplib::getEnv());
		echo <<<EOT
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fb5b289b3bab0100d7eb6f6f3f6cb213a' type='text/javascript'%3E%3C/script%3E"));
</script>
EOT;
	}
}
