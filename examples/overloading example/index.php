<?php 

class MobilePhone
{
    /**  Location for overloaded data.  */
    private $specs = array();

    /**  Overloading only used on this when accessed outside the class.  */
    private $platform= 2;

	// This is run when writing data to inaccessible properties.
    public function __set($name, $value)
    {
        echo "Setting '$name' to '$value'\n";
        $this->specs[$name] = $value;
    }

    //This is utilized for reading data from inaccessible properties.
    public function __get($name)
    {
        echo "Getting '$name'\n";
        if (array_key_exists($name, $this->specs)) {
            return $this->specs[$name];
        } else {
        	return "undefined";
        }
    }

    // This is triggered by calling isset() or empty() on inaccessible properties.
    public function __isset($name)
    {
        echo "Is '$name' set?\n";
        return isset($this->specs[$name]);
    }

    //  Tis invoked when unset() is used on inaccessible properties.
    public function __unset($name)
    {
        echo "Unsetting '$name'\n";
        unset($this->specs[$name]);
    }

    // This is triggered when invoking inaccessible methods in an object context.
    public function __call ($name, $arguments) {

		if($arguments[0] ==="all" && $name === "printSpecs"){
			echo "Phone specs: " . implode(", ", $this->specs);
		} else {
			echo "Not handled";
		}
    }
}



echo "<pre>\n";

// Int class
$phone = new MobilePhone;

// Set custom specs
$phone->internalMemory = "64 GB";
$phone->ram = "4 GB";
$phone->primaryCamera = "12 MP";

// Print internal memory
echo "Internal Memory: " . $phone->internalMemory . "\n\n";

// Applying an unset command.
var_dump(isset($phone->internalMemory));
unset($phone->internalMemory);
var_dump(isset($phone->internalMemory));
echo "\n";

echo "Private attribute platform is not visible outside of class, so __get() is used...\n";
echo "You will get the undefined because we did not define it with magic method __set";
echo $phone->platform . "\n";

// Now we define a new information
$phone->platform = "Android";

// Platform is defined now 
echo "Platform is defined now ...\n";
echo $phone->platform . "\n";

// Call undefined method
echo $phone->printSpecs("all") . "\n";

