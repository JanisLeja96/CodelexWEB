<?php


class PictureStorage
{
    private array $pictures = [];

    public function __construct()
    {
        $this->loadFromJSON();
    }

    private function loadFromJSON(): void
    {
        $data = file_get_contents('Picture/pictures.json');
        $data = json_decode($data, true);
        foreach ($data as $pictureArray) {
            foreach ($pictureArray as $picture) {
                if (count($picture) != 0) {
                    $this->pictures[] = new Picture($picture['url'], $picture['score']);
                }
            }
        }
    }

    public function getPictures(): array
    {
        return $this->pictures;
    }

    public function saveToJSON(): void
    {
        $pictureData = ['pictures' => []];
        foreach ($this->pictures as $picture) {
            $pictureData['pictures'][] = ['url' => $picture->getURL(), 'score' => $picture->getScore()];
        }
        $data = json_encode($pictureData);
        file_put_contents('Picture/pictures.json', $data);
    }

    public function like(int $pictureNumber): void
    {
        $this->pictures[$pictureNumber]->like();
        $this->saveToJSON();
    }

    public function dislike(int $pictureNumber): void
    {
        $this->pictures[$pictureNumber]->dislike();
        $this->saveToJSON();
    }
}