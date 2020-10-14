<?php


class PersonStorage
{
    private array $persons;
    private $databaseFile;

    public function __construct()
    {
        $this->databaseFile = fopen('database.csv', 'r');
        $this->loadFromCSV();
    }

    private function loadFromCSV(): void
    {
        while (!feof($this->databaseFile)) {
            $data = (array) fgetcsv($this->databaseFile);
            if (count($data) > 1) {
                $this->persons[] = new Person($data[0], $data[1], $data[2]);
            }
        }
    }

    public function getPersons(): array
    {
        return $this->persons;
    }

    public function findByPhone(int $phone): ?Person
    {
        foreach ($this->persons as $person) {
            if ($person->getPhoneNumber() == $phone) {
                return $person;
            }
        }
        return null;
    }

}