<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-02 10:45:00
  from 'D:\ugm\xampp\htdocs\web11\templates\tpl\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5c732ca9bc14_64643780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff01f7a0cb3358b5b3e38aef4bd74df6b09aa803' => 
    array (
      0 => 'D:\\ugm\\xampp\\htdocs\\web11\\templates\\tpl\\menu.tpl',
      1 => 1583117097,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5c732ca9bc14_64643780 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['op']->value == "op_list") {?>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
        <tr> 
            <th scope="col">標題</th>
            <th scope="col">網址</th>
            <th scope="col" class="text-center">外連</th>
            <th scope="col" class="text-center">狀態</th>
            <th scope="col" class="text-center">
                <a href="?op=op_form&kind=<?php echo $_smarty_tpl->tpl_vars['kind']->value;?>
"><i class="fas fa-plus-square"></i>新增</a>
            </th>
        </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                <tr>
                    <td class=""><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</td>
                    <td class=""><?php echo $_smarty_tpl->tpl_vars['row']->value['url'];?>
</td>
                    <td class="text-center "><?php if ($_smarty_tpl->tpl_vars['row']->value['target']) {?><i class="fas fa-check"></i><?php }?></td>
                    <td class="text-center "><?php if ($_smarty_tpl->tpl_vars['row']->value['enable']) {?><i class="fas fa-check"></i><?php }?></td>
                    <td class="text-center ">
                        <a href="?op=op_form&kind=<?php echo $_smarty_tpl->tpl_vars['row']->value['kind'];?>
&sn=<?php echo $_smarty_tpl->tpl_vars['row']->value['sn'];?>
"><i class="far fa-edit"></i></a>
                        <a href="javascript:void(0)" onclick="op_delete('<?php echo $_smarty_tpl->tpl_vars['row']->value['kind'];?>
',<?php echo $_smarty_tpl->tpl_vars['row']->value['sn'];?>
);"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php
}
} else {
?>
                <tr>
                    <td colspan=5>目前沒有資料</td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        </tbody>
    </table>
    
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['xoAppUrl']->value;?>
class/sweetalert2/sweetalert2.min.css">
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['xoAppUrl']->value;?>
class/sweetalert2/sweetalert2.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        function op_delete(kind,sn){
            Swal.fire({
                title: '你確定嗎？',
                text: "您將無法還原！",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '是的，刪除它！',
                cancelButtonText: '取消'
                }).then((result) => {
                if (result.value) {
                    document.location.href="kind.php?op=op_delete&kind=" + kind + "&sn="+sn;
                }
            })
        }
    <?php echo '</script'; ?>
>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['op']->value == "op_form") {?>
    
    <div class="container">        
        <form action="kind.php" method="post" id="myForm" class="mb-2" enctype="multipart/form-data">
            <!-- 	 						 -->
            <div class="row">         
                <!--標題-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>標題<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" >
                    </div>
                </div> 
                <!-- 類別狀態  -->
                <div class="col-sm-4">
                    <div class="form-group">
                        <label style="display:block;">類別狀態</label>
                        <input type="radio" name="enable" id="enable_1" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['enable'] == '1') {?>checked<?php }?>>
                        <label for="enable_1" style="display:inline;">啟用</label>&nbsp;&nbsp;
                        <input type="radio" name="enable" id="enable_0" value="0" <?php if ($_smarty_tpl->tpl_vars['row']->value['enable'] == '0') {?>checked<?php }?>>
                        <label for="enable_0" style="display:inline;">停用</label>
                    </div>
                </div>  
       
                <!--排序-->              
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>排序</label>
                        <input type="text" class="form-control text-right" name="sort" id="sort" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sort'];?>
">
                    </div>
                </div>
            </div>
            
            <div class="text-center pb-20">
            <input type="hidden" name="op" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['op'];?>
">
            <input type="hidden" name="sn" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['sn'];?>
">
            <input type="hidden" name="kind" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['kind'];?>
">
            <button type="submit" class="btn btn-primary">送出</button>
            </div>
        
        </form>
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
                        'title' : {
                            required: true
                        }
                    },
                    messages: {
                        'title' : {
                            required: "必填"
                        }

                    }
                });

            });
        <?php echo '</script'; ?>
>

        <?php echo '<script'; ?>
 type='text/javascript' src='<?php echo $_smarty_tpl->tpl_vars['xoAppUrl']->value;?>
class/My97DatePicker/WdatePicker.js'><?php echo '</script'; ?>
>
        
    </div>

<?php }
}
}
