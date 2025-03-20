<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Mode Toggle</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>

            body {
                background-color: white;
                color: black;
                font-family: Arial, sans-serif;
            }

            header {
                background-color: #f0f0f0;
                color: black;
            }

            button {
                background-color: #e0e0e0;
                color: black;
            }


            body.dark-mode {
                background-color: #121212;  
                color: white; 
            }

            header.dark-mode {
                background-color: #1f1f1f;  
                color: white;
            }

            button.dark-mode {
                background-color: #333; 
                color: white; 
            }

            /* Additional Styles */
            /* h1, p {
                color: inherit; 
            } */


    </style>
</head>
<body>
    <header>
        <button id="dark-mode-toggle">Toggle Dark Mode</button>
    </header>

    <!-- <main>
        <h1>Welcome to Dark Mode</h1>
        <p>This is a simple dark mode toggle implementation.</p>
    </main> -->

    <!-- <script src="script.js"></script> -->

    <script>
    const toggleButton = document.getElementById('dark-mode-toggle');
    const body = document.body;
    const header = document.querySelector('header');
    const button = document.querySelector('button');

   
    if (localStorage.getItem('darkMode') === 'enabled') {
        body.classList.add('dark-mode');
        header.classList.add('dark-mode');
        button.classList.add('dark-mode');
    }

  
    toggleButton.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        header.classList.toggle('dark-mode');
        button.classList.toggle('dark-mode');

       
        if (body.classList.contains('dark-mode')) {
            localStorage.setItem('darkMode', 'enabled');
        } else {
            localStorage.removeItem('darkMode');
        }
    });


</script>
</body>
</html>



<?php
//llprac route for this page

//Sinlgy linked list
echo "================Single linked list=======================". "<br>";
   class NodeSll{
        public $data;
        public $next;
        public function __construct($data){
            $this->data = $data;
            $this->next = null;
        }
   }

   class Sll{
        public $head;
        public function __construct(){
            $this->head = null;
        }

        public function push_fornt($data){
            $snode = new NodeSll($data);
            $snode->next = $this->head;
            $this->head = $snode;
        }

        public function push_back($data){
            $snode = new NodeSll($data);
            if($this->head == null){
                //$this->push_fornt($data);
                $this->head = $newNode;
            }else{
                //$snode = new NodeSll($data);
                $temp = $this->head;
                while($temp->next != null){
                    $temp = $temp->next;
                }
                $temp->next = $snode;
            }
        }

        public function print_sllList(){
            if($this->head == null){
                echo "The list is empty"; 
            }

            if($this->head != null){
                $temp = $this->head;
                if($temp != null){
                    echo "The list is containg" ."<br>";
                    while($temp != null){
                        //echo $temp->data ."\n";
                        echo $temp->data ."<br>";
                        $temp = $temp->next;
                    }
                }else{
                    echo "The list is empty"; 
                }
            }

        }
   }


   $sllnew = new Sll();

   $sllnew->push_fornt(10);
   $sllnew->push_fornt(13);
   $sllnew->push_fornt(17);
   $sllnew->push_fornt(19);

   $sllnew->push_back(8);
   $sllnew->push_back(7);
   $sllnew->push_back(6);

   $sllnew->print_sllList();



echo "================Single Circular linked list=======================". "<br>";
class NodeSCll{
        public $data;
        public $next;

        public function __construct($data){
            $this->data = $data;
            $this->next = NULL;
        }
}

class SCll{
        public $head;
        public function __construct(){
            $this->head = NULL;
        }

        public function push_front_scll($data){
            $newscll = new NodeSCll($data);
            if($this->head == NULL){
                $this->head = $newscll;
                $newscll->next = $this->head;
            }else{
                $newscll->next = $this->head;
                $temp = $this->head;
                while($temp->next != $this->head){
                    $temp = $temp->next;
                }
                
                $temp->next = $newscll;
                $this->head = $newscll;
            }
        }

        //Push node at the back of the circular linked list
        public function push_back_scll($data){
            $newscll = new NodeSCll($data);
            if($this->head == NULL){
                $this->head = $newscll;
                $newscll->next = $this->head;
            }else{
                $temp = $this->head;
                while($temp->next != $this->head){
                    $temp = $temp->next;
                }

                $temp->next = $newscll;
                $newscll->next = $this->head; //Close the circular
            }
        }

        //Push not at a specific position in the circular linked list
        public function push_atpoint_scll($data, $position){
            $newscll = new NodeSCll($data);
            //If position is 0, insert at the front
            if($position == 0){
                $this->push_front_scll($data);
                return;
            }

            if($this->head == NULL){
                echo "List is empty\n";
                return;
            }

            $temp = $this->head;
            $current_position = 0;
            //Traverse the list until the position is found or end of list
            while($temp->next != $this->head && $current_position < $position - 1){
                $temp = $temp->next;
                $current_position++;
            }

            //If we are inserting at the end of the list(or beyond last position)
            if($temp->next == $this->head){
                $this->push_back_scll($data);
            }else{
                $newscll->next = $temp->next;
                $temp->next = $newscll;
            }
        }

        public function show_scll(){
            if($this->head == NULL){
                echo "List is empty" ."\n";
                return;
            }else{
                $temp = $this->head;
                do{
                    //echo $temp->data . " ";
                    echo $temp->data ."<br>";
                    $temp = $temp->next;
                }while($temp != $this->head);
                echo "\n";
            }
        }
}

$newscll = new SCll();
$newscll->push_front_scll(19);
$newscll->push_front_scll(18);
$newscll->push_front_scll(17);

