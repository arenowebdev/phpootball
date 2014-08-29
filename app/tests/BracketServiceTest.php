<?php

use PHPootball\Bracket\BracketService;
use Mockery as m;

class BracketServiceTest extends TestCase
{
    public function setUp()
    {

    }

    public function tearDown()
    {
        m::close();
    }

    public function testCanChainSettingTeamsAndResults()
    {
        $teams = ['team1', 'team2'];
        $results = [[120, 65]];

        $bracket = m::mock('PHPootball\Bracket\BracketInterface');
        $bracket->shouldReceive('builds')->once()->andReturn(true);
        $bracket->shouldReceive('build')->once()->with($teams, $results);

        $service = new BracketService([$bracket]);

        $service->setTeams($teams)->setResults($results);

        $service->build('single');
    }

    public function testAddingNonPowerOfTwoTeamsThrowsException()
    {
        $this->setExpectedException('InvalidArgumentException', 'Number of teams must be a power of 2');

        $teams = ['team1', 'team2', 'team3'];

        $service = new BracketService;

        $service->setTeams($teams);
    }

    public function testBuildWithInvalidBracketTypeThrowsException()
    {
        $type = 'example';

        $this->setExpectedException('InvalidArgumentException', 'Invalid bracket type "' . $type . '"');

        $teams = ['team1', 'team2'];

        $service = new BracketService;
        $service->setTeams($teams);
        $service->build($type);
    }
}
