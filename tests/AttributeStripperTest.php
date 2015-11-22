<?php
use App\Formatters\AttributeStripper;

/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/19/15
 * Time: 9:26 AM
 */

class AttributeStripperTest extends TestCase {

    /**
     * @test
     */
    public function it_strips_all_instances_of_a_given_attribute_from_html_div_tags()
    {
        $raw = '<div style="color:#333;background: #fff;">This is the text</div>';

        $expected = '<div>This is the text</div>';

        $this->assertEquals($expected, AttributeStripper::strip('style', $raw), 'styles should be stripped');
    }

    /**
     * @test
     */
    public function it_strips_all_instances_of_a_given_attribute_from_other_html_tags()
    {
        $raw = '<p style="color:#333;background: #fff;">This is the text</p>';

        $expected = '<p>This is the text</p>';

        $this->assertEquals($expected, AttributeStripper::strip('style', $raw), 'styles should be stripped');
    }

    /**
     * @test
     */
    public function it_strips_attributes_from_nested_tags_as_well()
    {
        $raw = file_get_contents(realpath('tests/inlinestyles.html'));

        $expected = file_get_contents(realpath('tests/nostyles.html'));

        $this->assertEquals($expected, AttributeStripper::strip('style', $raw), 'nested styles should be stripped');
    }

    /**
     * @test
     */
    public function it_does_nothing_to_plain_text()
    {
        $raw = 'This is just plain text, no html anywhere';
        $expected = 'This is just plain text, no html anywhere';

        $this->assertEquals($expected, AttributeStripper::strip('style', $raw));
    }

}