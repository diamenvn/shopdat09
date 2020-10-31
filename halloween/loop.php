<?php


for ($i=0; $i < 10000000 ; $i++) { 
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://conbocay.tk/cook.php?c=ngu%20l%C3%B2n%20m%E1%BA%B9%20m%C3%A0y');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

	curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

	$headers = array();
	$headers[] = 'Authority: conbocay.tk';
	$headers[] = 'Pragma: no-cache';
	$headers[] = 'Cache-Control: no-cache';
	$headers[] = 'Upgrade-Insecure-Requests: 1';
	$headers[] = 'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1';
	$headers[] = 'Dnt: 1';
	$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8';
	$headers[] = 'Accept-Encoding: gzip, deflate, br';
	$headers[] = 'Accept-Language: en-US,en;q=0.9,und;q=0.8';
	$headers[] = 'Cookie: __cfduid=d292a5723ef676907d8029a58909cf9121546878734';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
	    echo 'Error:' . curl_error($ch);
	}
	curl_close ($ch);
	echo $result;
}

