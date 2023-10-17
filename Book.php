<?php
class Book {
    private int $isbn;
    private string $title;
    private string $author;
    private int $available;

    public function __construct(int $isbn = 0, string $title = "", string $author = "", int $available = 0) {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->available = $available;
    }


        // Getter methods.
        public function getIsbn() : string {
            return $this->isbn;
        }
    
        public function getTitle() : string {
            return $this->title;
        }
    
        public function getAuthor() : string {
            return $this->author;
        }
    
        public function getAvailable() : bool {
            return $this->available;
        }

    // Magic Getter Method.
    public function __get($property) {
        if (isset($this->$property)) {
            return $this->$property;
        }
        else {
            echo "Sorry, this property doesn't exist.<br>";
        }
    }


      // Setter methods.
      public function setIsbn(string $isbn) : void {
        $this->isbn = $isbn;
    }

    public function setTitle(string $title) : void {
        $this->title = $title;
    }

    public function setAuthor(string $author) : void {
        $this->author = $author;
    }

    public function setAvailable(bool $available) : void {
        $this->available = $available;
    }

    // Magic Setter Method.
    public function __set($property, $value) {
        if (isset($this->$property)) {
            $this->$property = $value;
        }
        else {
            echo "Sorry, this property doesn't exist.<br>";
        }
    }

    // Implement the Magic __call() method.
    public function __call($method, $arguments) {
        if (strpos($method, 'set') === 0 && strlen($method) > 3) {
            $property = strtolower(substr($method, 3));
            if (property_exists($this, $property)) {
                $this->$property = $arguments[0];
                echo "'{$property}' set to '{$arguments[0]}'.";
                return;
            }
        }
        else if(strpos($method, 'get') === 0 && strlen($method) > 3) {
            $property = strtolower(substr($method, 3));
            if(isset($this->$property)) {
                return $this->$property;
            }
        }
        echo "'{$method}' method does not exist.<br>";
    }

    // getting an object in string format
    public function __toString(): string {
      $result =  "<i>Title: {$this->title}</i><br><i>Author: {$this->author}</i><br><i>ISBN: {$this->isbn}</i><br>";
        if(!$this->available) {
            $result .= '<b>Not available</b>';
        }
        return $result;
    }

    // getting book copy
    public function getCopy(): bool {
        if($this->available > 0) {
            $this->available--;
            return true;
        }
        else {
            return false;
        }
    }
// adding book 
    public function addCopy(int $num): bool {
        if($num > 0) {
            $this->available += $num;
            return true;
        }
        else {
            return false;
        }
    }
}
?>