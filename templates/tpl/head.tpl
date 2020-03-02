
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" style="">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php#page-top"><{$WEB.web_title}></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <{foreach $mainMenus as $mainMenu}>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<{$mainMenu.url}>" <{if $mainMenu.target == 1}>target="_blank" <{/if}> ><{$mainMenu.title}></a>
            </li>
          <{/foreach}>


          <{if $smarty.session.user.kind === 1}>
            <{* 管理員   *}>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="user.php">後台</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?op=logout">登出</a>
            </li>
          <{elseif $smarty.session.user.kind === 0}> 
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?op=logout">登出</a>
            </li> 
          <{else}>
            <{* 未登入  *}>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php?op=login_form">登入</a>
            </li>
            
          <{/if}>

        </ul>
      </div>
    </div>
  </nav>
