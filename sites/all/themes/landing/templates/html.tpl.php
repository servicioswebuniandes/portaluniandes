<?php


$alias = current_path();
$alias = str_replace( "node/", "", $alias );

$node = node_load( $alias );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces;?>>
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="icon" href="/misc/favicon.ico" type="image/x-icon">

	<?php if( isset( $node->field_titulo_template[ "und" ][0] ) ){ ?>
		<title><?php echo $node->field_titulo_template[ "und" ][0][ "value" ]; ?></title>
	<?php }else{ ?>
		<title><?php print $head_title; ?></title>
	<?php } ?>
		
	<?php
	
		foreach( $node->field_css[ "und" ] as $css ){
			?><link type="text/css" rel="stylesheet" href="<?php echo $css[ "value" ] ?>" media="all" />
			<?php
		}

		foreach( $node->field_js[ "und" ] as $css ){
			?><script type="text/javascript" src="<?php echo $css[ "value" ] ?>"></script>
			<?php
		}

	?>

</head>

<body>

	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MQCWGN"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MQCWGN');</script>

    <?php echo $node->body[ "und" ][0][ "value" ]; ?>

</body>
</html>
