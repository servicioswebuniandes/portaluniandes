<section class="miga-de-pan">
  <h2 class="element-invisible">Usted está aquí</h2>
  <article class="breadcrumb container">
    <span class="inline odd first">
      <a href="/donaciones/">Home</a>
    </span> 
    <span class="delimiter">/</span> 
    <span class="inline even last">
      <a href="<?php print url('node/'.$node->nid, array('absolute'=>true)); ?>"><?php print $node->title?></a>
    </span>
  </article>		
</section>




<section class="internal-detail">
  <h1><?php print $node->title ?></h1>

  <article class="internal-description container">
    <section class="social-network">
      <li id="btn_share_fb_not" class="facebook"><a href=""></a></li>
      <li id="btn_share_tw_not" class="twitter"><a href=""></a></li>
      <li id="btn_share_lk_not" class="linkedin"><a href=""></a></li>
    </section>

    <section class="txt-description-item">
      <p><?php print $node->field_texto_competo_noticias['und'][0]['value']?></p>
    </section>
  </article>
</section>



<div class="container-fluid compartir-redes">
  <div class="container">
    <div class="linea-100"></div>
    <p>Compartir</p>
    <ul>
      <li><img id="btn_share_fb" alt="Logo Facebook" src="/sites/default/files/footer-facebook.png"></li>
      <li><img id="btn_share_tw" alt="Logo Twitter" src="/sites/default/files/footer-twitter.png"></li>
      <li><img id="btn_share_lk" alt="Logo Linkedin" src="/sites/default/files/footer-linkedin.png"></li>
    </ul>
  </div>
</div>