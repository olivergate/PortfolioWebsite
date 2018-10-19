<?php
session_start();

use PHPUnit\Framework\TestCase;
require '../sanitize_functions.php';

class StackTest extends TestCase
{
    //success
    public function test_string_extract()
    {
        $expected = 'Transparency in Design';
        $input = 'Transparency in Design';
        $case = clean_string($input);
        $this->assertEquals($case, $expected);
    }

    //failure
    public function test_numeric_extract_fail()
    {

        $expected = '55';
        $input = 55;
        $case = clean_string($input);
        $this->assertEquals($case, $expected);
    }

//success
    public function test_void_success()
    {

        $expected = '';
        $input = '';
        $case = clean_string($input);
        $this->assertEquals($case, $expected);
    }

//success
    public function test_special_chars_success()
    {

        $expected = 'THISHEAD';
        $input = 'THIS<h1><h2>HEAD';
        $case = clean_string($input);
        $this->assertEquals($case, $expected);
    }
}