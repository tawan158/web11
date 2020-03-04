<?php
require_once 'head.php';
 
/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');


/* 程式流程 */
switch ($op){
	case "op_gallery" :
		//op_gallery();
		break; 
		  
  default:
    $op = "op_list";
    op_list();
    break;  
}
  /*---- 將變數送至樣版----*/
  $mainMenus = getMenus("cartMenu");

  $smarty->assign("mainMenus", $mainMenus);

  $smarty->assign("WEB", $WEB);
  $smarty->assign("op", $op);
   
/*---- 程式結尾-----*/
$smarty->display('theme.tpl');

//----函數區
function op_list(){
  global $db,$smarty;

  $sql = "SELECT a.sn,a.title,price,
                 b.title as kinds_title
          FROM `prods` as a
          LEFT JOIN `kinds` as b on a.kind_sn=b.sn
          WHERE a.`enable`='1'
          ORDER BY a.date desc
  ";//die($sql);

  #---分頁套件(原始$sql 不要設 limit)
  include_once _WEB_PATH."/class/PageBar/PageBar.php";
  $pageCount = 8;
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
    $row['title'] = htmlspecialchars($row['title']);//標題
    $row['price'] = (int)$row['price'];//價格
    $row['prod'] = getFilesByKindColsnSort("prod",$row['sn']);  
    //$row['kinds_title'] = htmlspecialchars($row['kinds_title']);//標題
    $rows[] = $row;
  }
  $smarty->assign("rows",$rows); 

}
