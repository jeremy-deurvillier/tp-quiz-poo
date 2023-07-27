<?php

require_once('utils/autoload.php');
require_once('utils/db-connect.php');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TP Quiz POO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <section class="vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="text-center">
<?php

$db = dbConnect();

$qcm = new QcmRepository($db);

echo '<pre>';
//var_dump($qcm->getQcm());
echo '</pre>';

$qcm->getQcm()->generate();

?>
        </div>
    </section>
</body>
</html>
