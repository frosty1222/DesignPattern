# Design pattern trong php là gì
```
    Design patterns là một kỹ thuật trong lập trình hướng đối tượng, được các nhà nghiên cứu đúc kết và tạo ra các mẫu thiết kế chuẩn. Và design pattern không phải là một ngôn ngữ lập trình cụ thể nào cả, mà nó có thể sự dụng được trong hầu hết các ngôn lập trình có hỗ trợ OOP hiện nay.

```
# tại sao lại sử dụng design pattern

```
  + giúp dự án dễ bảo trì và nâng cấp 
  + hạn chế các lỗi tiềm ẩn
  + giúp code dễ đọc hơn
```
# các loại design pattern
```
-Về cơ bản thì design pattern sẽ được chia làm 3 dạng chính và mỗi dạng chính và có tổng cộng 32 mẫu design:
```
# I. Creational Pattern
**nhóm này gồm 9 mẫu design**

```
 +Abstract Factory.
 +Builder.
 +Factory Method.
 +Multiton.
 +Pool.
 +Prototype.
 +Simple Factory.
 +Singleton.
 +Static Factory.

```
# Ví dụ về  Factory Pattern
### pattern này làm gì 
```Bản chất của mẫu thiết kế Factory là "Định nghĩa một giao diện (interface) 
cho việc tạo một đối tượng, nhưng để các lớp con quyết định lớp nào sẽ được tạo. "Factory method"
giao việc khởi tạo một đối tượng cụ thể cho lớp con."
```
### khi nào thì dùng 
```
Khi bạn có một nhóm các class tương tự nhau, và tùy vào ngữ cảnh của bài toán mà sẽ phải khởi tạo một đối tượng từ một trong số các class trên.
Khi bạn cho rằng khả năng cao trong tương lai sẽ có những class tương tự nhau được tạo ra.
```
## Diagram 
![](../design_pattern/CreationPattern/factory_pattern/photo/factory_pattern.web);
# Example
```php
tạo một interface Shape
tạo 4 class là Circle,Square,Rectangle,ShapeFactory
=> 3 class Circle,Square,Rectangle tương ứng với vẽ mỗi hình
```
```php
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
```
```php
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
```
```php'
<?php
namespace creation\factory_pattern;
class Rectangle implements Shape
{
    public function draw() {
        // thực hiện code vẽ hình chữ nhật tại đây
        echo "Draw rectangle";
    }
}
```
```php
<?php
namespace creation\factory_pattern;
class Square implements Shape
{
    public function draw() {
        // thực hiện code vẽ hình vuông tại đây
        echo "Draw square";
    }
}
```
```php
<?php
namespace creation\factory_pattern;
class ShapeFactory
{
    public function getShape($type) {
        switch ($type) {
            case Shape::SQUARE:
                return new Square;
                break;
            case Shape::CIRCLE:
                return new Circle;
                break;

            case Shape::RECTANGLE:
                return new Rectangle;
                break;
            default:
                return null;
                break;
        }
        return null;
    }
}
```

## chạy test 
```php
khởi taọ new ShapeFactory Class rồi gọi tới hàm getShape();truyền vào 
hàm này Shape::SQUARE,Shape::RECTANGLE,Shape::CIRCLE; mỗi lần truyền vào những 
biến này thì khi gọi tới hàm draw(); sẽ trả về kết quả 
ví dụ ta truyền vào Shape::CIRCLE thì hàm draw();sẽ trả về vẽ "draw cỉcle"
```
# Singleton
```
-Singleton là  creational design pattern, đảm bảo rằng chỉ có một đối tượng cùng loại tồn tại và cung cấp một điểm truy cập duy nhất vào nó cho bất kỳ mã nào khác.
```
# II.Structural (nhóm cấu trúc)
**mẫu này có 11 mẫu chính**
 +Adapter/ Wrapper.
 +Bridge.
 +Composite.
 +Data Mapper.
 +Decorator.
 +Dependency Injection.
 +Facade.
 +Fluent Interface.
 +Flyweight.
 +Registry.
 +Proxy
