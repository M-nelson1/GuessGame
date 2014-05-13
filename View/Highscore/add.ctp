
<h2>You got it! Now enter your name and hit submit!</h2>
<?php
echo $this->Form->create('Highscore');
echo $this->Form->input('name');
echo $this->Form->end('Submit');
?>
