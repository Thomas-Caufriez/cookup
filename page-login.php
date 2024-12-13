<?php
/*
Template Name: Page login
*/

if (is_user_logged_in()) {
    wp_redirect( home_url('/profil') );
      exit;
    }

get_header('bis');
?>

<div class="container">
  <h2 class="text-center">Se connecter</h2>
</div>

<div class="container">
  <form 
    action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>"
    method="post"
  >
    <div class="container">
      <label 
        for="log" 
        class="form-label"
      >
        Email ou nom d'utilisateur
      </label>
      <input 
        type="text" 
        name="log"
        class="form-control" 
        id="log" 
        placeholder="Ex : John@doe.com"
        required
        value="<?php echo esc_attr( $user_login ); ?>"
      >
    </div>
    <div class="container">
      <label 
        for="pwd" 
        class="form-label"
      >
        Mot de passe
      </label>
      <input 
        type="password" 
        name="pwd"
        class="form-control" 
        id="pwd"
        placeholder="Ex : lesCr3at3ursDeC0okupSontL3s+Beaux"
        required
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
      >
      <div>
        <a class="small" href="<?php echo esc_url( home_url('/login/forgot-password') ); ?>">Mot de passe oublié ?</a>
      </div>
      <div>
        <a class="small" href="<?php echo esc_url( home_url('/login/register') ); ?>">Pas encore inscrit ?</a>
      </div>
    </div>
    <div class="text-center">
      <button
        type="submit" 
        name="submit" 
        class="btn btn-primary"
      >
        <span>Connexion</span>
        <img 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
          alt="login"
        >
      </button>
      <input 
        type="hidden" 
        name="redirect_to" 
        value="<?php echo esc_url( home_url('/profil') ); ?>"
      >
    </div>
  </form>
</div>

<?php get_footer('bis'); ?>