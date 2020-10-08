<?php


class InvestmentCalculator
{
    private float $investment;
    private int $length;
    private float $percentage;

    public function __construct(float $investment, int $length, int $percentage)
    {
        $this->investment = $investment;
        $this->length = $length;
        $this->percentage = $percentage / 100;
    }

    public function calculate(): float
    {
        $investment = $this->investment;
        for ($i = 1; $i <= $this->length; $i++) {
            $investment = $investment + ($investment * $this->percentage);
        }

        return $investment;
    }

    public function getLength(): int
    {
        return $this->length;
    }
}