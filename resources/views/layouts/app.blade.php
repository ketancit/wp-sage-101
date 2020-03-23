<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="wrap container" role="document">
        <div class="row">
          @if (wp_sage_101_get_page_layout() === 'left-sidebar')
              <div class="col-md-4">
                <div class="sidebar-main">
                    @include('partials.sidebar')
                </div>
              </div>
          @endif

          <div id="primary" class="content @php wp_sage_101_body_class() @endphp">
            <main class="main">
              @yield('content')
            </main>
            @if (App\display_sidebar())
              <aside class="sidebar">
                @include('partials.sidebar')
              </aside>
            @endif
          </div>

          @if (wp_sage_101_get_page_layout() === 'right-sidebar')
              <div class="col-md-4">
                <div class="sidebar-main">
                    @include('partials.sidebar')
                </div>
              </div>
          @endif
        </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
