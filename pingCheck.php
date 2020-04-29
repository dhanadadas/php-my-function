<?php
/*
 * Проверка ответа сервера (с time out 5 сек)
 *
 * @param string $url
 * @return bool true or false в случае отсуствия пинга
 */
function pingCheck($url) {
	$agent = "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0";

	// Инициализация CURL
	$ch = curl_init();

	// Установка URL
	curl_setopt($ch, CURLOPT_URL, $url);

	// Указываю USERAGENT браузера
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);

	// Header
	curl_setopt($ch, CURLOPT_NOBODY, true);

	// Редирект
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

	// Возврат строки
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	// Отключение из вывода отладочной информации
	curl_setopt($ch, CURLOPT_VERBOSE, false);

	// Устанавливаю максимальное количество секунд работы
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);

	// Выполнение
	curl_exec($ch);

	// Получаю код HTTP ответа
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	curl_close($ch);


	// Если ответ от сервера > 200 - тогда сайт доступен
	if ($httpcode >= 200 && $httpcode < 300)
		return true;
	else
		return false;
}
