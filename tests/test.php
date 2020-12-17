<?php
include __DIR__."/../vendor/autoload.php";

use develhopper\BotMother\BotMother;

$botmother=new BotMother("tokennnnn");

// $botmother->setWebHook("http://example.com");

$botmother->onMessage("/start",function($message) use($botmother) {
    var_dump($botmother->sendMessage($message->chat_id,"hello"));
});

$botmother->getMessage(file_get_contents(__DIR__."/msg.json"));