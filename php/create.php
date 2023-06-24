<?php

if (is_dir('../text')) {

} else {
    mkdir('../text');
}

$fname = '../text/nuevo.txt';

$file = fopen($fname, 'w+');



$route = "../text";
function listarDir($ruta)
{
    $n = 0;
    if ($handle = opendir('../text')) {

        echo "<ul><div class='form-check'>";

        /* This is the correct way to loop over the directory. */
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {

                echo "<li class='fs-4' style='list-style-type: none;'><input class='form-check-input' type='radio' name='open' value='$entry' id='flexRadioDefault$n' onchange='magic()'>";
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
        <form action="saved.php" method="POST">
            <div class="pb-4 ps-4 pt-2">
                <div class="row gx-5">

                    <div class="col">

                        <button type="submit" value="submit" class="btn btn-outline-dark btn-lg me-4" name="save">
                            Guardar Archivo
                            </a>

                    </div>

                </div>
            </div>
            <label for="titulo" class="fs-5 mx-4">Nombre del archivo:</label><br>
            <input class="mx-4 fs-4" name="titulo" id="<?php echo $titulo ?>"
                placeholder="<?php echo trim($fname, './text/.txt') ?>" />


            <hr class="mt-3 text-black bg-white mx-4 separador" />

            <div class="mt-2">
                <div class="mb-3 px-4">

                    <label for="exampleFormControlTextarea1" name='texto' class="form-label fs-2">
                        Area de Texto
                    </label>
                    <textarea class="form-control fs-4" name="contenido" id="exampleFormControlTextarea1"
                        rows="10"></textarea>

                </div>
            </div>
        </form>
        <hr class="mt-5 text-black bg-white mx-4 separador" />

    </div>

    <script>
        function prevent(e) {
            e.preventDefault();
        }
    </script>

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