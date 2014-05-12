<?php

class HighscoreController extends AppController {

    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function add() {
if ($this->Session->read('high_score')) { 
        if ($this->request->is('post')) {
            $this->request->data['Highscore']['score'] = $this->Session->read('high_score');
            $this->Session->delete('high_score');
            $this->Highscore->create();
            if ($this->Highscore->save($this->request->data)) {
                $this->Session->setFlash(__('Your score has been saved.'));
                return
                        $this->redirect(
                                array('controller' => 'Welcome', 'action' => 'index')
                );
            }
            $this->Session->setFlash(__('Unable to add your score.'));
        }
    }
else
{
    $this->Session->setFlash(__('Stop cheating! How about you play the game!'));
}
}

}