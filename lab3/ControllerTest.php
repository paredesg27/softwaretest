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
    /**
    * @covers \YahtzeeController::get_model
    */
    public function test_get_model(){
        $result = $this->sut->get_model();
        $this->assertNotNull($result);
    }
    /**
    * @covers::get_view
    */
    public function test_get_view(){
        $result = $this->sut->get_view();
        $this->assertNotNull($result);
    }


    /**
    * @covers \YahtzeeController::get_possible_categories
    */
    public function test_get_possible_categories(){
        $result = $this->sut->get_possible_categories();
        $this->assertNotNull($result);
    }
     /**
    * @covers \YahtzeeController::get_possible_categories
    */
    public function test_get_possible_categories_ones(){
        $result = $this->sut->get_possible_categories(); 
        $this->assertNull($result['ones']);
    }
    /**
    * @covers \YahtzeeController::get_possible_categories
    */
    public function test_get_possible_categories_ones_not_null(){
            $stub = $this->createStub(Yahtzee::class);
            // Configure the stub.
            $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
            $dice = $stub->get_kept_dice();
            $this->model->update_scorecard("ones", array_sum($dice));
            $result = $this->sut->get_possible_categories();
            if(array_key_exists('ones', $result) == false){
                $test = false;
            }
           $this->assertFalse($test);
        }


    /**
    * @covers \YahtzeeController::process_score_input
    */
     public function test_process_score_input_q(){
        $result = $this->sut->process_score_input("q");
        $this->assertEquals(-1, $result);
    }
     /**
    * @covers \YahtzeeController::process_score_input
    */
    public function test_process_score_input_exit(){
        $result = $this->sut->process_score_input("exit");
        $this->assertEquals(-1, $result);
    }
    /**
    * @covers \YahtzeeController::process_score_input
    */
    public function test_process_score_input_ones(){ 
        $this->model = $this->CreateStub(Yahtzee::class);
        $this->sut = new YahtzeeController($this->model, $this->view);
        $stub = $this->model;
        $stub->method('get_kept_dice')->willReturn(array(1,1,1,1,1));
        $stub->method('get_scorecard')->willReturn(array(
            "ones" => NULL,
            "twos" => NULL,
            "threes" => NULL,
            "fours" => NULL,
            "fives" => NULL,
            "sixes" => NULL,
            "three_of_a_kind" => NULL,
            "four_of_a_kind" => NULL,
            "full_house" => NULL,
            "small_straight" => NULL,
            "large_straight" => NULL,
            "chance" => NULL,
            "yahtzee" => NULL
        ));
        $result = $this->sut->process_score_input("ones");
        $this->assertEquals($result, 0);
    }
     /**
    * @covers \YahtzeeController::process_score_input
    */
    public function test_process_score_input_invalid_category(){
        $result = $this->sut->process_score_input("aple");
        $this->assertEquals($result, -2);
    }
     /**
    * @covers \YahtzeeController::process_keep_input
    */
    public function test_process_keep_input_exit() {
        //set up (done in fixture)
        
        //call
        $result = $this->sut->process_keep_input("exit");
        //check
        $this->assertEquals(-1, $result);
    
    }
  /**
    * @covers \YahtzeeController::process_keep_input
    */
    public function test_process_keep_input_q() {
        //set up (done in fixture)
        $result = $this->sut->process_keep_input("q");
        $this->assertEquals(-1, $result);
    }
   /**
    * @covers \YahtzeeController::process_keep_input
    */
    public function test_process_keep_input_do_nothing(){
        //> If the line given is "none" "pass" or blank "", return -2.
        $result = $this->sut->process_keep_input("none");
        $this->assertEquals(-2, $result);
    }
   /**
    * @covers \YahtzeeController::process_keep_input
    */
    public function test_process_keep_input_do_nothing1(){
        //> If the line given is "none" "pass" or blank "", return -2.
        $result = $this->sut->process_keep_input("pass");
        $this->assertEquals(-2, $result);
    }
   /**
    * @covers \YahtzeeController::process_keep_input
    */
    public function test_process_keep_input_do_nothing2(){
        //> If the line given is "none" "pass" or blank "", return -2.
        $result = $this->sut->process_keep_input("");
        $this->assertEquals(-2, $result);
    }
   /**
    * @covers \YahtzeeController::process_keep_input
    */
    public function test_process_keep_input_all(){
        $this->sut->get_model()->roll(5);
        $result = $this->sut->process_keep_input("all");
        $this->assertEquals(0, $result);
        $this->assertEquals(5, count($this->sut->get_model()->get_kept_dice()));
    }
    /**
    * @covers \YahtzeeController::process_keep_input
    */
    public function test_process_keep_input_valid_index(){
             $this->sut->get_model()->roll(5);
            $result = $this->sut->process_keep_input("1");
            $this->assertEquals(4, $result);
        }
        /**
    * @covers \YahtzeeController::process_keep_input
    */
    public function test_process_keep_input_throw_exception_invalid_index(){
        $result = $this->sut->process_keep_input("ons");
        $this->assertEquals(-2, $result);
    }
    /**
    * @covers \YahtzeeController::process_keep_input
    */
    public function test_process_keep_input_throw_exception_too_many_dice(){
        $result = $this->sut->process_keep_input("1 2 3 4 5 6");
        $this->assertEquals(-2, $result);
    }
    /**
    * @covers \YahtzeeController::handle_roll
        */
   public function test_handle_roll(){
        $result = $this->sut->handle_roll();
        $this->assertEquals($result, 0);
    }
     /**
    * @covers \YahtzeeController::handle_roll
        */
    public function test_handle_roll_correct_user_strings(){
        $this->model = $this->CreateStub(Yahtzee::class);
        $this->sut = new YahtzeeController($this->model, $this->view);
        $stub = $this->model;
        $stub->method('get_kept_dice')->willReturnOnConsecutiveCalls(array(1,1), array(3), array(5));
        $stub->method('get_scorecard')->willReturn(array(
            "ones" => NULL,
            "twos" => NULL,
            "threes" => NULL,
            "fours" => NULL,
            "fives" => NULL,
            "sixes" => NULL,
            "three_of_a_kind" => NULL,
            "four_of_a_kind" => NULL,
            "full_house" => NULL,
            "small_straight" => NULL,
            "large_straight" => NULL,
            "chance" => NULL,
            "yahtzee" => NULL
        ));
        $stub2 = $this->view;
        $stub2->method('get_user_input')->willReturnOnConsecutiveCalls("ones","threes","fives");
        $result = $this->sut->handle_roll();
        $this->assertEquals($result, 0);
    }    
     /**
    * @covers \YahtzeeController::handle_roll
        */
    public function test_handle_roll_invalid_user_strings(){
        $stub = $this->view;
        $stub->method('get_user_input')->willReturn("ons");
        $result = $this->sut->handle_roll();
        $this->assertEquals($result, 0);
    }
     /**
    * @covers \YahtzeeController::handle_roll
        */
    public function test_handle_roll_q_user_string(){
        $stub = $this->view;
        $stub->method('get_user_input')->willReturn("q");
        $result = $this->sut->handle_roll();
        $this->assertEquals($result, -1);
    }
        /**
    * @covers \YahtzeeController::main_loop
        */
    public function test_main_loop(){
        $result = $this->sut->main_loop();
        $this->assertEquals($result, 0);
    }
      /**
    * @covers \YahtzeeController::main_loop
        */
    public function test_main_loop_roll_q(){
        $stub = $this->view;
        $stub->method('get_user_input')->willReturn("q");
        $result = $this->sut->main_loop();
        $this->assertEquals($result, -1);
    }
    /**
    * @covers \YahtzeeController::main_loop
    */
    public function test_main_loop_user_input_q(){
        $stub = $this->view;
        $stub->method('get_user_input')->willReturnOnConsecutiveCalls("all","q");
        $result = $this->sut->main_loop();
        $this->assertEquals($result, -1);
    }
    
    }
