
<{if $op == "op_list"}>
  <!-- Page Content -->
  <div class="container" style="margin-top: 110px;">

    <!-- Page Heading -->
    <h1 class="my-4">
      餐點訂購
    </h1>

    <div class="row">
      <{foreach $rows as $row}>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="<{$row.prod}>" alt="<{$row.title}>">
            <div class="card-body">
              <div class="card-title">
                <{$row.title}>： <{$row.price}> 元
              </div>
              <div class="mt-2">
                <a href="#" class="btn btn-primary btn-sm" onclick="add_cart(<{$row.sn}>);">加入購物車</a>
              </div>
            </div>
          </div>
        </div>

      <{/foreach}>      
    </div>
    <!-- /.row -->
    <{$bar}>

  </div>
  <!-- /.container -->
  
  <!-- sweetalert2 -->
  <link rel="stylesheet" href="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.css">
  <script src="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.js"></script>
  <script>
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
</script>
<{elseif  $op == "Portfolio"}>
<{/if}>