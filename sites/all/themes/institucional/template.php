<?php
/**
 * @file
 * The primary PHP file for the Drupal Bootstrap base theme.
 *
 * This file should only contain light helper functions and point to stubs in
 * other files containing more complex functions.
 *
 * The stubs should point to files within the `./includes` folder named after
 * the function itself minus the theme prefix. If the stub contains a group of
 * functions, then please organize them so they are related in some way and name
 * the file appropriately to at least hint at what it contains.
 *
 * All [pre]process functions, theme functions and template files lives inside
 * the `./templates` folder. This is a highly automated and complex system
 * designed to only load the necessary files when a given theme hook is invoked.
 *
 * Visit this project's official documentation site, http://drupal-bootstrap.org
 * or the markdown files inside the `./docs` folder.
 *
 * @see _bootstrap_theme()
 */

/**
 * Include common functions used through out theme.
 */
include_once dirname(__FILE__) . '/includes/common.inc';

/**
 * Include any deprecated functions.
 */
bootstrap_include('bootstrap', 'includes/deprecated.inc');

/**
 * Implements hook_theme().
 *
 * Register theme hook implementations.
 *
 * The implementations declared by this hook have two purposes: either they
 * specify how a particular render array is to be rendered as HTML (this is
 * usually the case if the theme function is assigned to the render array's
 * #theme property), or they return the HTML that should be returned by an
 * invocation of theme().
 *
 * @see _bootstrap_theme()
 */
function institucional_theme(&$existing, $type, $theme, $path) {
  bootstrap_include($theme, 'includes/registry.inc');
  return _bootstrap_theme($existing, $type, $theme, $path);
}

function get_below_menu( $menu, $title, $tree ){
	
  foreach ($tree as $branch) {
    if ($branch['link']['title'] == $title) {
      return $branch['below'];
    }
  }
  return array();
	
}

function institucional_menu_link(array $variables) {
	
  $menu_andes = menu_link_load( $variables[ "element" ][ "#original_link" ][ "mlid" ] );
	
  $element = $variables['element'];
  $sub_menu = '';

  $title = $element['#title'];
  $href = $element['#href'];
  $options = !empty($element['#localized_options']) ? $element['#localized_options'] : array();
  $attributes = !empty($element['#attributes']) ? $element['#attributes'] : array();

  $tree = menu_tree_all_data( "menu-menu-uniandes-principal" );
  $below = get_below_menu( "menu-menu-uniandes-principal", $element['#title'], $tree );
  
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
	
  return '<li' . drupal_attributes($attributes) . '>' . l($title, $href_final, $options) . "<div class='sub_menu dropdown-menu'><div class='container'><div class='box-black'><p>" . $title . "</p></div>" . $sub_menu . "</div></div></li>\n";
}

/**
 * Clear any previously set element_info() static cache.
 *
 * If element_info() was invoked before the theme was fully initialized, this
 * can cause the theme's alter hook to not be invoked.
 *
 * @see https://www.drupal.org/node/2351731
 */
drupal_static_reset('element_info');

/**
 * Declare various hook_*_alter() hooks.
 *
 * hook_*_alter() implementations must live (via include) inside this file so
 * they are properly detected when drupal_alter() is invoked.
 */
bootstrap_include('bootstrap', 'includes/alter.inc');
