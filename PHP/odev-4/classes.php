<?php
class Sekil
{
    public $kenar1;
    public $kenar2;
    public $kenar3;

    function __construct($kenar1, $kenar2 = null, $kenar3 = null)
    {
        $this->kenar1 = $kenar1;
        $this->kenar2 = $kenar2;
        $this->kenar3 = $kenar3;
    }
}

class Dikdortgen extends Sekil
{
    public function cevre()
    {
        return ($this->kenar1 + $this->kenar2) * 2;
    }

    public function alan()
    {
        return $this->kenar1 * $this->kenar2;
    }
}

class Ucgen extends Sekil
{
    public function cevre()
    {
        return $this->kenar1 + $this->kenar2 + $this->kenar3;
    }

    public function alan()
    {
        $s = $this->cevre() / 2;
        return bcsqrt($s * ($s - $this->kenar1) * ($s - $this->kenar2) * ($s - $this->kenar3), 2);
    }
}

class Kare extends Sekil
{
    public function cevre()
    {
        return $this->kenar1 * 4;
    }

    public function alan()
    {
        return $this->kenar1 * $this->kenar1;
    }
}
