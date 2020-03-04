<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-04 15:56:12
  from 'D:\ugm\xampp\htdocs\web11\templates\tpl\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5f5f1c2d9b11_57758385',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50e4048a5f846acadf4dda68c273764db420ec2f' => 
    array (
      0 => 'D:\\ugm\\xampp\\htdocs\\web11\\templates\\tpl\\cart.tpl',
      1 => 1583308566,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5f5f1c2d9b11_57758385 (Smarty_Internal_Template $_smarty_tpl) {
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
}?>

<?php if ($_smarty_tpl->tpl_vars['op']->value == "order_form") {?>
  <div class="container mt-5" style="margin-top: 100px!important;>
    <h1 class="text-center">點餐訂單</h1>
    <form  role="form" action="order_insert" method="post" id="myForm" >        
        <div class="row">
            <!--姓名-->              
            <div class="col-sm-3">
                <div class="form-group">
                    <label><span class="title">姓名</span><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
">
                </div>
            </div>
            <!--電話-->              
            <div class="col-sm-3">
                <div class="form-group">
                    <label><span class="title">電話</span><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['tel'];?>
">
                </div>
            </div>
            <!--email-->              
            <div class="col-sm-3">
                <div class="form-group">
                    <label><span class="title">email</span><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
">
                </div>
            </div>
                    
            <!--分類-->              
            <div class="col-sm-3">
              <div class="form-group">
                  <label>桌號或外帶</label>
                  <select name="kind_sn" id="kind_sn" class="form-control">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value['kind_sn_options'], 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value['sn'];?>
" <?php if ($_smarty_tpl->tpl_vars['option']->value['sn'] == $_smarty_tpl->tpl_vars['row']->value['kind_sn']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['option']->value['title'];?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                  </select>
              </div>
            </div>
        </div> 
        
        <div class="row">
            <div class="col-sm-12">  
                <!-- 聯絡事項 -->
                <div class="form-group">
                    <label class="control-label">備註</label>
                    <textarea class="form-control" rows="1" id="ps" name="ps"></textarea>
                </div>
            </div>
        </div>

        <div class="text-center pb-3">
            <button type="submit" class="btn btn-primary">送出</button>
        </div>
    </form>
  </div>

  <!-- 表單驗證 -->
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"><?php echo '</script'; ?>
>
  <!-- 調用方法 -->
  <style>
  .error{
    color:red;
  }
  </style>
  <?php echo '<script'; ?>
>

  $(function(){
    $("#myForm").validate({
    submitHandler: function(form) {
        form.submit();
    },
    rules: {
        'entry.1597864916' : {
        required: true
        },
        'entry.2110810376' : {
        required: true
        },
        'entry.1402899655' : {
        required: true
        }
    },
    messages: {
        'entry.1597864916' : {
        required: "必填"
        },
        'entry.2110810376' : {
        required: "必填"
        },
        'entry.1402899655' : {
        required: "必填"
        }
    }
    });

  });
  <?php echo '</script'; ?>
>
<?php }
}
}
