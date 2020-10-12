<?php


class Safe
{
    private int $code;
    private bool $isLocked = true;

    public function __construct(int $code)
    {
        $this->code = $code;
    }

    public function unlock(int $code): string
    {
        if ($code == $this->code) {
            $this->isLocked = false;
            return 'Unlocked';
        }
        return 'Locked';
    }

    public function getCode(): int
    {
        return $this->code;
    }
}