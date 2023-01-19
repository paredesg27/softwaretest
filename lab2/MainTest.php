<?php
require_once 'Main.php';

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function test_construct(){
        //setup
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        //execute the method
        //:)
        //Analyze the results
        $this->assertEquals($sut->get_turn(), 1);
        $this->assertEmpty($sut->get_kept_dice());
    }
    
    public function test_increment_turn(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        //execute method we are testing
        $result = $sut->increment_turn();
        //analyze results
        $this->assertEquals($result, 2);
        
        $result = $sut->increment_turn();
        $this->assertEquals($result, 3);
    }
    
    public function test_total_score_initial(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        //execute
        $result = $sut->calculate_total_score();
        //analyze
        $this->assertEquals($result, 0);
    }
    
    public function test_total_score_no_bonus(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $sut->update_scorecard("ones", 3);
        $sut->update_scorecard("twos", 4);
            
        //execute
        $result = $sut->calculate_total_score();
        //analyze
        $this->assertEquals($result, 7);
    }
    
    public function test_total_score_bonus(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $sut->update_scorecard("ones", 63);
            
        //execute
        $result = $sut->calculate_total_score();
        //analyze
        $this->assertEquals($result, 98);
    }
}

?>
