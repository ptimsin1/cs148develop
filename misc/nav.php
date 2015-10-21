<!-- ######################     Main Navigation   ########################## -->
<nav>
    <ol>
        <?php
        // This sets the current page to not be a link. Repeat this if block for
        //  each menu item 
        if ($path_parts['filename'] == "index") {
            print '<li class="activePage">Home</li>';
        } else {
            print '<li><a href="index.php">Home</a></li>';
        }
        //Question 1
        if ($path_parts['filename'] == "friday assingment") {
            print '<li class="activePage">friday assingment</li>';
        } else {
            print '<li><a href="friday.php">friday assingment</a></li>';
        }
        
        
        //if ($path_parts['filename'] == "populate-table.php") {
            //print '<li class="activePage">Populate Tables</li>';
        //} else {
            //print '<li><a href="populate-table.php">Populate Tables</a></li>';
        //}
        
        ?>
    </ol>
</nav>
<!-- #################### Ends Main Navigation    ########################## -->

