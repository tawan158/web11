<{if $op=="op_list"}>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
        <tr>
            <th scope="col">日期</th>
            <th scope="col">姓名</th>
            <th scope="col">電話</th>
            <th scope="col" >桌號</th>
            <th scope="col" class="text-right">合計</th>
            <th scope="col" class="text-center">功能</th>
        </tr>
        </thead>
        <tbody>
            <{foreach $rows as $row}>
                <tr>
                    <td><{$row.date}></td>
                    <td><{$row.name}></td>
                    <td><{$row.tel}></td>
                    <td><{$row.kind_title}></td>
                    <td class="text-right"><{$row.total}></td>
                    <td class="text-center">
                        <a href="cart.php?op=order_form&sn=<{$row.sn}>"><i class="far fa-edit"></i></a>
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
    <{$bar}>
    
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
                    document.location.href="prod.php?op=op_delete&sn="+sn;
                }
            })
        }
    </script>
<{/if}>
