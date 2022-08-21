
<!DOCTYPE html>
<html lang="en">
  <head>
    @include ('backend.inc.header')
    @include ('backend.inc.css')
  </head>

  <body>
    @include ('backend.inc.preloader')
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
    
    @include ('backend.inc.leftmenu')

    </div

    

</div>
@include ('backend.inc.topbar')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="page-wrapper">
      @yield('body-content')
      
      @include('backend.inc.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    @include('backend.inc.script')
  </body>
</html>
