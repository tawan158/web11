<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
if($_SESSION['user']['kind'] !== 1)redirect_header("index.php", '您沒有權限', 3000);

/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');
// echo $op;die();
 
/* 程式流程 */
switch ($op){
  case "op_delete" :
    $msg = op_delete($sn);
    redirect_header("user.php", $msg, 3000);
    exit;

  case "op_update" :
    $msg = op_update($sn);
    redirect_header("user.php", $msg, 3000);
    exit;

  case "op_form" :
    $msg = op_form($sn);
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
function op_delete($sn){
  global $db; 
  $sql="DELETE FROM `prods`
        WHERE `sn` = '{$sn}'
  ";
  $db->query($sql) or die($db->error() . $sql);
  return "會員資料刪除成功";
}

function op_update($sn=""){
  global $db; 
   
  $_POST['uname'] = db_filter($_POST['uname'], '帳號');
  $_POST['pass'] = db_filter($_POST['pass'], '');//密碼
  $_POST['name'] = db_filter($_POST['name'], '姓名');
  $_POST['tel'] = db_filter($_POST['tel'], '電話');
  $_POST['email'] = db_filter($_POST['email'], 'email',FILTER_SANITIZE_EMAIL);
  $_POST['kind'] = db_filter($_POST['kind'], '會員狀態');
  
  $and_col = "";
  if($_POST['pass']){    
    $_POST['pass']  = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    //更新密碼
    $and_col = "`pass` = '{$_POST['pass']}',";
  }

  $sql="UPDATE `prods` SET
        `uname` = '{$_POST['uname']}',
        {$and_col}
        `name` = '{$_POST['name']}',
        `tel` = '{$_POST['tel']}',
        `email` = '{$_POST['email']}',
        `kind` = '{$_POST['kind']}'
        WHERE `sn` = '{$sn}';  
  ";//die($sql);
  $db->query($sql) or die($db->error() . $sql);
  return "會員資料更新成功";

}

function op_form($sn=""){
  global $smarty,$db;

  if($sn){
    $sql="SELECT *
          FROM `prods`
          WHERE `sn` = '{$sn}'
    ";//die($sql);
    
    $result = $db->query($sql) or die($db->error() . $sql);
    $row = $result->fetch_assoc();
    $row['op'] = "op_update"; 
  }else{
    $row['op'] = "op_insert";
  }

  $row['sn'] = isset($row['sn']) ? $row['sn'] : "";
  $row['kind_sn'] = isset($row['kind_sn']) ? $row['kind_sn'] : "1";
  $row['title'] = isset($row['title']) ? $row['title'] : "";
  $row['content'] = isset($row['content']) ? $row['content'] : "";
  $row['price'] = isset($row['price']) ? $row['price'] : "";
  $row['enable'] = isset($row['enable']) ? $row['enable'] : "1";
  
  $row['date'] = isset($row['date']) ? $row['date'] : date("Y-m-d H:i:s",strtotime("now"));
  $row['sort'] = isset($row['sort']) ? $row['sort'] : "";
  $row['counter'] = isset($row['counter']) ? $row['counter'] : "";

  $smarty->assign("row",$row);
}


function op_list(){
  global $smarty,$db;
  
  $sql = "SELECT *
          FROM `prods`
  ";//die($sql);

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){
    $row['title'] = htmlspecialchars($row['title']);//標題
    $row['kind_sn'] = (int)$row['kind_sn'];//分類
    $row['price'] = (int)$row['price'];//價格
    $row['enable'] = (int)$row['enable'];//狀態
    $row['counter'] = (int)$row['counter'];//計數  
    $rows[] = $row;
  }
  $smarty->assign("rows",$rows);  

}



