<?php
/*
 * Проверка существоватия ip
 *
 * @param string $host сайт без HTTP
 * @return string false в случае отсуствия
 */
function getIpHost ($host) {
	$url = parse_url('http://' . $host);//https
	if ($info = gethostbynamel($url['host'])) {
		foreach ($info as $ip) {
			return $ip;
		}
	} else return false;
};
