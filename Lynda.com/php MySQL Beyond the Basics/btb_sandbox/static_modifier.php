<?php

class Student {

  static $total_students = 0;

  static function welcome_students($var = "Hello") {
    echo "{$var} students.";
  }

}

echo Student::$total_students . "<br />";
echo Student::welcome_students() . "<br />";
echo Student::welcome_students("Greetings") . "<br />";
Student::$total_students = 1;
echo Student::$total_students . "<br />";