```
# Ví dụ về Adapter pattern
![](../design_pattern/Structual/photo/structual.webp);
## Định nghĩa
```
Adapter Pattern là pattern giữ vai trò trung gian giữa hai lớp,
 chuyển đổi giao diện của một hay nhiều lớp có sẵn thành một 
 giao diện khác, thích hợp cho lớp đang viết. Điều này cho phép 
 các lớp có các giao diện khác nhau có thể dễ dàng giao tiếp tốt 
 với nhau thông qua giao diện trung gian, không cần thay đổi
 code của lớp có sẵn cũng như lớp đang viết. Adapter Pattern 
 còn gọi là Wrapper Pattern do cung cấp một giao diện “bọc ngoài”
 tương thích cho một hệ thống có sẵn, có dữ liệu và hành vi
 phù hợp nhưng có giao diện không tương thích với lớp đang viết.
 ==> để hiểu về pattern này ta phải năm được 3 khái niệm bên dưới
 + Client: Đây là lớp sẽ sử dụng đối tượng của bạn (đối tượng mà bạn muốn chuyển đổi giao diện).
 + Adaptee: Đây là những lớp bạn muốn lớp Client sử dụng, nhưng hiện thời giao diện của nó không phù hợp.
 + Adapter: Đây là lớp trung gian, thực hiện việc chuyển đổi giao diện cho Adaptee và kết nối Adaptee với Client.
```
### Các bước giải quyết một vấn đề theo Adapter
```angular2html
+ Xác định đối tượng: xác định các thành phần muốn được cung cấp (client) và thành phần cần điều chỉnh (adaptee).
+ Xác định giao diện mà client yêu cầu.
+ Thiết kế một lớp wrapper có thể có khả năng phù hợp với adaptee và client.
+ Lớp adapter/wrapper có một phiên bản của lớp adaptee.
+ Lớp adapter/wrapper nối giao diện của client đến giao diện của adaptee.
+ Client sử dụng (được ghép nối với) giao diện mới.
```
### Ví dụ 
```angular2html
 ví dụ này ta sẽ tạo 2 class đó là simplebook và bookadapter
+ class simplebook có tác dụng khởi tạo mới books và theo cơ chế đầu vào tác giả và title
```
### Class SimpleBook
```php
<?php
namespace structual\Adapter_pattern;
class SimpleBook{
    private $author;
    private $title;
    function __construct($author_in, $title_in) {
        $this->author = $author_in;
        $this->title  = $title_in;
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
}
```
### Class BookAdapter
```php

