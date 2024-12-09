<?php

namespace efremovP\telegram;


/**
 * Отправка сообщений телеграм боту
 *
 * @author Ефремов Петр
 * @since 2.0
 */
class TelegramBot
{
    private $token_bot;
    private $parse_mode = '';

    public function __construct($token_bot = '', $is_html = false)
    {
        $this->token_bot = $token_bot;

        if ($is_html) {
            $this->parse_mode = '&parse_mode="HTML"';
        }
    }

    /**
     * отправляем запрос по curl
     * @param string $url
     * @return string
     */
    public function send($text = '', $chat_id = '')
    {
        $command = 'https://api.telegram.org/bot'. $this->token_bot .'/sendMessage?disable_web_page_preview=true&chat_id='. $chat_id .'&text='. urlencode($text) . $this->parse_mode;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $command);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = curl_exec($ch);

        curl_close($ch);
    }
}