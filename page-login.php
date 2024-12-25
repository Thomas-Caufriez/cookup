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
<div class="container mt-3 mb-3">
  <h2 class="text-center h2Salsa ">Se connecter</h2>
</div>

<div>
  <form 
    action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>"
    method="post"
    class="bg-light m-0 m-md-3 m-xl-5 p-2 p-md-4 p-xl-5" 
    style="border-radius: 15px;"
  >
    <div class="container">
      <label 
        for="log" 
        class="form-label pRobotoLogin mt-3"
      >
        Email ou nom d'utilisateur
      </label>
      <input 
        type="text" 
        name="log"
        class="form-control custom-input" 
        id="log" 
        placeholder="Ex : John@doe.com"
        required
        value="<?php echo esc_attr( $user_login ); ?>"
      >
    </div>
    <div class="container mt-4">
      <label 
        for="pwd" 
        class="form-label pRobotoLogin"
      >
        Mot de passe
      </label>
      <div class="input-group">
        <input 
          type="password" 
          name="pwd"
          class="form-control" 
          id="pwd"
          placeholder="Ex : lesCr3at3ursDeC0okupSontL3s+Beaux"
          required
          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
        >
        <span class="input-group-text"><input type="checkbox" onclick="changepwd()" class="form-check-input pRobotoLogin me-2">Voir</span>
      </div>
      <div class="text-end">
        <a class="small pUnderline" href="<?php echo esc_url( home_url('/forgot-password') ); ?>">Mot de passe oublié ?</a>
      </div>
    </div>
    <div class="text-center mt-4">
      <button
        type="submit" 
        name="submit" 
        class="btn btn-light btnAllLogin text-center"
      >
        <span class="pRobotoLogin">Connexion</span>
        <img 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/connexionEtPublier.svg" 
          alt="login"
          class="iconLogin"
        >
      </button>
      <input 
        type="hidden" 
        name="redirect_to" 
        value="<?php echo esc_url( home_url('/') ); ?>"
      >
    </div>
    <div class="text-center text-dark mt-4 mb-4">
        <a class="small pRobotoLogin" href="<?php echo esc_url( home_url('/register') ); ?>">Vous n’avez pas encore de compte ?</a>
    </div>
  </form>
</div>

<?php get_footer(); ?>