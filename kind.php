<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
if($_SESSION['user']['kind'] !== 1)redirect_header("index.php", '您沒有權限', 3000);

/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');
$kind = system_CleanVars($_REQUEST, 'kind', 'prod', 'string');
$kind = "prod";
// echo $op;die();
 
/* 程式流程 */
switch ($op){
  case "op_delete" :
    $msg = op_delete($sn);
    redirect_header("prod.php", $msg, 3000);
    exit;

  case "op_insert" :
    $msg = op_insert();
    redirect_header("prod.php", $msg, 3000);
    exit;

  case "op_update" :
    $msg = op_insert($sn);
    redirect_header("prod.php", $msg, 3000);
    exit;

  case "op_form" :
    $msg = op_form($kind,$sn);
    break;
 
  default:
    $op = "op_list";
    op_list($kind);
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

  #刪除商品資料表
  $sql="DELETE FROM `kinds`
        WHERE `sn` = '{$sn}'
  ";
  $db->query($sql) or die($db->error() . $sql);
  return "商品資料刪除成功";
}

function op_insert($sn=""){
  global $db;						 
 
  $_POST['sn'] = db_filter($_POST['sn'], '');//流水號
  $_POST['kind_sn'] = db_filter($_POST['kind_sn'], '');//類別
  $_POST['title'] = db_filter($_POST['title'], '標題');//標題
  $_POST['content'] = db_filter($_POST['content'], '');
  $_POST['price'] = db_filter($_POST['price'], '');
  $_POST['enable'] = db_filter($_POST['enable'], '');

  $_POST['date'] = db_filter($_POST['date'], '');
  $_POST['date'] = strtotime($_POST['date']);

  $_POST['sort'] = db_filter($_POST['sort'], '');  
  $_POST['counter'] = db_filter($_POST['counter'], '');

  if($sn){
    $sql="UPDATE  `kinds` SET
                  `kind_sn` = '{$_POST['kind_sn']}',
                  `title` = '{$_POST['title']}',
                  `content` = '{$_POST['content']}',
                  `price` = '{$_POST['price']}',
                  `enable` = '{$_POST['enable']}',
                  `date` = '{$_POST['date']}',
                  `sort` = '{$_POST['sort']}',
                  `counter` = '{$_POST['counter']}'
                  WHERE `sn` = '{$_POST['sn']}'    
    ";
    $db->query($sql) or die($db->error() . $sql);
    $msg = "商品資料更新成功";
  }else{
    $sql="INSERT INTO `kinds` 
    (`kind_sn`, `title`, `content`, `price`, `enable`, `date`, `sort`, `counter`)
    VALUES 
    ('{$_POST['kind_sn']}', '{$_POST['title']}', '{$_POST['content']}', '{$_POST['price']}', '{$_POST['enable']}', '{$_POST['date']}', '{$_POST['sort']}', '{$_POST['counter']}')    
    "; //die($sql);
    $db->query($sql) or die($db->error() . $sql);
    $sn = $db->insert_id;
    $msg = "商品資料新增成功";    

  }


  return $msg;

}

/*===========================
  用sn取得商品檔資料
===========================*/
function getKindsBySn($sn){
  global $db;
  $sql="SELECT *
        FROM `kinds`
        WHERE `sn` = '{$sn}'
  ";//die($sql);
  
  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc();
  return $row;

}

/*================================
  用kind 取得數量的最大值
================================*/
function getKindMaxSortByKind($kind){
  global $db;
  $sql = "SELECT count(*)+1 as count
          FROM `kinds`
          WHERE `kind`='{$kind}'
  ";//die($sql);

  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc();
  return $row['count'];
}

function op_form($kind,$sn=""){
  global $smarty,$db;

  if($sn){
    $row = getKindsBySn($sn);
    $row['op'] = "op_update";
  }else{
    $row['op'] = "op_insert";
  }

  $row['sn'] = isset($row['sn']) ? $row['sn'] : "";
  $row['kind'] = isset($row['kind']) ? $row['kind'] : $kind;
  $row['title'] = isset($row['title']) ? $row['title'] : "";
  $row['enable'] = isset($row['enable']) ? $row['enable'] : "1";
  $row['sort'] = isset($row['sort']) ? $row['sort'] : getKindMaxSortByKind($kind);
  

  $smarty->assign("row",$row);
}


function op_list($kind){
  global $smarty,$db;
  
  $sql = "SELECT *
          FROM `kinds`
          WHERE `kind`='{$kind}'
  ";//die($sql);

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){    
    $row['sn'] = (int)$row['sn'];//分類
    $row['title'] = htmlspecialchars($row['title']);//標題
    $row['enable'] = (int)$row['enable'];//狀態 
    $rows[] = $row;
  }
  $smarty->assign("rows",$rows);  

}



