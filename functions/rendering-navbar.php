<?php include_once("./functions/generics.php") ?>

<?php 


/**
 * Display navbar items coming from content folder for desktop format
 * if $_GET params match $file it display it has an active class
 * 
 */
function displayNavbarItemsDesktop($file){

  ?>
    <?php if (!(empty($_GET["page"])) and (strtolower($_GET["page"]) == removePHPExtension($file))) : ?>
      <a href="./?page=<?= removePHPExtension($file) ?>" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page"><?= removePHPExtension($file) ?></a>
    <?php else: ?>
      <a href="./?page=<?= removePHPExtension($file) ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><?= removePHPExtension($file) ?></a>
    <?php endif;?>
  <?php

}

/**
 * Display navbar items coming from content folder for mobile format
 * if $_GET params match $file it display it has an active class
 * 
 */
function displayNavbarItemsMobile($file){
  ?>
    <?php if (strtolower($_GET["page"]) == removePHPExtension($file)) : ?>
      <a href="./?page=<?= removePHPExtension($file) ?>" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page"><?= removePHPExtension($file) ?></a>
     <?php else: ?>
      <a href="./?page=<?= removePHPExtension($file) ?>" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium"><?= removePHPExtension($file) ?></a>
    <?php endif; ?>
  <?php

}

?>