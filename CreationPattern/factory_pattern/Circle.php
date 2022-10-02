<?php
namespace creation\factory_pattern;
class Circle implements Shape
{
    public function draw()
    {
        // thực hiện code vẽ hình tròn tại đây
        echo "Draw circle";
    }
}