<?php

namespace develhopper\BotMother;

class Message{
    private $message_id;
    private $message_text;
    private $message_type;
    private $chat_id;
    private $sender_username;
    private $sender_firstname;
    private $sender_lastname;
    private $botmother;
    
    public function __construct($input){
        $input=json_decode($input,true);
        $this->message_id=$input["message"]["message_id"];
        $this->message_text=$input["message"]["text"];
        $this->message_type=$input["message"]["chat"]["type"];
        $this->chat_id=$input["message"]["chat"]["id"];
        $this->sender_username=$input["message"]["chat"]["username"];
        $this->sender_firstname=$input["message"]["chat"]["first_name"];
    }

    public function __set($key,$value){
        $this->$key=$value;
    } 

    public function __get($key){
        return $this->$key;
    }
}