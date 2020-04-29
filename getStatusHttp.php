<?php
/*
 * Проверка ответа сервера HTTP
 *
 * @param string $host сайт без HTTP
 * @return string false в случае отсуствия
 */
function getStatusHttp($url,$info = false){
	$arr = @get_headers('http://'.$url, 1);
	if(!empty($arr[0])){
		$code = substr($arr[0], 9, 3);
		return $code;
	} else { return false; }
}

/*
 * Проверка ответа сервера HTTPS
 *
 * @param string $host сайт без HTTPS
 * @return string false в случае отсуствия
 */
function getStatusHttps($url,$info = false){
	$arr = @get_headers('https://'.$url, 1);
	if(!empty($arr[0])){
		$code = substr($arr[0], 9, 3);
		return $code;
	} else { return false; }
}
