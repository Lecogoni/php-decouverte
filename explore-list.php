<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- FONT AWESOME -->
  <script src="https://kit.fontawesome.com/030dab100e.js" crossorigin="anonymous"></script>
  <title>Php - Files Explorer</title>
</head>

<style>
  li {
    list-style: none;
  }
</style>

<?php

//$dir1    = "/var/log/";
$dir = "/";

if (isset($_GET["path"])) {
  $dir = strtolower($_GET["path"]) . "/";
} elseif (isset($_GET["parent"])) {

  if ($_GET["parent"] == "/") {
    $dir = "/";
  } else {
    $dir = $_GET["parent"] . "/";
  }
}


if (isset($_GET["path"])) {
  $dir = strtolower($_GET["path"]) . "/";
} elseif (isset($_GET["parent"])) {

  if ($_GET["parent"] == "/") {
    $dir = "/";
  } else {
    $dir = $_GET["parent"] . "/";
  }
} elseif (isset($_GET["link"])) {
  $dir = strtolower($_GET["link"]);
}

$directories = scandir($dir);
unset($directories[1]);
unset($directories[0]);

?>

<?php

/**
 * return the number of element included in the folder after removing . and .. folder
 */
function hasChildrenEle($directory)
{
  $childEle = scandir($directory);
  // remove folder . and ..
  unset($childEle[1]);
  unset($childEle[0]);
  return sizeof($childEle, 0);
};

/**
 * 
 */
function getChildrenList($directory)
{
  $childEleList = scandir($directory);
  unset($childEleList[1]);
  unset($childEleList[0]);

  $folderList = array();
  array_push($folderList, "<ul>");
  foreach ($childEleList as $file) {

    if (is_dir($directory . $file)) { // Is Folder

      if (is_readable($directory . $file)) { // Is Folder Readable
        $list = '<a href="./explore-list.php?path=' . $directory . $file . '"><li>|__ <img src="/assets/folder.png" style="width: 20px; height:auto; margin-right: 10px;" alt="">' . $file . "</li></a>";
      } else {
        $list = '<li style="color: grey">|__ <img src="/assets/folder.png" style="width: 20px; height:auto; margin-right: 10px;" alt="">' . $file . "</li>";
      }
    } else { // Is File
      $list = '<li style="color: grey">|__ <img src="/assets/files.png" style="width: 14px; height:auto; margin-right: 10px;" alt="">' . $file . "</li>";
    }
    array_push($folderList, $list);
  }
  array_push($folderList, "</ul>");
  return $folderList;
}

?>

<body>
  <div class="container mt-5 mb-5">
    <!-- SORT OF HEADER -->
    <div class="row mb-5">
      <div class="col-6">
        <?php
        echo "current path : " . strtolower($dir);
        ?>
      </div>

      <div class="col-6">
        <div class="d-flex justify-content-end">
          <a class="btn btn-info me-2" href="./explore.php?link=<?= strtolower($dir) ?>">
            <i class="fas fa-th fa-lg"></i></a>
          <a class="btn btn-info active" href="#">
            <i class="fas fa-stream fa-lg"></i></a>
        </div>
      </div>
    </div>


    <div class="row mb-5">
      <?php if ($dir == "/") { ?>
        <div class="card p-3">
          <div><img src="./assets/home.png" class="rounded mx-auto d-block" alt="" style="width: 50px; height:auto;"></div>
          <div class="text-center">Root</div>
        </div>

      <?php } else { ?>
        <a href="./explore-list.php?parent=<?= dirname($dir) ?>">
          <div class="card p-3">
            <div><img src="./assets/folder-parent.png" class="rounded mx-auto d-block" alt="" style="width: 50px; height:auto;"></div>
            <div class="text-center">..</div>
            <!-- <div class="text-center"><?= dirname($dir) ?></div> -->
          </div>
        </a>
      <?php } ?>

    </div>

    <!-- EXPLORER LIST -->
    <ul class="list-group">

      <? foreach ($directories as $directory) : ?>
        <!-- IF FOLDER -->
        <?php if (is_dir($dir . $directory)) { ?>

          <!-- IF FOLDER IS READABLE-->
          <?php if (is_readable($dir . $directory . "/")) { ?>
            <li class="list-group-item"><img src="/assets/folder.png" style="width: 20px; height:auto; margin-right: 10px;" alt=""><?= $directory ?>
              <?php if ((hasChildrenEle($dir . $directory . "/")) > 0) {
                $folderList = getChildrenList($dir . $directory . "/"); ?>
                <? foreach ($folderList as $list) { ?>
                  <?= $list ?>
                <?php } ?>
              <?php } ?>
            </li>
            <!-- IF FOLDER IS NOT READABLE-->
          <?php } else { ?>
            <li class="list-group-item" style="color: grey"><img src="/assets/folder.png" style="width: 20px; height:auto; margin-right: 10px;" alt=""><?= $directory ?></li>
          <?php } ?>

          <!-- IF FILES -->
        <?php } else { ?>
          <li class="list-group-item"><img src="/assets/files.png" style="width: 16px; height:auto; margin-right: 10px;" alt=""><?= $directory ?></li>
        <?php } ?>
      <? endforeach; ?>

    </ul>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>