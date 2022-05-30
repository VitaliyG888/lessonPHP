<?php

$textStorage = [];

function add(string $title, string $text): void
{
	global $textStorage;
	$textStorage[] = [
		'title' => $title,
		'text' => $text,
	];

}

function remove(int $textNumber, array &$textArr): bool
{
	if (array_key_exists($textNumber, $textArr)) {
		unset ($textArr[$textNumber]);
		return true;
	}

	return false;
}

function edit(int $textNumber, $title, $text, &$textArr): bool
{
	if (array_key_exists($textNumber, $textArr)) {
		$textArr[$textNumber] = [
			'title' => $title,
			'text' => $text,
		];
		return true;
	}
	return false;
}

add('Приветствие', 'Следует отметить, что внедрение современных методик, в своём классическом представлении, допускает внедрение форм воздействия.');
add('Старое', 'Идейные соображения высшего порядка, а также выбранный нами инновационный путь играет важную роль в формировании модели развития.');

var_dump($textStorage);

var_dump(remove(0, $textStorage));
var_dump(remove(5, $textStorage));

var_dump($textStorage);

edit(1, 'Новое', 'Однозначно, реплицированные с зарубежных источников, современные исследования освещают чрезвычайно интересные особенности картины в целом.', $textStorage);

var_dump($textStorage);
var_dump(edit(5, 'Новое', 'Однозначно, реплицированные с зарубежных источников, современные исследования освещают чрезвычайно интересные особенности картины в целом.', $textStorage));