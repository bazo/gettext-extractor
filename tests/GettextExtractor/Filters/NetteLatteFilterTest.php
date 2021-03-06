<?php

require_once dirname(__FILE__).'/FilterTest.php';
use Gettext\Extractor\Extractor;
/**
 * Test class for GettextExtractor_Filters_NetteLatteFilter.
 * Generated by PHPUnit on 2010-12-15 at 21:59:47.
 */
class GettextExtractor_Filters_NetteLatteFilterTest extends GettextExtractor_Filters_FilterTest {

	protected function setUp() {
		$this->object = new \Gettext\Extractor\Filters\NetteLatte;
		$this->file = dirname(__FILE__) . '/../../data/default.latte';
	}

	public function testFunctionCallWithVariables() {
		$messages = $this->object->extract($this->file);

		$this->assertNotContains(array(
			Extractor::LINE => 7,
			Extractor::SINGULAR => '$foo'
		),$messages);

		$this->assertNotContains(array(
			Extractor::LINE => 8,
			Extractor::SINGULAR => '$bar',
			Extractor::CONTEXT => 'context'
		),$messages);

		$this->assertNotContains(array(
			Extractor::LINE => 9,
			Extractor::SINGULAR => 'I see %d little indian!',
			Extractor::PLURAL => 'I see %d little indians!',
			Extractor::CONTEXT => '$baz'
		),$messages);
	}

	public function testConstantsArrayMethodsAndFunctions() {
		$messages = $this->object->extract(dirname(__FILE__) . '/../../data/test.latte');

		$this->assertContains(array(
			Extractor::LINE => 1,
			Extractor::SINGULAR => 'Testovaci retezec'
		),$messages);

		$this->assertNotContains(array(
			Extractor::LINE => 3,
			Extractor::SINGULAR => '69'
		),$messages);

		$this->assertNotContains(array(
			Extractor::LINE => 4,
			Extractor::SINGULAR => 'CONSTANT'
		),$messages);

		$this->assertNotContains(array(
			Extractor::LINE => 5,
			Extractor::SINGULAR => 'Class::CONSTANT'
		),$messages);

		$this->assertNotContains(array(
			Extractor::LINE => 6,
			Extractor::SINGULAR => 'Class::method()'
		),$messages);

		$this->assertNotContains(array(
			Extractor::LINE => 7,
			Extractor::SINGULAR => '$array[0]'
		),$messages);

		$this->assertNotContains(array(
			Extractor::LINE => 8,
			Extractor::SINGULAR => '$varFunc()'
		),$messages);

		$this->assertNotContains(array(
			Extractor::LINE => 9,
			Extractor::SINGULAR => '$object->method()'
		),$messages);

		$this->assertNotContains(array(
			Extractor::LINE => 10,
			Extractor::SINGULAR => 'function()'
		),$messages);

		$this->assertNotContains(array(
			Extractor::LINE => 11,
			Extractor::SINGULAR => 'function()->fluent()'
		),$messages);

		$this->assertNotContains(array(
			Extractor::LINE => 12,
			Extractor::SINGULAR => 'Class::$var[0][\'key\']($arg)->method()->method()'
		),$messages);
	}
}
