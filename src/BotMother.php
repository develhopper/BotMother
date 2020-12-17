<?php
namespace develhopper\BotMother;
use develhopper\BotMother\Message;
use develhopper\Curly;
class BotMother{
  private $token;
  private $route="https://api.telegram.org/bot<token>/<method>";
  private $rules=array();
  
  public function __construct($token){
    $this->token=$token;
    $this->rules["fallback"]=function(){
      echo "this is fallback";
    };
  }

  public function setWebHook($url){
    $url=$this->getRoute(__FUNCTION__);
    $curly=new Curly($url);
    return $curly->send("GET",["url"=>$url]);
  }

  public function getMessage($input=null){
    if($input==null)
      $input=file_get_contents("php://input");
    $message=new Message($input);
    if(isset($this->rules[$message->message_text])){
      $call=$this->rules[$message->message_text];
      $call($message);
    }else{
      $fallback=$this->rules["fallback"];
      $fallback();
    }
  }

  public function sendMessage($chat_id,$text){
    $url=$this->getRoute(__FUNCTION__);
    $curly=new Curly($url);
    return $curly->send("POST",["chat_id"=>$chat_id,"text"=>$text]);
  }

  public function onMessage($message,$function){
    $this->rules[$message]=$function;
  }

  private function getRoute($func_name){
    $route=str_replace("<token>",$this->token,$this->route);
    return str_replace("<method>",$func_name,$route);
  }
}
