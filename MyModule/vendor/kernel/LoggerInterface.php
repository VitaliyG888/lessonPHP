<?php

namespace kernel;

interface LoggerInterface
{
	public function logMessage($errorMessage);
	public function lastMessages($amt): array;
}