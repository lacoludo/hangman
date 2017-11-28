<?php

namespace Tests\AppBundle\Game;

use AppBundle\Game\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testTryRightWord()
    {
        $game = new Game('word');
        $this->assertSame(0, $game->getAttempts());
        $this->assertSame(true, $game->tryWord('word'));
        $this->assertSame(['w', 'o', 'r', 'd'], $game->getFoundLetters());
        $this->assertSame(0, $game->getAttempts());
    }

    public function testTryWrongWord()
    {
        $game = new Game('word');
        $this->assertSame(false, $game->tryWord('WrongWord'));
        $this->assertSame(11, $game->getAttempts());
    }

    public function testTryLetterAgain(){
        $game = new Game('word', 0, ['w']);
        $this->assertSame(0, $game->getAttempts());
        $this->assertFalse($game->tryLetter('w'));
        $this->assertSame(1, $game->getAttempts());
    }

    public function testTryRightLetter(){
        $game = new Game('word');
        $this->assertSame([], $game->getTriedLetters());
        $this->assertSame([], $game->getFoundLetters());
        $this->assertTrue($game->tryLetter('w'));
        $this->assertContains('w', $game->getTriedLetters());
        $this->assertContains('w', $game->getFoundLetters());
    }

    public function testTryWrongLetter(){
        $game = new Game('word');
        $this->assertSame([], $game->getTriedLetters());
        $this->assertSame(0, $game->getAttempts());
        $this->assertFalse($game->tryLetter('y'));
        $this->assertContains('y', $game->getTriedLetters());
        $this->assertSame(1, $game->getAttempts());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testTryLetterException(){
        $game = new Game('word');
        $game->tryLetter('5');
    }
}