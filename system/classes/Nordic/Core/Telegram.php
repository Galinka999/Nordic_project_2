<?php

namespace Nordic\Core;

class Telegram
{
    
    public function sendMessage($chat_id, $text) {
        file_get_contents("https://api.telegram.org/bot1175328333:AAHnbvDUxKUgNpm1BSsXr-8MHVZVIfEBV94/sendMessage?chat_id=$chat_id&text=$text&parse_mode=html");
    }

    public function sendPhoto($chat_id, $photo) {
        file_get_contents("https://api.telegram.org/bot1175328333:AAHnbvDUxKUgNpm1BSsXr-8MHVZVIfEBV94/sendPhoto?chat_id=$chat_id&photo=$photo");
    }

    public function sendLocation($chat_id, $latitude, $longitude) {
        file_get_contents("https://api.telegram.org/bot1175328333:AAHnbvDUxKUgNpm1BSsXr-8MHVZVIfEBV94/sendLocation?chat_id=$chat_id&latitude=$latitude&longitude=$longitude");
    }

}