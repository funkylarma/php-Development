<?php

class Person {

  function say_hello() {
    echo "Hello from inside a class";
  }

}

$methods = get_class_methods("Person");
foreach ($methods as $method) {
  echo $method . "<br />";
}

if (method_exists("Person", "say_hello")) {
  echo "Method does exist.<br />";
} else {
  echo "Method does not exist.<br />";
}