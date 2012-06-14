<?php

class Beverage {

  public $name;

}

$a = new Beverage();
$a->name = "coffee";
$b = $a;
$b->name = "tea";
echo $a->name;

$c = clone $a;
$c->name = "orange juice";
echo $a->name;