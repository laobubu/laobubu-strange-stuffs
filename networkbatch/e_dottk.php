<?php 

$username = 'YOUR_DOT_TK_USERNAME';
$password = 'YOUR_DOT_TK_PASSWORD';

error_reporting(E_ALL);
include('nblib.php');
$a = new NBatch();
$a->cookies = '/sdcard/dottk.txt';
$a->referer = 'http://my.dot.tk/cgi-bin/login01.taloha';
$a->post('http://my.dot.tk/cgi-bin/login02.taloha','fldemail='.urlencode($username).'&fldpassword='.urlencode($password));
$i = $a->get('http://my.dot.tk/cgi-bin/domainpanel.taloha');
preg_match_all('/action=upgrade_renew.domainnr=(\d+)/uim',$i,$dlist);
foreach($dlist[1] as $i){
 print("<hr>newing {$i}<br>");
 $a->referer = "http://my.dot.tk/cgi-bin/domainpanel-renew.taloha?domainnr={$i}";
 echo $a->post('http://my.dot.tk/cgi-bin/domainpanel-renew.taloha',"action=renew&domainnr={$i}&months=12");
}
?>
