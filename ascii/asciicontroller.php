<?php

    /*takes the user imported file and forms a table, but before it checks whether file is .csv or not.
    */
    function fileToTable($file)
    {
        //explode the file name to get extension of file
        $type = explode(".",$file['name']);
        if(strtolower(end($type)) != 'csv')
                fileError(); //bad file, print message about failure and
        //file is of correct format - retrieve values from the file
        $all_specimen = readUploadedFile($file);
        return formTable($all_specimen);
    }

    //reads uploaded file to array of associative arrays
    function readUploadedFile($file)
    {
        $all_specimen = array();
        $fileReader = fopen($file['tmp_name'],'r'); //open uploaded file
        while (!feof($fileReader)) //read file until there are no more lines
        {
            $tokens = explode(',',fgets($fileReader)); //explode line by delimiter (',')
            //asign tokens to values
            $name = assignValue($tokens, 0);
            $color = assignValue($tokens,1);
            $element = assignValue($tokens,2);
            $likes = assignValue($tokens,3);
            //create associative array
            $specimen = array(
                "Name" => $name,
                "Color" => $color,
                "Element" => $element,
                "Likes" => $likes
            );
            //push associative array to other array, that contains all other associative arrays
            array_push($all_specimen,$specimen);
        }
        return $all_specimen; //forming the table
    }

    //forms the Ascii table from given specimens in file
    function formTable($specimen)
    {
        $cellSize = 10; //"width" for each cell
        $tableWidth = 4*$cellSize + 4;
        //forming the upper bounds for a table
        $table = sprintf("+%'-"."$tableWidth"."s<br>", '+');
        $table .= formTableRow(array("Name" => "Name", "Color" => "Color", "Element" => "Element", "Likes" => "Likes"),$cellSize);
        $table .= sprintf("+%'-"."$tableWidth"."s<br>", '+');
        //adding each associative array to th table
        for ($i = 0; $i < count($specimen); $i++)
            $table .= formTableRow($specimen[$i],$cellSize);
        //lower bounds of table
        $table .= sprintf("+%'-"."$tableWidth"."s<br>", '+');
        return $table;
    }

    //forms one row for a table
    function formTableRow($row,$size)
    {
        return sprintf("|%'_".$size."s|%'_".$size."s|%'_".$size."s|%'_".$size."s|<br>", $row['Name'],$row['Color'],$row['Element'],$row['Likes']);
    }

    //checks if given token in array is set, if yes - assign the value, if not - assign empty space character: ' '
    function assignValue($tokens, $index)
    {
        if (isset($tokens[$index]))
            return $tokens[$index];
        return ' ';
    }

    //stops program execution and informs user about the file being not valid.
    function fileError()
    {
        die ('<div id="container">
<a href="index.php"><strong>Go back</strong></a>
<div class="alert alert-danger">
  Please use a valid file format (.csv)  
</div>
</div>');
    }

