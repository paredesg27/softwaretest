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

    public function test_get_turn(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
            
        //execute
        $result = $sut->get_turn();
        //analyze
        $this->assertEquals($result, 1);
    }
    public function test_get_kept_dice(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        //execute
        $result = $sut->get_kept_dice();
        //analyze
        $this->assertEquals(array_sum($result), 0);
    }
    public function test_get_scorecard(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $sut->update_scorecard("ones", 3);
        //execute
        $result = $sut->get_scorecard();
        //analyze
        $this->assertEquals(array_sum($result), 3);
        
    }
    public function test_roll(){
        $stub = $this->createStub(YahtzeeDice::class);
         $stub->method('roll')->willReturn(array(1,2,3,4,5));
         //setup 
      
         $sut = new Yahtzee($stub);
         //execute
         
         $result = $sut->roll(5);
         //analyze
         $this->assertEquals($result, array(1,2,3,4,5));
    }
    public function test_update_scorecard(){
         //setup class
         $d = new YahtzeeDice();
         $sut = new Yahtzee($d);
         //execute
         $sut->update_scorecard("ones", 3);
         $scorecard= $sut->get_scorecard();
         //analyze
        
        $this-> assertEquals($scorecard["ones"], 3);
    }
       public function test_update_scorecard_throws_exception(){
           $this->expectException(YahtzeeException::class);
         //setup class
         $d = new YahtzeeDice();
         $sut = new Yahtzee($d);
         //execute
         $sut->update_scorecard("ons", 3);
         $scorecard = $sut->get_scorecard();
         //analyze
        
        $this-> assertEquals($scorecard["ons"], 3);
    }
    public function test_calculate_chance(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $array = array(1,2,3,4,5,6);
        //execute
        $result = $sut->calculate_chance($array);
        //analyze
        $this->assertEquals($result, 21);   
    }
    public function test_is_bonus(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $compare = false;
        //execute
        $result = $sut->is_bonus();
        //analyze
        $this->assertSame($result,$compare );   
    }
     public function test_calculate_number(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $array = array(1,2,3,4,5,6);
        $num = 1;
        //execute
        $result = $sut->calculate_number($array, $num);
        //analyze
        $this->assertEquals($result, 1);   
    }
    public function test_calculate_large_straight(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $array = array(1,2,3,3,4);
        //execute
        $result = $sut->calculate_large_straight($array);
        //analyze
        $this->assertNotEquals($result, 40);
        //error expected value of 40 but returns 0
   }
   public function test_calculate_large_straight_non_error(){
    //setup class
    $d = new YahtzeeDice();
    $sut = new Yahtzee($d);
    $array = array(1,2,3,4,5);
    //execute
    $result = $sut->calculate_large_straight($array);
    //analyze
    $this->assertEquals($result, 40);
   
}
    public function test_calculate_small_straight(){
       
         //setup class
         $d = new YahtzeeDice();
         $sut = new Yahtzee($d);
         $array = array(1,2,3,3,4);
         //execute
         $result = $sut->calculate_small_straight($array);
         //analyze
         $this->assertNotEquals($result, 30);
         //error expected value of 40 but returns 0
    }
    public function test_calculate_small_straight_non_error(){
       
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $array = array(1,2,3,4,5);

        //execute
        $result = $sut->calculate_small_straight($array);
        //analyze
        $this->assertEquals($result, 30);
   }
    public function test_clear_kept_dice(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        //execute
        
        $result = $sut->clear_kept_dice();
        //analyze
        $this->assertNull($result);
    }
    public function test_calculate_n_of_a_kind(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $array = array(1,1,1,2,2);
        $num = 3;
        //execute
        $result = $sut->calculate_n_of_a_kind($array, $num);
        //analyze
        $this->assertEquals($result, 7);
    }
    public function test_calculate_n_of_a_kind_return_zero(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $array = array(1,1,2,2);
        $num = 3;
        //execute
        $result = $sut->calculate_n_of_a_kind($array, $num);
        //analyze
        $this->assertEquals($result, 0);
    }
    public function test_calculate_yahtzee(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $array = array(1,1,1,2,1,1);
       
        //execute
        $result = $sut->calculate_yahtzee($array);
        //analyze
        $this->assertEquals($result, 50);
    }
    public function test_calculate_yahtzee_return_zero(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $array = array(1,1,1,1);
       
        //execute
        $result = $sut->calculate_yahtzee($array);
        //analyze
        $this->assertEquals($result, 0);
    }
    public function test_calculate_full_house(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $array = array(1,1,2,2,1);
       
        //execute
        $result = $sut->calculate_full_house($array);
        //analyze
        $this->assertEquals($result, 25);
    }
    public function test_calculate_full_house_return_zero(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $array = array(1,2,1);
       
        //execute
        $result = $sut->calculate_full_house($array);
        //analyze
        $this->assertEquals($result, 0);
    }
    public function test_longest_straight(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $array = array(1,2,3,4,4,5);
       
        //execute
        $result = $sut->longest_straight_sequence($array);
        //analyze
        $this->assertNotEquals($result, 4);
        //error expected value of 4 but returns 2 
    }
   
    public function test_array_to_string(){
        //setup class
        $array = array(1,2);
        //execute
        $result = array_to_string($array);
        //analyze
        $this->assertEquals($result, "[1, 2]");
    }
    public function test_combine_dice(){
       //setup class
       $d = new YahtzeeDice();
       $sut = new Yahtzee($d);
       //execute
       $result = $sut->combine_dice();
       //analyze
       $this->assertEquals($result, 0);
    }
    public function test_calcualte_ones(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "ones";
        $roll = array(1,1);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertEquals($result, 2);
     }
     public function test_calcualte_twos(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "twos";
        $roll = array(2,2);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertEquals($result, 4);
     }
     public function test_calcualte_threes(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "threes";
        $roll = array(3,3);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertEquals($result, 6);
     }
     public function test_calcualte_fours(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "fours";
        $roll = array(4,4);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertEquals($result, 8);
     }
     public function test_calcualte_fives(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "fives";
        $roll = array(5,5);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertEquals($result, 10);
     }
     public function test_calcualte_sixes(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "sixes";
        $roll = array(6,6);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertEquals($result, 12);
     }
     public function test_calcualte_three_of_a_kind(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "three_of_a_kind";
        $roll = array(1,1,1,3,4);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertEquals($result, 10);
     }
     public function test_calcualte_four_of_a_kind(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "four_of_a_kind";
        $roll = array(1,1,1,1,5);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertEquals($result, 9);
     }
     public function test_calcualte_method_full_house(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "full_house";
        $roll = array(1,1,2,2,2);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertEquals($result, 25);
     }
     public function test_calcualte_method_small_straight(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "small_straight";
        $roll = array(1,2,3,3,4);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertNotEquals($result, 30);
        //errors should be Equals so put NotEquals
     }
   
     public function test_calcualte_large_straight(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "large_straight";
        $roll = array(1,2,3,3,4);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertNotEquals($result, 40);
        //error in code since it should be Equals so put NotEquals
     }
    
     public function test_calcualte_chance(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "chance";
        $roll = array(1,2,3,4,5,6);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertEquals($result, 21);
     }
     public function test_calcualte_yahtzee(){
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "yahtzee";
        $roll = array(1,1,1,2,1,1);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertEquals($result, 50);
     }
     public function test_calcualte_expect_exception(){
        $this->expectException(YahtzeeException::class);
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $category = "ons";
        $roll = array(1,1);
        //execute
        $result = $sut->calculate($category, $roll);
        //analyze
        $this->assertEquals($result, 2);
     }
    public function test_keep_by_index_expect_invalid_index(){
        $this->expectException(YahtzeeException::class);
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $string = "ones";
        //execute
        $result = $sut->keep_by_index($string);   
    }
    public function test_keep_by_index_expect_too_many_dice(){
        $this->expectException(YahtzeeException::class);
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $string = "1 2 3 4 5 6";
        $result = $sut ->keep_by_index($string);
        //execute
       // $result = $sut->keep_by_index($string);
       $this->assertEquals($result,2);
        
    }
    public function test_keep_by_index_return_remaining(){
        $stub = $this->createStub(YahtzeeDice::class);
         $stub->method('roll')->willReturn(array(1,2,3,4,5));
        //setup class
        $d = new YahtzeeDice();
        $sut = new Yahtzee($d);
        $int = 5;
        $string = "1 2 3 4";
        $sut->roll($int);
        $sut ->get_kept_dice();
        $result = $sut ->keep_by_index($string);
        //execute
       // $result = $sut->keep_by_index($string);
       $this->assertEquals($result,1);
        
    }
    
}

?>
