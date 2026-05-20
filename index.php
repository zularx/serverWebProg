<?php

abstract class HumanAbstract 
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;
    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}

class RussianHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return "Привет";
    }

    public function getMyNameIs(): string 
    {
        return "Меня зовут";
    }
}

class EnglishHuman extends HumanAbstract
{
    public function getGreetings(): string
    {
        return "Whats up";
    }

    public function getMyNameIs(): string 
    {
        return "I'm";
    }
}

$russian = new RussianHuman("Иван");
$english = new EnglishHuman("John");

echo "<h2>Задание HumanAbstract</h2>";
echo $russian->introduceYourself();
echo "<br>";
echo $english->introduceYourself();
echo "<br>";




class Cat
{
    private $name;
    private $color;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function sayHello(): string
    {
        return "Мяу! Меня зовут " .
            $this->getName() .
            ". Я " .
            $this->getColor() .
            ".";
    }
}

$cat = new Cat("Барсик", "рыжий");

echo "<h2>Задание Cat</h2>";
echo $cat->sayHello();
echo "<br>";




interface CalculateSquare
{
    public function calculateSquare(): float;
}

class Circle implements CalculateSquare
{
    private $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function calculateSquare(): float
    {
        return pi() * $this->radius * $this->radius;
    }
}

class Rectangle implements CalculateSquare
{
    private $width;
    private $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateSquare(): float
    {
        return $this->width * $this->height;
    }
}

echo "<h2>Задание CalculateSquare</h2>";
$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);
$secondCat = new Cat("Тучка", "серый");
$objects = [$circle, $rectangle, $secondCat];

foreach ($objects as $object)
{
    if ($object instanceof CalculateSquare)
    {
        echo "Площадь объекта класса " .
            get_class($object) .
            ": " .
            $object->calculateSquare() .
            "<br>";
    }
    else
    {
        echo "Объект класса " .
            get_class($object) .
            " не реализует интерфейс CalculateSquare.<br>";
    }
}





class Lesson
{
    private $title;
    private $text;
    private $homework;

    public function __construct(
        string $title,
        string $text,
        string $homework
    )
    {
        $this->title = $title;
        $this->text = $text;
        $this->homework = $homework;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getHomework(): string
    {
        return $this->homework;
    }
}

class PaidLesson extends Lesson
{
    private $price;

    public function __construct(
        string $title,
        string $text,
        string $homework,
        float $price
    )
    {
        parent::__construct($title, $text, $homework);

        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}

$lesson = new PaidLesson(
    "Урок о наследовании в PHP",
    "Нужно сделать лабораторную работу.",
    "Типа текст лабораторной работы...",
    99.90
);

echo "<h2>Задание PaidLesson</h2>";
var_dump($lesson);
?>