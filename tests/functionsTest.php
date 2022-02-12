<?php

// Gives us access to the function we're testing
require '../functions.php';

// Gives us access to PHPUnit
use PHPUnit\Framework\TestCase;

// This class is where our tests go
class FunctionsTest extends TestCase {
    // outputRecords Tests

    //Success test
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

    //checkKeys Tests

    //Success test
    public function testSuccessCheckKeys()
    {
        $expected = true;
        $inputA = ['albumName' => 'The Album', 'artistName' => 'The Band', 'genre' => 'human-music', 'purchaseDate' => '1999-12-31', 'albumImage' => 'albumCover.jpg'];
        $case = checkKeys($inputA);
        $this->assertEquals($expected, $case);
    }


    //Failure test
    public function testFailureCheckKeys()
    {
        $expected = false;
        $inputA = [];
        $case = checkKeys($inputA);
        $this->assertEquals($expected, $case);
    }


    //Malformed test
    public function testMalformedCheckKeys()
    {
        $inputA = 'The Album, The Band, 2022-02-07, human-music, albumCover.jpg';
        $this->expectException(TypeError::class);
        checkKeys($inputA);
    }

    //sanitizeImageURL Tests

    //Success test
    public function testSuccessSanitizeImageURL()
    {
        $expected = 'https://upload.wikimedia.org/wikipedia/en/c/c6/Human_Music.jpg';
        $inputA = 'https://upload.wikimedia.org/wikipedia/en/c/c6/Human_Music.jpg';
        $case = sanitizeImageURL($inputA);
        $this->assertEquals($expected, $case);
    }

    //Failure test
    public function testFailureSanitizeImageURL()
    {
        $expected = '';
        $inputA = 'https://en.wikipedia.org/wiki/Human_Music';
        $case = sanitizeImageURL($inputA);
        $this->assertEquals($expected, $case);
    }


    //Malformed test
    public function testMalformedSanitizeImageURL()
    {
        $inputA = ['https://en.wikipedia.org/wiki/Human_Music'];
        $this->expectException(TypeError::class);
        sanitizeImageURL($inputA);
    }


    //validateTextInput Tests

    //Success test
    public function testSuccessValidateTextInput()
    {
        $expected = true;
        $inputA = 'Test String';
        $case = validateTextInput($inputA);
        $this->assertEquals($expected, $case);
    }

    //Failure test
    public function testFailureValidateTextInput()
    {
        $expected = false;
        $inputA = 'ZtEKAKl9gcdRHfeTr1FuiTHfVlD0TZJdRRYNPaHAZjF0yszGMFNczpohGFb43SGUiG2yPqRRNjK8qCHgOpKy4q6RoQ2GJ42f51f2svcfCM6LxrUkJbmYUcicOuz4hFxILaKdMsHTuEJW5DYTkLNTJSwjpdkWqhGtnuIsWmPo8Fl3qYNPuFE7fFFneXVAQ38qCdMBOZ7ghe3u7ZqcCGQ81lF0Jz7RpHaZKQ24yodr2guk18E3V3poGZ3vAPN7iyHu
';
        $case = validateTextInput($inputA);
        $this->assertEquals($expected, $case);
    }


    //Malformed test
    public function testMalformedValidateTextInput()
    {
        $inputA = ['name'];
        $this->expectException(TypeError::class);
        validateTextInput($inputA);
    }

    //validateGenre Tests

    //Success test
    public function testSuccessValidateGenre()
    {
        $expected = true;
        $inputA = 'alternative';
        $case = validateGenre($inputA);
        $this->assertEquals($expected, $case);
    }

    //Failure test
    public function testFailureValidateGenre()
    {
        $expected = false;
        $inputA = 'human-music';
        $case = validateGenre($inputA);
        $this->assertEquals($expected, $case);
    }


    //Malformed test
    public function testMalformedValidateGenre()
    {
        $inputA = ['human-music'];
        $this->expectException(TypeError::class);
        validateTextInput($inputA);
    }

    //validatePurchaseDate Tests

    //Success test
    public function testSuccessValidatePurchaseDate()
    {
        $expected = true;
        $inputA = '1999-12-31';
        $case = validatePurchaseDate($inputA);
        $this->assertEquals($expected, $case);
    }

    //Failure test
    public function testFailureValidatePurchaseDate()
    {
        $expected = false;
        $inputA = '1999-15-41';
        $case = validatePurchaseDate($inputA);
        $this->assertEquals($expected, $case);
    }


    //Malformed test
    public function testMalformedValidatePurchaseDate()
    {
        $inputA = ['1999-12-31'];
        $this->expectException(TypeError::class);
        validatePurchaseDate($inputA);
    }
}