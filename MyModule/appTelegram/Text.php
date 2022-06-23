<?php


namespace appTelegram;


class Text
{
	public string $published;
	public array $date;
	public string $title = 'Старое';
	public string $text = 'Это хорошо забытое старое!!!';
	public string $author;
	public string $slug;

	public function __construct($author, $slug = '')
	{

		$this->author = $author;
		$this->slug = $slug;
		$this->published = date('Y-m-d');

	}

	public function storeText(): bool
	{

		$this->date = [
			'title' => $this->title,
			'text' => $this->text,
			'author' => $this->author,
			'published' => $this->published
		];

		if (file_put_contents((__DIR__  . $this->slug), (serialize($this->date)))) {
			return true;
		}
		return false;

	}


	public function loadText(): string
	{

		if (is_file(__DIR__ . $this->slug)) {
			$this->date = unserialize((file_get_contents(__DIR__ . $this->slug)), ['allowed-wfm' => true]);
		}

		$title = $this->date['title'];
		$text = $this->date['text'];
		$author = $this->date['author'];
		$published = $this->date['published'];

		return $text;

	}

	public function editText($title, $text): void
	{

		$this->title = $title;
		$this->text = $text;

	}
}