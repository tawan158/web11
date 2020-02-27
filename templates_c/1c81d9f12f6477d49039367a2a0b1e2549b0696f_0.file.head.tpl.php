<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-27 11:33:12
  from 'D:\ugm\xampp\htdocs\web11\templates\tpl\head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e573878bfe056_36402827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c81d9f12f6477d49039367a2a0b1e2549b0696f' => 
    array (
      0 => 'D:\\ugm\\xampp\\htdocs\\web11\\templates\\tpl\\head.tpl',
      1 => 1582774387,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e573878bfe056_36402827 (Smarty_Internal_Template $_smarty_tpl) {
?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="background:rgba(108, 117, 125,0.8);">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php#page-top"><?php echo $_smarty_tpl->tpl_vars['WEB']->value['web_title'];?>
</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php#about">關於我們</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php#portfolio">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php#contact">Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php?op=contact_form">聯絡我們</a>
          </li>

          <?php if ($_SESSION['user']['kind'] === 1) {?>
                        <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="user.php">後台</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?op=logout">登出</a>
            </li>
          <?php } elseif ($_SESSION['user']['kind'] === 0) {?> 
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?op=logout">登出</a>
            </li> 
          <?php } else { ?>
                        <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?op=login_form">登入</a>
            </li>
            
          <?php }?>

        </ul>
      </div>
    </div>
  </nav>
<?php }
}
