<?php
if (!is_dir('./text')) {
  mkdir('./text');
}

$route = "./text";

function listarDir($ruta)
{
  $n = 0;
  if ($handle = opendir('./text')) {

    echo "<ul><div class='form-check'>";

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != "..") {

        echo "<li class='fs-5' style='list-style-type: none;'><input class='form-check-input' type='radio' name='open' value='$entry' id='flexRadioDefault$n' onchange='magic()'>";
        echo "<label class='form-check-label' for='flexRadioDefault$n'> $entry </label>";
        echo "</li><br>";
        $n++;
      }
    }

    echo "</div></ul>";
    closedir($handle);
  }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

  <link rel="stylesheet" href="/css/style.css" />
</head>

<body>
  <?php
  $titulo = "titulo";
  ?>

  <div class="container-fluid">
    <h2>Bloc de notas</h2>
    <h4 class="me-3">- Desarrollado por Jose Duarte</h4>
    <hr class="mt-3 text-black bg-white separador" />

    <div class="pb-4 ps-4 pt-2">
      <div class="row gx-5">
        <form action="php/abrir.php" method="POST">
          <div class="col">
            <a type="button" class="btn btn-outline-dark btn-lg me-4" href="php/create.php" name="create"
              onclick="prevent(event)">
              Crear Archivo
            </a>

          </div>
          <div class="col">
            <h5 class='mt-3'>Seleccionar archivo a abrir:</h5>

            <?php
            listarDir($route);
            ?>

            <button type="submit" value="submit" class="btn btn-outline-dark btn-lg me-4" id="fileSelected" hidden>
              Abrir Archivo
            </button>
          </div>
        </form>
      </div>
    </div>


    <hr class="mt-3 text-black bg-white mx-4 separador" />

    <script>
      function magic() {
        let button = document.getElementById('fileSelected');
        button.removeAttribute('hidden');
      }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"></script>


</body>

</html>