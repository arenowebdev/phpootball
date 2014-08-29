<?php namespace PHPootball\Bracket;

interface BracketInterface
{
    /**
     * Checks if this bracket builds this type of bracket
     * @param  string $type Type of bracket to build (single, double)
     * @return boolean
     */
    public function builds($type);

    /**
     * Builds the bracket array
     * @param  array $teams   Teams
     * @param  array $results Results
     * @return array
     */
    public function build($teams = [], $results = []);
}
