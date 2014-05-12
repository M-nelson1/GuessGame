<h2> Guess what number I'm thinking of!</h2>
<h2> - Test your skills! -</h2>
<p>Guess the number I'm thinking of, and I'll tell you if you're getting warm or cold.<br/> 
    If you guess it within 5 tries, I'll record your name for others to see!<br/>
    The numbers range from 1-20, so make em' count!
</p>

<h2><?php echo $this->Html->link(
    'PLAY NOW!',
    array(
        'controller' => 'Guess',
        'action' => 'create',
        'full_base' => true
    )
        ); ?> </h2><br/>
<h3>Our winners are listed below!</h3>

<table>
    <tr>
        <th>Name</th>
        <th>Score</th>
        <th>When?</th>
    </tr>

    <?php foreach ($highscore as $highscore): ?>
    <tr>
        <td><?php echo $highscore['Highscore']['name']; ?></td>
        <td>
         Did it in <?php echo $highscore['Highscore']['score']; ?> Tries!
        </td>
        <td><?php echo $highscore['Highscore']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($highscore); ?>
</table>