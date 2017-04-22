<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE><?php echo $title; ?> - <?php echo $Name; ?></TITLE>
</HEAD>
<BODY bgcolor="#ffffff">
<pre>
<?php

echo '当前模板文件' . __FILE__ . PHP_EOL;

echo $title . PHP_EOL;

var_export($FirstName);
echo PHP_EOL;
var_export($LastName);


?>

</pre>
</BODY>
</HTML>