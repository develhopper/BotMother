<?php
namespace develhopper;
use develhopper\Curly;
class BotMother{
  private $token;
  private $route="https://api.telegram.org/bot<token>/<method>";
  public function __construct($token){
    $this->token=$token;
  }

  public function setWebHook($url){
    $url=$this->getRoute(__FUNCTION__);
    $curly=new Curly($url);
    return $curly->send("GET",["url"=>"https://test.com"]);
  }

  private function getRoute($func_name){
    $route=str_replace("<token>",$this->token,$this->route);
    return str_replace("<method>",$func_name,$route);
  }
}
