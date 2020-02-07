<?php
#資料庫伺服器
$db_host = "localhost";
#資料庫使用者帳號
$db_user = "root";
#資料庫使用者密碼
$db_password = "111111";
#資料庫名稱
$db_name = "web11";
#PHP 5.2.9以後
$db = new mysqli($db_host, $db_user, $db_password, $db_name); 
if ($db->connect_error) {
  die('無法連上資料庫 (' . $db->connect_errno . ') '
        . $db->connect_error);
}
#設定資料庫語系
$db->set_charset("utf8");