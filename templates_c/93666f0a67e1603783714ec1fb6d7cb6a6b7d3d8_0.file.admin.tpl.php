<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-27 13:48:17
  from 'D:\ugm\xampp\htdocs\web11\templates\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e575821d3bc80_54322368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93666f0a67e1603783714ec1fb6d7cb6a6b7d3d8' => 
    array (
      0 => 'D:\\ugm\\xampp\\htdocs\\web11\\templates\\admin.tpl',
      1 => 1582782494,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpl/redirect.tpl' => 1,
    'file:tpl/user.tpl' => 1,
    'file:tpl/prod.tpl' => 1,
    'file:tpl/kind.tpl' => 1,
  ),
),false)) {
function content_5e575821d3bc80_54322368 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
bootstrap/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <title><?php echo $_smarty_tpl->tpl_vars['WEB']->value['web_title'];?>
</title>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
bootstrap/jquery-3.4.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
bootstrap/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
bootstrap/bootstrap.min.js"><?php echo '</script'; ?>
>
  </head>
  <body>
        <?php $_smarty_tpl->_subTemplateRender("file:tpl/redirect.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <h1 class="text-center mt-2"><?php echo $_smarty_tpl->tpl_vars['WEB']->value['web_title'];?>
</h1>
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <?php if ($_smarty_tpl->tpl_vars['WEB']->value['file_name'] == "user.php") {?>
            <?php $_smarty_tpl->_subTemplateRender("file:tpl/user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <?php } elseif ($_smarty_tpl->tpl_vars['WEB']->value['file_name'] == "prod.php") {?>
            <?php $_smarty_tpl->_subTemplateRender("file:tpl/prod.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <?php } elseif ($_smarty_tpl->tpl_vars['WEB']->value['file_name'] == "kind.php") {?>
            <?php $_smarty_tpl->_subTemplateRender("file:tpl/kind.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>   
          <?php }?>
          

        </div>
        <div class="col-sm-3">

          <div class="card" style="width: 18rem;">
            <div class="card-header">
              管理員
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <a href="index.php" style="display:block;">首頁</a>
              </li>
              <li class="list-group-item">
                <a href="index.php?op=logout" class="btn-block">登出</a>
              </li>
              <li class="list-group-item">
                <a href="user.php" class="btn-block">會員管理</a>
              </li>
              <li class="list-group-item">
                <a href="prod.php" class="btn-block">商品管理</a>
              </li>
              <li class="list-group-item">
                <a href="kind.php" class="btn-block">類別管理</a>
              </li>
              <li class="list-group-item">
                <a href="http://localhost/adminer/adminer.php" class="btn-block" target="_blank">資料庫管理</a>
              </li>
              
            </ul>
          </div>

        </div>
      </div>
    </div>
  </body>
</html><?php }
}
