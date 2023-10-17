<?php

    require_once './Book.php';
    require_once './Customer.php';


    $book1 = new Book("34567", " Teach Your Self", "Mrinal Kanti", 150);
    $customer1 = new Customer(123456, "Howlader", "Mrinal", "Mrinal.01@gmail.com");

    echo "<br>";
    echo "<br>";

    echo $book1->__toString();
    echo "<br>";
    echo "<br>";
    echo $customer1->__toString();

    echo "<br>";
    echo "</br>".$book1->getCopy();

?>