<?php
namespace creation\factory_pattern;
class Square implements Shape
{
    public function draw() {
        // thực hiện code vẽ hình vuông tại đây
        echo "Draw square";
    }
}