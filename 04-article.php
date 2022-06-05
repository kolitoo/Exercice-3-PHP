<?php 
if(isset($_GET["page"]) && is_numeric($_GET["page"])){
    $connexion = new PDO("mysql:host=localhost;dbname=blog;charset=utf8" , "root" , "");
    $sth = $connexion->prepare("SELECT * FROM articles WHERE id = :id");
    $sth->execute(["id" => $_GET["page"]]);
    $article = current($sth->fetchAll(PDO::FETCH_ASSOC));

} else {
    echo "erreur dans la requête";
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>article</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-success">
        <nav class="container navbar navbar-expand navbar-dark container">
            <a href="" class="navbar-brand">Réorganisation d'une page web</a>
        </nav>
    </header>
    <br>
    <main class="container">
        <div class="d-flex flex-column align-items-center">
        <?php if($article == true) : ?>
            <h1><?= $article["titre"] ?></h1>
            <img src="https://via.placeholder.com/1200x500" alt="" class="img-fluid rounded my-3">
            <p><?= $article["contenu"] ?></p>
        </div>
            <br>
            <div class="d-flex justify-content-end">
                <a href="03-accueil.php" class="btn btn-outline-danger">retour à l'accueil</a>
            </div>

        
        <?php else : ?>
            <h1 class="bg-danger text-center my-5 display-4 p-4">
                la page demandée n'existe pas
            </h1>
            <div class="d-flex justify-content-center">
                <a href="03-accueil.php" class="btn btn-outline-danger">Retour à l'accueil</a>
            </div>

        <?php endif  ?>


    </main>
</body>
</html>