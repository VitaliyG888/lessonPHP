<?php


namespace kernel;


abstract class User implements EventListenerInterface
{
	public $id;
	public $name;
	public $role;

	abstract public function getTextsToEdit(): array;
}