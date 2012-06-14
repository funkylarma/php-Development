<?php

class Person {

}

// $classes = get_declared_classes();
// foreach($classes as $class) {
//   echo $class . "<br />";
// }

if (class_exists("Person")) {
  echo "That class has been defined.<br />";
} else {
  echo "Class not defined!<br />";
}