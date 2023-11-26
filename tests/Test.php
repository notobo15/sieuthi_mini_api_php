<?php
class Test extends \PHPUnit\Framework\TestCase
{
  public function test()
  {
    $this->assertEquals(1, 1);
  }
  public function sum($i)
  {
    $sum = 0;
    if ($i <= 10) {
      if ($i / 2 === 0) {
        $sum = $sum + 1;
      } else {
        $i++;
      }
    } else {
      return $sum;
    }
  }
}
