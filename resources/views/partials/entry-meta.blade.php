<div class="entry-meta">
  <span class="comments-link">
      <a href="#"> @php echo wp_count_comments()->approved.(' Comment(s)') @endphp </a>
  </span>
  /
  <span class="cat-links">
      <!-- <a href="#">  -->
        @php $categoryList = get_the_category_list(__( ', ', 'wp-sage-101' )) @endphp
        @if (!empty($categoryList))
          @php echo  $categoryList @endphp
          /
        @endif 
      <!-- </a> -->
  </span>
  <span class="posted-by vcard author">
      <a href="@php echo get_author_posts_url(get_the_author_meta('ID')) @endphp"> 
        @php echo __('By ').get_the_author() @endphp 
      </a>
  </span>
</div>