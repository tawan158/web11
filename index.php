<?php
require_once 'head.php';
 
/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');


/* 程式流程 */
switch ($op){
    case "contact_form" :
      $msg = contact_form();
      break;

    case "ok" :
        $msg = ok();
        break;
  
    case "reg" :
      $msg = reg();
      header("location:index.php");//注意前面不可以有輸出
      exit;
  
    default:
      $op = "op_list";
      break;  
  }
  /*---- 將變數送至樣版----*/
  $smarty->assign("WEB", $WEB);
  $smarty->assign("op", $op);
   
/*---- 程式結尾-----*/
$smarty->display('theme.tpl');

//----函數區
function contact_form(){

}

function ok(){

}