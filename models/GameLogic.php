<?php

declare(strict_types=1);
require_once "Player.php";
require_once "Card.php";

date_default_timezone_set("Europe/Paris");

class GameLogic
{
    private Player $player;
    private array $card_list;
    private DateTime $start_time;
    private ?DateInterval $game_time = null;
    private int $moves;
    private int $card_selected = -1;

    public function __construct(Player $player, int $number_of_pairs)
    {
        $this->player = $player;
        $this->card_list = Card::generateCards($number_of_pairs);
        $this->start_time = new DateTime();
        $this->moves = 0;
        $this->card_selected = -1;
    }

    public function selectCard(int $card_index): void
    {
        $this->resetSelected();
        $this->card_list[$card_index]->setSelected(true);
        $this->card_selected = $card_index;
        $this->moves += 1;
    }

    public function checkPair(int $card_index): void
    {
        var_dump($this->card_list[$card_index]->getId());
        var_dump($this->card_list[$this->card_selected]->getId());
        if ($this->card_list[$card_index]->getId() === $this->card_list[$this->card_selected]->getId()) {
            $this->card_list[$card_index]->setVisibility(true);
            $this->card_list[$this->card_selected]->setVisibility(true);
            $this->card_list[$this->card_selected]->setSelected(false);
        } else {
            $this->card_list[$this->card_selected]->setSelected(true);
            $this->card_list[$card_index]->setSelected(true);
        }
        $this->card_selected = -1;
    }

    public function checkVictory(): bool
    {
        $victory = true;
        foreach ($this->card_list as $card) {
            if ($card->getVisibility() === false) {
                $victory = false;
                break;
            }
        }
        return $victory;
    }

    public function getCardList(): array
    {
        return $this->card_list;
    }

    public function getSelected(): int
    {
        return $this->card_selected;
    }

    public function getMoves(): int
    {
        return $this->moves;
    }

    public function resetSelected(): void
    {
        foreach ($this->card_list as $card)
            $card->setSelected(false);
    }

    public function getGameTime(): string
    {
        if ($this->game_time === null)
            $this->game_time = $this->start_time->diff(new DateTime());
        //var_dump($time);
        return $this->game_time->format('%H:%i:%s');
    }
}
