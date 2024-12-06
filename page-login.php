<?php
/*
Template Name: Page Connexion
*/

if (is_user_logged_in()) {
    wp_redirect( home_url('/profil') );
      exit;
  }

get_header('bis'); 
?>

<div class="container">
  
  <form action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
		<label for="log">Nom d\'utilisateur ou adresse e-mail</label>
		<input type="text" name="log" id="log" value="<?php echo esc_attr( $user_login ); ?>">
		
    <label for="pwd">Mot de passe</label>
		<input type="password" name="pwd" id="pwd">
		
    <input type="submit" name="submit" value="Se connecter">
		<input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url('/profil') ); ?>">
	</form>

</div>

<form method="post">
  User <input type="text"  name="uname" />
  Email  <input id="email" type="text" name="uemail" />
  Password  <input type="password"  name="upass" />
  <input type="submit" value="Submit" />
  <input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url('/profil') ); ?>">
</form>


<?php get_footer('bis'); ?>