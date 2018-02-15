

# Object-Oriented PHP

I have prepared this small documentation for future colleagues in the company where I am employed. But why not share it with everyone :). Slowly but surely introduces into the world of object programming.

Some languages from the beginning were designed as object-oriented, with [PHP](http://php.net) it was not the case. In its beginnings, PHP was a procedural script language dedicated exclusively to web applications. As time passed, the community sought the introduction of object-oriented concepts into the language, which was done by the release of PHP version 4.

The first implementation has had many weaknesses, such as problematic object referencing, the lack of setting the scope (public, private, protected) for attributes and methods, the lack of destructors, object cloning and interfaces. The PHP5 implementation fixes these deficiencies and brings many more new features, thus cluttering PHP into a language group with a fully implemented object model.

Object-oriented software consists of several independent objects that are interrelated with attributes and operations. Attributes are properties or variables that relate to an object. Operations are methods, actions, or functions that an object can execute.

![alt tag](https://raw.githubusercontent.com/andrejrs/Object-Oriented-PHP/master/images/object.gif)

The basic features of this concept are:
* Abstraction
* Encapsulation
* Inheritance
* Polymorphism

Object oriented programming is based on 3 principles which are encapsulation, inheritance, and polymorphism.

## Defining a class and instantiating objects

Classes are a set of objects that have great similarities and small differences. This is a programmer-defined data type, which includes local functions as well as local data. You can think of a class as a template for making many instances of the same kind (or class) of object.

```
class Car {

	// Attributes
	protected $manufacturer;

	// Methods
	function  __construct($manufacturer) {
		$this->manufacturer = $manufacturer;
	}

	public function startEngine(){
		echo "The engine is on";
	}

	public function stopEngine(){
		echo "The engine is off";
	}

	public function  __toString() {
        return "Car: $this->manufacturer";
	}
}
```

![alt tag](https://raw.githubusercontent.com/andrejrs/Object-Oriented-PHP/master/images/Wordane-OOP-car-class-eg-2.jpg)

Object is an individual instance of the data structure defined by a class. You define a class once and then make many objects that belong to it. Objects are also known as instance. Instantiating objects is done using the keyword new.

```
$car = new Car("Peugeot");
```

 Class Car has one protected attribute, constructor and three methods, one of methods is special (magic) method __toString. The __toString() method allows a class to decide how it will react when it is treated like a string. For example, echo $car will print "Car: Peugeot" because we have defined that this method returns a certain string. This method cannot throw an exception from within a __toString() method. Doing so will result in a fatal error.

 * The constructor is optional. The PHP constructor must have the __construct name and can have arbitrarily many arguments. Classes which have a constructor method call this method on each newly-created object.
 * PHP 5 introduces a destructor concept similar to that of other object-oriented languages, such as C#. The destructor method will be called as soon as there are no other references to a particular object, or in any order during the shutdown sequence.
 * Public, private and protected represent the visibility of a attribute, a method or (as of PHP 7.1.0) a constant. 
 * Class members declared public can be accessed everywhere. 
 * Members declared protected can be accessed only within the class itself and by inheriting and parent classes. 
 * Members declared as private may only be accessed by the class that defines the member.

In order to call a particular method, it is only necessary to indicate its name:

```
$car->startEngine();
```


## Inheritance

Like most object oriented languages, PHP also supports class inheritance, according to the laws similar to, or even the same as in the Java or C# programming language.

Inheritance is based around the concept of parent classes (base classes or superclasses) and child classes (derived classes or subclasses). When you create a child class, it inherits all the properties and methods of the parent. The child class can then include additional properties and methods, thereby extending the functionality of the parent class.

```
// Parent class or superclass
class Vehicle {

	private $color;
	
	public function setColor($color) {
		$this->color = $color;
	}
	
	public function getColor() {
		return $this->color;
	}
}

// Child class or subclass
class Car extends Vehicle {

	private $doors;
	
	public function setDoors($doors) {
		$this->doors = $doors;
	}
	
	public function getDoors() {
		return $this->doors;
	}
}

$obj = new Car();
$obj = setColor("blue");
$obj = setDoors(5);
```

* Public and Protected properties and methods can be inherited from parent class to child class.
* Private properties and methods can't be inherited.

## Encapsulation

Encapsulation refers to a concept where we encapsulate all the data (wapping some data in single unit) and member functions together to form an object. In basic terms, it’s the way we define the visibility of our properties and methods. When you’re creating classes, you have to ask yourself what properties and methods can be accessed outside of the class. Encapsulation is used to safe data or information in an object from other it means encapsulation is mainly used for protection purpose.

![alt tag](https://raw.githubusercontent.com/andrejrs/Object-Oriented-PHP/master/images/Encapsulation.jpg)

Another benefit of encapsulation is that you can make the class read only or write only by providing setter or getter method.

Schoolbag is one of best example of Encapsulation. School bag can keep our books, pen etc. 

```
Class TV {
	
	private $brand;
	private $model;

	public function getBrand(){
		return $this->brand;
	}
	public function setBrand($brand){
		$this->brand = $brand;
	}
	public function getModel(){
		return $this->model;
	}
	public function setModel($model){
		$this->model = $model;
	}
}

$tv = new TV();
tv->setBrand("Samsung");
tv->setModel("UE55F8000AFXZ");
```


## Polymorphism

Polymorphism is basically derived from the Greek which means 'many forms'. We can explain the polymorphism most simply with the two twin brothers, they look like same but have different characters.

Polymorphism is used to make applications more modular and extensible. Polymorphism is an concept where same function can be used for different purposes. For example function name will remain same but it make take different number of arguments and can do different task.

In the picture, polymorphism is explained with the shapes.
![alt tag](https://raw.githubusercontent.com/andrejrs/Object-Oriented-PHP/master/images/polymorphism-java.png)

Here's good example of polymorphic in the car. A real world analogy for polymorphism is ignition of the engine in the car.
Everyone knows how to start a car. Just push the key in the lock and turn. The action of the engine in the event of ignition and through which all operations pass through the ignition to the user is not important for starting the engine. If you need to go somewhere, you have all the information that is needed to start the engine and drive the car.

![alt tag](https://raw.githubusercontent.com/andrejrs/Object-Oriented-PHP/master/images/battery-2.jpg)

Another very good example is the TV that we use every day. To use the TV, you just need to take the remote control and change channels. You have a remote control that is public and anyone can access. The interior of the TV where there are various modules that are private. To use the TV, it is not necessary for the user to know how to display an image on the screen or what is happening when the button on the remote control is pressed.

![alt tag](https://raw.githubusercontent.com/andrejrs/Object-Oriented-PHP/master/images/tv-remote.png)

Within the polymorphism there are Interfaces, Abstract Classes, Overloading.

### Overloading

This is a type of polymorphism in which some or all of operators have different implementations depending on the types of their arguments. Similarly functions can also be overloaded with different implementation. Overloading in PHP provides means to dynamically "create" attributes and methods. These dynamic entities are processed via magic methods one can establish in a class for various action types.

Overloading in PHP can be classified as Attribute overloading and Method overloading.


#### Attribute overloading 

```
// This is run when writing data to inaccessible properties.
public void __set ( string $name , mixed $value )

// This is utilized for reading data from inaccessible properties.
public mixed __get ( string $name )

// This is triggered by calling isset() or empty() on inaccessible properties.
public bool __isset ( string $name )

//  Tis invoked when unset() is used on inaccessible properties.
public void __unset ( string $name )
```

 The $name argument is the name of the property being interacted with. The __set() method's $value argument specifies the value the $name'ed property should be set to.

#### Method overloading 

```
// This is triggered when invoking inaccessible methods in an object context.
public mixed __call ( string $name , array $arguments )

// Thi is triggered when invoking inaccessible methods in a static context.
public static mixed __callStatic ( string $name , array $arguments )
```

The $name argument is the name of the method being called. The $arguments argument is an enumerated array containing the parameters passed to the $name'ed method.


## Abstraction

To explain the abstraction, it's best to imagine a mobile phone. Each mobile phone has certain features. Now it's important to notice what is common to all mobile phones (Abstract information)? Each mobile phone provides the ability to send sms messages and call other users of the mobile phones.

* Nokia 3310 Features: Calling, SMS
* Nokia 765 Features: Calling, SMS, Camera
* Samsung S7 Features: Calling, SMS, FM Radio, MP3, Camera, Video Recording, Reading E-mails, OS

![alt tag](https://raw.githubusercontent.com/andrejrs/Object-Oriented-PHP/master/images/365.20.small_.jpg)

```
abstract class MobilePhone {

	public Call(); // call method
	public SendSMS(); // sms method
}
 
public class Nokia3310 extends MobilePhone {

	// Abstract methods from MobilePhone
	public Call(); // call method
	public SendSMS(); // sms method

	// Methods for Nokia3310
}
 
public class Nokia765 extends MobilePhone {

	// Abstract methods from MobilePhone
	public Call(); // call method
	public SendSMS(); // sms method

	// Methods for Nokia765
	public Camera(); // camera method
}
 
public class SamsungS7 extends MobilePhone {

	// Abstract methods from MobilePhone
	public Call(); // call method
	public SendSMS(); // sms method

	// Methods for SamsungS7
	public FMRadio(); 
	public MP3();
	public Camera();
	public Recording();
	public ReadAndSendEmails();
}
```

### Abstract Class

* Regular methods can be defined in an abstract class just like in a regular class.
* Abstract methods behave just like methods defined in an interface, and must be implemented exactly as defined by extending classes.
* Abstract Class may include member variables.

```
abstract class ExampleAbstract {

    // Methods specified in the abstract class
    public $attribute;
    public function methodOne() {
        // do something
    }
    abstract public function methodTwo();
}

class ExampleClass extends ExampleAbstract {

    // Class methods and abstract methods
}
```


### Interfaces

* An interface can define method names and arguments, but not the contents of the methods.
* All methods defined in interface need to be included in any implementing classes exactly as described.
* A class can implement multiple interfaces.
* Interfaces may not include member variables.

```
interface ExampleInterface {

    // Methods specified in the interface
}

class ExampleClass implements ExampleInterface {

    // All methods from the interface
}

```


### Abstract Class vs Interface
![alt tag](https://raw.githubusercontent.com/andrejrs/Object-Oriented-PHP/master/images/Abstract_Class_vs_Interface.png)

![alt tag](https://raw.githubusercontent.com/andrejrs/Object-Oriented-PHP/master/images/OpMyR.png)

## Versioning
Version 1.0.0 - The first commit of application

## Authors
* **Andrej** - *Initial work* - [andrejrs](github.com/andrejrs)













