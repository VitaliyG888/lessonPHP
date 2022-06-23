<?php


namespace kernel;


use appTelegram\Text;


abstract class Storage implements LoggerInterface, EventListenerInterface
{
	abstract public function create(Text $storeObj): string;

	abstract public function read($slug): object|string;

	abstract public function update($slug,Text $storeObj): bool|int;

	abstract public function delete($slug);

	abstract public function list(): array;
}