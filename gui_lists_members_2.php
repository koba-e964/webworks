<html>
<body>
<?php
$start=microtime(true);
$consumer_key = "30MDc4kbpD1T1IVrw0qw";
$consumer_secret = "LyfPQewKoHH6XK2tKU19K1fhHGWK09jOtICyls8B9Q";
$access_token = "625521669-EDdZfjZ4MPjML3jFskUe5GPd9oZ1SyqYTaIB35P6";
$access_token_secret = "qqp5SRbJQLDP8AbkpQ8FJ4YGXB9lVwj9Ry2SEOYJs0";

$path = 'C:\Users/Hiroki_Kobayashi/Documents/develop/php/codebird-php-2.4.1/src/';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require("codebird.php");

\Codebird\Codebird::setConsumerKey($consumer_key, $consumer_secret);
$cb = \Codebird\Codebird::getInstance();
$cb->setToken($access_token, $access_token_secret);

$listname=$_POST['list'];
print('listname='.$listname."<br/>\n");
$cursor=-1;
$maxiter=10;
do{
	$result=$cb->lists_members(array('slug'=>$listname,
	'owner_screen_name'=>'kobae964',
	'skip_status'=>true,
	'include_entities'=>false,
	'cursor'=>$cursor));
	foreach($result->users as $user){
			print('<p2>'.$user->id_str.' '.$user->screen_name."<p2/><br/>\r\n");
	}
	$cursor=$result->next_cursor_str;
	$maxiter-=1;
}while($cursor!==0 && $maxiter>0);
?>
</body>
</html>

