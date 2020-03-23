<header class="header">
    <a href="<?php echo home_url(); ?>" class="logo">
      @if (!has_custom_logo()) 
        @php echo get_bloginfo('name'); @endphp
      @else 
      @php echo get_custom_logo(); @endphp
      @endif
    </a>

    <div class="header-right">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </div>
</header>	