<?php

use PHPUnit\Framework\TestCase;
require '../pull_data_functions.php';

class PullDataFunctionsTest extends TestCase
{
    //success
    public function test_pull_data_extract()
    {
        $exampleResultsArray = [
            [
                "location_description" => "hero_statement",
                "content" => "Transparency in Design"
            ]
        ];
        $expected = 'Transparency in Design';
        $input = 'hero_statement';
        $case = content_picker($input, $exampleResultsArray);
        $this->assertEquals($case, $expected);
    }

    //failure
    public function test_pull_data_extract_fail()
    {
        $exampleResultsArray = [
            [
                "location_description" => "hero_statement",
                "content" => "Transparency in Design"
            ]
        ];
        $expected = 'Error';
        $input = 'Random string';
        $case = content_picker($input, $exampleResultsArray);
        $this->assertEquals($case, $expected);
    }


    //failure
    public function test_display_portfolio_not_array_fail()
    {
        $example_incorrect_array = [
            [
                'delete' => 1,
                'image_FAIL_name' => '..img/mayden.jpg',
                'project_FIAL' => 'CSS Logo',
                'projecFAILt_url' => 'https://dev.maydenacademy.co.uk/students/2018/oliverg/Logo/',
                'hover_text' => 'Have a look'
            ]
        ];
        $expected = 'Display Function not a recognisable array';
        $input = $example_incorrect_array;
        $case = display_portfolio($input);
        $this->assertEquals($case, $expected);
    }

    public function test_display_portfolio_success()
    {
        $example_array = [
            [
                'delete' => 1,
                'image_file_name' => '..img/mayden.jpg',
                'project_name' => 'CSS Logo',
                'project_url' => 'https://dev.maydenacademy.co.uk/students/2018/oliverg/Logo/',
                'hover_text' => 'Have a look'
            ]
        ];
        $expected = '<div style="background-image: url(..img/mayden.jpg); background-position:cover;" class="portfolio_button"><p>CSS Logo</p><a href=https://dev.maydenacademy.co.uk/students/2018/oliverg/Logo/><h3>Have a look </h3></a></div>';
        $input = $example_array;
        $case = display_portfolio($input);
        $this->assertEquals($case, $expected);
    }
    public function test_display_portfolio_info_success()
    {
        $example_array = [
            [
                'delete' => 1,
                'image_file_name' => 'img/mayden.jpg',
                'project_name' => 'CSS Logo',
                'project_url' => 'https://dev.maydenacademy.co.uk/students/2018/oliverg/Logo/',
                'hover_text' => 'Have a look',
                'id' => 1
            ]
        ];
        $expected = '<div><div style="background-image: url(img/mayden.jpg); background-position:cover;" class="portfolio_button"><p>CSS Logo</p><a href=https://dev.maydenacademy.co.uk/students/2018/oliverg/Logo/><h3>Have a look </h3></a></div><div class="portfolio_display_text">Title = <textarea rows="1"  name="title" form="portfolio_edit1">CSS Logo</textarea><br>Id (position) = 1<br><br>URL = <textarea rows="1" name="url" form="portfolio_edit1">https://dev.maydenacademy.co.uk/students/2018/oliverg/Logo/</textarea><br>  Image file name = <textarea rows="1" name="image_path" form="portfolio_edit1">img/mayden.jpg</textarea><br>Hover text = <textarea rows="1" name="hover" form="portfolio_edit1">Have a look</textarea><br>Visibility = <textarea rows="1" name="visibility" form="portfolio_edit1">1</textarea><br>This item is displayed on the Front-end<form method="post" id="portfolio_edit1" action="portfolio_edit.php"><br><input name="id" type="hidden" value="1"/><br><input type="submit"/></form></div>';
        $input = $example_array;
        $case = display_portfolio_info($input);
        $this->assertEquals($case, $expected);
    }
    public function test_display_portfolio_info_fail()
    {
        $example_array = [
            [
                'delete' => 1,
                'imaFAILge_file_name' => 'img/mayden.jpg',
                'projFAILect_name' => 'CSS Logo',
                'project_url' => 'https://dev.maydenacademy.co.uk/students/2018/oliverg/Logo/',
                'hover_text' => 'Have a look',
                'id' => 1
            ]
        ];
        $expected = 'Display info Function not a recognisable array';
        $input = $example_array;
        $case = display_portfolio_info($input);
        $this->assertEquals($case, $expected);
    }
}



