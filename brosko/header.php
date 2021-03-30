<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package brosko
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title><? bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>

<body>
	<a href="#home" class="scrollup">Наверх</a>

    <header class="header">
        <div class="header-central-block">
            <div class="header-central-block__logo"><img src="<?=get_template_directory_uri();?>/img/logo-min.png" alt=""></div>
            <button class="header-central-block__button"><a href="https://n314491.yclients.com/">ЗАПИСЬ НА УСЛУГИ</a></button>
        </div>
    </header>
    <section class='quick-call'>
        <div class="quick-call-phone item wow fadeInLeft"  data-wow-duration="2s">
            <a href="tel:79119281288">
                <div class="quick-call-phone__img"><img src="<?=get_template_directory_uri();?>/img/phone.svg" alt="phone"></div>
                <div class="quick-call-phone__subtitle">Позвонить</div>
            </a>
        </div>
        <div class="quick-call-whatsapp item wow fadeInRight"  data-wow-duration="2s">
            <a href="https://api.whatsapp.com/send?phone=79119281288">
                <div class="quick-call-whatsapp__img"><img src="<?=get_template_directory_uri();?>/img/whatsapp.svg" alt="whatsapp"></div>
                <div class="quick-call-whatsapp__subtitle">WhatsApp</div>
            </a>
        </div>
    </section>