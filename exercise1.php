<?php

function checkValidString($str){
    $after = 'after';
    $before = 'before';
    if(empty($str)){
        return true;
    }else{
        if(strlen($str) >= 50 && strpos($str,$after) === false || strpos($str, $before) === true){
            return true;
        }else{
            return false;
        }
    }
  
}

function printCheck(){
    $txt1 = 'English is a West Germanic language that was first spoken in early medieval England and is now the third most widespread native language in the world, after Standard Chinese and Spanish, as well as the most widely spoken Germanic language. Named after the Angles,one of the Germanic tribes that migrated to England, it ultimately derives its name from the Anglia(Angeln) peninsula in the Baltic Sea.';
    $txt2 = 'Modern English grammar is the result of a gradual change from a typical Indo-European dependent marking pattern with a rich inflectional morphology and relatively free word order'; 
     $check1 =checkValidString($txt1);
     $check2 =checkValidString($txt2);
  if($check1 == true){
      echo "<br/> chuỗi hợp lệ</br>";
  }else{
      echo "<br/> Chuỗi không hợp lệ</br>";
  }
  if($check2 == true){
      echo "<br/> Chuỗi hợp lệ</br>";
  }else{
      echo "<br/>Chuỗi không hợp lệ</br>";
  }
}
printCheck();

?>