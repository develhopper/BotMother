<?php
include __DIR__."/../vendor/autoload.php";

use develhopper\BotMother;

$botmother=new BotMother("tokennnnn");

echo $botmother->setWebHook("http://example.com");