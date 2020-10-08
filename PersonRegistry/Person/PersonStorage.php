<?php


class PersonStorage
{
    public array $persons;
    private $personFile;

    public function __construct()
    {
        $this->personFile = fopen('./persons.csv', 'r+');
        $this->readFromCSV();
    }

    private function readFromCSV(): void
    {
        $persons = [];

        while (!feof($this->personFile)) {
            $data = (array) fgetcsv($this->personFile);
            $persons[] = new Person(
                (string) $data[0],
                (string) $data[1],
                (string) $data[2],
                (string) $data[3]);
        }
        $this->persons = $persons;
    }

    public function saveToCSV(): void
    {
        $tempFile = fopen('./temp.csv', 'w+');
        foreach ($this->persons as $person) {
            fputcsv($tempFile, [$person->getName(),
                $person->getLastName(),
                $person->getPersonalCode(),
                $person->getAddress()]);
        }
        rename('./temp.csv', './persons.csv');
    }

    public function addPerson(Person $person): void
    {
        $this->persons[] = $person;
    }

    public function findByCode(string $code): ?Person
    {
        foreach ($this->persons as $person) {
            if ($person->getPersonalCode() == $code) {
                return $person;
            }
        }
        return null;
    }
}