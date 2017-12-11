<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
global $language ;
global $user;


$request= $_SERVER['REQUEST_URI'];

if ($language->language=="es") {
	if($request!="/es"){

	$buscar_idioma=strpos($request, "/es/");
	if ($buscar_idioma===false) {
		$url = "/es".$request;
        header("Location:$url");
        header("HTTP/1.1 301 Moved Permanently");
	}
	}
}
$var=strpos($request, ".pdf");

if ($var === false) {
} else {
    $request=str_replace("/es/", "/", $request);
    header("location: ".$request);

}
//die();
$lang_name = $language->language ;
drupal_add_js(array('swflang' => $lang_name ), 'setting');

?>
<header id="navbar" role="banner" class="navbar navbar-default">

<!-- EMPIEZA EL MENU MOBILE -->

<div class="container-menu-mobile">

	<div class='header-mobile'>

		<?php if ($logo): ?>
		<a class="logo navbar-btn pull-left" href="/<?php print $language->language?>" title="
		<?php print t('Home'); ?>">
			<img class="logo-mobile" src="/sites/default/files/logo-mobile.png" title="Logo" alt="
			<?php print t('Home'); ?>" />
		</a>
		<?php endif; ?>

		<div class="icon-menu">
			<img src="/sites/default/files/icon-menu-mobile.png" alt="Menu" title="Menu">
		</div>

	</div>

	<div class="menu-mobile">

		<div class="menu-mobile-contenido">
			<?php

			function showMenuItems( $menu, $level ){

			?><p><a href=""><?php echo $menu[ "link" ][ "link_title" ] ?></a></p>
			<ul class="menu-principal">
				<?php foreach( $menu[ "below" ] as $key => $sibItem ){

					$options = array( );

					?><li><?php echo l($sibItem[ "link" ][ "link_title" ], $sibItem[ "link" ][ "href" ], $options) ?></li><?php

				} ?>
			</ul>
			<?php

			if( isset( $menu[ "below" ] ) && $menu[ "below" ] )
				showMenuItems( $menu[ "below" ], $level+1 );
			}
			?>

			<!-- <div class='header-mobile'>
				<img src="" class='logo-mobile'>
				<img src="" class='icon-menu'>
			</div> -->

			<div class="menu-mobile"><?php

			$menu_mobile = menu_build_tree( "menu-menu-uniandes-principal" );
			foreach( $menu_mobile as $menu ){
				//showMenuItems( $menu, 0 );
			}

			?></div>

			<div class="separador-menu"></div>
			
			<?php
			if($lang_name=="es"){
				$url_buscador=url( 'resultados', array('alias' => TRUE));// $base_url."resultados";
			}else{
				$url_buscador=url( 'results', array('alias' => TRUE));//$base_url."results";
			}
			?>

			<form action="<?php print $url_buscador?>" id="buscadorMobile" method="post">
				<input id="parametro_mob" placeholder="<?php print t('Search'); ?>..." type="text">
				<input type="submit" id="btnBuscadorMobile" value="">
			</form>

		 	<ul class='guia-mobile' id='guia-mobile'>

		 	</ul>
		 	<!-- <a class='guia-mobile'>Guía de servicios <span></span></a> -->

		 	<div class="idioma">
		  		<span><?php print t("Language")?></span>
				<select id="selector-idioma">
					<option value="/es">Español</option>
					<option value="/en">English</option>
				</select>
			</div>

		 	<div class="menu-soy" id="menu-soy">
		  		<span><?php print t("I am:"); ?></span>
		  		<select>
		   			<option><?php print t("Choose") ?></option>
		  		</select>
		 	</div>

		 	<ul class='menu-mobile-footer' id='menu-mobile-footer'>

		 	</ul>
		</div>

	</div>

</div>

