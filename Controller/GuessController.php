<?php

class GuessController extends AppController {

    // stop using a model
    public $uses = array(); // why?
    public $helpers = array('Html', 'Form', 'Session');

    function beforeFilter() {

        //********* Game options *********
        if (!$this->Session->check('max_num')) {
            $this->Session->write('max_num', 20);
        }
        if (!$this->Session->check('turns_allowed')) {
            $this->Session->write('turns_allowed', 5);
        }
        //********* End *************

        if (!$this->Session->check('random_num')) {
            $this->Session->write('random_num', rand(1, $this->Session->read('max_num')));
        }
        if (!$this->Session->check('user_loop')) {
            $this->Session->write('user_loop', 0);
        }
    }

    function create() {

        $this->set('turns_left', $this->Session->read('turns_allowed') - $this->Session->read('user_loop') - 1);

        if ($this->request->is('post', 'put')) {

            $rn = $this->Session->read('random_num');
            $user_guess = $this->request->data['Guess'];
            $this->set('user_guess', $user_guess);

            $user_loop = $this->Session->read('user_loop') + 1;
            $this->Session->write('user_loop', $user_loop);

            $this->set('hot_cold', 'you are cold');
            if ($rn - $user_guess == 1 || $rn - $user_guess == -1) {
                $this->set('hot_cold', 'you are red hot!');
            }
            if ($rn - $user_guess == 2 || $rn - $user_guess == -2) {
                $this->set('hot_cold', 'you are hot!');
            }
            if ($rn - $user_guess == 3 || $rn - $user_guess == -3) {
                $this->set('hot_cold', 'you are warm!');
            }
            if ($user_guess > $this->Session->read('max_num') || $user_guess < 1 && ($rn != $user_guess)) {
                $this->set('hot_cold', 'come on man play by the rules!');
            }
            if ($rn == $user_guess) {
                $this->set('hot_cold', 'you got it!');
                $this->Session->write('high_score', $this->Session->read('user_loop')); // Handoff
                $this->Session->delete('random_num');
                $this->Session->delete('user_loop');
                $this->Session->delete('turns_allowed');
                $this->Session->delete('max_num');
                $this->redirect(array('controller' => 'Highscore', 'action' => 'add')
        );
            }
            if ($user_loop >= $this->Session->read('turns_allowed') && ($rn != $user_guess)) {
                $this->set('hot_cold', 'you ran out of turns, the number was '. $rn .' try playing again!');
                $this->Session->delete('random_num');
                $this->Session->delete('user_loop');
                $this->Session->delete('turns_allowed');
                $this->Session->delete('max_num');
            }
        
            $this->data = NULL;
            }
    }

}

?>