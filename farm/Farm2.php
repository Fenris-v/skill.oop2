<?php

namespace App;

class Animal
{
    public function say(): void
    {
    }

    public function walk(): void
    {
    }
}

class Bird extends Animal
{
    public function walk(): void
    {
        $this->tryToFly();
    }

    public function tryToFly(): void
    {
        echo 'Вжих-вжих-топ-топ<br />' . PHP_EOL;
    }
}

class Hoof extends Animal
{
    public function walk(): void
    {
        echo 'топ-топ-топ<br />' . PHP_EOL;
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

class BirdFarm extends Farm
{
    public function addAnimal(Animal $animal): void
    {
        $animal->walk();
        $this->animals[] = $animal;
        $this->showAnimalsCount();
    }

    public function showAnimalsCount(): void
    {
        echo "Птиц на ферме: " . count($this->animals) . '<br/>' . PHP_EOL;
    }
}

class Cow extends Hoof
{
    public function say(): void
    {
        echo 'му<br />' . PHP_EOL;
    }
}

class Pig extends Hoof
{
    public function say(): void
    {
        echo 'хрю<br />' . PHP_EOL;
    }
}

class Chicken extends Bird
{
    public function say(): void
    {
        echo 'ко-ко<br />' . PHP_EOL;
    }
}

class Goose extends Bird
{
    public function say(): void
    {
        echo 'кря-кря<br />' . PHP_EOL;
    }
}

class Turkey extends Bird
{
    public function say(): void
    {
        echo 'кулды-кулды<br />' . PHP_EOL;
    }
}

class Horse extends Hoof
{
    public function say(): void
    {
        echo 'игого<br />' . PHP_EOL;
    }
}

class Farmer
{
    public function addAnimal(Farm $farm, Animal $animal): void
    {
        $farm->addAnimal($animal);
    }

    public function rollCall(Farm $farm): void
    {
        $farm->rollCall();
    }
}

// Эту функцию написал, т.к. по заданию требуется ферму передать в метод addAnimal()
function getFarm(Animal $animal, array $allFarms): Farm
{
    if (get_parent_class($animal) === 'App\Bird') {
        return $allFarms['bird'];
    } else {
        return $allFarms['hoof'];
    }
}

echo '<a href="/">Вернуться на главную</a><br />';

$farm = new Farm();
$birdFarm = new BirdFarm();
$allFarms = ['hoof' => $farm, 'bird' => $birdFarm];

$farmer = new Farmer();

$cow = new Cow();
$pig = new Pig();
$pig1 = new Pig();
$chicken = new Chicken();
$turkey = new Turkey();
$turkey1 = new Turkey();
$turkey2 = new Turkey();
$horse = new Horse();
$horse1 = new Horse();
$goose = new Goose();

$farmer->addAnimal(getFarm($cow, $allFarms), $cow);
$farmer->addAnimal(getFarm($pig, $allFarms), $pig);
$farmer->addAnimal(getFarm($pig1, $allFarms), $pig1);
$farmer->addAnimal(getFarm($chicken, $allFarms), $chicken);
$farmer->addAnimal(getFarm($turkey, $allFarms), $turkey);
$farmer->addAnimal(getFarm($turkey1, $allFarms), $turkey1);
$farmer->addAnimal(getFarm($turkey2, $allFarms), $turkey2);
$farmer->addAnimal(getFarm($horse, $allFarms), $horse);
$farmer->addAnimal(getFarm($horse1, $allFarms), $horse1);
$farmer->addAnimal(getFarm($goose, $allFarms), $goose);

echo 'Перекличка на ферме: <br/>';
$farmer->rollCall($farm);
echo 'Перекличка на птичей ферме: <br/>';
$farmer->rollCall($birdFarm);
