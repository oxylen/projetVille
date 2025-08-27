<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evènements</title>
</head>
<body>
    <header>
        <?php include "App/View/components/header.php";?>
    </header>
    <main>
    <form action="" method="post">
    <input type="email" name="email" placeholder="Saisir votre email">
    <input type="password" name="password" placeholder="Saisir votre mot de passe">
    <input type="submit" name="submit" value="Valider">
    </form>
    <p><?=$message?></p>
    </main>
    <footer>
        <?php include "App/View/components/footer.php";?>
    </footer>
</body>
</html>