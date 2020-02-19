<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
if(!$_SESSION['admin'])redirect_header("index.php", '您沒有權限', 3000);

/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$uid = system_CleanVars($_REQUEST, 'uid', '', 'int');
// echo $op;die();
 
/* 程式流程 */
switch ($op){
  case "op_form" :
    $msg = op_form($uid);
    break;
 
  default:
    $op = "op_list";
    op_list();
    break;  
}
/*---- 將變數送至樣版----*/
$smarty->assign("WEB", $WEB);
$smarty->assign("op", $op);
 
/*---- 程式結尾-----*/
$smarty->display('admin.tpl');
 
/*---- 函數區-----*/

function op_form($uid=""){
  global $smarty,$db;

}


function op_list(){
  global $smarty,$db;
  
  $sql = "SELECT *
          FROM `users`
  ";//die($sql);

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){
    $row['uname'] = htmlspecialchars($row['uname']);//字串
    $row['uid'] = (int)$row['uid'];//整數
    $row['kind'] = (int)$row['kind'];//整數
    $row['name'] = htmlspecialchars($row['name']);//字串
    $row['tel'] = htmlspecialchars($row['tel']);//字串
    $row['email'] = htmlspecialchars($row['email']);//字串    
    $rows[] = $row;
  }
  $smarty->assign("rows",$rows);  

}



