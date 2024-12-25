<?php
/*
Template Name: Page rgpd
*/

get_header('bis') 
?>
<h1>Politique de confidentialité</h1>


<!-- /* pour les Ingredients*/ */ -->
<div class="col container-fluid allCardsIngredients">
    <?php
    $buttonsIngredients = [
        ['id' => 'bulletToggleBtnIngredients', 'img' => 'prot.Animale.webp', 'label' => 'Prot.animale'],
        ['id' => 'bulletToggleBtnIngredients2', 'img' => 'Végétarien.webp', 'label' => 'Végétarien'],
        ['id' => 'bulletToggleBtnIngredients3', 'img' => 'légumineuse.webp', 'label' => 'Légumineuse'],
        ['id' => 'bulletToggleBtnIngredients4', 'img' => 'céréaleGrain.webp', 'label' => 'Céréale / Grain'],
        ['id' => 'bulletToggleBtnIngredients5', 'img' => 'noixGraine.webp', 'label' => 'Noix / Graine'],
        ['id' => 'bulletToggleBtnIngredients6', 'img' => 'fruit.webp', 'label' => 'Fruit'],
        ['id' => 'bulletToggleBtnIngredients7', 'img' => 'légume.webp', 'label' => 'Légume'],
        ['id' => 'bulletToggleBtnIngredients8', 'img' => 'prod.laitier.webp', 'label' => 'Prot.laitier']
    ];

    foreach ($buttonsIngredients as $indexIngredients => $button) {
        $toggleIdIngredients = 'toggleBullet' . ($indexIngredients + 1);
    ?>
    <input type="checkbox" id="<?php echo $toggleIdIngredients; ?>" style="display:none;">
    <button class="container-fluid btn cardsIngredients cardsIngredientsOff" id="<?php echo $button['id']; ?>">
        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $button['img']; ?>" 
            alt=<?php echo $button['label']; ?>
            class="img-fluid imgIngredients"
        >
        <div class="px-5 d-flex align-items-center justify-content-center">
            <span class="pRobotoLogin"><?php echo $button['label']; ?></span>
        </div>

        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg" 
            alt="bullet"
            class="bulletOff-On"
        >
    </button>
    <?php } ?>
</div>


<!-- /* pour les Plats*/ */ -->
<div class="col container-fluid allCardsPlats">
    <?php
    $buttonsPlats = [
        ['id' => 'bulletToggleBtnPlats', 'img' => 'entrée.webp', 'label' => 'Entrée'],
        ['id' => 'bulletToggleBtnPlats2', 'img' => 'principal.webp', 'label' => 'Principal'],
        ['id' => 'bulletToggleBtnPlats3', 'img' => 'international.webp', 'label' => 'International'],
        ['id' => 'bulletToggleBtnPlats4', 'img' => 'brunch.webp', 'label' => 'Brunch'],
        ['id' => 'bulletToggleBtnPlats5', 'img' => 'assortiment.webp', 'label' => 'Assortiment'],
        ['id' => 'bulletToggleBtnPlats6', 'img' => 'snackEnca.webp', 'label' => 'Snack / Enca'],
        ['id' => 'bulletToggleBtnPlats7', 'img' => 'déssert.webp', 'label' => 'Déssert'],
        ['id' => 'bulletToggleBtnPlats8', 'img' => 'boisson.webp', 'label' => 'Boisson']
    ];

    foreach ($buttonsPlats as $indexPlats => $button) {
        $toggleIdPlats = 'toggleBullet' . ($indexPlats + 1);
    ?>
    <input type="checkbox" id="<?php echo $toggleIdPlats; ?>" style="display:none;">
    <button class="container-fluid btn cardsPlats cardsPlatsOff" id="<?php echo $button['id']; ?>">
        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/<?php echo $button['img']; ?>" 
            alt=<?php echo $button['label']; ?>
            class="img-fluid imgPlats"
        >
        <div class="px-5 d-flex align-items-center justify-content-center">
            <span class="pRobotoLogin"><?php echo $button['label']; ?></span>
        </div>

        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg" 
            alt="bullet"
            class="bulletOff-On"
        >
    </button>
    <?php } ?>
</div>


