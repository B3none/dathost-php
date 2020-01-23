<?php

namespace B3none\DatHost\Models;

class AccountModel
{
    /**
     * @var int
     */
    protected $credits;

    /**
     * @var int
     */
    protected $secondsLeft;

    /**
     * @var string
     */
    protected $timeLeft;

    /**
     * AccountModel constructor.
     *
     * @param int $credits
     * @param int $secondsLeft
     * @param string $timeLeft
     */
    public function __construct(int $credits, int $secondsLeft, string $timeLeft)
    {
        $this->credits = $credits;
        $this->secondsLeft = $secondsLeft;
        $this->timeLeft = $timeLeft;
    }

    /**
     * @return int
     */
    public function getCredits(): int
    {
        return $this->credits;
    }

    /**
     * @param int $credits
     */
    public function setCredits(int $credits): void
    {
        $this->credits = $credits;
    }

    /**
     * @return int
     */
    public function getSecondsLeft(): int
    {
        return $this->secondsLeft;
    }

    /**
     * @param int $secondsLeft
     */
    public function setSecondsLeft(int $secondsLeft): void
    {
        $this->secondsLeft = $secondsLeft;
    }

    /**
     * @return string
     */
    public function getTimeLeft(): string
    {
        return $this->timeLeft;
    }

    /**
     * @param string $timeLeft
     */
    public function setTimeLeft(string $timeLeft): void
    {
        $this->timeLeft = $timeLeft;
    }
}
