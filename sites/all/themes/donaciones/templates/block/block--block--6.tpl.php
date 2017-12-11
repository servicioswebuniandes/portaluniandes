</section>
<footer>
	<div class="container">
		<article class="item-footer contact-info">
			<div class="logos">
				<figure class="logo-andes">
					<img src="/sites/all/themes/donaciones/img/logo-andes.svg" alt="Universidad de los Andes - Logo">
				</figure>
				<figure class="logo-facultad">
				<?php 
				global $language;
				if ($language->language=="es") {
					$logo_facultad="/sites/all/themes/donaciones/img/logo-facultad-es.svg";
				}else{
					$logo_facultad="/sites/all/themes/donaciones/img/logo-facultad-en.svg";
				}

				?>
					<img src="<?php print $logo_facultad ?>" alt="logo_facultad" title="Logo_facultad">
				</figure>
			</div>

			<div class="item-footer-x2">
				<div class="info-location">
					<p>Calle 18A # 0-33</p>
					<p>Edificio E, Piso 2</p>						
					<p>Bogotá - Colombia</p>
					<p><?php
						$english=t('Postal code', array(), array('langcode' => 'en'));
						$spanish= t('Postal code', array(), array('langcode' => 'es'));
						$idioma=$language->language;

						if ($idioma=="es") {
							if($english==$spanish){
								print "Código postal";
							}else{
								print $spanish;
							}
						}else{
							print $english;
						}

						?>: 111711</p>
					</div>

					<div class="info-contact">
						<div class="txt-telephone">
							<p><a href="tel:+5713324170"><span>+</span>(571) 332 41 70</a></p>
							<p><a href="tel:+5713394949"><span>+</span>(571) 339 49 49</a></p>
							<p><span>Ext. </span>4884 / 3533</p>
							<p><a href="mailto:filantropia@uniandes.edu.co" target="_top">filantropia@uniandes.edu.co</a></p>
						</div>
					</div>
				</div>
			</article>

			<article class="item-footer quick-links">
				<div class="item-footer-x2">

					<?php 
					
					if ($language->language=="es") {
						$menu = menu_tree_all_data( "menu-menu-footer-donaciones");
					}else{
						$menu = menu_tree_all_data( "menu-menu-footer-donaciones-ingl");
					} 		
					foreach( $menu as $item ){ 
						$child = $item[ "link" ];			
						?>

						<div class="item-normatividad">
							<h1><?php print $child[ "link_title" ] ?></h1>
							<ul class="list-footer">
								<?php foreach( $item[ "below" ] as $child ){ 
									$child = $child[ "link" ];

									?>

									<li class="link-item-footer">
										<?php echo l( $child[ "link_title" ], $child[ "href" ], array('attributes' => array('target' => $child['options']['attributes']['target'],'class' => 'link-item-footer')) ) ?></li>

										<?php } ?>	
									</ul>
								</div>
								<?php 
							}
							?>

						</div>
					</article>

					<article class="item-footer s_networks">
						<div class="footer-social-network">
							<h1><?php 

								$english=t('Social Networks', array(), array('langcode' => 'en'));
								$spanish= t('Social Networks', array(), array('langcode' => 'es'));

								if ($idioma=="es") {
									if($english==$spanish){
										print "Redes sociales";
									}else{
										print $spanish;
									}
								}else{
									print $english;
								}


								?></h1>
								<ul>
									<li>
										<a class="link-social-network" href="https://www.facebook.com/pages/Universidad-de-los-Andes/312867483159" target="_blank" class="link-social-network">
											<img alt="Facebook" src="/sites/default/files/footer-facebook.png" title="Facebook">
										</a>
									</li>
									<li>
										<a class="link-social-network" href="https://twitter.com/Uniandes" target="_blank"  class="link-social-network">
											<img alt="twitter" src="/sites/default/files/footer-twitter.png" title="twitter" >
										</a>
									</li>
									<li><a class="link-social-network" href="https://www.youtube.com/user/uniandes" target="_blank"  class="link-social-network">
										<img alt="youtube" src="/sites/default/files/footer-youtube.png" title="youtube">
									</a>
								</li>
								<li>
									<a class="link-social-network" href="https://www.linkedin.com/company/universidad-de-los-andes" target="_blank"  class="link-social-network">
										<img alt="linkedin" src="/sites/default/files/footer-linkedin.png" title="linkedin">
									</a>
								</li>
								<li>
									<a class="link-social-network" href="http://instagram.com/uniandes" target="_blank"  class="link-social-network">
										<img alt="instagram" src="/sites/default/files/footer-instagram.png" title="instagram">
									</a>
								</li>
								<li>
									<a class="link-social-network" href="https://www.snapchat.com/add/uniandescol" target="_blank"  class="link-social-network">
										<img alt="snapchat" src="/sites/default/files/footer-snapchat.png" title="snapchat">
									</a>
								</li>
								<li>
									<a class="link-social-network" href="https://vimeo.com/uniandes" target="_blank"  class="link-social-network">
										<img alt="vimeo" src="/sites/default/files/footer-vimeo.png" title="vimeo">
									</a>
								</li>
								<li>
									<a class="link-social-network" href="https://plus.google.com/+uniandes/posts" target="_blank"  class="link-social-network">
										<img alt="google" src="/sites/default/files/footer-google.png" title="google">
									</a>
								</li>
							</ul>
						</div>
					</article>
				</footer>


				<footer class="legal-text">
					<div class="container">
						<article class="legal-txt">
							<p>Universidad de los Andes | Vigilada Mineducación</p>
							<p>Reconocimiento como Universidad: Decreto 1297 del 30 de mayo de 1964.</p>
							<p>Reconocimiento personería jurídica: Resolución 28 del 23 de febrero de 1949 Minjusticia.</p>
						</article>
						<article class="copy-right">
							<p>© - Derechos Reservados Universidad de los Andes</p>
						</article>
					</div>
				</footer>
