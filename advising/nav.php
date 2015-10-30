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
        
        if ($path_parts['filename'] == "tables") {
            print '<li class="activePage">Display Tables</li>';
        } else {
            print '<li><a href="tables.php">Display Tables</a></li>';
        }
        
        //Four year plan
        if ($path_parts['filename'] == "Four Year Plan") {
            print '<li class="activePage">Four Year Plan</li>';
        } else {
            print '<li><a href="q01.php">Four Year Plan</a></li>';
        }
        
        //ER Diagram
        if ($path_parts['filename'] == "Four Year Plan") {
            print '<li class="activePage">ER Diagram</li>';
        } else {
            print '<li><a href="betterER.pdf">ER Diagram</a></li>';
        }
        
        //Schema 
        if ($path_parts['filename'] == "Schema") {
            print '<li class="activePage">Schema</li>';
        } else {
            print '<li><a href="schema.pdf">Schema</a></li>';
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

