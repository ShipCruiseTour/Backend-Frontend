<?php 
include_once APPROOT . '/views/inc/header.inc.php';
include_once APPROOT . '/views/inc/navbarUser.inc.php';
?>

<div class="contact" name="name">
    <div class="titre_contact">
        <h1>
            Contact-nous
        </h1>
    </div>
    <div class="formulaire">
        <div class="image_formulaire">
            <img style="width: 100%;" src="<?= URLROOT?>image/contact us.jpg" alt="contact us">
        </div>
        <div class="form">
            <input type="text" placeholder="Entrer votre Nom et Prénom">
            <input type="email" placeholder="Entrer votre Email">
            <input type="number" placeholder="Entrer votre N ° de Telephone">
            <textarea placeholder="Entrer votre Message"></textarea>
            <input type="submit" class="submit" value="Envoyer">
        </div>
    </div>
</div>

<?php include_once APPROOT . '/views/inc/footer.inc.php' ?>