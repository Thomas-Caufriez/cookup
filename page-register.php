<?php
/*
Template Name: Page register
*/

if (is_user_logged_in()) {
    wp_redirect( home_url('/profil') );
      exit;
    }

get_header('bis');
?>

<div class="container mt-3 mb-3">
  <h2 class="text-center h2Salsa">S'inscrire</h2>
</div>

<div class="container">
  <form method="post">
    <div class="row row-cols-1">
      <div class="mb-3 col">
        <label 
          for="name" 
          class="form-label pRobotoLogin"
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
      <div class="mb-3 col">
        <label 
          for="email" 
          class="form-label pRobotoLogin"
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
    </div>
    <div class="row">
      <div class="mb-3 col">
        <label 
          for="pwd" 
          class="form-label pRobotoLogin"
        >
          Mot de passe
        </label>
        <div class="input-group">
            <input 
            type="password" 
            name="upass"
            class="form-control" 
            id="pwd"
            placeholder="Ex : lesCr3at3ursDeC0okupSontL3s+Beaux"
            required
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
            >
            <span class="input-group-text"><input type="checkbox" onclick="changepwd()" class="form-check-input me-2">Voir</span>
        </div>
        <div>
          <p class="pRobotoThinLogin">Le mot de passe doit contenir au minimum 6 caractères dont au moins une majuscule, une minuscule et un chiffre</p>
        </div>
      </div>
    </div>
    <div class="text-center mb-3">
      <button
        type="submit"
        name="submit"
        class="btn btn-light btnAllLogin"
      >
      <span class="pRobotoLogin ">Inscription</span>
        <img 
          src="<?php echo get_template_directory_uri(); ?>/assets/img/inscription.svg" 
          alt="document"
          class="iconLogin"
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

<?php get_footer(); ?>