<?php

/*
//Selection sort through class
echo "Selection sort through array";

class SelectionSorter{
    private $arr;
    private $length;

    public function __construct(array $arr){
        $this->arr = $arr;
        $this->length = count($arr);
    }

    public function sort(){
        for($i = 0; $i < $this->length -1; $i++){
            $minIndex = $i;

            for($j = $i+1; $j < $this->length; $j++){
                if($this->arr[$j] < $this->arr[$minIndex]){
                    $minIndex = $j;
                }
            }

            //Swap only if needed
            if($minIndex != $i){
                $temp = $this->arr[$i];
                $this->arr[$i] = $this->arr[$minIndex];
                $this->arr[$minIndex] = $temp;
            }
        }

        return $this->arr;
    }

}

$arr_selection = [65, 76, 5, 12, 22, 11, 10];

//Create an object of the class
$sorter = new SelectionSorter($arr_selection);

//Call the sort method
$sorted_array = $sorter->sort();

echo "<pre>";
print_r($sorted_array);



echo "===================================================";
//Sorting ascending and descending case insensitive in string and number.
echo "Sorting ascending and descending case insensitive in string and number through array.";

class SelectionSort{
    private $arr;
    private $length;

    public function __construct($arr){
        $this->arr = $arr;
        $this->length = count($arr);
    }

    //Ascending sort (default for numbers)
    public function sortAscending($caseInsensitive = false){
        for($i = 0; $i < $this->length -1; $i++){
            $minIndex = $i;
            for($j = $i + 1; $j < $this->length; $j++){
                $valJ = $caseInsensitive ? strtolower((string)$this->arr[$j]) : (string)$this->arr[$j];
                $valMin = $caseInsensitive ? strtolower((string)$this->arr[$minIndex]):(string)$this->arr[$minIndex];

                if($valJ < $valMin){
                    $minIndex = $j;
                }
            }

            if($minIndex != $i){
                $temp = $this->arr[$i];
                $this->arr[$i] = $this->arr[$minIndex];
                $this->arr[$minIndex] = $temp;
            }
        }

        return $this->arr;
    }

    public function sortDescending($caseInsensitive= false){
        for($i = 0; $i < $this->length -1; $i++){
            $maxIndex = $i;

            for($j = $i; $j < $this->length; $j++){
                $valJ = $caseInsensitive ? strtolower((string)$this->arr[$j]) : (string)$this->arr[$j];
                $valMax = $caseInsensitive ? strtolower((string)$this->arr[$maxIndex]) : (string)$this->arr[$maxIndex];

                if($valJ > $valMax){
                    $maxIndex = $j;
                }
            }

            if($maxIndex != $i){
                $temp = $this->arr[$i];
                $this->arr[$i] = $this->arr[$maxIndex];
                $this->arr[$maxIndex] = $temp;
            }
        }

        return $this->arr;
    }


}
    
$mixed = [22, "Banana", "apple", 3, "Cherry", "banana", 1];
$selectionsort = new SelectionSort($mixed);

// Ascending case-insensitive
print_r($selectionsort->sortAscending(true));

// Descending case-insensitive
print_r($selectionsort->sortDescending(true));


echo "===================================================";
//selection sorting through singly linked lists
echo "Selection sort throuh singly linked list";



*/



















