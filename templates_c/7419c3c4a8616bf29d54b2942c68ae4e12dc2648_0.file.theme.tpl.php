<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-03 10:48:31
  from 'D:\ugm\xampp\htdocs\web11\templates\theme.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5dc57fbb9294_56921673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7419c3c4a8616bf29d54b2942c68ae4e12dc2648' => 
    array (
      0 => 'D:\\ugm\\xampp\\htdocs\\web11\\templates\\theme.tpl',
      1 => 1583203707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpl/head_js.tpl' => 1,
    'file:tpl/redirect.tpl' => 1,
    'file:tpl/head.tpl' => 1,
    'file:tpl/index.tpl' => 1,
    'file:tpl/cart.tpl' => 1,
    'file:tpl/footer.tpl' => 1,
  ),
),false)) {
function content_5e5dc57fbb9294_56921673 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $_smarty_tpl->tpl_vars['WEB']->value['web_title'];?>
</title>

  <!-- Font Awesome Icons -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
css/creative.css" rel="stylesheet">
  
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/head_js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>

<body id="page-top">
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/redirect.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:tpl/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <?php if ($_smarty_tpl->tpl_vars['WEB']->value['file_name'] == "index.php") {?>
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php } elseif ($_smarty_tpl->tpl_vars['WEB']->value['file_name'] == "cart.php") {?>
    <?php $_smarty_tpl->_subTemplateRender("file:tpl/cart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php }?>
  



    <?php $_smarty_tpl->_subTemplateRender("file:tpl/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  
  <!-- Custom scripts for this template -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoImgUrl']->value;?>
js/creative.min.js"><?php echo '</script'; ?>
>
</body>

</html>
<?php }
}
