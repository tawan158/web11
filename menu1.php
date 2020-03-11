<?php
/* 引入檔頭，每支程都會引入 */
require_once 'head.php';
 
if($_SESSION['user']['kind'] !== 1)redirect_header("index.php", '您沒有權限', 3000);

/* 過濾變數，設定預設值 */
$op = system_CleanVars($_REQUEST, 'op', 'op_list', 'string');
$sn = system_CleanVars($_REQUEST, 'sn', '', 'int');
$kind = system_CleanVars($_REQUEST, 'kind', 'mainMenu', 'string');
$ofsn = system_CleanVars($_REQUEST, 'ofsn', 0, 'int');


$kinds['mainMenu'] = array(
  "value" => "mainMenu",
  "title" => "主選單",
  "stop_level" => 1
);
$kinds['cartMenu'] = array(
  "value" => "cartMenu",
  "title" => "購物車選單",
  "stop_level" => 1
);
$kinds['levelMenu'] = array(
  "value" => "levelMenu",
  "title" => "多層選單",
  "stop_level" => 4
);

$smarty->assign("kinds", $kinds);

#防呆
$kind = (in_array($kind, array_keys($kinds))) ? $kind : "mainMenu";
 
/* 程式流程 */
switch ($op){
  case "op_delete" :
    $msg = op_delete($kind,$sn);
    redirect_header($_SESSION['returnUrl'], $msg, 3000);
    exit;

  case "op_insert" :
    $msg = op_insert($kind);
    redirect_header($_SESSION['returnUrl'], $msg, 3000);
    exit;

  case "op_update" :
    $msg = op_insert($kind,$sn);
    redirect_header($_SESSION['returnUrl'], $msg, 3000);
    exit;

  case "op_form" :
    $msg = op_form($kind,$sn,$ofsn,$kinds[$kind]['stop_level']);
    break;
 
  default:
    $op = "op_list";
    $_SESSION['returnUrl'] = getCurrentUrl();
    op_list($kind);
    break;  
}
/*---- 將變數送至樣版----*/
$smarty->assign("WEB", $WEB);
$smarty->assign("op", $op);
 
/*---- 程式結尾-----*/
$smarty->display('admin.tpl');
 
/*---- 函數區-----*/

function op_delete($kind,$sn){
  global $db;

  #刪除選單資料表
  $sql="DELETE FROM `kinds`
        WHERE `sn` = '{$sn}'
  ";
  $db->query($sql) or die($db->error() . $sql);
  return "選單資料刪除成功";
}

function get_ofsn_level($kind,$ofsn,$level = 0){
  global $db,$kinds; 
  if($ofsn == 0)return $level;
  $next_level = $level+ 1;
  
  $sql = "SELECT *
					FROM `kinds`
					WHERE `kind`='{$kind}' and `sn`='{$ofsn}'
  ";//die($sql);
  $result = $db->query($sql) or die($db->error() . $sql);
  
  
  // echo "ofsn=" . $ofsn . "<br>";
  // echo "level=" . $level . "<br>";
  // echo "next_level=" .$next_level . "<br>";
  // print_r($row);
  // if($ofsn == 41 ){
  //   die();
  // }	   

  while($row = $result->fetch_assoc()){ 
    $sn = (int)$row['sn'];	
    $ofsn = (int)$row['ofsn'];
      
    $row_level = get_ofsn_option($kind,$sn,$next_level);  
    $level = ($row_level>$level) ? $row_level : $level;
  }
  return $level;
}

function op_insert($kind,$sn=""){
  global $db;						 
 
  $_POST['sn'] = db_filter($_POST['sn'], '');//流水號
  $_POST['title'] = db_filter($_POST['title'], '標題');//標題
  $_POST['kind'] = db_filter($_POST['kind'], '');//分類
  $_POST['enable'] = db_filter($_POST['enable'], '');//狀態
  $_POST['sort'] = db_filter($_POST['sort'], '');//排序
  $_POST['url'] = db_filter($_POST['url'], '');//網址
  $_POST['target'] = db_filter($_POST['target'], ''); //外連
  $_POST['ofsn'] = db_filter($_POST['ofsn'], ''); //父層

  if($sn){
    #判斷父層在第幾層
    $ofsn_level = get_ofsn_level($kind,$_POST['ofsn']);
    if($_POST['sn']==42){
      print_r($ofsn_level);
      die();

    }
    
    #判斷自已底下有幾層(含自已)
    $sql="UPDATE  `kinds` SET
                  `title` = '{$_POST['title']}',
                  `enable` = '{$_POST['enable']}',
                  `sort` = '{$_POST['sort']}',
                  `kind` = '{$_POST['kind']}',
                  `url` = '{$_POST['url']}',
                  `target` = '{$_POST['target']}',
                  `ofsn` = '{$_POST['ofsn']}'
                  WHERE `sn` = '{$_POST['sn']}'    
    ";
    $db->query($sql) or die($db->error() . $sql);
    $msg = "選單資料更新成功";
  }else{
    $sql="INSERT INTO `kinds` 
    (`title`, `enable`, `sort`, `kind`, `url`, `target`, `ofsn`)
    VALUES 
    ( '{$_POST['title']}', '{$_POST['enable']}', '{$_POST['sort']}', '{$_POST['kind']}', '{$_POST['url']}', '{$_POST['target']}', '{$_POST['ofsn']}')    
    "; //die($sql);
    $db->query($sql) or die($db->error() . $sql);
    $sn = $db->insert_id;
    $msg = "選單資料新增成功"; 
  }


  return $msg;

}

