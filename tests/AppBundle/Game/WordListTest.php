<?php

namespace Tests\AppBundle\Game;

use AppBundle\Game\Loader\TextFileLoader;
use AppBundle\Game\WordList;
use PHPUnit\Framework\TestCase;

class WordListTest extends TestCase
{
    public function testLoadDictionaries()
    {
        $words = new WordList();

        $textFileLoader = $this->getMock(TextFileLoader::class);

        $textFileLoader
            ->expects($this->once())
            ->method('load')
            ->willReturn(['mot1', 'mot2']);

        $words->addLoader('txt', $textFileLoader);

        $words->loadDictionaries(['/mon/chemin/test.txt']);

        $this->assertContains($words->getRandomWord(4), ['mot1', 'mot2']);
    }
}