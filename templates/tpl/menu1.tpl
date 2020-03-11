<{if $op=="op_list"}>

    <div class="row mb-2">
        <div class="cols-sm-4">
						<select name="kind" id="kind" class="form-control" onchange="location.href='?kind='+this.value">
							<{foreach $kinds as $row}>
								<option value="<{$row.value}>" <{if $kind == $row.value}>selected<{/if}> ><{$row.title}></option>
							<{/foreach}>
            </select>
        </div>
    </div>

    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
        <tr> 
            <th scope="col">標題</th>
            <th scope="col">網址</th>
            <th scope="col" class="text-center">外連</th>
            <th scope="col" class="text-center">狀態</th>
            <th scope="col" class="text-center">
                <a href="?op=op_form&kind=<{$kind}>"><i class="fas fa-plus-square"></i>新增</a>
            </th>
        </tr>
        </thead>
        <tbody>
					<!-- 第1層 -->
					<{foreach $rows as $row}>
						<tr>
							<td class=""><{$row.title}></td>
							<td class=""><{$row.url}></td>
							<td class="text-center "><{if $row.target}><i class="fas fa-check"></i><{/if}></td>
							<td class="text-center "><{if $row.enable}><i class="fas fa-check"></i><{/if}></td>
							<td class="text-center ">
								<{if $stop_level > 1}>
									<a href="?op=op_form&kind=<{$kind}>&ofsn=<{$row.sn}>"><i class="fas fa-plus-square"></i></a>
								<{else}>
									<span style="padding-left: 10px;">	
								<{/if}>
								<a href="?op=op_form&kind=<{$kind}>&sn=<{$row.sn}>&ofsn=<{$row.ofsn}>"><i class="far fa-edit"></i></a>
								<a href="javascript:void(0)" onclick="op_delete('<{$kind}>',<{$row.sn}>);"><i class="far fa-trash-alt"></i></a>
							</td>
						</tr>
						
						<!-- 第2層 -->
						<{if $stop_level > 1}>
							<{foreach $row.sub as $sub2}>
								<tr>
									<td><span style="padding-left: 10px;color:red;" >-</span><{$sub2.title}></td>
									<td class=""><{$sub2.url}></td>
									<td class="text-center "><{if $sub2.target}><i class="fas fa-check"></i><{/if}></td>
									<td class="text-center "><{if $sub2.enable}><i class="fas fa-check"></i><{/if}></td>
									<td class="text-center ">
										<{if $stop_level > 2}>
											<a href="?op=op_form&kind=<{$kind}>&ofsn=<{$sub2.sn}>"><i class="fas fa-plus-square"></i></a>
										<{else}>
											<span style="padding-left: 1em;">	
										<{/if}>
										<a href="?op=op_form&kind=<{$kind}>&sn=<{$sub2.sn}>&ofsn=<{$sub2.ofsn}>"><i class="far fa-edit"></i></a>
										<a href="javascript:void(0)" onclick="op_delete('<{$kind}>',<{$sub2.sn}>);"><i class="far fa-trash-alt"></i></a>
									</td>
								</tr>
								
								<!-- 第3層 -->								
								<{if $stop_level > 2}>
									<{foreach $sub2.sub as $sub3}>
										<tr>
											<td><span style="padding-left: 20px;color:red;" >--</span><{$sub3.title}></td>
											<td class=""><{$sub3.url}></td>
											<td class="text-center "><{if $sub3.target}><i class="fas fa-check"></i><{/if}></td>
											<td class="text-center "><{if $sub3.enable}><i class="fas fa-check"></i><{/if}></td>
											<td class="text-center ">
												<{if $stop_level > 3}>
													<a href="?op=op_form&kind=<{$kind}>&ofsn=<{$sub3.sn}>"><i class="fas fa-plus-square"></i></a>
												<{else}>
													<span style="padding-left: 1em;">	
												<{/if}>
												<a href="?op=op_form&kind=<{$kind}>&sn=<{$sub3.sn}>&ofsn=<{$sub3.ofsn}>"><i class="far fa-edit"></i></a>
												<a href="javascript:void(0)" onclick="op_delete('<{$kind}>',<{$sub3.sn}>);"><i class="far fa-trash-alt"></i></a>
											</td>
										</tr> 
											<!-- 第4層 -->							
											<{if $stop_level > 3}>
												<{foreach $sub3.sub as $sub4}>
													<tr>
														<td><span style="padding-left: 30px;color:red;" >---</span><{$sub4.title}></td>
														<td class=""><{$sub4.url}></td>
														<td class="text-center "><{if $sub4.target}><i class="fas fa-check"></i><{/if}></td>
														<td class="text-center "><{if $sub4.enable}><i class="fas fa-check"></i><{/if}></td>
														<td class="text-center ">
															<{if $stop_level > 4}>
																<a href="?op=op_form&kind=<{$kind}>&ofsn=<{$sub4.sn}>"><i class="fas fa-plus-square"></i></a>
															<{else}>
																<span style="padding-left: 1em;">	
															<{/if}>
															<a href="?op=op_form&kind=<{$kind}>&sn=<{$sub4.sn}>&ofsn=<{$sub4.ofsn}>"><i class="far fa-edit"></i></a>
															<a href="javascript:void(0)" onclick="op_delete('<{$kind}>',<{$sub4.sn}>);"><i class="far fa-trash-alt"></i></a>
														</td>
													</tr> 
												<{/foreach}> 
											<{/if}> 
									<{/foreach}>
									<{/if}> 
							<{/foreach}>
						<{/if}>

					<{foreachelse}>
						<tr>
							<td colspan=5>目前沒有資料</td>
						</tr>
					<{/foreach}>

        </tbody>
    </table>
    
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.css">
    <script src="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.js"></script>
    <script>
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
                    document.location.href="menu1.php?op=op_delete&kind=" + kind + "&sn="+sn;
                }
            })
        }
    </script>
