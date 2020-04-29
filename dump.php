<?php
/*
 * Отладочная функция
 *
 *  @param mixed $var
  * @return $string html
 */
function dump($var) {
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}
