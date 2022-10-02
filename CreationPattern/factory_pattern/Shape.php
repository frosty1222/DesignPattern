<?php
namespace creation\factory_pattern;
interface Shape
{
    // Có thể định nghĩa sẵn const hoặc không :D
    const SQUARE = 1;
    const CIRCLE = 2;
    const RECTANGLE = 3;

    // general method
    function draw();
}