// Show the list after pushing elements at the front
//$newscll->show_scll();

// Push element at the back of the list
$newscll->push_back_scll(20);
//$newscll->show_scll();

// Push element at a specific position
$newscll->push_atpoint_scll(25, 2); // Insert 25 at position 2
//$newscll->show_scll();

// Push at the end (position out of range)
$newscll->push_atpoint_scll(30, 10); // Insert 30 at a position greater than list length
$newscll->show_scll();




 echo "================ Doubly linked list=======================". "<br>";
/*
    class DllNode{
        public $data;
        public $prev;
        public $next;

        public function __construct($data) {
            $this->data = $data;
            $this->prev = null;
            $this->next = null;
        }
    }

    class DLL{
        private $head;
        private $tail;

        public function __construct(){
            $this->head = null;
            $this->tail = null;
        }

        // Push an element to the front of the list
        public function push_front_dll($data){
            $newNode = new DllNode($data);

            if($this->head == null){
                //If list is empty, the new node is both the head and tail
                $this->head = $this->tail = $newNode;
            }else{
                //Insert at the front
                $newNode->next = $this->head;
                $this->head->prev = $newNode;
                $this->head = $newNode;
            }
        }
        
        //Display the entire linked list
        public function display_dll(){
            if($this->head == NULL){
                echo "List is empty\n";
                return;
            }

            $current = $this->head;
            while($current != NULL){
                echo $current->data . "<->";
                $current = $current->next;
            }
                
            echo "NULL\n";
        }

    }


    //Testin the Double Linked List
    $dll = new DLL();
    $dll->push_front_dll(10);
    $dll->push_front_dll(20);
    $dll->push_front_dll(30);

    echo "Linked list after operations:\n";
    $dll->display_dll();


*/



?>


<?php
/*
class Node {
    public $data;
    public $prev;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->prev = null;
        $this->next = null;
    }
}

class DoublyLinkedList {
    private $head;
    private $tail;

    public function __construct() {
        $this->head = null;
        $this->tail = null;
    }

    // Push an element to the front of the list
    public function push_front($data) {
        $newNode = new Node($data);

        if ($this->head == null) {
            // If list is empty, the new node is both the head and tail
            $this->head = $this->tail = $newNode;
        } else {
            // Insert at the front
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
        }
    }

    // Push an element to the back of the list
    public function push_back($data) {
        $newNode = new Node($data);

        if ($this->tail == null) {
            // If list is empty, the new node is both the head and tail
            $this->head = $this->tail = $newNode;
        } else {
            // Insert at the back
            $newNode->prev = $this->tail;
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }
    }

    // Push an element at a specific position (index)
    public function push_atpoint($data, $index) {
        if ($index < 0) {
            echo "Invalid index\n";
            return;
        }

        $newNode = new Node($data);
        $current = $this->head;
        $count = 0;

        // If inserting at the beginning
        if ($index == 0) {
            $this->push_front($data);
            return;
        }

        while ($current != null && $count < $index) {
            $current = $current->next;
            $count++;
        }

        if ($current == null) {
            echo "Index out of bounds\n";
            return;
        }

        // Insert at the specified point
        $newNode->next = $current;
        $newNode->prev = $current->prev;
        $current->prev->next = $newNode;
        $current->prev = $newNode;
    }

    // Delete the front node
    public function del_front() {
        if ($this->head == null) {
            echo "List is empty\n";
            return;
        }

        if ($this->head == $this->tail) {
            // If there is only one node
            $this->head = $this->tail = null;
        } else {
            // Move head to the next node
            $this->head = $this->head->next;
            $this->head->prev = null;
        }
    }

    // Delete the back node
    public function del_back() {
        if ($this->tail == null) {
            echo "List is empty\n";
            return;
        }

        if ($this->head == $this->tail) {
            // If there is only one node
            $this->head = $this->tail = null;
        } else {
            // Move tail to the previous node
            $this->tail = $this->tail->prev;
            $this->tail->next = null;
        }
    }

    // Delete node at a specific position
    public function del_atpoint($index) {
        if ($this->head == null || $index < 0) {
            echo "Invalid index or empty list\n";
            return;
        }

        $current = $this->head;
        $count = 0;

        while ($current != null && $count < $index) {
            $current = $current->next;
            $count++;
        }

        if ($current == null) {
            echo "Index out of bounds\n";
            return;
        }

        // If it's the first node
        if ($current->prev == null) {
            $this->head = $current->next;
            if ($this->head != null) {
                $this->head->prev = null;
            }
        } elseif ($current->next == null) {
            // If it's the last node
            $this->tail = $current->prev;
            $this->tail->next = null;
        } else {
            // If it's in the middle
            $current->prev->next = $current->next;
            $current->next->prev = $current->prev;
        }

        $current = null;  // Delete node (optional in PHP)
    }

    // Display the entire linked list
    public function display() {
        if ($this->head == null) {
            echo "List is empty\n";
            return;
        }

        $current = $this->head;
        while ($current != null) {
            echo $current->data . " <-> ";
            $current = $current->next;
        }
        echo "NULL\n";
    }
}

// Testing the Doubly Linked List
$dl = new DoublyLinkedList();
$dl->push_back(10);
$dl->push_back(20);
$dl->push_back(30);
$dl->push_front(5);
$dl->push_atpoint(15, 2);

echo "Linked List after operations:\n";
$dl->display();

$dl->del_front();
$dl->del_back();
$dl->del_atpoint(1);

echo "Linked List after deletion:\n";
$dl->display();
*/
?>



