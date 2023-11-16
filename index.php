<?php

$bets = [
    'User1' => '3:4',
    'User2' => '1:2',
    'User3' => '3:2',
    'User4' => '1:1',
];

$result = '3:4';

class Game {
    public static function calculateResult(array $bets, string $result): array {
        $scores = [];

        foreach ($bets as $user => $bet) {
            $scores[$user] = self::calculateScore($bet, $result);
        }

        return $scores;
    }

    private static function calculateScore(string $bet, string $result): int {
        list($betHome, $betAway) = self::separateScore($bet);
        list($resultHome, $resultAway) = self::separateScore($result);

        return ($betHome == $resultHome && $betAway == $resultAway) ? 2 :
            (($betHome <=> $betAway) == ($resultHome <=> $resultAway) ? 1 : 0);
    }

    private static function separateScore(string $score): array {
        return explode(':', $score);
    }
}

$scores = Game::calculateResult($bets, $result);
