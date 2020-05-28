<?php

namespace App\Forge;

class Forge
{
    public function burn($object)
    {
        $flame = $object->burn();
        echo $flame->render((string)$object) . PHP_EOL;
    }
}

class BlueFlame
{
    public function render($name)
    {
        echo $name . ' горит синим пламенем <br/>';
    }
}

class RedFlame
{
    public function render($name)
    {
        echo $name . ' загорелся <br/>';
    }
}

class Smoke
{
    public function render($name)
    {
        echo $name . ' лишь задымился <br/>';
    }
}

class Paper
{
    public function burn()
    {
        return new RedFlame();
    }

    public function __toString()
    {
        return 'Бумага';
    }
}

class Wood
{
    public function burn()
    {
        return new RedFlame();
    }

    public function __toString()
    {
        return 'Древесина';
    }
}

class Gas
{
    public function burn()
    {
        return new BlueFlame();
    }

    public function __toString()
    {
        return 'Газ';
    }
}

class Oil
{
    public function burn()
    {
        return new BlueFlame();
    }

    public function __toString()
    {
        return 'Нефть';
    }
}

class DeadSoulsSecondTom
{
    public function burn()
    {
        return new Smoke();
    }

    public function __toString()
    {
        return 'Мертвые души. Том 2';
    }
}

echo '<a href="/">Вернуться на главную</a><br />';

$forge = new Forge();

$forge->burn(new Paper());
$forge->burn(new Wood());
$forge->burn(new Gas());
$forge->burn(new Oil());
$forge->burn(new DeadSoulsSecondTom());

class Whatever
{
    public function burn()
    {
        return new Smoke();
    }

    public function __toString()
    {
        return 'Что-то';
    }
}

$forge->burn(new Whatever());
