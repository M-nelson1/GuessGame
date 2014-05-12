<?php

class WelcomeController extends AppController {

    public $helpers = array('Html', 'Form');
var $uses = array('Highscore');
    public function index() {


        $this->set('highscore', $this->Highscore->find('all'));
    }

}
