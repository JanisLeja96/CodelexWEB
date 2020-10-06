<?php


abstract class Element
{
    public array $canBeat = [];

    public function beats(Element $element): int
    {
        if (in_array(get_class($element), $this->canBeat)) {
            return 1;
        } else if (in_array(get_class($this), $element->canBeat)) {
            return -1;
        }
        return 0;
    }
}