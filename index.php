<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>boekenapplicatie</title>
</head>
<body>
<h3><a href="?voegtoe">voegtoe</a></h3>
<?php
require "inc/config.inc.php";
require_once "models/book.php";
require_once "controllers/BookController.php";

$ctr = new BookController();

if(isset($_GET['voegtoe'])){
    ?>
    <h3>Boek Toevoegen:</h3>
    <form method="post" action="">
        <p>Titel: <input type="text" name="title" required></p>
        <p>Auteur: <input type="text" name="author" required></p>
        <p>ISBN: <input type="number" name="isbn" required></p>
        <p><input type="submit" name="knop" value="VOEG TOE"></p>
    </form>

<?php
}
if (isset($_GET['verwijder'])){
    $ctr->deleteBook($_GET['verwijder']);
}
if (isset($_POST['knop'])) {
    $ctr->newBook();
}

if (isset($_GET["id"])) {
    $ctr->showBook($_GET["id"]);
}
else{
    $ctr->index();

}
?>

</body>
</html>