<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-04 13:14:26
  from 'D:\ugm\xampp\htdocs\web11\templates\tpl\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5f3932549d51_40587191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50e4048a5f846acadf4dda68c273764db420ec2f' => 
    array (
      0 => 'D:\\ugm\\xampp\\htdocs\\web11\\templates\\tpl\\cart.tpl',
      1 => 1583298859,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5f3932549d51_40587191 (Smarty_Internal_Template $_smarty_tpl) {
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
                <a href="#" class="btn btn-primary btn-sm" onclick="add_cart(<?php echo $_smarty_tpl->tpl_vars['row']->value['sn'];?>
);">加入購物車</a>
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
  
  <!-- sweetalert2 -->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['xoAppUrl']->value;?>
class/sweetalert2/sweetalert2.min.css">
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoAppUrl']->value;?>
class/sweetalert2/sweetalert2.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>
    function add_cart(sn){
      Swal.fire({
        title: '加入購物車？',
        // text: "您將無法還原！",
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '是的',
        cancelButtonText: '取消'
        }).then((result) => {
        if (result.value) {
            document.location.href="cart.php?op=add_cart&sn="+sn;
        }
      })
    }
<?php echo '</script'; ?>
>
<?php } elseif ($_smarty_tpl->tpl_vars['op']->value == "Portfolio") {
}
}
}
