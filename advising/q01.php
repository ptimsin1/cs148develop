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


   
    

    //now print out each record
    $query = 'SELECT DISTINCT tblStudents.fldStudentsFirstName, tblStudents.fldStudentsLastName, tblFourYearPlan.fldMajor, tblFourYearPlan.fldMinor,
                tblAdvisors.fldAdvisorsFirstName, tblAdvisors.fldAdvisorsLastName, tblSemesterPlan.fnkYear, tblSemesterPlan.fnkTerm, tblCourses.fldCourseName, tblCourses.fldCredits, tblCourses.fldDepartment, tblCourses.fldCourseNumber
                FROM tblCourses 
                INNER JOIN tblSemesterPlanCourses ON tblCourses.pmkCourseId = tblSemesterPlanCourses.fnkCourseId 
                INNER JOIN tblSemesterPlan ON tblSemesterPlanCourses.fnkTerm = tblSemesterPlan.fnkTerm AND tblSemesterPlanCourses.fnkYear = tblSemesterPlan.fnkYear 
                INNER JOIN tblFourYearPlan ON tblSemesterPlan.fnkPlanId = tblFourYearPlan.pmkPlanId
                INNER JOIN tblStudents ON tblFourYearPlan.fnkStudentsNetId = tblStudents.pmkStudentsNetId
                INNER JOIN tblAdvisors ON tblFourYearPlan.fnkAdvisorsNetId = tblAdvisors.pmkAdvisorsNetId
                ORDER BY tblSemesterPlanCourses.fldDisplayOrder'; 
    //$info2 = $thisDatabaseReader->testquery($query, "", 0, 0, 0, 0, false, false);
    $info2 = $thisDatabaseReader->select($query, "", 0, 2, 0, 0, false, false);
    
   // echo "/n>";
    $columns = 13;
    
      $headerFields = array_keys($info2[0]);
      $headerArray = array_filter($headerFields, "is_string");
    
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

    $highlight = 0; // used to highlight alternate rows
    //print '<p>Total Records:'. count($info2). '</p>';
    print '<p>SQL'. $query. '</p>';
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