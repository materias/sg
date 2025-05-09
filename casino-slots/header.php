<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
  <div class="header__logo">
    <a href="/" class="header__logo-link">
    <img 
      src="<?php echo get_template_directory_uri(); ?>/assets/images/sgcasino-logo.png" 
      alt="SG Casino" 
      width="90" 
      height="44"
      class="header__logo-img"
    />
    </a>
  </div>
  <div class="header__menu">
    <input 
      type="text" 
      class="header__menu-input" 
      placeholder="Jeux, Catégories, Fournisseurs"
    >
    <a href="/login" class="header__menu-btn">SE CONNECTER</a>
    <a href="/register" class="header__menu-btn">S'INSCRIRE</a>
  </div>
</header>

</body>
</html>

