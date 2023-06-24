<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["titulo"])) {
        if (isset($_POST["contenido"])) {
            if (!is_dir('../text')) {
                mkdir('../text');
            }

            $title = $_POST["titulo"];
            $content = $_POST["contenido"];

            if (empty($content) && empty($titulo)) {
                $title = "nuevo";
                $content = ".";
            }

            $fp = fopen("../text/${title}.txt", "w");
            fwrite($fp, $content);
            fclose($fp);
        }else{
            echo "si fallo hay un error en el isset de contenido";
        }
    } else {
        echo "si fallo hay un error en el isset de titulo";
    }
} else {
    echo "si fallo, php es gay";
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

    <div class="container-fluid">
        <h2>Bloc de notas</h2>
        <h4 class="me-3">- Desarrollado por Jose Duarte</h4>
        <hr class="mt-3 text-black bg-white separador" />

        <h4 class='mt-4'>Su archivo ha sido guardado</h4>
        <a type="button" class="btn btn-outline-dark btn-lg me-4" href="../index.php">Volver al inicio</a>

    </div>

</body>

</html>