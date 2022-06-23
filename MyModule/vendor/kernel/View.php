<?php


namespace kernel;


use appTelegram\FileStorage;


abstract class View
{
	public object $storage;

	public function __construct(FileStorage $storage)
	{
		$this->storage = $storage;

	}

	abstract public function displayTextById($id): string;
	abstract public function displayTextByUrl($url): string;
}