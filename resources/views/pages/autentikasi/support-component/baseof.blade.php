<!doctype html>
<html lang="en" class="dark">
  <head>
    @include('pages.autentikasi.support-component.header')
  </head>
  @php
    $whiteBg = isset($params['white_bg']) && $params['white_bg'];
  @endphp

<body class="{{ $whiteBg ? 'bg-white dark:bg-gray-900' : 'bg-gray-50 dark:bg-gray-800' }}">

  @yield('main')
  @include('pages.autentikasi.support-component.scripts')
</body>
</html>
