<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["open"])) {
        $sex = $_POST["open"];
    }

    if (!is_dir('../text')) {
        mkdir('../text');
    }

    $text = "";

    $ofname = "../text/${sex}";
    $ofile = fopen($ofname, 'r');
    $contents = fread($ofile, filesize($ofname));

} else {
    echo "Si fallo, php es gay";
}
function listPropiedades($ruta)
{
    $datos = stat($ruta);

    echo "<ul><li>Tamaño del archivo en bytes: " . $datos[7] . "</li><li>Momento de ultimo acceso (d/m/Y): " . date('d/m/Y g:i A', $datos[8]) . "</li>";
    echo "<li>Momento de ultima modificacion (d/m/Y): " . date('d/m/Y g:i A', $datos[9]) . "</li></ul>";
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
                        </button>

                        <a href="../index.php" class="btn btn-outline-dark btn-lg me-4">Volver al inicio</a>


                    </div>
                </div>
            </div>
            <label for="titulo" class="fs-5 mx-4">Si desea cambiar el nombre al archivo, cambie este campo</label><br>
            <input class="mx-4 fs-4" name="titulo" id="<?php echo $titulo ?>" placeholder="Sin titulo"
                value="<?php echo trim($ofname, '/text.txt') ?>" />

            <hr class="mt-3 text-black bg-white mx-4 separador" />

            <div class="mt-2">
                <div class="mb-3 px-4">

                    <label for="exampleFormControlTextarea1" name='texto' class="form-label fs-2">
                        Area de Texto
                    </label>
                    <textarea class="form-control fs-4" name="contenido" id="exampleFormControlTextarea1"
                        rows="10"><?php echo $contents ?></textarea>

                </div>
            </div>
        </form>

        <hr class="mt-5 text-black bg-white mx-4 separador" />

        <div class="mx-4">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col fs-4" name="data" id="data">
                    <p>Datos del archivo:</p>
                    <p id="dataArray">
                        <?php listPropiedades($ofname) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function prevent(e) {
            e.preventDefault();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>


</body>

</html>