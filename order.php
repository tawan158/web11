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
  case "order_delete" :
    $msg = order_delete($sn);
    redirect_header($_SESSION['returnUrl'], $msg, 3000);
    exit;
 
  default:
    $op = "op_list";
    $_SESSION['returnUrl'] = getCurrentUrl();
    op_list();
    break;  
}
/*---- 將變數送至樣版----*/
$smarty->assign("WEB", $WEB);
$smarty->assign("op", $op);
 
/*---- 程式結尾-----*/
$smarty->display('admin.tpl');
 
/*---- 函數區-----*/
function order_delete($sn){
  global $db;

  #刪除訂單主檔資料表
  $sql="DELETE FROM `orders_main`
        WHERE `sn` = '{$sn}'
  ";
  $db->query($sql) or die($db->error() . $sql);

  #刪除訂單細檔資料表
  $sql="DELETE FROM `orders`
        WHERE `orders_main_sn` = '{$sn}'
  ";
  $db->query($sql) or die($db->error() . $sql);
  
  return "訂單資料刪除成功";
}

function op_form($sn=""){
  global $smarty,$db;

  if($sn){
    $orders_main = getOrders_mainBySn($sn);
    $orders_main['op'] = "op_update";
  }
  
  $orders_main['date'] = date("Y-m-d H:i",$orders_main['date']) ;  
  $smarty->assign("orders_main", $orders_main);

  #明細檔
  $sql="SELECT *
        FROM `orders`
        WHERE `orders_main_sn` = '{$sn}'
  ";  
  $result = $db->query($sql) or die($db->error() . $sql);
  $rows = [];
  //sn	orders_main_sn	prod_sn	title	amount	price	sort  
  while($row = $result->fetch_assoc()){    
    $row['sn'] = (int)$row['sn'];//分類  
    $row['prod_sn'] = (int)$row['prod_sn'];//商品流水號
    $row['title'] = htmlspecialchars($row['title']);//標題
    $row['price'] = (int)$row['price'];//價格
    $row['amount'] = (int)$row['amount'];//
    $row['total'] = $row['price'] * $row['amount'] ? $row['price'] * $row['amount'] : "";//
    $row['prod'] = getFilesByKindColsnSort("prod",$row['prod_sn']);
    $rows[] = $row;
  }

  $smarty->assign("rows", $rows);


}


function op_list(){
  global $smarty,$db;
  
  $sql = "SELECT a.*,
                 b.title as kind_title
          FROM `orders_main` as a
          LEFT JOIN `kinds` as b on a.kind_sn=b.sn
          ORDER BY a.`date` desc
  ";//die($sql);

  #---分頁套件(原始$sql 不要設 limit)
  include_once _WEB_PATH."/class/PageBar/PageBar.php";
  $pageCount = 20;
  $PageBar = getPageBar($db, $sql, $pageCount, 10);
  $sql     = $PageBar['sql'];
  $total   = $PageBar['total'];
  $bar     = ($total > $pageCount) ? $PageBar['bar'] : "";
  $smarty->assign("bar",$bar);  
  #---分頁套件(end)

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){
    $row['sn'] = (int)$row['sn'];//分類
    $row['name'] = htmlspecialchars($row['name']);//
    $row['tel'] = htmlspecialchars($row['tel']);//
    $row['name'] = htmlspecialchars($row['name']);//
    $row['date'] = (int)$row['date'];
    $row['date'] = date("Y-m-d H:i",$row['date']);
    $row['total'] = (int)$row['total'];//
    $row['kind_title'] = htmlspecialchars($row['kind_title']);//
    $rows[] = $row;
  }
  $smarty->assign("rows",$rows);  

}



