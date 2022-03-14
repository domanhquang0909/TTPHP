<?php
class HandleString{

public $check1;
public $check2;

function checkValidString($str){
    $after = 'after';
    $before = 'before';
    if(empty($str)){
        return true;
    }else{
        if(strlen($str) >= 50 && strpos($str,$after) === false || strpos($str, $before) !== false){
            return true;
        }else{
            return false;
        }
    }
  
}

function readfile($rea){
    $file = file_get_contents($rea);
    
  $checkString =$this->checkValidString($file);

  if($checkString ==true){
      echo '<br/><p style="color:orange"> Chuỗi hợp lệ </p></br>';
      if($rea == 'file1.txt' && $rea=='file2.txt'){
              $check1 =true;
              $check2=true;
      }else{
        $check1 =false;
        $check2=false;
        
      }
      
  }else{
    echo '<br/><p style="color:red"> Chuỗi không hợp lệ </p></br>';
   }
  }
}
$object1 = new HandleString();
$object1->readfile('file1.txt');
$object2 = new HandleString();
$object2->readfile('file2.txt');


?>