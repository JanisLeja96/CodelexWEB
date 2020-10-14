<?php


class MessageStorage
{
    private array $messages;
    private $messageFile;

    public function __construct()
    {
        $this->messageFile = fopen('messages.csv', 'r');
        $this->loadFromCSV();
    }

    private function loadFromCSV(): void
    {
        while (!feof($this->messageFile)) {
            $data = (array) fgetcsv($this->messageFile);
            if (count($data) > 1) {
                $this->messages[] = new Message($data[0], $data[1]);
            }
        }
    }

    private function saveToCSV(): void
    {
        $tempfile = fopen('temp.csv', 'w');
        foreach ($this->messages as $message) {
            fputcsv($tempfile, [$message->getUserID(), $message->getMessage()]);
        }
        rename('temp.csv', 'messages.csv');
    }

    public function addMessage(Message $message): void
    {
        $this->messages[] = $message;
        $this->saveToCSV();
    }
}