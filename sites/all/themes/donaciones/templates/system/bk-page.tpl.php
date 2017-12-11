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

$var=strpos($request, ".pdf");

if ($var === false) {
} else {
	$request=str_replace("/es/", "/", $request);
	header("location: ".$request);

}

$lang_name = $language->language ;
drupal_add_js(array('swflang' => $lang_name ), 'setting');



$btn_donar=strpos(drupal_get_path_alias(), "/donar");

if ($btn_donar === false) {
	?>
	<section class="btn-fixed">
		<a href="/donaciones/donar/hacer-la-donacion">
			<p class="title">Donar A</p>
			<figure class="campaing">
				<img src="/sites/default/files/log-QE.png" alt="logo-Quiero-Estudiar">
			</figure>
		</a>
	</section>

	<?php

} 
?>


<?php 
$contacto_sf=strpos($_SERVER['REQUEST_URI'], "donaciones/contacto");

if ($contacto_sf !== false) {
	?>

	<script>
		jQuery( document ).ready(function() {
			jQuery("#alert-form").click();
		});
	</script>

	<button type="button" id="alert-form" class="btn btn-primary" data-toggle="modal" data-target=".alert-contact-form" hidden>Enviar</button>


	<div class="modal fade alert-contact-form" tabindex="-1" role="dialog" aria-labelledby="modalAlert">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>

				<div class="modal-body">
					<h2>Gracias</h2>
					<p>Hemos recibido tus datos. Nos contactaremos contigo pronto.</p>
				</div>
			</div>
		</div>
	</div>

	<?php 
}
?>



<div class="container-fluid principal-1 btn-volver">
	<div class="container">
		<div class="row">
			<div class='menu-soy volver-sitio'>

				<!-- Aqui va el menu soy -->
				<?php
				if($node->type=="campanas_donaciones"){
					$block = module_invoke('menu', 'block_view', 'menu-menu-top-campa-as');
					print render($block['content']);

				}else{

					$block = module_invoke('menu', 'block_view', 'menu-menu-top-donaciones');
					print render($block['content']);
				}
				?>
				<!-- Aqui va el modulo idioma -->


			</div>
		</div>
	</div>
</div>


<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/donaciones"><img src="http://uniandes.ariadna.co/sites/all/themes/donaciones/img/logo-andes.svg"></a>
		</div>

		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">

				<?php 				
				$tree = menu_load_links('menu-menu-donaciones-principal');
				$plid=$tree[0]['mlid'];

				foreach ($tree as $menu ) {
					$plid_master=0000;
					if ($menu['plid']==0){
						$hijos=false;
						foreach ($tree as $menu2 ) {
							if ($menu['mlid']==$menu2['plid']){
								$hijos=true;
							}
									$current=$_SERVER['REQUEST_URI'];
									$path_e=explode("/", $current);																
									$interna=end($path_e);
									if($interna!="donaciones"){

									$existe=strpos($menu2['link_path'], $interna);
									
									//print $menu['link_path'];
									//print $_SERVER['REQUEST_URI'];
									
									$host= $_SERVER["HTTP_HOST"];
									$url= $_SERVER["REQUEST_URI"];
									$url="https://" . $host . $url;

									if ($existe!== false){
										$plid_master=$menu2['plid'];									
									}
								}

								
						}
						?>

						<li class="dropdown">
							<a href="<?php print $menu['link_path']?>" <?php if($hijos){?> class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"  <?php } ?> ><?php print $menu['link_title'] ?> <?php if($hijos){?><span class="caret"></span><?php }?></a>
							
							<?php if($hijos){?><span class="icon-mobile"></span><?php }?>
							
							<ul class="dropdown-menu">
								<?php 
								foreach ($tree as $menu2 ) {																		
									
									if ( ($plid_master == $menu2['plid']|| $url==$menu['link_path'] ) && $menu2['options']['attributes']['target']!="_blank"){
										$exp=explode("/", $menu2['link_path']);
										$accion="    onclick=actualizarUrl('".end($exp)."')       ";
										$menu2['link_path']="#";																
									}else{
										$accion="";
									}
									if ($menu['mlid']==$menu2['plid']){
										?>
										<li><a <?php print $accion ?>  target="<?php print $menu2['options']['attributes']['target'] ?>" href="<?php print $menu2['link_path'] ?>"><?php print $menu2['link_title']?></a></li>
										<?php
									}
								}

								?>


								<label class="icon-close"for=""></label>

							</ul>

						</li>

						<?php


					}

				}
				
				?>
				<div class="search-form">
					<input type="submit" id="btnBuscadorMobile" value="">
				</div>

				<ul class="nav navbar-nav navbar-right">
					<li><a href="/">Volver al sitio institucional</a></li>
				</ul>
			</div><!-- nav-collapse -->
		</div><!-- container-fluid -->
		<div class="container-search">
			<form action="/donaciones/buscador/" id="buscadorMobile" method="post" class="container">
				<input id="parametro_mob" placeholder="Buscar..." type="text">
				<input type="submit" id="btnBuscadorMobile" value="">
			</form>
		</div>
		
	</nav> <!-- navbar-default -->




	<div class="main-container
	<?php // print $container_class; ?>">

	<!-- /#page-header -->

	<div class="row">
		

		<section
		<?php print $content_column_class; ?>>
		<?php if (!empty($page['highlighted'])): ?>
			
			<?php print render($page['highlighted']); ?>
			
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
<?php 


if (!empty($page['footer'])): ?>

<?php print render($page['footer']); ?>
<?php endif; ?>

<script type="text/javascript">
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '1168998773196224',
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