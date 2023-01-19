<?php
require_once 'Main.php';

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function test_construct(){
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        
        $this->assertEquals($sut->get_turn(), 1);
        $this->assertEmpty($sut->get_kept_dice());
    }   
}

?>
