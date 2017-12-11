<section class="section-contact-form">
  <article class="container-form">
   <section class="txt-contact-form">
    <h1><?php print t('Do you want more information?')?></h1>
    <p><?php print t('Day by day we fulfill more dreams and goals with the support of people like you. Send us your details and we will contact you.') ?></p>
  </section>

  <section class="contact-form">
    <form  action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" id="contactForm">

      <article class="form-group hidden">
        <input type=hidden name="oid" value="00D30000000dbAP">
        <?php 
        global $language;
        $host= $_SERVER["HTTP_HOST"];
        if ($language->language=="es") {
          $nombre="Nombre";
          $telefono="Teléfono";
          $url="/es/donaciones/contacto";
          $terminos="es/donaciones/terminos-y-condiciones/";
        }else{
          $nombre="Name";
          $telefono="Phone";
          $url="/en/donations/contact";
          $terminos="http://uniandes.edu.co/es/donaciones/terminos-y-condiciones/";
        }
        $url="https://" . $host . $url;

        ?>
        <input type=hidden name="retURL" value="<?php print $url; ?>">
        <input type=hidden id="lead_source" name="lead_source" value="Página WEB Donaciones">

      </article>

      <article class="form-group x2">
        <input tabindex="1" class="form-control" id="name" maxlength="80" name="last_name" size="20" type="text" placeholder="<?php print $nombre?>" required="" aria-required="true" aria-invalid="true">
      </article>

      <article class="form-group x2">
        <input tabindex="2" class="form-control" id="phone" maxlength="40" name="phone" size="20" type="number"  placeholder="<?php print $telefono?>" required="" aria-required="true" aria-invalid="true">
      </article>

      <article class="form-group">
        <input tabindex="3" class="form-control" id="email" maxlength="80" name="email" size="20" type="email" placeholder="Email" required="" aria-required="true" aria-invalid="true">
      </article>

      <article class="form-group">
        <section class="form-check">
         <input tabindex="4" type="checkbox" class="form-check-input" name="accept_terms" id="accept_terms" required="" aria-required="true">
         <label class="control-label" for="accept_terms"><a target="_blank" href="<?php print $terminos ?>"><?php print t('I accept terms and conditions')?></a></label>
       </section>
     </article>

     <button type="submit"  id="contact-btn" class="btn-default"><?php print t('Send')?></button>
   </form>
 </section>
</article>
</section>	