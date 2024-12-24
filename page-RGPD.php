<?php
/*
Template Name: Page rgpd
*/

get_header('bis') 
?>
<h1>Politique de confidentialité</h1>

<div class="col container-fluid allCardsIngredients">
    <!-- Input Checkbox -->
    <input type="checkbox" id="toggleBullet" style="display:none;">
    
    <button class="container-fluid btn cardsIngredients cardsIngredientsOff" id="bulletToggleBtn">
        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/prot.Animale.webp" 
            alt="..."
            class="img-fluid imgIngredients"
        >
        <div>
            <span class="pRobotoLogin">Prot.Animale</span>
        </div>

        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg" 
            alt="icone ..."
            class="bulletOff-On"
            id="bulletImage"
        >
    </button>
</div>



<!-- /* petit script js pour faire fonctionner le bouton */ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const bulletToggleBtn = document.getElementById('bulletToggleBtn');
    const bulletImage = document.getElementById('bulletImage');
    const toggleBullet = document.getElementById('toggleBullet');

    let isActive = false;

    bulletToggleBtn.addEventListener('click', function() {
        isActive = !isActive;
        toggleBullet.checked = isActive;

        if (isActive) {
            bulletImage.src = '<?php echo get_template_directory_uri(); ?>/assets/img/bulletOn.svg';
            bulletToggleBtn.classList.add('cardsIngredientsOn');
            bulletToggleBtn.classList.remove('cardsIngredientsOff');
        } else {
            bulletImage.src = '<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg';
            bulletToggleBtn.classList.remove('cardsIngredientsOn');
            bulletToggleBtn.classList.add('cardsIngredientsOff');
        }
    });
});
</script>

<?php get_footer() ?>