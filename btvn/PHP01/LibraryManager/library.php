<?php

/*
    Class Book: Đây là lớp đại diện cho một cuốn sách.
    Thuộc tính:
        $id: ID duy nhất của cuốn sách.
        $title: Tiêu đề của cuốn sách.
        $author: Tác giả của cuốn sách.
        $publicationYear: Năm xuất bản của cuốn sách.
        $imageReview: Ảnh review cuốn sách
        $type: Loại sách (eBook hay paperBook)
*/

class Book{
    // Khai báo các thuộc tính (property)
    private $id;
    private $title;
    private $author;
    private $publicationYear;
    private $imageReview;
    private $type;

    // Phương thức (method) khởi tạo
    public function __construct($id, $title, $author, $publicationYear, $imageReview,$type) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
        $this->imageReview = $imageReview;
        $this->type = $type;
    }
    // Getter setter
    public function setId($id){
        $this->id = $id;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
    public function setPublicationYear($publicationYear){
        $this->publicationYear = $publicationYear;
    }
    public function setImageReview($imageReview){
        $this->imageReview = $imageReview;
    }
    public function setType($type){
        $this->type = $type;
    }

    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title ;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function getPublicationYear(){
        return $this->publicationYear ;
    }
    public function getImageReview(){
        return $this->imageReview;
    }
    public function getType(){
        return $this->type;
    }
}
/*
    Class Library: Đây là lớp đại diện cho thư viện chứa danh sách các cuốn sách.
    Thuộc tính:
        $books: Mảng chứa các cuốn sách.
    Phương thức:
        addBook($book): Thêm một cuốn sách mới vào thư viện.
        removeBook($book): Xoá một cuốn sách khỏi thư viện.
        searchByTitle($title): Tìm kiếm cuốn sách theo tiêu đề.
        searchByAuthor($author): Tìm kiếm cuốn sách theo tác giả.
        getBooks(): Lấy danh sách tất cả các cuốn sách trong thư viện.
*/

class Library{
    // Khai báo các thuộc tính (property)
    private $books;
    public function __construct(){
        $this->books = Array();
    }
    // Getter setter
    public function setBooks($books){
        $this->books = $books;
    }
    public function getAllBooks(){
        return $this->books;
    }

    // Methods
    public function addBook($book){
        array_push($this->books, $book);
    }
    public function searchBookById($id){
        $index = -1;
        for($i=0; $i < count($this->books);$i++){
            if ($this->books[$i]->getId() == $id) {
                //echo('Locked on ' . $this->books[$i]->getTitle() . ' with the id ' . $id . ' at the index: ' . $i . '<br>');
                return $i;
            }
        }

        return $index;
    }
    public function searchBookByTitle($title){
        $index = -1;
        for($i=0; $i< count($this->books);$i++)
            if ($this->books[$i]->title == $title)
                return $i;
        return $index;
    }
    public function searchBookByAuthor($author){
        $index = -1;
        for($i=0; $i< count($this->books);$i++)
            if ($this->books[$i]->author == $author)
                return $i;
        return $index;
    }
    public function removeBook($book){
        $index = $this->searchBookById($book->getId());
        echo('Removing the loaned book titled '.$book->getTitle().' with the id '.$book->getId().'<br>');
        if($index != -1) array_splice($this->books, $index, 1);
    }
}
class User{
    private $id;
    private $fullName;

    public function __construct($id, $fullName){
        $this->id = $id;
        $this->fullName = $fullName;
    }
    public function getFullName(){
        return $this->fullName;
    }
}
class Loan{
    private $user;
    private $book;
    private $dueDate;

    public function __construct($user, $book, $dueDate){
        $this->user = $user;
        $this->book = $book;
        $this->dueDate = $dueDate;
    }
    public function getUser(){
        return $this->user;
    }
    public function getBook(){
        return $this->book;
    }
    public function getDueDate(){
        return $this->dueDate;
    }
}

// Test

$book1 = new Book(1, 'Title 1', 'Author 1', 1999, 'Image1.png', 'paperBook');
$book2 = new Book(2, 'Title 2', 'Author 2', 2000, 'Image2.png', 'eBook');
$book3 = new Book(3, 'Title 3', 'Author 3', 2001, 'Image3.png', 'paperBook');
$book1->setTitle('Title 1 Alt');
$book1->setAuthor('Author 1 Alt');
$book1->setpublicationYear(2019);
$book1->setImageReview('Image1Alt.png');
$book1->setType('eBook');

$library = new Library();
$library->addBook($book1);
$library->addBook($book2);
$library->addBook($book3);

echo ('Listing all the books available in our library below: <br>');
foreach($library->getAllBooks() as $book){
    echo($book->getTitle().' is a book written by '.$book->getAuthor().' and published in the year '.$book->getPublicationYear($book).'<br>');
}
echo('__________________________________________________<br>');

$user1 = new User(1, 'User 1');
$user2 = new User(2, 'User 2');

$loan1 = new Loan($user1, $book1, '31/10/2023'); // User1 mượn quyển book1
$loan2 = new Loan($user2, $book3, '31/12/2023'); // User2 mượn quyển book3

echo ('Listing all library loans below: <br>');
echo ($loan1->getUser()->getFullName().' has until the '.$loan1->getDueDate().' to give back the book "'.$loan1->getBook()->getTitle().'" they just loaned right now<br>');
echo ($loan2->getUser()->getFullName().' has until the '.$loan2->getDueDate().' to give back the book "'.$loan2->getBook()->getTitle().'" they just loaned right now<br>');
echo('__________________________________________________<br>');

$library->removeBook($book1);
$library->removeBook($book3);
echo('__________________________________________________<br>');

echo ('Listing all the books available in our library below: <br>');
foreach($library->getAllBooks() as $book){
    echo($book->getTitle().' is a book written by '.$book->getAuthor().' and published in the year '.$book->getPublicationYear($book).'<br>');
}