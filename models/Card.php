<?php

declare(strict_types=1);
require_once "connection.php";

class Card
{
    private static int $id_counter = 0;
    private int $id;
    private string $image;
    private string $name;
    private bool $visibility;
    private bool $selected;


    public function __construct(string $image, string $name, int | null $id = null)
    {
        if ($id === null) {
            $this->id = Card::$id_counter;
            Card::$id_counter++;
        } else
            $this->id = $id;
        $this->image = $image;
        $this->name = $name;
        $this->visibility = false;
        $this->selected = false;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setVisibility(bool $visibility): void
    {
        $this->visibility = $visibility;
    }

    public function getVisibility(): bool
    {
        return $this->visibility;
    }

    public function setSelected(bool $selected): void
    {
        $this->selected = $selected;
    }

    public function getSelected(): bool
    {
        return $this->selected;
    }


    public static function generateCards(int $number_of_pairs): array
    {
        $card_list = [];
        for ($i = 1; $i <= $number_of_pairs; $i++) {
            $new_card = new Card("$i.png", "$i", $i);
            $card_list[] = $new_card;
            $new_card = new Card("$i.png", "$i", $i);
            $card_list[] = $new_card;
        }
        shuffle($card_list);
        return $card_list;
    }

    public function toHtml(int $index): string
    {
        $html = "<form action=\"index.php\" method=\"post\">";
        if ($this->getSelected())
            $html .= "<div class=\"card selected\">";
        else
            $html .= "<div class=\"card\">";
        if ($this->visibility or $this->getSelected())
            $html .= "<img src=\"Assets/Images/" . $this->getImage() . "\">";
        else
            $html .= "<img src=\"Assets/Images/card_back.png\">";
        $html .= "<input type=\"hidden\" name=\"index\" value=\"$index\">";
        if (!$this->visibility)
            $html .= "<input type=\"submit\" class=\"invisibile-submit\" value=\"\">";
        $html .= "</form></div>";
        return $html;
    }
}
