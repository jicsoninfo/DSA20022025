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





?>





