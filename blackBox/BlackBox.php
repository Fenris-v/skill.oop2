<?php

namespace App\BlackBox;

class BlackBox
{
    private string $data = '';

    public function addLog(string $message): void
    {
        $this->data .= $message;
    }

    public function getDataByEngineer(Engineer $engineer): string
    {
        return $this->data;
    }
}

class Plane
{
    private BlackBox $blackBox;

    public function __construct()
    {
        $this->blackBox = new BlackBox();
    }

    public function flyProcess(): void
    {
        $this->addLog('Самолет летит на высоте 500м <br/>');
    }

    public function crushProcess(): void
    {
        $this->addLog('Отказал двигатель, произошло столкновение <br/>');
    }

    public function flyAndCrush(): void
    {
        $this->addLog($this->flyProcess() . $this->crushProcess());
    }

    protected function addLog(string $message): void
    {
        $this->blackBox->addLog($message);
    }

    public function getBoxForEngineer(Engineer $engineer): void
    {
        $engineer->setBox($this->blackBox);
    }
}

class Maize extends Plane
{
    public function flyProcess(): void
    {
        $this->addLog('Кукурузник летит на высоте 100м <br/>');
    }

    public function crushProcess(): void
    {
        $this->addLog('Закончилось топливо, мягкая посадка в полях с кукурузой <br/>');
    }
}

class Engineer
{
    public BlackBox $blackBox;

    public function setBox(BlackBox $blackBox): void
    {
        $this->blackBox = $blackBox;
    }

    public function takeBox(Plane $plane): void
    {
        $plane->getBoxForEngineer($this);
    }

    public function decodeBox(): void
    {
        echo $this->blackBox->getDataByEngineer($this);
    }
}

echo '<a href="/">Вернуться на главную</a><br />';

echo '<p style="color: red;">Первый самолет</p>';
$plane = new Plane();
$plane->flyProcess();
$plane->flyProcess();
$plane->flyProcess();
$plane->flyAndCrush();

$engineer = new Engineer();
$engineer->takeBox($plane);
$engineer->decodeBox();

echo '<p style="color: red;">Второй самолет</p>';
$maize = new Maize();
$maize->flyAndCrush();

$engineer->takeBox($maize);
$engineer->decodeBox();
