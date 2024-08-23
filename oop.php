<?php
class Book {
  private $title;
  private $availableCopies;

  public function __construct($title, $availableCopies) {
    $this->title = $title;
    $this->availableCopies = $availableCopies;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getAvailableCopies() {
    return $this->availableCopies;
  }

  public function borrowBook() {
    if ($this->availableCopies > 0) {
      $this->availableCopies--;
      return true;
    } else {
      return false;
    }
  }

  public function returnBook() {
    $this->availableCopies++;
  }
}

class Member {
  private $name;

  public function __construct($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function borrowBook(Book $book) {
    if ($book->borrowBook()) {
      return "{$this->getName()} successfully borrowed {$book->getTitle()}" . PHP_EOL;
    } else {
      return "Sorry, {$book->getTitle()} is not available for borrowing.";
    }
  }

  public function returnBook(Book $book) {
    $book->returnBook();
    return "{$this->getName()} successfully returned {$book->getTitle()}" . PHP_EOL;
  }
}

// Usage

// Create 2 books with the following properties
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

// Create 2 members with the following properties
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

// Apply Borrow book method to each member
$member1->borrowBook($book1);
$member2->borrowBook($book2);

// Print Available Copies with their names:
echo "Available Copies of '" . $book1->getTitle() . "': " . $book1->getAvailableCopies() . PHP_EOL;
echo "Available Copies of '" . $book2->getTitle() . "': " . $book2->getAvailableCopies() . PHP_EOL;