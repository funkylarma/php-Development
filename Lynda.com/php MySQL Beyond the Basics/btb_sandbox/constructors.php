<?php

class Table {

  public $legs;
  static public $total_tables = 0;

  function __construct() {
    $this->legs = 4;
    Table::$total_tables++;
  }

}

$table = new Table();
echo $table->legs . "<br />";

echo Table::$total_tables . "<br />";
$t1 = new Table();
echo Table::$total_tables . "<br />";
$t2 = new Table();
echo Table::$total_tables . "<br />";