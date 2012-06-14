<?php

class Example {

  public $a = 1;
  protected $b = 2;
  private $c = 3;

  function show_abc() {
    echo $this->a;
    echo $this->b;
    echo $this->c;
  }

  public function hello_everyone() {
    return "Hello everyone.<br />";
  }

  protected function hello_family() {
    return "Hello family.<br />";
  }

  private function hello_me() {
    return "Hello me.<br />";
  }

  function hello() {
    $output = $this->hello_everyone();
    $output .= $this->hello_family();
    $output .= $this->hello_me();
    return $output;
  }

}

$example = new Example();

echo "public a:{$example->a}<br />";
//echo "proteced b:{$example->b}<br />";
//echo "private c:{$example->c}<br />";
$example->show_abc();

echo "<br />";
echo "hello_everyone: {$example->hello_everyone()}<br />";
//echo "hello_family: {$example->hello_family()}<br />";
//echo "hello_me: {$example->hello_me()}<br />";
echo $example->hello();