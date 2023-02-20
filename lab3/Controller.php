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
    // @covers get_model()
    public function test_get_model(){
        $result = $this->sut->get_model();
        $this->assertNotNull($result);
    }
    // @covers get_view()
    public function test_get_view(){
        $result = $this->sut->get_view();
        $this->assertNotNull($result);
    }
    // @covers get_possibile_categories 
    public function test_get_possible_categories(){
        $result = $this->sut->get_possible_categories();
        $this->assertNotNull($result);
    }
    public function test_get_possible_categories_ones(){
       $stub = $this->createStub(Yahtzee::class);
        // Configure the stub.
      $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $dice = $stub->get_kept_dice();
        $this->model->update_scorecard("ones", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['ones'], 5);
    }
    public function test_get_possible_categories_twos(){
       $stub = $this->createStub(Yahtzee::class);
        // Configure the stub.
      $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $dice = $stub->get_kept_dice();
        $this->model->update_scorecard("twos", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['twos'], 5);
    }
    public function test_get_possible_categories_threes(){
       $stub = $this->createStub(Yahtzee::class);
        // Configure the stub.
      $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $dice = $stub->get_kept_dice();
        $this->model->update_scorecard("threes", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['threes'], 5);
    }
    public function test_get_possible_categories_fours(){
       $stub = $this->createStub(Yahtzee::class);
        // Configure the stub.
      $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $dice = $stub->get_kept_dice();
        $this->model->update_scorecard("fours", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['fours'], 5);
    }
    public function test_get_possible_categories_fives(){
       $stub = $this->createStub(Yahtzee::class);
        // Configure the stub.
      $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $dice = $stub->get_kept_dice();
        $this->model->update_scorecard("fives", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['fives'], 5);
    }
    public function test_get_possible_categories_sixes(){
       $stub = $this->createStub(Yahtzee::class);
        // Configure the stub.
      $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $dice = $stub->get_kept_dice();
        $this->model->update_scorecard("sixes", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['sixes'], 5);
    } 
    public function test_get_possible_categories_three_of_a_kind(){
       $stub = $this->createStub(Yahtzee::class);
        // Configure the stub.
      $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $dice = $stub->get_kept_dice();
        $this->model->update_scorecard("three_of_a_kind", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['three_of_a_kind'], 5);
    }
    public function test_get_possible_categories_four_kind(){
       $stub = $this->createStub(Yahtzee::class);
        // Configure the stub.
      $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $dice = $stub->get_kept_dice();
        $this->model->update_scorecard("four_of_a_kind", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['four_of_a_kind'], 5);
    }
    public function test_get_possible_categories_full_house(){
       $stub = $this->createStub(Yahtzee::class);
        // Configure the stub.
      $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $dice = $stub->get_kept_dice();
        $this->model->update_scorecard("full_house", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['full_house'], 5);
    }
    public function test_get_possible_categories_small_straight(){
       $stub = $this->createStub(Yahtzee::class);
        // Configure the stub.
      $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $dice = $stub->get_kept_dice();
        $this->model->update_scorecard("small_straight", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['small_straight'], 5);
    }
    public function test_get_possible_categories_large_straight(){
       $stub = $this->createStub(Yahtzee::class);
        // Configure the stub.
      $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $dice = $stub->get_kept_dice();
        $this->model->update_scorecard("large_straight", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['large_straight'], 5);
    }
    public function test_get_possible_categories_chance(){
        $stub = $this->createStub(Yahtzee::class);
        // Configure the stub.
      $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $dice = $stub->get_kept_dice();
        $this->model->update_scorecard("chance", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['chance'], 5);
    }
    public function test_get_possible_categories_yahtzee(){
        $stub = $this->createStub(Yahtzee::class);
        // Configure the stub.
        $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $dice = $stub->get_kept_dice();
        $this->model->update_scorecard("yahtzee", array_sum($dice));
        $result = $this->sut->get_possible_categories();
        
        $this->assertEquals($result['yahtzee'], 5);
    }
    // @cover process_score_input
     public function test_process_score_input_q(){
        $result = $this->sut->process_score_input("q");
        $this->assertEquals(-1, $result);
    }
     // @cover process_score_input
    public function test_process_score_input_exit(){
        $result = $this->sut->process_score_input("exit");
        $this->assertEquals(-1, $result);
    }

    public function test_process_score_input_ones(){
        $this->model = $this->createStub(Yahtzee::class);
        $stub = $this->model;
        $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        
        $result = $this->sut->process_score_input("ones");
        $this->assertEquals($result, 0);
    }
     // @cover process_score_input
    public function test_process_score_input_invalid_category(){
        $result = $this->sut->process_score_input("aple");
        $this->assertEquals($result, -2);
    }
     // @cover process_keep_input
    public function test_process_keep_input_exit() {
        //set up (done in fixture)
        
        //call
        $result = $this->sut->process_keep_input("exit");
        //check
        $this->assertEquals(-1, $result);
    
    }
    // @cover process_keep_input
    public function test_process_keep_input_q() {
        //set up (done in fixture)
        $result = $this->sut->process_keep_input("q");
        $this->assertEquals(-1, $result);
    }
    // @cover process_keep_input
    public function test_process_keep_input_do_nothing(){
        //> If the line given is "none" "pass" or blank "", return -2.
        $result = $this->sut->process_keep_input("none");
        $this->assertEquals(-2, $result);
    }
    // @cover process_keep_input
    public function test_process_keep_input_do_nothing1(){
        //> If the line given is "none" "pass" or blank "", return -2.
        $result = $this->sut->process_keep_input("pass");
        $this->assertEquals(-2, $result);
    }
    // @cover process_keep_input
    public function test_process_keep_input_do_nothing2(){
        //> If the line given is "none" "pass" or blank "", return -2.
        $result = $this->sut->process_keep_input("");
        $this->assertEquals(-2, $result);
    }
    // @cover process_keep_input
    public function test_process_keep_input_all(){
        $this->sut->get_model()->roll(5);
        $result = $this->sut->process_keep_input("all");
        $this->assertEquals(0, $result);
        $this->assertEquals(5, count($this->sut->get_model()->get_kept_dice()));
    }
    // @cover process_keep_input
    public function test_process_keep_input_valid_index(){
             $this->sut->get_model()->roll(5);
            $result = $this->sut->process_keep_input("1");
            $this->assertEquals(4, $result);
        }
        // @cover process_keep_input
    public function test_process_keep_input_throw_exception_invalid_index(){
        $result = $this->sut->process_keep_input("ons");
        $this->assertEquals(-2, $result);
    }
    // @cover process_keep_input
    public function test_process_keep_input_throw_exception_too_many_dice(){
        $result = $this->sut->process_keep_input("1 2 3 4 5 6");
        $this->assertEquals(-2, $result);
    }
    // @cover handle_roll
   public function test_handle_roll(){
        $result = $this->sut->handle_roll();
        $this->assertEquals($result, 0);
    }
      // @cover handle_roll
    public function test_handle_roll_correct_user_strings(){
        $stub = $this->view;
        $stub->method('get_user_input')->willReturn("ones");
        $result = $this->sut->handle_roll();
        $this->assertEquals($result, 5);
    }    
     // @cover handle_roll
    public function test_handle_roll_invalid_user_strings(){
        $stub = $this->view;
        $stub->method('get_user_input')->willReturn("ons");
        $result = $this->sut->handle_roll();
        $this->assertEquals($result, 0);
    }
    // @cover handle_roll
    public function test_handle_roll_q_user_string(){
        $stub = $this->view;
        $stub->method('get_user_input')->willReturn("q");
        $result = $this->sut->handle_roll();
        $this->assertEquals($result, -1);
    }
         // @cover main_loop
    public function test_main_loop(){
        $result = $this->sut->main_loop();
        $this->assertEquals($result, 0);
    }
     // @cover main_loop
    public function test_main_loop_roll_q(){
        $stub = $this->view;
        $stub->method('get_user_input')->willReturn("q");
        $result = $this->sut->main_loop();
        $this->assertEquals($result, -1);
    }
     // @cover main_loop
    public function test_main_loop_user_input_q(){
        $stub = $this->view;
    $stub->method('get_user_input')->willReturnOnConsecutiveCalls("all","q");
    $result = $this->sut->main_loop();
    $this->assertEquals($result, -1);
    }
    
    }