/*===========================
  用sn取得選單檔資料
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
function getKindMaxSortByKind($kind,$ofsn=0){
  global $db;
  $sql = "SELECT count(*)+1 as count
          FROM `kinds`
          WHERE `kind`='{$kind}' and `ofsn`='{$ofsn}'
  ";//die($sql);

  $result = $db->query($sql) or die($db->error() . $sql);
  $row = $result->fetch_assoc();
  return $row['count'];
}

function get_ofsn_option($kind,$ofsn=0,$level=1){
  global $db,$kinds;
  #層數
  $stop_level = $kinds[$kind]['stop_level'];
  
  #結束條件
  if($level+1 > $stop_level)return;

  #下層
  $next_level = $level++;


  $sql = "SELECT *
					FROM `kinds`
					WHERE `kind`='{$kind}' and `ofsn`='{$ofsn}'
					ORDER BY `sort`
  ";//die($sql);
  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){ 
    $sn = (int)$row['sn'];//分類
		$title = htmlspecialchars($row['title']);//標題
		
		$sub = get_ofsn_option($kind,$sn,$next_level);
		$rows[] = [
			'sn' => $sn,
			'title' => $title,
			'sub' => $sub
		];
  }
  return $rows;
}

function op_form($kind, $sn="", $ofsn=0, $stop_level=1){
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
  $row['url'] = isset($row['url']) ? $row['url'] : "";
  $row['target'] = isset($row['target']) ? $row['target'] : "0";
  $row['sort'] = isset($row['sort']) ? $row['sort'] : getKindMaxSortByKind($kind,$ofsn);
  
  $row['ofsn'] = isset($row['ofsn']) ? $row['ofsn'] : $ofsn;//父層
	$row['ofsn_option'] = get_ofsn_option($kind);//父層選項
	// print_r($row['ofsn_option']);die();
  

  $smarty->assign("row",$row);
  $smarty->assign("stop_level",$stop_level); 
}

function get_kinds($kind,$ofsn=0,$level=1){
  global $db,$kinds;
  #層數
  $stop_level = $kinds[$kind]['stop_level'];

  #結束條件
  if($level > $stop_level)return;
  $next_level = $level++;
  
  $sql = "SELECT *
          FROM `kinds`
          WHERE `kind`='{$kind}' and `ofsn`='{$ofsn}'
          ORDER BY `sort`
  ";//die($sql);
  $result = $db->query($sql) or die($db->error() . $sql);
  $rows=[];//array();
  while($row = $result->fetch_assoc()){ 
    $sn = (int)$row['sn'];//分類
    $ofsn = (int)$row['ofsn'];//分類
    $title = htmlspecialchars($row['title']);//標題
    $enable = (int)$row['enable'];//狀態 
    $url = htmlspecialchars($row['url']);//網址
    $target = (int)$row['target'];//外連 
   
    $sub = get_kinds($kind,$sn,$next_level);
    
    $rows[] = [
			'sn' => $sn,
			'ofsn' => $ofsn,
			'title' => $title,
			'enable' => $enable,
			'url' => $url,
			'target' => $target,
			'sub' => $sub
    ];
  }
  return $rows;
}

function op_list($kind){
	global $smarty,$db,$kinds;
	#層數
	$stop_level = $kinds[$kind]['stop_level'];
	#資料
  $rows = get_kinds($kind,0);
  
  $smarty->assign("rows",$rows);
  $smarty->assign("kind",$kind); 
  $smarty->assign("stop_level",$stop_level);  

}



