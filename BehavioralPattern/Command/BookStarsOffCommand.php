<?php
namespace design\Command;
class BookStarsOffCommand extends BookCommand {
    function execute() {
        $this->bookCommandee->setStarsOff();
    }
}
