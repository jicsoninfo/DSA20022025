<?php


//Selection sort through class
echo "Selection sort";

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

?>



*/

?>