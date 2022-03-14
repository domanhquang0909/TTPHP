<?php

abstract class Supervisor{

    protected $slogan;

  abstract public function saySloganOutLoud();

  public function saySlogan($slogan){
      $this ->slogan = $slogan;
  }
}


interface Boss{
    public function checkValidSlogan();
}


class EasyBoss extends Supervisor implements Boss{
    public function saySloganOutLoud()
    {
        $after ="after";
        $before = "before";

        return strpos($this->slogan, $before) !==false || strpos($this->slogan, $after) !==false;   
     }

     public function checkValidSlogan()
     {
         if($this->saySloganOutLoud() !==false){
             return true;
         }else{
             return false;
         }
     }

}
class UglyBoss extends Supervisor implements Boss{
    public function saySloganOutLoud()
    {
        $after ="after";
        $before = "before";

        return strpos($this->slogan, $before) ===false && strpos($this->slogan, $after) === false;   
     }

     public function checkValidSlogan()
     {
         if($this->saySloganOutLoud() !==false){
             return true;
         }else{
             return false;
         }
     }
}

$easyBoss = new EasyBoss();
$uglyBoss = new UglyBoss();

$easyBoss->saySlogan('Do NOT push anything to master branch before reviewed by supervisor(s)');

$uglyBoss->saySlogan('Do NOT push anything to master branch before reviewed by supervisor(s). Only they can do it after check it all!');

$easyBoss->saySloganOutLoud(); 
echo "<br>";
$uglyBoss->saySloganOutLoud(); 

echo "<br>";

var_dump($easyBoss->checkValidSlogan()); // true
echo "<br>";
var_dump($uglyBoss->checkValidSlogan()); // true


?>