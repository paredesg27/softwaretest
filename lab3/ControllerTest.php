<?php
require_once 'Main.php';

use PHPUnit\Framework\TestCase;

class ControllerTest extends TestCase
{
    private $model;
    private $view;
    private $sut;
    
    public function setUp() :void {
        $d = new YahtzeeDice();
        $this->model = new Yahtzee($d);
        $this->view = $this->createStub(YahtzeeView::class);
        $this->sut = new YahtzeeController($this->model, $this->view);
    } 
    public function test_get_model(){
        $result = $this->sut->get_model();
        $this->assertNotNull($result);
    }
    public function test_get_view(){
        $result = $this->sut->get_view();
        $this->assertNotNull($result);
    }
    public function test_get_possible_categories(){
        $result = $this->sut->get_possible_categories();
        $this->assertNotNull($result);
    }
    public function test_get_possible_categories_ones(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $dice = $this->model->get_kept_dice();
        $this->model->update_scorecard("ones", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['ones'], array_sum($dice));
    }
    public function test_get_possible_categories_twos(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $dice = $this->model->get_kept_dice();
        $this->model->update_scorecard("twos", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['twos'], array_sum($dice));
    }
    public function test_get_possible_categories_threes(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $dice = $this->model->get_kept_dice();
        $this->model->update_scorecard("threes", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['threes'], array_sum($dice));
    }
    public function test_get_possible_categories_fours(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $dice = $this->model->get_kept_dice();
        $this->model->update_scorecard("fours", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['fours'], array_sum($dice));
    }
    public function test_get_possible_categories_fives(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $dice = $this->model->get_kept_dice();
        $this->model->update_scorecard("fives", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['fives'], array_sum($dice));
    }
    public function test_get_possible_categories_sixes(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $dice = $this->model->get_kept_dice();
        $this->model->update_scorecard("sixes", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['sixes'], array_sum($dice));
    } 
    public function test_get_possible_categories_three_of_a_kind(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $dice = $this->model->get_kept_dice();
        $this->model->update_scorecard("three_of_a_kind", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['three_of_a_kind'], array_sum($dice));
    }
    public function test_get_possible_categories_four_kind(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $dice = $this->model->get_kept_dice();
        $this->model->update_scorecard("four_of_a_kind", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['four_of_a_kind'], array_sum($dice));
    }
    public function test_get_possible_categories_full_house(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $dice = $this->model->get_kept_dice();
        $this->model->update_scorecard("full_house", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['full_house'], array_sum($dice));
    }
    public function test_get_possible_categories_small_straight(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $dice = $this->model->get_kept_dice();
        $this->model->update_scorecard("small_straight", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['small_straight'], array_sum($dice));
    }
    public function test_get_possible_categories_large_straight(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $dice = $this->model->get_kept_dice();
        $this->model->update_scorecard("large_straight", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['large_straight'], array_sum($dice));
    }
    public function test_get_possible_categories_chance(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $dice = $this->model->get_kept_dice();
        $this->model->update_scorecard("chance", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['chance'], array_sum($dice));
    }
    public function test_get_possible_categories_yahtzee(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $dice = $this->model->get_kept_dice();
        $this->model->update_scorecard("yahtzee", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['yahtzee'], 7);
    }
     public function test_process_score_input_q(){
        $result = $this->sut->process_score_input("q");
        $this->assertEquals(-1, $result);
    }
    public function test_process_score_input_exit(){
        $result = $this->sut->process_score_input("exit");
        $this->assertEquals(-1, $result);
    }
    // public function test_process_score_input_exit_invalid_input(){
    //     //test
    // }
    public function test_process_score_input_ones(){
        $stub = $this->createStub(YahtzeeDice::class);
        // Configure the stub.
        $stub->method("roll")->willReturn(array(1,1));
        $this->model->roll(2);
        $this->model->get_kept_dice();
        $this->model->combine_dice();
        
        $result = $this->sut->process_score_input("ones");
        $this->assertEquals($result, 5);
    }
    
    public function test_process_keep_input_exit() {
        //set up (done in fixture)
        
        //call
        $result = $this->sut->process_keep_input("exit");
        //check
        $this->assertEquals(-1, $result);
    
    }
    public function test_process_keep_input_q() {
        //set up (done in fixture)
        $result = $this->sut->process_keep_input("q");
        $this->assertEquals(-1, $result);
    }
    
    public function test_process_keep_input_do_nothing(){
        //> If the line given is "none" "pass" or blank "", return -2.
        $result = $this->sut->process_keep_input("none");
        $this->assertEquals(-2, $result);
    }
    public function test_process_keep_input_do_nothing1(){
        //> If the line given is "none" "pass" or blank "", return -2.
        $result = $this->sut->process_keep_input("pass");
        $this->assertEquals(-2, $result);
    }
    public function test_process_keep_input_do_nothing2(){
        //> If the line given is "none" "pass" or blank "", return -2.
        $result = $this->sut->process_keep_input("");
        $this->assertEquals(-2, $result);
    }
    
    public function test_process_keep_input_all(){
        $this->sut->get_model()->roll(5);
        $result = $this->sut->process_keep_input("all");
        $this->assertEquals(0, $result);
        $this->assertEquals(5, count($this->sut->get_model()->get_kept_dice()));
    }
    public function test_process_keep_input_valid_index(){
             $this->sut->get_model()->roll(5);
            $result = $this->sut->process_keep_input("1");
            $this->assertEquals(4, $result);
        }
    public function test_process_keep_input_throw_exception_invalid_index(){
        $result = $this->sut->process_keep_input("ons");
        $this->assertEquals(-2, $result);
    }
    public function test_process_keep_input_throw_exception_too_many_dice(){
        $result = $this->sut->process_keep_input("1 2 3 4 5 6");
        $this->assertEquals(-2, $result);
    }
//    public function test_handle_roll(){
//         $result = $this->sut->handle_roll();
//     }
   
    }
