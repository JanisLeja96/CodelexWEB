<?php


class PersonStorage
{
    private array $persons;
    private $resource;

    public function __construct()
    {
        $this->resource = fopen('./people.csv', 'r');
        $this->persons = $this->readFromCSV();
    }

    private function readFromCSV(): array
    {
        $persons = [];
        while (!feof($this->resource)) {
            $data = (array)fgetcsv($this->resource);
            if (count($data) > 1) {
                $persons[] = new Person(
                    $data[0],
                    $data[1],
                    $data[2]);
            }
        }
        return $persons;
    }

    private function findByName(string $name): ?Person
    {
        foreach ($this->persons as $person) {
            if ($person->getName() == $name) {
                return $person;
            }
        }
        return null;
    }

    private function addPersonFromAPI(string $name): void
    {
        $URL = 'https://api.agify.io?name=';
        $response = file_get_contents($URL . $name);
        $data = json_decode($response, true);

        if ($this->findByName($data['name']) == null) {
            $this->persons[] = new Person($data['name'], $data['age'], $data['count']);
            $this->saveToCSV();
        }
    }

    private function saveToCSV(): void
    {
        $temp = fopen('tempfile.csv', 'w');
        foreach ($this->persons as $person) {
            fputcsv($temp, [$person->getName(), $person->getAge(), $person->getCount()]);
        }
        rename('tempfile.csv', 'people.csv');
    }

    public function getPerson(string $name): Person
    {
        if ($this->findByName($name) != null) {
            return $this->findByName($name);
        } else {
            $this->addPersonFromAPI($name);
            return $this->findByName($name);
        }
    }
}