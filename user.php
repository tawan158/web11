<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_form', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');
// echo $op;die();
 
/* 程式流程 */
switch ($op){
  case "op_form" :
    $msg = op_form();
    break;

  case "logout" :
    $msg = logout();
    header("location:index.php");//注意前面不可以有輸出
    exit; 

  case "login" :
    $msg = login();
    header("location:index.php");//注意前面不可以有輸出
    exit;
 
  default:
    $op = "op_list";
    op_list();
    break;  
}
 
/*---- 將變數送至樣版----*/
$smarty->assign("WEB", $WEB);
$smarty->assign("op", $op);
 
/*---- 程式結尾-----*/
$smarty->display('user.tpl');
 
/*---- 函數區-----*/
function logout(){
  $_SESSION['admin']="";
}

function op_form(){
  $_SESSION['admin']="";
  global $smarty;
 
}
function login(){
  global $smarty;
  $name="admin";
  $pass="111111";

  if($name == $_POST['name'] and $pass == $_POST['pass']){
    $_SESSION['admin'] = true;     
    header("location:index.php");//注意前面不可以有輸出
  }else{      
    header("location:user.php");//注意前面不可以有輸出
  }


  //print_r($_POST);
  var_dump($_POST);
  DIE();
}
 
function op_list(){
  global $smarty;
}