<!-- script js pour faire fonctionner les boutons + img -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fonction générique pour gérer les boutons
    function setupButtonGroup(buttonGroupConfig) {
        const {
            buttons, 
            exclusiveButtons = {}, 
            maxSelections = null,
            onlyOneGroup = false
        } = buttonGroupConfig;

        buttons.forEach(function(item) {
            const toggleCheckbox = document.getElementById(item.toggleId);
            const bulletImage = item.btn.querySelector('.bulletOff-On');

            item.btn.addEventListener('click', function() {
                // Gestion des boutons exclusifs
                if (exclusiveButtons[item.btn.id]) {
                    const exclusiveButtonId = exclusiveButtons[item.btn.id];
                    const exclusiveButton = buttons.find(b => b.btn.id === exclusiveButtonId);
                    const exclusiveCheckbox = document.getElementById(exclusiveButton.toggleId);
                    const exclusiveBulletImage = exclusiveButton.btn.querySelector('.bulletOff-On');

                    // Désactiver le bouton exclusif si actif, indépendamment de l'état actuel
                    if (exclusiveCheckbox.checked) {
                        exclusiveCheckbox.checked = false;
                        exclusiveBulletImage.src = '<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg';
                        exclusiveButton.btn.classList.remove('cardsIngredientsOn');
                        exclusiveButton.btn.classList.add('cardsIngredientsOff');
                    }
                }

                // Gestion de la sélection unique par groupe
                if (onlyOneGroup) {
                    buttons.forEach(otherItem => {
                        if (otherItem !== item) {
                            const otherCheckbox = document.getElementById(otherItem.toggleId);
                            const otherBulletImage = otherItem.btn.querySelector('.bulletOff-On');
                            otherCheckbox.checked = false;
                            otherBulletImage.src = '<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg';
                            otherItem.btn.classList.remove('cardsPlatsOn');
                            otherItem.btn.classList.add('cardsPlatsOff');
                        }
                    });
                }

                // Gestion du nombre maximum de sélections
                if (maxSelections !== null) {
                    const activeButtons = buttons.filter(b => 
                        document.getElementById(b.toggleId).checked
                    );

                    if (activeButtons.length >= maxSelections && !toggleCheckbox.checked) {
                        // Désactiver le bouton le plus ancien si la limite est atteinte
                        const oldestActiveButton = activeButtons[0];
                        const oldestCheckbox = document.getElementById(oldestActiveButton.toggleId);
                        const oldestBulletImage = oldestActiveButton.btn.querySelector('.bulletOff-On');
                        oldestCheckbox.checked = false;
                        oldestBulletImage.src = '<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg';
                        oldestActiveButton.btn.classList.remove('cardsIngredientsOn');
                        oldestActiveButton.btn.classList.add('cardsIngredientsOff');
                    }
                }

                // Basculement de l'état du bouton
                toggleCheckbox.checked = !toggleCheckbox.checked;

                // Mise à jour visuelle
                if (toggleCheckbox.checked) {
                    bulletImage.src = '<?php echo get_template_directory_uri(); ?>/assets/img/bulletOn.svg';
                    item.btn.classList.add(onlyOneGroup ? 'cardsPlatsOn' : 'cardsIngredientsOn');
                    item.btn.classList.remove(onlyOneGroup ? 'cardsPlatsOff' : 'cardsIngredientsOff');
                } else {
                    bulletImage.src = '<?php echo get_template_directory_uri(); ?>/assets/img/bulletOff.svg';
                    item.btn.classList.remove(onlyOneGroup ? 'cardsPlatsOn' : 'cardsIngredientsOn');
                    item.btn.classList.add(onlyOneGroup ? 'cardsPlatsOff' : 'cardsIngredientsOff');
                }
            });
        });
    }

    // Configuration pour les ingrédients
    setupButtonGroup({
        buttons: [
            <?php foreach ($buttonsIngredients as $indexIngredients => $button) { ?>
            { 
                btn: document.getElementById('<?php echo $button['id']; ?>'), 
                toggleId: 'toggleBullet<?php echo ($indexIngredients + 1); ?>'
            }<?php echo ($indexIngredients < count($buttonsIngredients) - 1 ? ',' : ''); ?>
            <?php } ?>
        ],
        exclusiveButtons: {
            'bulletToggleBtnIngredients': 'bulletToggleBtnIngredients2',
            'bulletToggleBtnIngredients2': 'bulletToggleBtnIngredients'
        },
        maxSelections: null  // Pas de limite de sélection
    });

    // Configuration pour les plats
    setupButtonGroup({
        buttons: [
            <?php foreach ($buttonsPlats as $indexPlats => $button) { ?>
            { 
                btn: document.getElementById('<?php echo $button['id']; ?>'), 
                toggleId: 'toggleBullet<?php echo ($indexPlats + 1); ?>'
            }<?php echo ($indexPlats < count($buttonsPlats) - 1 ? ',' : ''); ?>
            <?php } ?>
        ],
        onlyOneGroup: true  // Un seul bouton actif à la fois
    });
});
</script>

<?php get_footer() ?>