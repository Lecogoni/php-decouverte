<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Php - Files Explorer</title>
</head>

<?php


//$dir1    = "/var/log/";

$dir    = "/var/log/";
$directories = scandir($dir);

if (isset($_GET["path"])) {
  var_dump(strtolower($dir . $_GET["path"]));
} else {
  var_dump("empty");
}



?>


<body>

  <div class="container mt-5">
    <div class="row">

      <div class="col-2 mb-4">
        <a href="#">
          <div class="card p-3">
            <div><img src="./assets/folder-parent.png" class="rounded mx-auto d-block" alt="" style="width: 50px; height:auto;"></div>
            <div class="text-center">..</div>
            <div class="text-center"><?= dirname($dir) ?></div>
          </div>
        </a>
      </div>


      <? foreach ($directories as $directory) : ?>
        <? if (!($directory == '.' or $directory == '..')) {
          if (is_dir($dir . $directory)) {
        ?>
            <!-- IF FOLDER -->
            <div class="col-2  mb-4">
              <a href="./explore.php?path=<?= $directory ?>/">
                <div class="card p-3">
                  <div><img src="./assets/folder.png" class="rounded mx-auto d-block" alt="" style="width: 50px; height:auto;"></div>
                  <div class="text-center"><?= $directory ?></div>
                </div>
              </a>
            </div>


          <?php
          } else {
          ?>
            <!-- IF FILES -->
            <div class="col-2 mb-4">
              <!-- <a href="#"> -->
              <div class="card p-3">
                <div><img src="./assets/files.png" class="rounded mx-auto d-block" alt="" style="width: 50px; height:auto;"></div>
                <div class="text-center"><?= $directory ?></div>
              </div>
              <!-- </a> -->
            </div>
        <?php
          }
        } ?>
      <? endforeach; ?>





    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>