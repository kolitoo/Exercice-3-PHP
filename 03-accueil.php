<?php 
$connexion = new PDO("mysql:host=localhost;dbname=blog;charset=utf8" , "root" , "");
$sth = $connexion->prepare("SELECT * FROM articles");
$sth->execute();
$articles = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="bg-success">
        <nav class="container navbar navbar-expand navbar-dark container">
            <a href="" class="navbar-brand">Réorganisation d'une page web</a>
        </nav>
    </header>
    <br>
    <br>
    <main class="container">
        <img src="https://via.placeholder.com/1200x500" class="img-fluid" alt="">
        <br>
        <br>
        <br>
        <div class="row">
        <?php foreach($articles as $article) : ?>
            <article class="col-4 mb-3">
                <div>
                    <a href="04-article.php?page=<?= $article["id"] ?>" class="btn btn-primary"><img src="https://via.placeholder.com/450x200" class="img-fluid" alt=""></a>
                    <div>
                        <?= $article["contenu"] ?>
                    </div>

                </div>
            </article>
        <?php endforeach ?>
        </div>
    </main>
</body>
</html>