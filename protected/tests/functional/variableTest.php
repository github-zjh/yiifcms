<?php

class variableTest extends WebTestCase
{
	public $fixtures=array(
		'variables'=>'variable',
	);

	public function testShow()
	{
		$this->open('?r=variable/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=variable/create');
	}

	public function testUpdate()
	{
		$this->open('?r=variable/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=variable/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=variable/index');
	}

	public function testAdmin()
	{
		$this->open('?r=variable/admin');
	}
}
