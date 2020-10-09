<?php


class Task
{
    private static int $count = 0;
    private int $id;
    private string $name;
    private string $description;

    public function __construct(string $name, string $description)
    {
        $this->id = ++Task::$count;
        $this->name = $name;
        $this->description = $description;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public static function setCount(int $count): void
    {
        Task::$count = $count;
    }

    public static function incrementCount(): void
    {
        Task::$count++;
    }

    public static function decrementCount(): void
    {
        Task::$count--;
    }
}