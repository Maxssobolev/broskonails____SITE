<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package brosko
 */

?>

    <footer >
      <div id="map" class="wow fadeInUp"  data-wow-duration="1s">
        
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2818.780251780884!2d30.246347398461076!3d60.02869162329482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x469635b170ef1e99%3A0x76c1c2cdfee54ac9!2z0L_RgC4g0JrQvtGA0L7Qu9GR0LLQsCwgNTcsINC6MSwg0KHQsNC90LrRgi3Qn9C10YLQtdGA0LHRg9GA0LMsIDE5NzM1MA!5e0!3m2!1sru!2sru!4v1596382954520!5m2!1sru!2sru" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

      </div>
      <div class="contacts">
          <div class="adress">
            <img src="<?= get_template_directory_uri(); ?>/img/point.svg" alt="">
            г. Санкт-Петербуг, пр. Королёва 
            (м. Комендаский проспект) 
            дом 57, корп. 1
         </div>
            <div class="line-break"></div>
         <div class="social">
             <a href="https://www.instagram.com/brosko.nails/?igshid=17b7be3y5v78n"><img src="<?= get_template_directory_uri(); ?>/img/brandico_instagram-filled.svg" alt=""></a>
             <a href="https://api.whatsapp.com/send?phone=79119281288"><img src="<?= get_template_directory_uri(); ?>/img/WhatsApp_Logo_1_t 1.svg" alt=""></a>
         </div>
      </div>
    </footer>

    







	
<?php wp_footer(); ?>

</body>
</html>
