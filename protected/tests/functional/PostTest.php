<?php

class PostTest extends WebTestCase
{
	public $fixtures=array(
		'posts'=>'Post',
	);

	public function testShow()
	{
		$this->open('?r=post/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=post/create');
	}

	public function testUpdate()
	{
		$this->open('?r=post/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=post/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=post/index');
	}

	public function testAdmin()
	{
		$this->open('?r=post/admin');
	}
}
