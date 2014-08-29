<?php namespace PHPootball\Bracket;

class SingleElimination implements BracketInterface
{
    const BRACKET_TYPE = 'single-elimination';

    protected $bracket = [];

    /**
     * {@inheritdoc}
     */
    public function builds($type)
    {
        return $type === self::BRACKET_TYPE;
    }

    /**
     * {@inheritdoc}
     */
    public function build($teams = [], $results = [])
    {
        $total_teams = count($teams);
        $total_rounds = log($total_teams * 2) / log(2);
        $total_matches = $total_teams;

        for ($round = 1; $round < $total_rounds; $round++) {
            $this->addRound($round);

            for ($match = 1; $match <= $total_matches / 2; $match++) {
                $team1 = array_shift($teams);
                $team2 = array_pop($teams);
                $this->addMatch($round, [$team1, $team2]);
            }

            $total_matches /= 2;
        }
    }

    protected function addRound($round)
    {
        $this->bracket[$round] = [];
    }

    protected function addMatch($round, $teams = null)
    {
        array_push($this->bracket[$round], $teams);
    }
}
