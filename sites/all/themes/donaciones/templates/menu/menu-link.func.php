<?php
/**
 * @file
 * Stub file for bootstrap_menu_link() and suggestion(s).
 */

/**
 * Returns HTML for a menu link and submenu.
 *
 * @param array $variables
 *   An associative array containing:
 *   - element: Structured array data for a menu link.
 *
 * @return string
 *   The constructed HTML.
 *
 * @see theme_menu_link()
 *
 * @ingroup theme_functions
 */
 
function get_below_menu_donaciones( $menu, $title, $tree ){
	
  foreach ($tree as $branch) {
    if ($branch['link']['title'] == $title) {
      return $branch['below'];
    }
  }
}
 
function bootstrap_menu_link_donaciones(array $variables) {
	
  $menu_andes = menu_link_load( $variables[ "element" ][ "#original_link" ][ "mlid" ] );
	
  $element = $variables['element'];
  $sub_menu = '';

  $title = $element['#title'];
  $href = $element['#href'];
  $options = !empty($element['#localized_options']) ? $element['#localized_options'] : array();
  $attributes = !empty($element['#attributes']) ? $element['#attributes'] : array();

  $tree = menu_tree_all_data( "menu-menu-donaciones-principal" );
  $below = get_below_menu( "menu-menu-donaciones-principal", $element['#title'], $tree );
  
  $menuimage1 = "";
  if( isset( $menu_andes["options"]["content"] ) ){
	  $menuimage = file_load( $menu_andes["options"]["content"]["image"] );
	  $menuimage1 = file_create_url( $menuimage->uri );

	  if( $menuimage1 != "https://wwwdev.uniandes.edu.co/" )
		$menuimage1 = "<div class='image_menu'><div class='linea-blanca'></div><img src='" . $menuimage1 . "' title='" . $title . "' alt='" . $title . "' /><div class='title'>" . $title . "</div></div>";
	  else
		$menuimage1 = "<div class='image_menu'><img src='' /></div>";
	  
  }
  
  if ( !empty( $element['#below']) ) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    elseif ((!empty($element['#original_link']['depth'])) ) {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);

       // print count($element['#below']);
	   
		if( strstr( $title, "de servicios" ) || strstr( $title, "guide" ))
			$sub_menu = $menuimage1 . '<ul class="dropdown-menu">' . drupal_render( $element['#below'] ) . '</ul>';
		else
			$sub_menu = '<ul class="dropdown-menu">' . drupal_render( $element['#below'] ) . '</ul>' . $menuimage1;
		
      // Generate as standard dropdown.
      $title .= ' <span class="caret"></span>';
      $attributes['class'][] = 'dropdown';

      $options['html'] = TRUE;

      // Set dropdown trigger element to # to prevent inadvertant page loading
      // when a submenu link is clicked.
      $options['attributes']['data-target'] = '#';
      $options['attributes']['class'][] = 'dropdown-toggle';
      $options['attributes']['data-toggle'] = 'dropdown';
    }
  }
  
  // Filter the title if the "html" is set, otherwise l() will automatically
  // sanitize using check_plain(), so no need to call that here.
  if (!empty($options['html'])) {
    $title = _bootstrap_filter_xss($title);
  }

  if( $sub_menu != "" ){
	$attributes['class'][] = 'submenu';
  }
	
	$href_final = $href;
	
	if( strstr( $href, "node" ) && strstr( $href, "?" ) && false ){
		
		$href_tmp = explode( "?", $href );
		$href_tmp = drupal_get_path_alias( $href_tmp[0] );
		
		echo $href1;
		
		echo $href_final = drupal_get_path_alias( 'node/' . $href1 );
		exit( );
		
	}
	
}

/**
 * Overrides theme_menu_link() for book module.
 */
function bootstrap_menu_link__book_toc_donaciones(array $variables) {
  $element = $variables['element'];
  $sub_menu = drupal_render($element['#below']);

  $title = $element['#title'];
  $href = $element['#href'];
  $options = !empty($element['#localized_options']) ? $element['#localized_options'] : array();
  $attributes = !empty($element['#attributes']) ? $element['#attributes'] : array();
  $attributes['role'] = 'presentation';

  // Header.
  $link = TRUE;
  if ($title && $href === FALSE) {
    $attributes['class'][] = 'dropdown-header';
    $link = FALSE;
  }
  // Divider.
  elseif ($title === FALSE && $href === FALSE) {
    $attributes['class'][] = 'divider';
    $link = FALSE;
  }
  // Active.
  elseif (($href == $_GET['q'] || ($href == '<front>' && drupal_is_front_page())) && (empty($options['language']))) {
    $attributes['class'][] = 'active';
  }

  // Filter the title if the "html" is set, otherwise l() will automatically
  // sanitize using check_plain(), so no need to call that here.
  if (!empty($options['html'])) {
    $title = _bootstrap_filter_xss($title);
  }

  // Convert to a link.
  if ($link) {
    $title = l($title, $href, $options);
  }
  
}
