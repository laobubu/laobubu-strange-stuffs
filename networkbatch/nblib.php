<?php
class NBatch{
	var $ua = 'Mozilla/5.0 (Windows NT 5.1; rv:19.0) Gecko/20100101 Firefox/19.0';
	var $referer = '';
	var $debug=1;
	var $header = array(
		"Accept" => "text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5",
		"Cache-Control" => "max-age=0",
		"Connection" => "keep-alive",
		"Keep-Alive" => "300",
		"Pragma" => "",
		);
	var $timeout = 15;
	var $cookies = 'cookiesjar.txt';
	
	function get($url){
		$ch = $this->ch($url);
		$f = curl_exec($ch);
		curl_close($ch);
		return $f;
	}
	
	function post($url,$data,$datatype = 'application/x-www-form-urlencoded'){
		$ch = $this->ch($url);
		$h = $this->header;
		$h['Content-Type'] = $datatype;
		if ($datatype == 'application/x-www-form-urlencoded') {
			if (is_array($data)) $data = http_build_query($data);
			$h['Content-Length'] = strlen($data);
		}
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$f = curl_exec($ch);
		curl_close($ch);
		return $f;
	}
	
	function ch($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
		if (strlen($this->referer)>0) {
			curl_setopt($ch, CURLOPT_REFERER, $this->referer);
		}
		if (strlen($this->cookies)>0) {
			curl_setopt($ch, CURLOPT_COOKIEJAR,  $this->cookies);
			curl_setopt($ch, CURLOPT_COOKIEFILE, $this->cookies);
		}
		@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, $this->ua);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
		$this->referer = $url;
		return $ch;
	}
}