
<?php
if (isset($user_guess)) {
    ?> <h2> Your guess is: <?php echo $user_guess . ', ' . $hot_cold ?></h2><br/>
    <?php
    echo 'You have ' . $turns_left . ' turns left.';
}

echo $this->Form->create();
echo $this->Form->input('Guess', array('maxLength' => 2, 'autocomplete'=>'off')); 
echo $this->Form->end('Submit');



