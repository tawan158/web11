<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-14 06:41:12
  from 'D:\ugm\xampp\htdocs\web11\templates\tpl\contact_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e4632f8203e10_44992852',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86a30fed771f42d29f32e05a139f30c121144cf1' => 
    array (
      0 => 'D:\\ugm\\xampp\\htdocs\\web11\\templates\\tpl\\contact_form.tpl',
      1 => 1581657617,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4632f8203e10_44992852 (Smarty_Internal_Template $_smarty_tpl) {
?>
		<div class="container mt-5">
			<h1 class="text-center">聯絡我們</h1>
			
        <!-- 表單返回頁，記得在表單加「 target='returnWin' 」 -->
        <iframe name="returnWin" style="display: none;" onload="this.onload=function(){window.location='index.php?op=ok'}"></iframe>

        <form  target='returnWin' role="form" action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSdEdFVM05z1TaxO2rdqukwPVKC3RqG3G70cdgznjX3xbCHOTg/formResponse" method="post" id="myForm" >
            
            <div class="row">
                <!--姓名-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><span class="title">姓名</span><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="entry.1597864916" id="name" value="">
                    </div>
                </div>
                <!--電話-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><span class="title">電話</span><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="entry.2110810376" id="tel" value="">
                    </div>
                </div>
                <!--email-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label><span class="title">email</span><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="entry.1402899655" id="email" value="">
                    </div>
                </div>
            </div> 
            
            <div class="row">
                <div class="col-sm-12">  
                    <!-- 聯絡事項 -->
                    <div class="form-group">
                        <label class="control-label">聯絡事項</label>
                        <textarea class="form-control" rows="5" id="contact" name="entry.1136713386"></textarea>
                    </div>
                </div>
            </div>

            <div class="text-center pb-3">
                <button type="submit" class="btn btn-primary">送出</button>
            </div>
        </form>
		</div><?php }
}
