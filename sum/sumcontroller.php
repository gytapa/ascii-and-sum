<?php

//main function of summing, calls all other functions
function execute($data)
{
    preg_match_all('/\d+/', $data, $matches); //regex expression to extract all digits
    if (count($matches[0]) == 0)
        noNumbersError(); //no numbers - print error
    $solutions = createSolutions($matches[0]);
    $filteredSolutions = filterSolutions($solutions);
    for ($i = 0 ; $i < (count($filteredSolutions)); $i++)
    {
        echo '<p> Solution'.($i+1)." : ".count($filteredSolutions[$i])." partitions</p>";
        solutionToString($filteredSolutions[$i]);
    }
}

//forms all possible solutions to create partitions
function createSolutions($numbers)
{
    $solutions = array();
    for ($i = 2; $i < count($numbers); $i++)
        array_push($solutions, create_partitions($numbers,$i));
    return $solutions;
}

//finds out the minimum difference between partition sums in each solution, and takes the ones with the smallest difference.
function filterSolutions($solutions)
{
    $differences = array();
    for ($i = 0 ; $i < (count($solutions)); $i++) //getting differences between smallest and biggest sums
    {
        array_push($differences, findDifference($solutions[$i]));
    }
    //now to get smallest difference
    $smallest = null;
    for ($i = 0 ; $i < (count($differences)); $i++)
    {
        if ($smallest == null) //first time noticing a value - assume its smallest
            $smallest = $differences[$i];
        $smallest = ($smallest > $differences[$i] ? $differences[$i] : $smallest); //check if value is smaller than current smallest
    }
    //filtering the list
    $filtered = array();
    for ($i = 0 ; $i < (count($differences)); $i++)
    {
        if ($differences[$i] == $smallest)
        array_push($filtered,$solutions[$i]);
    }
    return $filtered;
}

//prints data of solution
function solutionToString($solution)
{
    foreach ($solution as $partition) {
        foreach ($partition as $number)
            echo "$number "; //printing each number

        echo " = " . array_sum($partition).'<br>';
    }
    echo "<br><br>";
}
//finds the difference between smallest sum and largest sum of this solution
function findDifference($solution)
{
    //we dont know which partition is smallest and which is biggest, so assign in foreach cycle
    $minimum = null;
    $maximum = null;
    foreach ($solution as $partition)
    {
        //getting sum of a particular partition
        $sum =  array_sum($partition);
        //values are null, initiate them
        if ($minimum == null)
            $minimum = $sum;
        if ($maximum == null)
            $maximum = $sum;
        // check if any of min-max values are changeable
        $minimum = ($minimum > $sum ? $sum : $minimum);
        $maximum = ($maximum < $sum ? $sum : $maximum);
    }
    return $maximum - $minimum;
}

//forms partitions (sub-arrays), count describes amount of partitions, numbers is the array of all numbers
function create_partitions($numbers, $count)
{
    $partitions = array(); //array that holds all partitions
    for ($i = 0; $i < $count; $i++) //initiate partitions
    {
        $partitions[$i] = array();
    }
    while(true) //keep adding until there will be no more elements to add
    {
        if (count($numbers) > 0) //still elements to add
            {
            $index = findSmallestPartition($partitions, $count);
            array_push($partitions[$index],array_pop($numbers)); //add new element to lowest count partition
            }
            else return $partitions; //nothing to add anymore
    }
}

function findSmallestPartition($partitions,$count)
{
    $smallest = 0; //to avoid false data, lets consider that first partition has smallest sum
    for ($i = 1; $i < $count; $i++)
    {
        if (array_sum($partitions[$smallest]) > array_sum($partitions[$i])) //changing smallest index to another one
            $smallest = $i;
    }
    return $smallest;
}

//error message to show the user that no numbers were found in the input
function noNumbersError()
{
    die ('<div id="container">
<a href="index.php"><strong>Go back</strong></a>
<div class="alert alert-danger">
  No numbers were found in your input!  
</div>
</div>');
}


