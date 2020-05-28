<?php

namespace App;

class Animal
{
    public function say(): void
    {
    }

    public function walk(): void
    {
        echo 'топ-топ-топ<br />';
    }
}

class Farm
{
    public array $animals = [];

    public function addAnimal(Animal $animal): void
    {
        $animal->walk();
        $this->animals[] = $animal;
    }

    public function rollCall(): void
    {
        shuffle($this->animals);
        foreach ($this->animals as $animal) {
            $animal->say();
        }
    }
}

class Cow extends Animal
{
    public function say(): void
    {
        echo 'му<br />' . PHP_EOL;
    }
}

class Pig extends Animal
{
    public function say(): void
    {
        echo 'хрю<br />' . PHP_EOL;
    }
}

class Chicken extends Animal
{
    public function say(): void
    {
        echo 'ко-ко<br />' . PHP_EOL;
    }
}

echo '<a href="/">Вернуться на главную</a><br />';

$farm = new Farm();
$cow = new Cow();
$pig = new Pig();
$pig1 = new Pig();
$chicken = new Chicken();

$farm->addAnimal($cow);
$farm->addAnimal($pig);
$farm->addAnimal($pig1);
$farm->addAnimal($chicken);

$farm->rollCall();