<!-- ACABA EL MENU MOBILE -->


	<div class='container-fluid'>
		<div class="navbar-header">
			<?php if (!empty($site_name)): ?>
			<!-- a class="name navbar-brand" href="
			<?php print $front_page; ?>" title="
			<?php print t('Home'); ?>">
			<?php print $site_name; ?></a -->
			<?php endif; ?>
			<?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="sr-only">
					<?php print t('Toggle navigation'); ?>
				</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php endif; ?>
		</div>
		<!-- Todo esto debe quedar dentro de la etiqueta header -->
		<div class="container-fluid principal-1">
			<div class="container">
				<div class="row">
					<div class='menu-soy'>
						<span class="menu_soy"><?php print t("I am:"); ?></span>
						<!-- Aqui va el menu soy -->
						<?php

							$block = module_invoke('menu', 'block_view', 'menu-menu-top-soy');
							print render($block['content']);

						?>
						<!-- Aqui va el modulo idioma -->

						<div class="styled-select">
						<p class='idioma-select'>Esp</p>
							<ul class="select-language" id="select-idioma">
								<li data-leng='Esp' data-url="/es" class="active">Español</li>
								<li data-leng='Eng' data-url="/en">English</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid principal-2">
			<div class="container">
				<div class="row">
					<div class='col-xs-6 col-md-2'>
						<!-- Aqui va el logo -->
						<?php if ($logo): ?>
						<a class="logo navbar-btn pull-left" href="/<?php print $language->language?>" title="
							<?php print t('Home'); ?>">
							<img title='Logo Uniandes' src="
								<?php print $logo; ?>" alt="
								<?php print t('Home'); ?>" />
							</a>
							<?php endif; ?>
						</div>
						<div class='col-xs-6 col-md-10'>
							<div class="menu-ppal">
								<!-- Aqui va el menu principal -->
								<?php
									$block = module_invoke('menu', 'block_view', 'menu-menu-uniandes-principal');
									print render($block['content']);
								?>
								<!-- Aqui va el buscador -->
								<div class="search-bar">
									<img alt='Buscador' title='Buscador' class='search-bar-lupa' src="/sites/default/files/icon-lupa.png" />
									<img alt='Buscador' title='Buscador' class='search-bar-cerrar' src="/sites/default/files/icon-cerrar.png" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid principal-3" >
				<?php
				if($lang_name=="es"){
					$url_buscador=url( 'resultados', array('alias' => TRUE));// $base_url."resultados";
				}else{
					$url_buscador=url( 'results', array('alias' => TRUE));//$base_url."results";
				}
				?>
				<div class="container">
					<form action="<?php print $url_buscador?>" id="buscadorDesktop" method="post">
						<input type="text" id="parametro" placeholder="<?php print t('Search'); ?>" />
						<img alt='Buscador' title='Buscador' class='icon-lupa-search' src="/sites/default/files/icon-lupa-search.png" />
					</form>
				</div>
				<div>
					<?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
					<div class="navbar-collapse collapse" id="navbar-collapse">
						<nav role="navigation">
							<?php if (!empty($primary_nav)): ?>
							<?php print render($primary_nav); ?>
							<?php endif; ?>
							<?php if (!empty($secondary_nav)): ?>
							<?php print render($secondary_nav); ?>
							<?php endif; ?>
							<?php if (!empty($page['navigation'])): ?>
							<?php print render($page['navigation']); ?>
							<?php endif; ?>
						</nav>
					</div>
					<?php endif; ?>
				</div>
			</header>
			<div class="main-container
				<?php // print $container_class; ?>">
				<header role="banner" id="page-header">
					<?php if (!empty($site_slogan)): ?>
					<p class="lead">
						<?php print $site_slogan; ?>
					</p>
					<?php endif; ?>
					<?php print render($page['header']); ?>
				</header>
				<!-- /#page-header -->
				<div class="row">
					<?php if (!empty($page['sidebar_first'])): ?>
					<aside class="col-sm-3" role="complementary">
						<?php print render($page['sidebar_first']); ?>
					</aside>
					<!-- /#sidebar-first -->
					<?php endif; ?>
					<section
						<?php print $content_column_class; ?>>
						<?php if (!empty($page['highlighted'])): ?>
						<div class="highlighted jumbotron">
							<?php print render($page['highlighted']); ?>
						</div>
						<?php endif; ?>
						<?php
				if (!empty($breadcrumb)){
					$GLOBALS["breadcrumb"] = $breadcrumb;
				}
				//if (!empty($breadcrumb)): print $breadcrumb; endif;
			?>
			<?php 

			
			if(current_path()=="node"){
			if($user->roles[1]!="anonymous user"){
				  $result = db_select('users_roles', 'u')->fields('u', array(
    'uid'
))
->condition('uid', $user->uid, '=')
->execute();

if($result->fetchAssoc()==false){
	?>
	<div class="alert alert-block alert-success messages status">
  <a class="close" data-dismiss="alert" href="#">×</a>
<h4 class="element-invisible">Mensaje de estado</h4>
Su usuario se ha registrado, en espera que un administrador le asigne un rol
</div>

	<?php
}






			}
}
			

			?>

						<a id="main-content"></a>
						<?php print render($title_prefix); ?>
						<?php if ( $is_front ): ?>
						<h1 class="page-header">
							<?php print t('Home') . " - " . $site_name; ?>
						</h1>
						<?php endif; ?>
						<?php print render($title_suffix); ?>
						<?php print $messages; ?>
						<?php if (!empty($tabs)): ?>
						<?php print render($tabs); ?>
						<?php endif; ?>
						<?php if (!empty($page['help'])): ?>
						<?php print render($page['help']); ?>
						<?php endif; ?>
						<?php if (!empty($action_links)): ?>
						<ul class="action-links">
							<?php print render($action_links); ?>
						</ul>
						<?php endif; ?>
						<?php print render($page['content']); ?>
					</section>
					<?php if (!empty($page['sidebar_second'])): ?>
					<aside class="col-sm-3" role="complementary">
						<?php print render($page['sidebar_second']); ?>
					</aside>
					<!-- /#sidebar-second -->
					<?php endif; ?>
				</div>
			</div>
			<?php if (!empty($page['footer'])): ?>
			<footer class="footer container-fluid">
				<?php print render($page['footer']); ?>
			</footer>
			<?php endif; ?>
