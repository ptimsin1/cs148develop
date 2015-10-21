<?php

//Practice 2: Function Decleration 
function welcome($name, $age)
   
{
    print 'welcome to the site' . $name . '. You are'. $age. 'years old';
}

echo welcome(' Chris', '18'); 
print "\n";

//Practice 2: Function Decleration 
function add ($num1, $num2)
{
    print(+$num1+$num2);
    print"\n";
}

echo add(2, 3);

//Practice 3
function substract ($num1, $num2)
{
    $total = $num1-$num2;
    return $total; 
}

print substract(5,3);


//Practicing If Statements 
$name = 'Top';
        if($name =='Chris')
        {
            echo ('Hello Chris');
        }
        
        elseif ($name = 'Tom') 
            {
                echo 'Welcome Tom';
            }
        else 
        {
            echo'You are not Chris';
        }

?>
<!DOCTYPE html>
<html>
<body>

<h1>My First Heading</h1>

<p>My first paragraph.</p>

</body>
</html>