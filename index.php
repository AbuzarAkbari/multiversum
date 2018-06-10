<?php require "view/partials/header.php"; ?>
<?php require_once 'controller/contactsController.php'; ?>

    <?php
    $controller = new ContactsController();
    $controller->handleRequest();
    ?>

<?php require "view/partials/footer.php"; ?>
