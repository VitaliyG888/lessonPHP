<?php

namespace kernel;

interface EventListenerInterface
{
	public function attachEvent();
	public function detouchEvent();
}