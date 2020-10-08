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

    public function readFromCSV(): array
    {
        $persons = [];
        while (!feof($this->resource)) {
            $data = (array) fgetcsv($this->resource);
            $persons[] = new Person(
                (string) $data[0],
                (int) $data[1],
                (int) $data[2]);
        }
        return $persons;
    }

    public function findByName(string $name): Person
    {

    }
}