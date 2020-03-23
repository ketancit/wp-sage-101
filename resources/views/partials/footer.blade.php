<footer class="content-info">
  <div class="container">
    @php dynamic_sidebar('sidebar-footer') @endphp
  </div>

  <div class="footer">
    <p>
      @php 
        $cpyRights = get_option('theme_mods_wp-sage-101/resources', true);

        
        if (!isset($cpyRights['sage_101_footer_txt']) || empty($cpyRights['sage_101_footer_txt'])) {
          $cpyRights = __('Copyright 2020 | Powered by Lorem ipsum, or lipsum as it is sometimes known.', '');
        } else {
          $cpyRights = $cpyRights['sage_101_footer_txt'];
        }
        echo $cpyRights;
      @endphp 
    </p>
</div>
</footer>