    class BookAdapter {
        private $book;
        function __construct(SimpleBook $book_in) {
            $this->book = $book_in;
        }
        function getAuthorAndTitle() {
            return $this->book->getTitle().' by '.$this->book->getAuthor();
        }
    }
```
### Client 
```php 
         $book = new SimpleBook("Gamma, Helm, Johnson, and Vlissides", "Design Patterns");
         $bookAdapter = new BookAdapter($book);
         echo $bookAdapter->getAuthorAndTitle()
 // kết quả là: Design Patterns by Gamma, Helm, Johnson, and Vlissides
```
# Facade
### định nghĩa
```
+ Facade là một mẫu thiết kế cấu trúc cung cấp một giao diện đơn giản hóa (nhưng có giới hạn) cho một hệ thống phức tạp gồm các lớp,
 thư viện hoặc khuôn khổ.
```
![](../design_pattern/Structual/Facade/photo/structual.webp);
# Behavioral patterns (nhóm ứng xử):
**nhóm này có 12 mẫu design**
```
 +Chain Of Responsibilities.
 +Command.
 +Iterator.
 +Mediator.
 +Memento.
 +Null Object.
 +Observer.
 +Specification.
 +State.
 +Strategy.
 +Template Method.
 +Visitor.
```
# Command
```angular2html
Trong lập trình hướng đối tượng, the command pattern là một mẫu thiết kế hành vi trong đó một đối tượng được sử dụng 
để đóng gói tất cả thông tin cần thiết để thực hiện một hành động hoặc 
kích hoạt một sự kiện sau đó. Thông tin này bao gồm tên phương thức, 
đối tượng sở hữu phương thức và các giá trị cho các tham số phương thức.
```
![](../design_pattern/BehavioralPattern/Command/ulm_diagram/uml1.png)
# Example 
### Command 
```angular2html
ta tạo 3 class và 1 abstract class 
=> 3 class là BookCommandee,BookStarsonCommand,BookStarsoffCommand
=> 1 abstract class BookCommand

```
# Mô tả Code 
```angular2html
Trong Command Pattern, một đối tượng đóng gói mọi thứ cần thiết để thực thi một phương thức trong một đối tượng khác.
Trong ví dụ này, một đối tượng BookStarsOnCommand được khởi tạo với một thể hiện của lớp BookComandee. Đối tượng BookStarsOnCommand sẽ gọi hàm bookStarsOn() của đối tượng BookComandee đó khi hàm execute() của nó được gọi.
```
### 1. BookCommand
```php
<?php
namespace design\Command;
abstract class BookCommand{
    protected $bookCommandee;
    function __construct($bookCommandee_in) {
        $this->bookCommandee = $bookCommandee_in;
    }
    abstract function execute();
}
```
### 2. BookCommandee
```php
<?php
namespace design\Command;
class BookCommandee{
    private $author;
    private $title;
    function __construct($title_in, $author_in) {
        $this->setAuthor($author_in);
        $this->setTitle($title_in);
    }
    function getAuthor() {
        return $this->author;
    }
    function setAuthor($author_in) {
        $this->author = $author_in;
    }
    function getTitle() {
        return $this->title;
    }
    function setTitle($title_in) {
        $this->title = $title_in;
    }
    function setStarsOn() {
        $this->setAuthor(Str_replace(' ','*',$this->getAuthor()));
        $this->setTitle(Str_replace(' ','*',$this->getTitle()));
    }
    function setStarsOff() {
        $this->setAuthor(Str_replace('*',' ',$this->getAuthor()));
        $this->setTitle(Str_replace('*',' ',$this->getTitle()));
    }
    function getAuthorAndTitle() {
        return $this->getTitle().' by '.$this->getAuthor();
    }
}
```
### 3.BookStarsOffCommand 
```php
<?php
namespace design\Command;
class BookStarsOffCommand extends BookCommand {
    function execute() {
        $this->bookCommandee->setStarsOff();
    }
}

```
### 4.BookStarsOnCommand
```php
<?php
namespace design\Command;
class BookStarsOnCommand extends BookCommand {
    function execute() {
        $this->bookCommandee->setStarsOn();
    }
}
```
## kết quả
```angular2html
    BEGIN TESTING COMMAND PATTERN
    
    book after creation:
    Design Patterns by Gamma, Helm, Johnson, and Vlissides
    
    book after stars on:
    Design*Patterns by Gamma,*Helm,*Johnson,*and*Vlissides
    
    book after stars off:
    Design Patterns by Gamma, Helm, Johnson, and Vlissides
    
    END TESTING COMMAND PATTERN
```
## Observer Design
### Định nghĩa
```
Mẫu quan sát là một mẫu thiết kế phần mềm trong đó một đối tượng, được gọi là chủ thể, duy trì một danh sách các đối tượng phụ thuộc của nó, được gọi là Observer và thông báo cho họ tự động về bất kỳ thay đổi trạng thái nào, thường bằng cách gọi một trong các phương thức của chúng.
```
**sơ đồ**
![](../design_pattern/BehavioralPattern/Observer/photo/e8e21d64-3c1e-4f75-841f-323b6322cddf.web)
```
các hàm chính là attach, detach,và notify
+ hàm attach là hàm thêm bộ object 
+ hàm detach là hàm bỏ đi một object 
+ hàm notify là hàm xuất ra thông báo 
```
### ngoài ra thì gần đây có xuất hiện thêm 4 design pattern nữa
Delegation.
Service Locator.
Repository.
Entity-Attribute-Value (EAV).