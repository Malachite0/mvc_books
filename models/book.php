<?php
class Book {
    public $id;
    public $title;
    public $author;
    public $isbn;
    public function load($id) {
        global $mysqli;

        if (empty($id)) {
            throw new Exception("Id kan niet leeg zijn.");
        }

        $query = "SELECT * FROM mvc_boeken WHERE id = " . (int)$id;
        $result = mysqli_query($mysqli, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $this->id = $id;
            $this->title = $row['title'];
            $this->author = $row['author'];
            $this->isbn = $row['isbn'];
        } else {
            throw new Exception("Kan het boek met id {$id} niet vinden.");
        }
    }

    public function showAll() {
        global $mysqli;

        $boeken = Array();
        $result = mysqli_query($mysqli, "SELECT id FROM mvc_boeken ORDER BY id");

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {  // Gebruik associatieve array
                $bookAdd = new Book();
                $bookAdd->load($row['id']);
                $boeken[] = $bookAdd;
            }
        }
        return $boeken;
    }

    public function saveNew() {

        global $mysqli;

        $this->title = mysqli_real_escape_string($mysqli, $this->title);
        $this->author = mysqli_real_escape_string($mysqli, $this->author);
        $this->isbn = mysqli_real_escape_string($mysqli, $this->isbn);

        $query = "INSERT INTO mvc_boeken (title, author, isbn)";
        $query .= "VALUES ('{$this->title}', '{$this->author}', '{$this->isbn}')";

        if (mysqli_query($mysqli, $query)) {
            return true;
        }
        else{
            return false;
        }
    }
    public function delete() {
        global $mysqli;
        if (!is_null($this->id)) {
            $query = "DELETE FROM mvc_boeken WHERE id = " . $this->id;
            if (mysqli_query($mysqli, $query)) {
                return true;
            }
        }
        return false;
    }

}
