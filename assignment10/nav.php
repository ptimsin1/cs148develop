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
        if ($path_parts['filename'] == "Movie") {
            print '<li class="activePage">Movie</li>';
        } else {
            print '<li><a href="friday.php">Movie</a></li>';
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

