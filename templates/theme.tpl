<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><{$WEB.web_title}></title>

  <!-- Font Awesome Icons -->
  <link href="<{$xoImgUrl}>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="<{$xoImgUrl}>vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="<{$xoImgUrl}>css/creative.css" rel="stylesheet">
  
  <{* head_js.tpl *}>
  <{include file="tpl/head_js.tpl"}>
</head>

<body id="page-top">
  <{* 轉向樣板 *}>
  <{include file="tpl/redirect.tpl"}>

  <{* head.tpl *}>
  <{include file="tpl/head.tpl"}>


  <{if $WEB.file_name == "index.php"}>
    <{include file="tpl/index.tpl"}>
  <{elseif  $WEB.file_name == "cart.php"}>
    <{include file="tpl/cart.tpl"}>
  <{/if}>
  



  <{* footer.tpl *}>
  <{include file="tpl/footer.tpl"}>

  
  <!-- Custom scripts for this template -->
  <script src="<{$xoImgUrl}>js/creative.min.js"></script>
</body>

</html>