/*
// Selection sort function
function selection_sort($arr_selection, $len){
    for($i = 0; $i < $len - 1; $i++){
        $min_index = $i;
        for($j = $i + 1; $j < $len; $j++){
            if($arr_selection[$j] < $arr_selection[$min_index]){
                $min_index = $j;
            }
        }
        // Swap after finding the minimum
        if($min_index != $i){
            $temp = $arr_selection[$i];
            $arr_selection[$i] = $arr_selection[$min_index];
            $arr_selection[$min_index] = $temp;
        }
    }
    return $arr_selection;
}


$arr_selection = [65, 76, 5, 12, 22, 11, 10];
$total_len = count($arr_selection);
$after_sort = selection_sort($arr_selection, $total_len);

echo "<pre>";
print_r($after_sort);



////////////////////////////////////////////////////
<?php

class SelectionSorter
{
    private $arr;
    private $length;

    public function __construct(array $arr)
    {
        $this->arr = $arr;
        $this->length = count($arr);
    }

    public function sort()
    {
        for ($i = 0; $i < $this->length - 1; $i++) {
            $minIndex = $i;

            for ($j = $i + 1; $j < $this->length; $j++) {
                if ($this->arr[$j] < $this->arr[$minIndex]) {
                    $minIndex = $j;
                }
            }

            // Swap only if needed
            if ($minIndex != $i) {
                $temp = $this->arr[$i];
                $this->arr[$i] = $this->arr[$minIndex];
                $this->arr[$minIndex] = $temp;
            }
        }

        return $this->arr;
    }
}


<?php

include 'SelectionSorter.php'; // If it's in a separate file

$arr_selection = [65, 76, 5, 12, 22, 11, 10];

// Create an object of the class
$sorter = new SelectionSorter($arr_selection);

// Call the sort method
$sorted_array = $sorter->sort();

// Print the result
echo "<pre>";
print_r($sorted_array);



///////////////////////////////////////////////////
<?php

class SelectionSorter
{
    private $arr;
    private $length;

    public function __construct(array $arr)
    {
        $this->arr = $arr;
        $this->length = count($arr);
    }

    // Ascending sort (default for numbers)
    public function sortAscending($caseInsensitive = false)
    {
        for ($i = 0; $i < $this->length - 1; $i++) {
            $minIndex = $i;

            for ($j = $i + 1; $j < $this->length; $j++) {
                if ($caseInsensitive) {
                    if (strtolower($this->arr[$j]) < strtolower($this->arr[$minIndex])) {
                        $minIndex = $j;
                    }
                } else {
                    if ($this->arr[$j] < $this->arr[$minIndex]) {
                        $minIndex = $j;
                    }
                }
            }

            if ($minIndex != $i) {
                $temp = $this->arr[$i];
                $this->arr[$i] = $this->arr[$minIndex];
                $this->arr[$minIndex] = $temp;
            }
        }

        return $this->arr;
    }

    // Descending sort
    public function sortDescending($caseInsensitive = false)
    {
        for ($i = 0; $i < $this->length - 1; $i++) {
            $maxIndex = $i;

            for ($j = $i + 1; $j < $this->length; $j++) {
                if ($caseInsensitive) {
                    if (strtolower($this->arr[$j]) > strtolower($this->arr[$maxIndex])) {
                        $maxIndex = $j;
                    }
                } else {
                    if ($this->arr[$j] > $this->arr[$maxIndex]) {
                        $maxIndex = $j;
                    }
                }
            }

            if ($maxIndex != $i) {
                $temp = $this->arr[$i];
                $this->arr[$i] = $this->arr[$maxIndex];
                $this->arr[$maxIndex] = $temp;
            }
        }

        return $this->arr;
    }
}


1. Ascending Sort (Numbers)

$numbers = [65, 76, 5, 12, 22, 11, 10];
$sorter = new SelectionSorter($numbers);
print_r($sorter->sortAscending());
2. Descending Sort (Numbers)

$numbers = [65, 76, 5, 12, 22, 11, 10];
$sorter = new SelectionSorter($numbers);
print_r($sorter->sortDescending());
3. Ascending Sort (Strings - Case-Insensitive)

$names = ["Banana", "apple", "Cherry", "banana"];
$sorter = new SelectionSorter($names);
print_r($sorter->sortAscending(true)); // caseInsensitive = true
4. Descending Sort (Strings - Case-Insensitive)

$names = ["Banana", "apple", "Cherry", "banana"];
$sorter = new SelectionSorter($names);
print_r($sorter->sortDescending(true));

/////////////////////////////////////////////////////////////

<?php

class SelectionSorter
{
    private $arr;
    private $length;

    public function __construct(array $arr)
    {
        $this->arr = $arr;
        $this->length = count($arr);
    }

    public function sortAscending($caseInsensitive = false)
    {
        for ($i = 0; $i < $this->length - 1; $i++) {
            $minIndex = $i;

            for ($j = $i + 1; $j < $this->length; $j++) {
                $valJ = $caseInsensitive ? strtolower((string)$this->arr[$j]) : (string)$this->arr[$j];
                $valMin = $caseInsensitive ? strtolower((string)$this->arr[$minIndex]) : (string)$this->arr[$minIndex];

                if ($valJ < $valMin) {
                    $minIndex = $j;
                }
            }

            if ($minIndex != $i) {
                $temp = $this->arr[$i];
                $this->arr[$i] = $this->arr[$minIndex];
                $this->arr[$minIndex] = $temp;
            }
        }

        return $this->arr;
    }

    public function sortDescending($caseInsensitive = false)
    {
        for ($i = 0; $i < $this->length - 1; $i++) {
            $maxIndex = $i;

            for ($j = $i + 1; $j < $this->length; $j++) {
                $valJ = $caseInsensitive ? strtolower((string)$this->arr[$j]) : (string)$this->arr[$j];
                $valMax = $caseInsensitive ? strtolower((string)$this->arr[$maxIndex]) : (string)$this->arr[$maxIndex];

                if ($valJ > $valMax) {
                    $maxIndex = $j;
                }
            }

            if ($maxIndex != $i) {
                $temp = $this->arr[$i];
                $this->arr[$i] = $this->arr[$maxIndex];
                $this->arr[$maxIndex] = $temp;
            }
        }

        return $this->arr;
    }
}

$mixed = [22, "Banana", "apple", 3, "Cherry", "banana", 1];
$sorter = new SelectionSorter($mixed);

// Ascending case-insensitive
print_r($sorter->sortAscending(true));

// Descending case-insensitive
print_r($sorter->sortDescending(true));


////////////////////////////////////////////////////////////////////
<?php

// Node class
class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

// Linked list class
class LinkedList {
    public $head;

    public function __construct() {
        $this->head = null;
    }

    // Insert new node at end
    public function insert($data) {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next !== null) {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
    }

    // Display the list
    public function display() {
        $current = $this->head;
        while ($current !== null) {
            echo $current->data . " -> ";
            $current = $current->next;
        }
        echo "NULL\n";
    }

    // Selection sort by swapping node data
    public function selectionSort($caseInsensitive = false) {
        $start = $this->head;

        while ($start !== null) {
            $minNode = $start;
            $current = $start->next;

            while ($current !== null) {
                $val1 = $caseInsensitive ? strtolower($current->data) : $current->data;
                $val2 = $caseInsensitive ? strtolower($minNode->data) : $minNode->data;

                if ($val1 < $val2) {
                    $minNode = $current;
                }

                $current = $current->next;
            }

            // Swap the data
            if ($minNode !== $start) {
                $temp = $start->data;
                $start->data = $minNode->data;
                $minNode->data = $temp;
            }

            $start = $start->next;
        }
    }
}

// Test the linked list and selection sort
$ll = new LinkedList();
$ll->insert("applett");
$ll->insert("appleone");
$ll->insert("appletwo");
$ll->insert("applerrr");

echo "Before Sorting:\n";
$ll->display();

$ll->selectionSort(true); // true = case-insensitive

echo "After Selection Sort:\n";
$ll->display();

======================================================

<?php

// Node for Doubly Linked List
class DoublyNode {
    public $data;
    public $next;
    public $prev;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}

// Doubly Linked List Class
class DoublyLinkedList {
    public $head;

    public function __construct() {
        $this->head = null;
    }

    // Insert at the end
    public function insert($data) {
        $newNode = new DoublyNode($data);

        if ($this->head === null) {
            $this->head = $newNode;
            return;
        }

        $current = $this->head;
        while ($current->next !== null) {
            $current = $current->next;
        }

        $current->next = $newNode;
        $newNode->prev = $current;
    }

    // Display the list
    public function display() {
        $current = $this->head;
        while ($current !== null) {
            echo $current->data . " <-> ";
            $current = $current->next;
        }
        echo "NULL\n";
    }

    // Selection Sort (by swapping node data)
    public function selectionSort($caseInsensitive = false) {
        $start = $this->head;

        while ($start !== null) {
            $minNode = $start;
            $current = $start->next;

            while ($current !== null) {
                $valCurrent = $caseInsensitive ? strtolower($current->data) : $current->data;
                $valMin = $caseInsensitive ? strtolower($minNode->data) : $minNode->data;

                if ($valCurrent < $valMin) {
                    $minNode = $current;
                }

                $current = $current->next;
            }

            // Swap the data (not the nodes)
            if ($minNode !== $start) {
                $temp = $start->data;
                $start->data = $minNode->data;
                $minNode->data = $temp;
            }

            $start = $start->next;
        }
    }
}

// Test the Doubly Linked List with Selection Sort
$dl = new DoublyLinkedList();
$dl->insert("applett");
$dl->insert("appleone");
$dl->insert("appletwo");
$dl->insert("applerrr");

echo "Before Sorting:\n";
$dl->display();

$dl->selectionSort(true); // true = case-insensitive

echo "After Selection Sort:\n";
$dl->display();
/////////////////////////////////////////////////////////////////////

✅ Updated selectionSort() Method for Descending Order
Here's the modified method to add inside your DoublyLinkedList class:

php
Copy
Edit
// Selection Sort - Descending Order
public function selectionSortDescending($caseInsensitive = false) {
    $start = $this->head;

    while ($start !== null) {
        $maxNode = $start;
        $current = $start->next;

        while ($current !== null) {
            $valCurrent = $caseInsensitive ? strtolower($current->data) : $current->data;
            $valMax = $caseInsensitive ? strtolower($maxNode->data) : $maxNode->data;

            if ($valCurrent > $valMax) {
                $maxNode = $current;
            }

            $current = $current->next;
        }

        // Swap data
        if ($maxNode !== $start) {
            $temp = $start->data;
            $start->data = $maxNode->data;
            $maxNode->data = $temp;
        }

        $start = $start->next;
    }
}
✅ Full Usage Example
php
Copy
Edit
$dl = new DoublyLinkedList();
$dl->insert("applett");
$dl->insert("appleone");
$dl->insert("appletwo");
$dl->insert("applerrr");

echo "Before Sorting:\n";
$dl->display();

$dl->selectionSortDescending(true); // Sort in descending, case-insensitive

echo "After Descending Sort:\n";
$dl->display();

//////////////////////////////////////////////////////////////
What is a Namespace?
A namespace in PHP is like a folder for your classes, functions, and constants.
It helps you:

Avoid name collisions (e.g., if two classes have the same name)

Organize your code logically

🔧 Without Namespaces (Risk of Conflict):
php
Copy
Edit
// File A
class Helper {
    public function sayHello() {
        return "Hello from A";
    }
}

// File B
class Helper {
    public function sayHello() {
        return "Hello from B";
    }
}

// ⚠️ Error: Cannot redeclare class Helper
✅ With Namespaces:
php
Copy
Edit
// File A
namespace App\Utils;

class Helper {
    public function sayHello() {
        return "Hello from App\\Utils";
    }
}

// File B
namespace App\Tools;

class Helper {
    public function sayHello() {
        return "Hello from App\\Tools";
    }
}
Now you can use both Helper classes safely, like this:

php
Copy
Edit
use App\Utils\Helper as UtilsHelper;
use App\Tools\Helper as ToolsHelper;

$h1 = new UtilsHelper();
$h2 = new ToolsHelper();

echo $h1->sayHello(); // Hello from App\Utils
echo $h2->sayHello(); // Hello from App\Tools
✅ How to Use Namespaces (Step-by-Step)
1. Declare the Namespace at the top of your PHP file:
php
Copy
Edit
<?php
namespace MyApp\Services;

class EmailService {
    public function send($to) {
        echo "Sending email to $to";
    }
}
Must be the first thing in the file (before any code or whitespace).

2. Use the Class in Another File
php
Copy
Edit
<?php
require 'EmailService.php';

use MyApp\Services\EmailService;

$mailer = new EmailService();
$mailer->send("user@example.com");
📦 Best Practice with Autoloading (Composer)
When using Composer, your namespaces usually match your folder structure.

Example:

cpp
Copy
Edit
src/
├── Services/
│   └── EmailService.php   (namespace App\Services)
composer.json:

json
Copy
Edit
"autoload": {
    "psr-4": {
        "App\\": "src/"
    }
}
Then run:

bash
Copy
Edit
composer dump-autoload


?>



*/

?>