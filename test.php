<?php 
require_once __DIR__ . '/vendor/autoload.php';
use design\Command\BookCommandee;
use design\Command\BookCommand;
use design\Command\BookStarsOffCommand;
use design\Command\BookStarsOnCommand;
use design\Observer\Account;
use design\Observer\Logger;
use design\Observer\Security;
use design\Observer\Mailer;
use creation\factory_pattern\ShapeFactory;
use creation\factory_pattern\Shape;
use structual\Adapter_Pattern\BookAdapter;
use structual\Adapter_Pattern\SimpleBook;
use structual\Facade\Facade;
use structual\Facade\Subsystem1;
use structual\Facade\Subsystem2;
?>

<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Behavioral Pattern</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <h1 class="text-center">Welcome to design pattern</h1>
        <?php 
        //    $test = new CommandTest();
        //    dump($test->testInvocation());
        //    $undo = new UndoableCommandTest();
        //    dump($undo->testInvocation());
        //    $receiver = new Receiver();
        //    dump($receiver);
        //    dump($receiver->enableDate(true));
        //    $involker = new Invoker();
        //    dump($involker->setCommand(new Command()));
        // $shape = new ShapeFactory();
        // $draw = $shape->getShape(Shape::RECTANGLE);
        // dump($draw->draw());
        // $book = new SimpleBook("Gamma, Helm, Johnson, and Vlissides", "Design Patterns");
        //  $bookAdapter = new BookAdapter($book);
        //  echo $bookAdapter->getAuthorAndTitle()

        // writeln('BEGIN TESTING COMMAND PATTERN');
        // writeln('');
        
        // $book = new BookCommandee('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');
        // writeln('book after creation: ');
        // writeln($book->getAuthorAndTitle());
        // writeln('');
        
        // $starsOn = new BookStarsOnCommand($book);
        // callCommand($starsOn);
        // writeln('book after stars on: ');
        // writeln($book->getAuthorAndTitle());
        // writeln('');
        
        // $starsOff = new BookStarsOffCommand($book);
        // callCommand($starsOff);
        // writeln('book after stars off: ');
        // writeln($book->getAuthorAndTitle());
        // writeln('');

        // writeln('END TESTING COMMAND PATTERN');
        
        // // the callCommand function demonstrates that a specified
        // // function in BookCommandee can be executed with only 
        // // an instance of BookCommand.
        // function callCommand(BookCommand $bookCommand_in) {
        //     $bookCommand_in->execute();
        // }

        // function writeln($line_in) {
        //     echo $line_in."<br/>";
        // }
        // ?>
        <?php
        //$account = new Account();
        //Attach các observer vào subject
        //$security = new Security();
        //$account->attach(new Logger());
        //$account->attach(new Mailer());
        //$account->attach($security);
        // Đăng nhập
        //$account->login('thanhsm93@gmail.com', '192.168.0.1');
        //echo "<br>";
        // Thay đổi state
        //$account->setState(Account::EXPIRED);
        //$account->save();
        //$account->login('hack@framgia.com', '10.0.0.1');
        //echo "<br>";
        // Xóa security observer
        //$account->detach($security);
        //$account->login('hack@framgia.com', '10.0.0.1'); //will success
        function clientCode(Facade $facade)
            {
                echo $facade->operation();
            }
            $subsystem1 = new Subsystem1();
            $subsystem2 = new Subsystem2();
            $facade = new Facade($subsystem1, $subsystem2);
            clientCode($facade);
        ?>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
