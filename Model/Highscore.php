<?php

class Highscore extends AppModel {

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        )
    );

}
