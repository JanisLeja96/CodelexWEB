<?php

abstract class Element
{
    private array $canBeat = [];

    public function beats(Element $element): int
    {
        if (in_array(get_class($element), $this->canBeat)) {
            return 1;
        } else if (in_array(get_class($this), $element->canBeat)) {
            return -1;
        }
        return 0;
    }

    public function getCanBeat(): array
    {
        return $this->canBeat;
    }
}