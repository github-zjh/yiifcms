<?php

class configTest extends WebTestCase
{
	public $fixtures=array(
		'configs'=>'config',
	);

	public function testShow()
	{
		$this->open('?r=config/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=config/create');
	}

	public function testUpdate()
	{
		$this->open('?r=config/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=config/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=config/index');
	}

	public function testAdmin()
	{
		$this->open('?r=config/admin');
	}
}
