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

	case "Portfolio" :
		//op_gallery();
		break;
		  
  default:
    $op = "op_list";
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

function getMenus($kind,$pic=false){
  global $db;
  
  $sql = "SELECT *
          FROM `kinds`
          WHERE `kind`='{$kind}' and `enable`='1'
          ORDER BY `sort`
  ";//die($sql);

  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){ 
    $row['sn'] = (int)$row['sn'];//分類
    $row['title'] = htmlspecialchars($row['title']);//標題
    $row['enable'] = (int)$row['enable'];//狀態 
    $row['url'] = htmlspecialchars($row['url']);//網址
    $row['target'] = (int)$row['target'];//外連  
    $row['pic'] = ($pic == true) ? getFilesByKindColsnSort($kind,$row['sn']) :"";//圖片連結
    $rows[] = $row;
  }
  return $rows; 

}