<script type="text/javascript">
	jQuery(document).ready(function() {


		var valor = "/"+Drupal.settings.swflang;

		var options = jQuery('#selector-idioma option');
		for(var i = 0; i < options.length; i++){
			var option = options[i];

			if(jQuery(option).val() == valor){
				jQuery(option).prop('selected', true);
			}
		}

		jQuery("#buscadorMobile").bind("submit", function(){
			var valor =htmlEntities(jQuery('#parametro_mob').val());
			jQuery( this ).attr( "action", jQuery( this ).attr( "action") + "?query=" + valor )

		} );
		
		jQuery("#buscadorDesktop").bind("submit", function(){
			var valor =htmlEntities(jQuery('#parametro').val());
			jQuery( this ).attr( "action", jQuery( this ).attr( "action") + "?query=" + valor )

		} );

		jQuery('#selector-idioma').change(function() {
			location.href = jQuery(this).val();

		});



	});
</script>
<script type="text/javascript">
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '519214971614607',
			xfbml      : true,
			version    : 'v2.3'
		});
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/es_LA/all.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript">
	jQuery(document).ready(function() {

		jQuery( "#btn_share_fb" ).click(function(e) {
			//alert( "Facebook." );
			e.preventDefault();
			var img = jQuery('#img_desktop').attr('src');
			//alert(img);
			FB.ui(
				{
					method: 'feed',
					name: jQuery( "#title" ).text(),
					link: document.URL,
					picture: img,
					caption: jQuery( "#caption" ).text(),
					description: jQuery( "#description" ).text(),
					message: ""
				});

		});
		jQuery( "#btn_share_tw" ).click(function(e) {
			//alert( "twitter." );
			e.preventDefault();
			window.open("https://twitter.com/share?url="+encodeURIComponent(document.URL));
			//alert(url)
		});
		jQuery( "#btn_share_lk" ).click(function(e) {
			//alert( "linkedin." );
			e.preventDefault();
			window.open("https://www.linkedin.com/cws/share?url="+encodeURIComponent(document.URL));
		});

		jQuery( "#btn_share_fb_not" ).click(function(e) {
			//alert( "Facebook." );
			e.preventDefault();
			FB.ui(
				{
					method: 'feed',
					name: jQuery( "#title" ).text(),
					link: document.URL,
					picture: jQuery( "#img_desktop" ).attr( "src" ),
					caption: jQuery( "#caption" ).text(),
					description: jQuery( "#description" ).text(),
					message: ""
				});

		});
		jQuery( "#btn_share_tw_not" ).click(function(e) {
			//alert( "twitter." );
			e.preventDefault();
			window.open("https://twitter.com/share?url="+encodeURIComponent(document.URL));
			//alert(url)
		});
		jQuery( "#btn_share_lk_not" ).click(function(e) {
			//alert( "linkedin." );
			e.preventDefault();
			window.open("https://www.linkedin.com/cws/share?url="+encodeURIComponent(document.URL));
		});
	});
</script>
