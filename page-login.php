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
  <h2 class="text-center">Se connecter</h2>
</div>

<div class="container">
  <form 
    action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>"
    method="post"
  >
    <div class="mb-3">
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
    <div class="mb-3">
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
      </div>
      <div>
        <a class="small" href="<?php echo esc_url( home_url('/connexion/mot-de-passe-oublie') ); ?>">Mot de passe oublié ?</a>
      </div>
      <div class="text-center">
        <input 
          type="submit" 
          name="submit" 
          value="Connexion"
          class="btn"
        >
        <img 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
          alt="login"
        >
        <input 
          type="hidden" 
          name="redirect_to" 
          value="<?php echo esc_url( home_url('/profil') ); ?>"
        >
    </div>
  </form>
</div>

<hr>

<div class="container">
  <h2 class="text-center">S'inscrire</h2>
</div>

<div class="container">
  <form method="post">
    <div class="mb-3">
      <label 
        for="name" 
        class="form-label"
      >
        Nom d'utilisateur
      </label>
      <input 
        type="text" 
        name="uname"
        class="form-control" 
        id="name" 
        placeholder="Ex : John"
        required
      >
    </div>
    <div class="mb-3">
      <label 
        for="email" 
        class="form-label"
      >
        Email
      </label>
      <input 
        type="text" 
        name="uemail"
        class="form-control" 
        id="email" 
        placeholder="Ex : John@doe.com"
        required
        pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
      >
    </div>
    <div class="mb-3">
      <label 
        for="pwd" 
        class="form-label"
      >
        Mot de passe
      </label>
      <input 
        type="password" 
        name="upass"
        class="form-control" 
        id="pwd"
        placeholder="Ex : lesCr3at3ursDeC0okupSontL3s+Beaux"
        required
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
      >
    </div>
    <div>
      <p class="small">Le mot de passe doit contenir au minimum 6 caractères dont au moins une majuscule, une minuscule et un chiffre</p>
    </div>
    <div class="text-center">
      <input 
        type="submit" 
        name="submit" 
        value="Inscription"
        class="btn"
      >
      <img 
        src="<?php echo get_template_directory_uri(); ?>/assets/img/" 
        alt="document"
      >
      <input 
        type="hidden" 
        name="redirect_to" 
        value="<?php echo esc_url( home_url('/profil') ); ?>"
      >
    </div>
  </form>
</div>

<?php get_footer('bis'); ?>