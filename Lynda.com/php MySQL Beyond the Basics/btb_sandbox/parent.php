<?php

class A {

  static $a = 1;

  static function modified_a() {
    return self::$a + 10;
  }

}

class B extends A {

  static function attr_test() {
    echo parent::$a;
  }

  static function method_test() {
    echo parent::modified_a();
  }

}

echo A::$a . "<br />";
echo B::modified_a() . "<br />";

echo B::attr_test() . "<br />";
echo B::method_test() . "<br />";