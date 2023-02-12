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
        $this->assertEquals(0, array_sum($result));
    }
    public function test_process_score_input_q(){
        $result = $this->sut->process_score_input("q");
        $this->assertEquals(-1, $result);
    }
    public function test_process_score_input_exit(){
        $result = $this->sut->process_score_input("exit");
        $this->assertEquals(-1, $result);
    }
    public function test_process_score_input_ones(){
        $stub = $this->createStub(YahtzeeDice::class);
        $stub-> method('roll')->willReturn(array(1,1));
        $this->model->get_kept_dice();
        $result = $this->sut->process_score_input("ones");
        $this->assertEquals(0, $result);
    }
    }
