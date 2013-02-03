<?php 
//Use dottk('YOUR_DOT_TK_USERNAME','YOUR_DOT_TK_PASSWORD'); to renew your domains!

error_reporting(E_ALL);
include('nblib.php');
function dottk($username,$password) {
	$a = new NBatch();
	$a->cookies = 'dottk.txt';
	$a->referer = 'http://my.dot.tk/cgi-bin/login01.taloha';
	$a->post('http://my.dot.tk/cgi-bin/login02.taloha','fldemail='.urlencode($username).'&fldpassword='.urlencode($password));
	$i = $a->get('http://my.dot.tk/cgi-bin/domainpanel.taloha');
	preg_match_all('/action=upgrade_renew.domainnr=(\d+)/uim',$i,$dlist);
	foreach($dlist[1] as $i){
		print("<hr>newing {$i}<br>");
		$a->referer = "http://my.dot.tk/cgi-bin/domainpanel-renew.taloha?domainnr={$i}";
		echo $a->post('http://my.dot.tk/cgi-bin/domainpanel-renew.taloha',"action=renew&domainnr={$i}&months=12");
	}
}

//Just tell me your dottk username and password
dottk('YOUR_DOT_TK_USERNAME','YOUR_DOT_TK_PASSWORD');
?>
