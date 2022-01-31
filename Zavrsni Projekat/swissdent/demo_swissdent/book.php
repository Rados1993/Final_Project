<?php
class Pregled
{
    const BR = "<br />";
    public $image;
    public $name;
    public $description;
    public $price;
    private $dir = "./img/";


    function __construct(string $name, string $image, string $description, int $person, int $bath, int $bed, int $area)
    {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->person = $person;
        $this->bath = $bath;
        $this->bed = $bed;
        $this->area = $area;
    }

    function get_print_apartment()
    {
        $this->name;
        $this->image;
        $this->description;
        $this->person;
        $this->bath;
        $this->bed;
        $this->area;
    }

    function set_print_apartment($name, $image, $description, $person, $bath, $bed, $area)
    {
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->person = $person;
        $this->bath = $bath;
        $this->bed = $bed;
        $this->area = $area;
    }

    public function print_apartment()
    {
        echo "<div class='inline-blocks'style='margin-right: 10px'>";
        echo "<span><font size='12px'>$this->name</font></span>" . self::BR;
        echo "<a href=\"./pages/php-calendar/calendar.php\" target=\"\"><img src=\"{$this->dir}{$this->image}\" alt=\"$this->name\" style=\"width: 70%; height: 70%;\"></a>" . self::BR;
        echo "<textarea class=\"scroller\" rows=\"7\" cols=\"30\" style=\"resize: none\" disabled>$this->description</textarea>";
        echo "<ul>";
        echo "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
</head>

<body>

    <div class="usluga">
        <h1>Izaberite uslugu</h1>
        <h3>Iskoristite popust od 10 % do kraja meseca!</h3>
    </div>

    <?php

    $apartment = new Pregled("<span>Oralna hirurgija</span>", "oralnahirurgija.jpg", "U stomatološkoj ordinaciji Swissdent izvodimo sve vrste oralno-hirurških zahvata u lokalnoj anesteziji. Apikotomija - hirurški zahvat, Ekstrakcija vađenje umanjaka, Frenulektomija, Nivelacija grebena, Augmentacija, Sinus lift, Odrstanjivanje beningih cista itd.", 2, 1, 1, 36);
    $apartment->print_apartment();

    $apartment->set_print_apartment("<span>Beljenje zuba</span>", "beljenje-zuba.jpg", "Luxury two-bedroom apartment with city view and privet jacuzzi, accommodates up to 2 people. In apartment TV and a fully equipped kitchen that provides guests with a dishwasher, a microwave, a washing machine, a fridge, an oven and new furniture. With a big veranda and BBQ. Pet-friendly.", 2, 1, 1, 64);
    $apartment->print_apartment();

    $apartment->set_print_apartment("<span>Ortodoncija</span>", "ortodoncija.jpg", "Cozy two-bedroom apartment with sea view, accommodates up to 3 people. In apartment TV and a fully equipped kitchen that provides guests with a dishwasher, a microwave, a washing machine, a fridge, an oven and new furniture. Perfect choice for holydays. Pet-friendly.", 3, 2, 2, 78);
    $apartment->print_apartment();

    ?>


</body>

</html>