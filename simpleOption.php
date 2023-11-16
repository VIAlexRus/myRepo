<?php

function calculateScores($bets, $result) {
    $scores = array();

    foreach ($bets as $user => $bet) {
        list($betHome, $betAway) = explode(':', $bet);
        list($resultHome, $resultAway) = explode(':', $result);

        if ($betHome == $resultHome && $betAway == $resultAway) {
            $scores[$user] = 2;
        } elseif ($betHome > $betAway && $resultHome > $resultAway || 
                  $betHome < $betAway && $resultHome < $resultAway ||
                  $betHome == $betAway && $resultHome == $resultAway) {
            $scores[$user] = 1;
        } else {
            $scores[$user] = 0;
        }
    }

    return $scores;
}

$bets = array('user1' => '2:1', 'user2' => '1:1', 'user3' => '0:4', 'user4' => '3:4');
$result = '3:4';

$scores = calculateScores($bets, $result);
