<?php


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

        $expected = 'Error';
        $input = 5;
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
    public function test_spechial_chars_success()
    {

        $expected = 'THIS';
        $input = '<><><>??>><THIS';
        $case = clean_string($input);
        $this->assertEquals($case, $expected);
    }
}