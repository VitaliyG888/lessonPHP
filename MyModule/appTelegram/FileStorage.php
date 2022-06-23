<?php


namespace appTelegram;


use kernel\Storage;


class FileStorage extends Storage
{
	public function create(Text $storeObj): string
	{
		$i = 1;
		$slug = $storeObj->slug . '_' . (new \DateTime)->format('Y-m-d');

		while (file_exists(__DIR__ . '/storage/' . $slug)) {
			$slug = $storeObj->slug . '_' . (new \DateTime)->format('Y-m-d') . '_' . $i++;
		}

		$storeObj->slug = '/storage/' . $slug;
		$storeObj->storeText();
		return $slug;
	}

	public function read($slug): Text|string
	{

		$listDir = array_diff(scandir(__DIR__ . '/storage'), array('.', '..'));
		$searchFileName = array_search($slug, $listDir);

		if ($searchFileName == false) return 'Файл не найден';

		$fileData = unserialize((file_get_contents(__DIR__ . '/storage/' . $listDir[$searchFileName])), ['allowed-wfm' => true]);
		$storeObj = new Text($fileData['author'], $slug);
		$storeObj->title = $fileData['title'];
		$storeObj->text = $fileData['text'];

		return $storeObj;
	}

	public function update($slug, Text $storeObj): bool|int
	{
		$date = [
			'title' => $storeObj->title,
			'text' => $storeObj->text,
			'author' => $storeObj->author,
			'published' => $storeObj->published
		];

		return file_put_contents(__DIR__ . '/storage/' . $slug, (serialize($date)));
	}

	public function delete($slug)
	{

		$listDir = array_diff(scandir(__DIR__ . '/storage'), array('.', '..'));
		$searchFileName = array_search($slug, $listDir);

		if ($searchFileName!= false && (string)$listDir[$searchFileName] == $slug) unlink(__DIR__ . '/storage/' . $listDir[$searchFileName]);
	}

	public function list(): array
	{
		$dirList = array_diff(scandir(__DIR__ . '/storage'), array('.', '..'));
		$listTextObj = [];
		foreach ($dirList as $item) {
			$listTextObj[] = unserialize((file_get_contents(__DIR__ . '/storage/' . $item)), ['allowed-wfm' => true]);
		}

		return $listTextObj;
	}
}

