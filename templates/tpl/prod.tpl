<{if $op=="op_list"}>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
        <tr> 
            <th scope="col">標題</th>
            <th scope="col">分類</th>
            <th scope="col" class="text-right">價格</th>
            <th scope="col" class="text-center">狀態</th>
            <th scope="col" class="text-center">計數</th>
            <th scope="col" class="text-center">
                <a href="?op=op_form"><i class="fas fa-plus-square"></i>新增</a>
            </th>
        </tr>
        </thead>
        <tbody>
            <{foreach $rows as $row}>
                <tr>
                    <td><{$row.title}></td>
                    <td><{$row.kind_sn}></td>
                    <td class="text-right"><{$row.price}></td>
                    <td class="text-center"><{if $row.enable}><i class="fas fa-check"></i><{/if}></td>
                    <td class="text-center"><{$row.counter}></td>
                    <td class="text-center">
                        <a href="?op=op_form&sn=<{$row.sn}>"><i class="far fa-edit"></i></a>
                        <a href="javascript:void(0)" onclick="op_delete(<{$row.sn}>);"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <{foreachelse}>
                <tr>
                    <td colspan=6>目前沒有資料</td>
                </tr>
            <{/foreach}>

        </tbody>
    </table>
    
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.css">
    <script src="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.js"></script>
    <script>
        function op_delete(sn){
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
                    document.location.href="user.php?op=op_delete&sn="+sn;
                }
            })
        }
    </script>
<{/if}>

<{if $op=="op_form"}>
    
    <div class="container">
        <h1 class="text-center">商品管理表單</h1>
        
        <form action="prod.php" method="post" id="myForm" class="mb-2" enctype="multipart/form-data">
            <!-- sn	 title	content	price		date	sort	counter -->
            <div class="row">         
                <!--標題-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>標題<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="<{$row.title}>" >
                    </div>
                </div>         
                <!--分類-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>分類</label>
                        <input type="text" class="form-control" name="kind_sn" id="kind_sn" value="<{$row.kind_sn}>">
                    </div>
                </div>
                <!-- 商品狀態  -->
                <div class="col-sm-4">
                    <div class="form-group">
                    <label style="display:block;">商品狀態</label>
                    <input type="radio" name="enable" id="enable_1" value="1" <{if $row.enable=='1'}>checked<{/if}>>
                    <label for="enable_1" style="display:inline;">啟用</label>&nbsp;&nbsp;
                    <input type="radio" name="enable" id="enable_0" value="0" <{if $row.enable=='0'}>checked<{/if}>>
                    <label for="enable_0" style="display:inline;">停用</label>
                    </div>
                </div>  

                <!--姓名-->              
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>姓名<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="<{$row.name}>">
                    </div>
                </div>         
                <!--電話-->              
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>電話<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="tel" id="tel" value="<{$row.tel}>">
                    </div>
                </div>             
                <!--信箱-->              
                <div class="col-sm-12">
                    <div class="form-group">
                    <label>信箱<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="email" id="email" value="<{$row.email}>">
                    </div>
                </div> 
            </div>

            <div class="text-center pb-20">
            <input type="hidden" name="op" value="<{$row.op}>">
            <input type="hidden" name="sn" value="<{$row.sn}>">
            <button type="submit" class="btn btn-primary">送出</button>
            </div>
        
        </form>
        <!-- 表單驗證 -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
        <!-- 調用方法 -->
        <style>
            .error{
            color:red;
            }
        </style>
        <script>
            $(function(){

            });
            $(function(){
            $("#myForm").validate({
                submitHandler: function(form) {
                    form.submit();
                },
                rules: {
                    'uname' : {
                        required: true
                    },
                    'name' : {
                        required: true
                    },
                    'tel' : {
                        required: true
                    },
                    'email' : {
                        required: true,
                        email:true
                    }
                },
                messages: {
                    'uname' : {
                        required: "必填"
                    },
                    'name' : {
                        required: "必填"
                    },
                    'tel' : {
                        required: "必填"
                    },
                    'email' : {
                        required: "必填",
                        email: "請填正確email"
                    }

                }
            });

            });
        </script>
        
    </div>

<{/if}>