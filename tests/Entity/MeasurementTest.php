<?php

namespace App\Tests\Entity;

use App\Entity\Measurement;
use PHPUnit\Framework\TestCase;

class MeasurementTest extends TestCase
{
    public function dataGetFahrenheit(): array
    {
        return [
            ['-100', -148],
            ['-10.5', 13.1],
            ['0', 32],
            ['0.25', 32.45],
            ['0.5', 32.9],
            ['12.7', 54.86],
            ['22.3', 72.14],
            ['37.8', 100.04],
            ['100', 212],
            ['100.5', 212.9],
        ];
    }
    /**
     * @dataProvider dataGetFahrenheit
     */
    public function testGetFahrenheit($celsius, $expectedFahrenheit): void
    {
        $measurement = new Measurement();

//        $measurement->setCelsius('0');
//        $this->assertEquals(32, $measurement->getFahrenheit());
//
//        $measurement->setCelsius('-100');
//        $this->assertEquals(-148, $measurement->getFahrenheit());
//
//        $measurement->setCelsius('100');
//        $this->assertEquals(212, $measurement->getFahrenheit());
        $measurement->setCelsius($celsius);
        $this->assertEquals($expectedFahrenheit,$measurement->getFahrenheit());

    }
}
