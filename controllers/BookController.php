<?php

class BookController {

    private $book;

    public function __construct() {
        $this->book = new Book();
    }

    public function index() {
        $boekenArray = $this->book->showAll();
        include 'views/bookList.php';
    }

    public function showBook($id) {
        if(!is_null($id)){
            $this->book->load($id);
        }
        $boek = $this->book;
        include 'views/bookDetails.php';
    }

    public function newBook() {
        global $mysqli;

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["knop"])) {
            $book = new Book();
            $book->title = $_POST["title"];
            $book->author = $_POST["author"];
            $book->isbn = $_POST["isbn"];

            if ($book->saveNew()) {
                echo "<p>Boek succesvol toegevoegd!</p>";
                echo "<a href='index.php'>Terug naar lijst</a>";
            } else {
                echo "<p>Fout bij toevoegen van boek.</p>";
            }
        }
    }
    public function deleteBook($id) {
        if (!is_null($id)){
            $this->book->load($id);
            if($this->book->delete()){
                $result = "Boek met id {$id} is verwijderd.";
            }
            else{
                $result = "Fout met verwijderen van boe met id {$id}.";
            }
        }
        else{
            $result = "Boek met id {$id} noet gevonden.";
        }
        include 'views/deleteBookResult.php';
    }
}