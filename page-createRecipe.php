    <?php
/*
Template Name: Page create recipe
*/

if (!is_user_logged_in()) {
    wp_redirect( home_url('/login') );
    exit;
}

get_header('bis'); 
?>

<div class="d-flex align-items-center justify-content-center mt-3 mb-3">
    <img 
        src="<?php echo get_template_directory_uri(); ?>/assets/img/iconRecetteBlack.svg" 
        alt="icon recette"
        class="iconLogin me-2"
    >
    <h2 class="h2Salsa text-center mt-3 mb-3">Créer / modifier ma recette</h2>
</div>

<form 
    method="post" 
    enctype="multipart/form-data"
    class="bg-light m-0 m-md-3 m-xl-5 p-0 p-md-4 p-xl-5" 
    style="border-radius: 15px;"
>

    <div class="row row-cols-1 row-cols-md-2 gx-5 m-1 m-md-3">
        <div class="col">
            <div class="my-3">
                <div class="d-flex align-items-center justify-content-start my-2 my-md-3">
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/iconBic.svg" 
                        alt="icon bic"
                        class="iconLogin me-2"
                    >
                    <label 
                        for="post_title" 
                        class="form-label h3Salsa m-0"
                    >
                        Titre de la recette
                    </label>
                </div>
                <input 
                    type="text" 
                    name="post_title" 
                    id="post_title" 
                    required 
                    class="form-control pRobotoLogin"
                >
            </div>

            <div class="mt-2 mt-md-5">
                <div>
                    <div class="d-flex  align-items-center justify-content-start mt-2 mt-md-5">
                        <img 
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/iconBic.svg" 
                            alt="icon bic"
                            class="iconLogin me-2"
                        >
                        <label for="thumbnail" class="h3Salsa m-0">Image de la recette</label>
                    </div>
                    <span class="fw-lighter pRobotoThinLogin">  Veuillez changer la taille de votre image à 1024px/438px (21:9) avant de l'envoyer</span>
                    <input 
                        type="file" 
                        name="thumbnail" 
                        id="thumbnail"
                        accept="image/jpeg, image/png" 
                        required 
                        class="form-control pRobotoLogin"
                    >
                </div>
            </div>

            <div class="mt-4 mt-md-5">
                <?php 
                    $tags = [
                        'temps' => [
                            1 => '-30min',
                            2 =>  '+30min',
                            3 => '+1h'
                        ],
                        'difficulte' => [
                            1 => 'facile',
                            2 => 'moyen',
                            3 => 'difficile'
                        ],
                        'prix' => [
                            1 => '-15€',
                            2 =>  '+15€',
                            3 => '+30€'
                        ],
                    ]
                ?>
                <?php 
                    $titleIcons = [
                        'temps' => get_template_directory_uri() . '/assets/img/iconTemps.svg',
                        'difficulte' => get_template_directory_uri() . '/assets/img/iconDifficulté.svg',
                        'prix' => get_template_directory_uri() . '/assets/img/iconEuro.svg'
                    ];
                ?>
                <?php foreach ($tags as $tagcategory => $tagtab): ?>
                    <div class="d-flex justify-content-start mt-2 mt-md-3 align-items-center"> 
                        <img 
                            src="<?php echo $titleIcons[$tagcategory]; ?>" 
                            alt="icon <?php echo $tagcategory; ?>"
                            class="iconLogin me-2"
                        >
                        <p class="m-0 h3Salsa"><?php echo ucfirst($tagcategory); ?></p>
                    </div>
                    <div class="row row-cols-3 justify-content-around my-2">
                        <?php foreach ($tagtab as $tagval => $tag): // boucle qui parcourt les tableaux avec les tags ?>
                            <div class="col-4 d-flex align-items-center gap-2">
                                <input 
                                    type="radio" 
                                    name="<?php echo $tagcategory; ?>" 
                                    id="<?php echo $tag; ?>" 
                                    value="<?php echo $tagval; ?>" 
                                    class="btn-check"
                                    required
                                >
                                <label 
                                    for="<?php echo $tag; ?>" 
                                    class="btn w-100 pRobotoLogin btnPageModifierCreeRecette"
                                >
                                    <?php echo ucfirst($tag); ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="d-flex row mt-4 mt-md-5">
                <div class="d-flex align-items-center justify-content-start mb-2 mb-md-3">
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/iconTag.svg" 
                        alt="icon tag"
                        class="iconLogin me-2"
                    >
                    <label for="dishtype" class="h3Salsa">Choisissez le type de plat</label>
                </div>
                <div>
                    <select 
                        class="form-select pRobotoLogin" 
                        id="dishtype" 
                        name="dishtype"
                    >
                        <option value="starter">Entrée</option>
                        <option value="maincourse" selected>Plat</option>
                        <option value="desert">Dessert</option>
                        <option value="international">International</option>
                        <option value="drink">Boisson</option>
                        <option value="brunch">Brunch</option>
                        <option value="sidedish">Assortiment</option>
                        <option value="snack">Snack & encas</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col mt-4 mt-md-0">
            <div>
                <div class="d-flex align-items-center justify-content-start my-2 my-md-3">
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/iconTag.svg" 
                        alt="icon tag"
                        class="iconLogin me-2"
                    >
                    <label for="description" class="h3Salsa">Description</label>
                </div>
                <textarea 
                    name="description" 
                    id="description" 
                    required 
                    class="form-control pRobotoLogin"
                ></textarea>
            </div>

            <div class="mt-4 mt-md-5">
                <div class="d-flex align-items-center justify-content-start my-2 my-md-3">
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/iconTag.svg" 
                        alt="icon tag"
                        class="iconLogin me-2"
                    >       
                    <label for="descingredient" class="h3Salsa">Ingrédients</label>
                </div>
                <textarea 
                    name="descingredient" 
                    id="descingredient"
                    required
                    placeholder="Ex : 3 oignons rouges"
                    class="form-control pRobotoLogin"
                ></textarea>
            </div>

            <div class="d-flex row  mt-4 mt-md-5">
                <div class="d-flex align-items-center justify-content-start mb-2 mb-md-3">
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/iconTag.svg" 
                        alt="icon tag"
                        class="iconLogin me-2"
                    >
                    <label for="nbrperson" class="h3Salsa">Nombre de personnes</label>
                </div>
                <div>
                    <input
                        type="number"
                        class="form-control pRobotoLogin"
                        required
                        name="nbrperson"
                        id="nbrperson"
                    >
                </div>
            </div>

            <div class="mt-4 mt-md-5">
                <div class="d-flex align-items-center justify-content-start mb-2 mb-md-3">
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/iconTag.svg" 
                        alt="icon tag"
                        class="iconLogin me-2"
                    >
                    <p class="h3Salsa m-0">Sélectionnez les types d'ingrédients</p>
                </div>
                <div class="row row-cols-3 justify-content-start text-center">
                    <?php 
                    $ingredients = ['proteine', 'legumineuse', 'cereale & grain', 'noix & graine', 'fruit', 'legume', 'produit laitier'];
                    ?>
                    <?php foreach ($ingredients as $ingredient): ?>
                        <div class="col d-flex align-items-center my-1 pRobotoLogin">
                            <input 
                                class="btn-check" 
                                type="checkbox" 
                                role="switch" 
                                value="<?php echo $ingredient; ?>" 
                                id="<?php echo $ingredient; ?>"
                                name="ingredients[]"
                            >
                            <label 
                                class="btn btnPageModifierCreeRecette" 
                                for="<?php echo $ingredient; ?>"
                            >
                                <?php echo ucfirst($ingredient); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class=" m-4 m-md-5 "> 
        <div class="mt-3 mt-md-5">
            <div>
                <div class="d-flex align-items-center justify-content-start my-2 my-md-3">
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/iconTag.svg" 
                        alt="icon tag"
                        class="iconLogin me-2"
                    >               
                    <label for="preparation" class="h3Salsa">Recette</label>
                </div>
            </div>
            <textarea 
                name="preparation" 
                id="preparation"
                required
                placeholder="Ex : Etape 1 : ...."
                class="form-control pRobotoLogin"
            ></textarea>
        </div>
    
        <div class="mt-3 mt-md-5">
            <div>
                <div class="d-flex align-items-center justify-content-start my-2 my-md-3 ">
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/iconTag.svg" 
                        alt="icon tag"
                        class="iconLogin me-2"
                    >       
                    <p class="h3Salsa m-0">Status</p>
                </div>
            </div>
    
            <div class="d-flex justify-content-start  my-2 mb-3 mb-md-5">
                <div class="d-flex align-items-center ">
                    <input 
                        type="radio" 
                        name="status" 
                        id="private" 
                        value="private" 
                        class="btn-check"
                    >
                    <label 
                        for="private" 
                        class="btn pRobotoLogin btnPageModifierCreeRecetteStatus"
                    >
                        Privé
                    </label>
                </div>
                <div class="d-flex align-items-center  ms-3">
                    <input 
                        type="radio" 
                        name="status" 
                        id="public" 
                        value="public" 
                        class="btn-check"
                        checked
                    >
                    <label 
                        for="public" 
                        class="btn pRobotoLogin btnPageModifierCreeRecetteStatus"
                    >
                        Public
                    </label>
                </div>
            </div>
        </div>

        <div class="my-5">
            <button 
                type="submit" 
                name="submit" 
                class="btn btn-light btn-small btnAllLogin text-center w-auto"
            >
                <p class="pRobotoLogin m-0">Publier ma recette</p>
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/connexionEtPublier.svg" 
                    alt="icon publier"
                    class="iconLogin ms-2"
                >
            </button>
        </div>
    </div>
</form>

<?php get_footer(); ?>