<?php namespace PHPootball\Bracket;

class BracketService
{
    protected $types;

    protected $teams = [];
    protected $results = [];

    public function __construct($types = [])
    {
        $this->types = $types;
    }

    public function setTeams($teams = [])
    {
        $total_teams = count($teams);

        if ($total_teams <= 1 || ! ($total_teams & ($total_teams - 1)) == 0) {
            throw new \InvalidArgumentException('Number of teams must be a power of 2');
        }

        $this->teams = $teams;

        return $this;
    }

    public function setResults($results = [])
    {
        $this->results = $results;

        return $this;
    }

    public function build($type)
    {
        $bracket = $this->findBracket($type);

        $bracket->build($this->teams, $this->results);
    }

    private function findBracket($type)
    {
        foreach ($this->types as $bracket) {
            if ($bracket->builds($type)) {
                return $bracket;
            }
        }

        throw new \InvalidArgumentException('Invalid bracket type "' . $type . '"');
    }
}
