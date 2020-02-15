<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
if(!$_SESSION['admin'])redirect_header("index.php", '您沒有權限', 3000);

/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');
// echo $op;die();
 
/* 程式流程 */
switch ($op){

 
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



function op_list(){
  global $smarty,$db;
  
  $sql = "SELECT *
          FROM `users`
  ";

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){
    //Array ( [uid] => 2 [uname] => 1111 [pass] => $2y$10$q0HZPPfgltzI4sIujmZXheLwxzrf3DB2jjRbqo6PnjLko1f2ltFg. [name] => 1 [tel] => 1 [email] => adsfasdf@1111 [kind] => 0 [token] => )
    
    $rows[] = $row;
  }
  $smarty->assign("rows",$rows);  

}



