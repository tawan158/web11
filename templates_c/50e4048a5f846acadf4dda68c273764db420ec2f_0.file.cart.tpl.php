<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-04 11:36:58
  from 'D:\ugm\xampp\htdocs\web11\templates\tpl\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5f225a3e3e07_50248014',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50e4048a5f846acadf4dda68c273764db420ec2f' => 
    array (
      0 => 'D:\\ugm\\xampp\\htdocs\\web11\\templates\\tpl\\cart.tpl',
      1 => 1583293002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5f225a3e3e07_50248014 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['op']->value == "op_list") {?>
  <!-- Page Content -->
  <div class="container" style="margin-top: 110px;">

    <!-- Page Heading -->
    <h1 class="my-4">
      餐點訂購
    </h1>

    <div class="row">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['prod'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
">
            <div class="card-body">
              <div class="card-title">
                <?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
： <?php echo $_smarty_tpl->tpl_vars['row']->value['price'];?>
 元
              </div>
              <div class="mt-2">
                <a href="#" class="btn btn-primary btn-sm">加入購物車</a>
              </div>
            </div>
          </div>
        </div>

      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>      
    </div>
    <!-- /.row -->
    <?php echo $_smarty_tpl->tpl_vars['bar']->value;?>


  </div>
  <!-- /.container -->
<?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "Portfolio") {
}
}
}
