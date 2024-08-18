<!DOCTYPE html>
<html>
    @include('front.layouts.partials._meta')
<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('front.layouts.base._header')
     <!-- end header section -->
      @yield('home')
      @yield('application')
  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
    </p>
  </footer>
    @include('front.layouts.partials._script')
</body>
</html>