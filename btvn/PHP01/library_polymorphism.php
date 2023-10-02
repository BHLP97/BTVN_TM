<?php
interface Readable {
    public function read();
}

interface Borrowable {
    public function borrow();
    public function returnItem();
}

class Ebook implements Borrowable,Readable {
    private $title;
    private $author;
    private $isBorrowed;

    public function __construct($title, $author, $isBorrowed){
        $this->title = $title;
        $this->author = $author;
        $this->isBorrowed = $isBorrowed;
    }
    public function borrow(){
        if($this->isBorrowed == 0){
            echo("Borrowing the ebook ".$this->title."<br>");
            $this->isBorrowed = 1;
        } else {
            echo($this->title." has already been borrowed<br>");
        }
    }
    public function returnItem(){
        if($this->isBorrowed == 1){
            echo("Returning the ebook ".$this->title."<br>");
            $this->isBorrowed = 0;
        } else {
            echo("The ebook ".$this->title." has already been returned<br>");
        }
    }
    public function read() {
        echo("Reading the paper book.<br>");
    }
}

class PaperBook implements Borrowable,Readable {
    public function __construct($title, $author, $isBorrowed){
        $this->title = $title;
        $this->author = $author;
        $this->isBorrowed = $isBorrowed;
    }
    public function read() {
        echo("Reading the paper book.<br>");
    }
    public function borrow(){
        if($this->isBorrowed == 0){
            echo("Borrowing the paper book ".$this->title."<br>");
            $this->isBorrowed = 1;
        } else {
            echo("The paper book ".$this->title." has already been borrowed<br>");
        }
    }
    public function returnItem(){
        if($this->isBorrowed == 1){
            echo("Returning the paper book ".$this->title."<br>");
            $this->isBorrowed = 0;
        } else {
            echo("The paper book ".$this->title." has already been returned<br>");
        }
    }
}

$book1 = new PaperBook("Title1", "Jimmy", 0);
$book2 = new EBook("Title2", "Gemmy", 0);

$book1->borrow();
$book1->borrow();
$book1->read();
$book1->returnItem();
$book2->returnItem();
$book2->borrow();
$book2->read();
$book2->returnItem();