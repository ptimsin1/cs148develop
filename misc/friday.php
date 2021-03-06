<?php

//##############################################################################
//
// This page lists your tables and fields within your database. if you click on
// a database name it will show you all the records for that table. 
// 
// 
// This file is only for class purposes and should never be publicly live
//##############################################################################
include "top.php";


   
    

     $totalPerPg = 10;
     $start = 1000;
     
     if ($_GET["totalPerPg"])
     {
         $totalPerPg = (int)$_GET["totalPerPg"];
     }
     if ($_GET["start"])
     {
         $start = (int) $_GET["start"];
     }
      
    //now print out each record
    $query = 'select pmkStudentId, fldFirstName, fldLastName, fldStreetAddress,fldCity,fldState,fldZip,fldGender from tblStudents ORDER BY fldFirstName, fldLastName limit '. $totalPerPg . ' OFFSET '. $start;
    //$info2 = $thisDatabaseReader->testquery($query, "", 1, 0, 0, 0, false, false);
    $info2 = $thisDatabaseReader->select($query, "", 0, 1, 0, 0, false, false);
    
    $columns = 8;
    
    print '<a href = "friday.php?totalPerPg='. $totalPerPg . '&start='. ($start - $totalPerPg). '"><button> Previous Page </button></a>';
    print '<a href = "friday.php?totalPerPg='. $totalPerPg . '&start='. ($start + $totalPerPg). '"><button> Next Page </button></a>';
    
    $headerFields = array_keys($info2[0]);
    // echo '<pre><p>';
    // print_r ($headerFields);
    // echo '</p></pre>';
    $headerArray = array_filter($headerFields, "is_string");
    // echo '<pre><p>';
    // print_r ($headerArray);
    // echo '</p></pre>';
    echo "<h2> Records: " . count($info2) . "</h2>";
    print '<table>';
    //header block
    print '<tr class="tblHeaders">';
    foreach ($headerArray as $key) {
        $camelCase = preg_split('/(?=[A-Z])/', substr($key, 3));
        $message = "";
        foreach ($camelCase as $one) {
            $message .= $one . " ";
        }
        print '<th>' . $message . '</th>';
    }
    print '</tr>';
   // print '<table>';
    $highlight = 0; // used to highlight alternate rows
   // print '<p>Total Records:'. count($info2). '</p>';
    print '<p>SQL'. $query. '</p>';
    
    $variable = array_keys($array-variable);
    foreach ($info2 as $rec) {
        $highlight++;
        if ($highlight % 2 != 0) {
            $style = ' odd ';
        } else {
            $style = ' even ';
        }
        print '<tr class="' . $style . '">';
        for ($i = 0; $i < $columns; $i++) { 
            print '<td>' . $rec[$i] . '</td>';
        }
        print '</tr>';
    }

    // all done
    print '</table>';
    print '</aside>';

print '</article>';
include "footer.php";
?>