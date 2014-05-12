<?php

class Guess extends AppModel {

   public $validate = array(
        'guess' => array(
            'rule' => 'notEmpty'
        )
    );
 
}
