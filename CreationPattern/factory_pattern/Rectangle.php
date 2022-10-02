<?php
namespace creation\factory_pattern;
class Rectangle implements Shape
{
    public function draw() {
        // thực hiện code vẽ hình chữ nhật tại đây
        echo "Draw rectangle";
    }
}