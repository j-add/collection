<?php

// Gives us access to the function we're testing
require '../functions.php';

// Gives us access to PHPUnit
use PHPUnit\Framework\TestCase;

// This class is where our tests go
class FunctionsTest extends TestCase {
    // Our success test

    public function testSuccessOutputRecords()
    {
        $expected = '<div class="record"><div><img class="albumImg" src="albumCover.jpg" alt="Album cover for The Album by The Band" /></div><h1 class="albumName">The Album</h1><h2 class="artistName">The Band</h2><div><span class="genre human-music">human-music</span></div><div><span class="purchaseDate">Purchased on: 31-12-1999</span></div></div><div class="record"><div><img class="albumImg" src="./images/missingCover.png" alt="Album cover for The Album2 by The Band2" /></div><h1 class="albumName">The Album2</h1><h2 class="artistName">The Band2</h2><div><span class="genre human-music2">human-music2</span></div></div>';
        $inputA = [['albumName' => 'The Album', 'artistName' => 'The Band', 'genre' => 'human-music', 'purchaseDate' => '1999-12-31', 'albumImage' => 'albumCover.jpg'], ['albumName' => 'The Album2', 'artistName' => 'The Band2', 'genre' => 'human-music2', 'purchaseDate' => NULL, 'albumImage' => NULL]];
        $case = outputRecords($inputA);
        $this->assertEquals($expected, $case);
    }


    //Failure test
    public function testFailureOutputRecordsNoData()
    {
        $expected = 'Oops, there\'s nothing to display right now. If you weren\'t expecting this error, please contact an admin.';
        $inputA = [];
        $case = outputRecords($inputA);
        $this->assertEquals($expected, $case);
    }


    //Malformed test
    public function testMalformedOutputRecords()
    {
        $inputA = 'The Album, The Band, 2022-02-07, human-music, albumCover.jpg';
        $this->expectException(TypeError::class);
        outputRecords($inputA);
    }
}