<{/if}>

<{if $op=="op_form"}>
    
    <div class="container">        
        <form action="menu1.php" method="post" id="myForm" class="mb-2" enctype="multipart/form-data">
            <!-- 	 						 -->
            <div class="row">         
                <!--標題-->              
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>標題<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="<{$row.title}>" >
                    </div>
                </div>          
                <!--網址-->              
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>網址<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="url" id="url" value="<{$row.url}>" >
                    </div>
                </div>
                <!-- 外連狀態  -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label style="display:block;">外連狀態</label>
                        <input type="radio" name="target" id="target_1" value="1" <{if $row.target=='1'}>checked<{/if}>>
                        <label for="target_1" style="display:inline;">啟用</label>&nbsp;&nbsp;
                        <input type="radio" name="target" id="target_0" value="0" <{if $row.target=='0'}>checked<{/if}>>
                        <label for="target_0" style="display:inline;">停用</label>
                    </div>
                </div>   
                <!--選單狀態  -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label style="display:block;">選單狀態</label>
                        <input type="radio" name="enable" id="enable_1" value="1" <{if $row.enable=='1'}>checked<{/if}>>
                        <label for="enable_1" style="display:inline;">啟用</label>&nbsp;&nbsp;
                        <input type="radio" name="enable" id="enable_0" value="0" <{if $row.enable=='0'}>checked<{/if}>>
                        <label for="enable_0" style="display:inline;">停用</label>
                    </div>
                </div>  
       
                <!--排序-->              
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>排序</label>
                        <input type="text" class="form-control text-right" name="sort" id="sort" value="<{$row.sort}>">
                    </div>
                </div>

                <!-- 父層 -->           
                <div class="col-sm-4">
									<div class="form-group">
										<label>父層</label>
										<select name="ofsn" id="ofsn" class="form-control">
											<!-- 第1層 -->
											<option value="0" <{if $row.ofsn=='0'}>selected<{/if}>>/</option>
											
											<!-- 第2層 -->
											<{foreach $row.ofsn_option as $sub}>
												<option value="<{$sub.sn}>"  <{if $row.ofsn == $sub.sn}>selected<{/if}>>
													&nbsp;&nbsp;&nbsp;&nbsp;-<{$sub.title}>
												</option>

												<!-- 第3層 -->
												<{foreach  $sub.sub as $sub2}>	
													<option value="<{$sub2.sn}>"   <{if $row.ofsn == $sub2.sn}>selected<{/if}>>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--<{$sub2.title}>
													</option>
													
													<!-- 第4層 -->
													<{foreach  $sub2.sub as $sub3}>	
														<option value="<{$sub3.sn}>"   <{if $row.ofsn == $sub3.sn}>selected<{/if}>>
															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---<{$sub3.title}>
														</option>
													<{/foreach}>

												<{/foreach}>												
											<{/foreach}>
										</select>
									</div>
                </div>
            </div>
            
            <div class="text-center pb-20">
            <input type="hidden" name="op" value="<{$row.op}>">
            <input type="hidden" name="sn" value="<{$row.sn}>">
            <input type="hidden" name="kind" value="<{$row.kind}>">
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
                $("#myForm").validate({
                    submitHandler: function(form) {
                        form.submit();
                    },
                    rules: {
                        'title' : {
                            required: true
                        },
                        'url' : {
                            required: true
                        }
                    },
                    messages: {
                        'title' : {
                            required: "必填"
                        },
                        'url' : {
                            required: "必填"
                        }

                    }
                });

            });
        </script>

        <script type='text/javascript' src='<{$xoAppUrl}>class/My97DatePicker/WdatePicker.js'></script>
        
    </div>

<{/if}>