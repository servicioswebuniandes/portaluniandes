<?php 

$menu = menu_tree_all_data( "menu-menu-donaciones-principal" );

?>
<div class="miga-de-pan">
<h2 class="element-invisible">Usted está aquí</h2>
<div class="breadcrumb container contextual-links-region">
<span class="inline odd first">
<a href="/donaciones/">Home</a>
</span> 
<span class="delimiter">/</span> 
<span class="inline even last"><a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php print $node->title?></a></span>



</div>		

</div>


	<div class=" mapsite container">
			<h1 class="title-cause">MAPA DE SITIO</h1>

		<?php 

		foreach( $menu as $item ){ 

				$child = $item[ "link" ];
			?>
					<article class="item-mapsite">
					<h1><?php echo l( $child[ "link_title" ], $child[ "href" ] ) ?></a></h1>
					<ul>
					<?php foreach( $item[ "below" ] as $child ){ 
							$child = $child[ "link" ];

						?>
	  				
						<li><?php echo l( $child[ "link_title" ], $child[ "href" ] ) ?></li>
					
				<?php } ?>
				</ul>
					</article>

		<?php } ?>



		<?php 

		$view = views_get_view('mapa_donaciones');
		$view->set_display("block_1");
		$view->pre_execute();
		$view->execute();
		$resultados=$view->result;
		?>
		<article class="item-mapsite">
		<h1><?php echo l( "Causas", "/donaciones/causas" ) ?></a></h1>
		<ul>
		<?php 
		foreach ($resultados as $causa) {
			?>


		<li><?php echo l( $causa->node_title, url( 'node/' . $causa->nid, array('absolute'=>true)) ) ?></li>





			<?php
		}



		?>
		</ul>
		</article>


		<?php 

		$view = views_get_view('mapa_donaciones');
		$view->set_display("block_2");
		$view->pre_execute();
		$view->execute();
		$resultados=$view->result;
		?>
		<article class="item-mapsite">
		<h1><?php echo l( "Donantes", "/donaciones/donantes" ) ?></a></h1>
		<ul>
		<?php 
		foreach ($resultados as $causa) {
			?>


		<li><?php echo l( $causa->node_title, url( 'node/' . $causa->nid, array('absolute'=>true)) ) ?></li>





			<?php
		}



		?>
		</ul>
		</article>

		<?php 

		$view = views_get_view('mapa_donaciones');
		$view->set_display("block_3");
		$view->pre_execute();
		$view->execute();
		$resultados=$view->result;
		?>
		<article class="item-mapsite">
		<h1><?php echo l( "Beneficiarios", "/donaciones/beneficiarios" ) ?></a></h1>
		<ul>
		<?php 
		foreach ($resultados as $causa) {
			?>


		<li><?php echo l( $causa->node_title, url( 'node/' . $causa->nid, array('absolute'=>true)) ) ?></li>





			<?php
		}



		?>
		</ul>
		</article>


		<?php 

		$view = views_get_view('mapa_donaciones');
		$view->set_display("block_4");
		$view->pre_execute();
		$view->execute();
		$resultados=$view->result;
		?>
		<article class="item-mapsite">
		<h1><?php echo l( "Historias Increíbles", "donaciones/historias-increibles" ) ?></a></h1>
		<ul>
		<?php 
		foreach ($resultados as $causa) {
			?>


		<li><?php echo l( $causa->node_title, url( 'node/' . $causa->nid, array('absolute'=>true)) ) ?></li>





			<?php
		}



		?>
		</ul>
		</article>

			
			
		
	</div>
	
	