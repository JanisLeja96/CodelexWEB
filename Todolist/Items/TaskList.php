<?php


class TaskList
{
    private array $tasks;
    private $taskFile;


    public function __construct()
    {
        $this->taskFile = fopen('Tasks.csv', 'r+');
        $this->getFromCSV();
    }

    private function getFromCSV(): void
    {
        $tasks = [];
        while (!feof($this->taskFile)) {
            $data = (array) fgetcsv($this->taskFile);
            if (count($data) > 1) {
                $tasks[] = new Task($data[1], $data[2]);
            }
        }
        $this->tasks = $tasks;
        Task::setCount(count($this->tasks));
    }

    public function addTask(Task $task): void
    {
        $this->tasks[] = $task;
        $this->saveToCSV();
        Task::incrementCount();
    }

    private function saveToCSV(): void
    {
        $tempFile = fopen('temp.csv', 'w+');
        foreach ($this->tasks as $task) {
            if ($task != null) {
                fputcsv($tempFile, [$task->getId(), $task->getName(), $task->getDescription()]);
            }
        }
        rename('temp.csv', 'Tasks.csv');
    }

    public function getTasks(): array
    {
        return $this->tasks;
    }

    public function removeByID(int $id): void
    {
        unset($this->tasks[$id - 1]);
        $this->saveToCSV();
        Task::decrementCount();
    }


}