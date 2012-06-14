<?php

class Person {

  function say_hello() {
    echo "Hello from inside a class";
  }

}

$person = new Person();

echo get_class($person) . "<br />";

$person->say_hello();