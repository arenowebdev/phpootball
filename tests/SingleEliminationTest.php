<?php

use PHPootball\Bracket\SingleElimination;
use Mockery as m;

class SingleEliminationTest extends TestCase
{
    public function setUp()
    {
        $this->bracket = new SingleElimination;
    }

    public function tearDown()
    {
        m::close();
        unset($this->bracket);
    }

    public function testReturnsTrueForBuildSingleElimination()
    {
        $this->assertTrue($this->bracket->builds('single-elimination'));
    }

    public function testBuild()
    {
        // Not there yet...soon...
        //$this->bracket->build(['t1', 't2', 't3', 't4', 't5', 't6', 't7', 't8'], []);
    }


}
