<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v3.2.0
* @link https://coreui.io
* Copyright (c) 2020 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">
  <head>
    <base href="/./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/coreui/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/coreui/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/coreui/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/coreui/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/coreui/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/coreui/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/coreui/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/coreui/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/coreui/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/coreui/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/coreui/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/coreui/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/coreui/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/coreui/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
    <link href="/coreui/css/style.css" rel="stylesheet">
    <!--<link href="/coreui/vendors/@coreui/icons/css/free.min.css" rel="stylesheet">-->

    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-85460825-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-85460825-1');
      gtag('set', {'user_id': 'USER_ID'});
    </script>
    <link href="/coreui/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
  </head>
  <body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
      <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="/coreui/assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
          <use xlink:href="/coreui/assets/brand/coreui.svg#signet"></use>
        </svg>
      </div>
      <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('/') }}">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard<span class="badge badge-info">NEW</span></a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('bookmark') }}">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-bookmark"></use>
            </svg> ブックマーク</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('playhistory') }}">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-yen"></use>
            </svg> ゲーセン</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('product') }}">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-gift"></use>
            </svg> ゲーセンの景品</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('book') }}">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-book"></use>
            </svg> 本</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('card') }}">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
            </svg> 艦娘カード</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ url('kancolle') }}">
            <svg class="c-sidebar-nav-icon">
              <use xlink:href="/coreui/vendors/@coreui/icons/svg/free.svg#cil-library"></use>
            </svg> 艦娘</a></li>
      </ul>
      <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>
    @yield('content')
  </body>
</html>
