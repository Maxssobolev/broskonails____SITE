<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brosko
 */

get_header();


?>




 <section main>
    <div mobile-only class="mob-headers">
        <h2>ПРАЙС НА УСЛУГИ</h2>
    </div>
        <div class="menu">

		<!-- Автоматически заполняется в main.js -->
        </div>
        <div class="alert-home">
            
        </div>
        <div class="current-item">
            
   
            <div class="headers">

                 <h2>ПРАЙС НА УСЛУГИ</h2> <h2>ПРИМЕРЫ РАБОТ</h2>
            </div>
			
			<!-- "Слайдер" сменяющий категории -->
            <div class="slider ">
<?  
           $query = new WP_Query("cat=1&posts_per_page=100");

            if ( $query->have_posts() ):
                while ( $query->have_posts() ):
                    $query->the_post();
             

                    if( get_field('name') ):
                        
                        // Loop through rows.
                        if ( have_rows('group_of_prices') ) : ?>

                       
                            <div class="category">
                                <div class="price wow fadeInLeft"  data-wow-duration="2s">
                                    <div class="price__details">
                                        <?  while ( have_rows('group_of_prices') ) : the_row(); ?>
                                            
                                           
                                            <?   
                                                        
                                                    

                                                    if( get_row_layout() == 'group_prices' ):
                                                        $price__caption = get_sub_field('price__caption');
                                                        
                                                    endif;
                                            ?>
                                                <table>
                                                    <!-- Таблица с ценами -->
                                                    <caption class="price__title"><?=$price__caption ?></caption>
                                                    <? 
                                                     while ( have_rows('prices_table') ) : the_row(); 
                                                          $prices_table_name = get_sub_field('prices_table_name');
                                                          $prices_table_cost = get_sub_field('prices_table_cost');
                                                          if(get_sub_field('flag')==1){$flag = 1;}
                                                          else{$flag = 0;}

                                                    ?>
                                                    <tr>
                                                        <td class="col-names">
															<div>
																<?=$prices_table_name ?>
															</div>
                                                        	
                                                        <? 
															if($flag): ?>
																<div class="checked-item"></div>
															<? endif; ?>
                                                         	
                                                         </td>
                                                        <td class="col-costs"><?=$prices_table_cost ?></td>
                                                    </tr>
                                                    
                                                    
                                                    <? endwhile;?>
                                                </table>
                                            <? endwhile;?>
                                    </div>
                                </div>
                                <div class="work-examples wow fadeInRight"  data-wow-duration="2s">
                                    <!-- Примеры работ () -->
                                    <div class="carousel">

                                        <?
                                        $media = get_field("portfolio");

                                        foreach($media as $image): ?>
                                    
                                            <div class="work-examples__item">

                                            	<img data-lazy="<?=str_replace('-scaled','',$image['url'])?>" alt="">
                                            
                                            </div>

                                         <?
                                        endforeach;
                                        ?>
                                    </div>

                                </div>
                            </div>


                       

                            <?

                        // End loop.
                        endif;
                    endif;
                endwhile;
            endif;
                               

?>
            	


            </div>
        </div>
 </section>












	
<?php

get_footer();
