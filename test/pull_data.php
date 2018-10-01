<?php

use PHPUnit\Framework\TestCase;
require '../pull_data.php';

class StackTest extends TestCase
{
    //success
    public function test_pull_data_extract()
    {
        $exampleResultsArray = [
            [
                ["location_description" => "hero_statement"],
                ["content" => "Transparency in Design"]
            ]
        ];
        $expected = 'Transparency in Design';
        $input = 'hero_statement';
        $case = content_picker($input, $exampleResultsArray);
        $this->assertEquals($case, $expected);
    }

    //failure
//    public function test_pull_data_extract_fail()
//    {
//        $text_input = [[["location_description" => "hero_statement"], ["content" => "Transparency in Design"]]];
//        $expected = 'Error';
//        $input = 'Random string';
//        $case = content_picker($input, $text_input);
//        $this->assertEquals($case, $expected);
//    }
}



