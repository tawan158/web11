
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
                <a href="#" class="btn btn-primary btn-sm">加入購物車</a>
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
<{elseif  $op == "Portfolio"}>
<{/if}>