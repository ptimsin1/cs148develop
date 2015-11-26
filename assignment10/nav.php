<!-- ######################     Main Navigation   ########################## -->
<nav>
    <ol>
        <?php
        // This sets the current page to not be a link. Repeat this if block for
        //  each menu item 
        //Home
        if ($path_parts['filename'] == "index") {
            print '<li class="activePage">Home</li>';
        } else {
            print '<li><a href="index.php">Home</a></li>';
        }
        //Detailed Show Time
        if ($path_parts['filename'] == "Current Show Times") {
            print '<li class="activePage">Current Show Times</li>';
        } else {
            print '<li><a href="currentMovieSchedule.php"> Current Show Times</a></li>';
        }
        
        //Movie Description 
        if ($path_parts['filename'] == "Movie Descriptions") {
            print '<li class="activePage">Movie Descriptions</li>';
        } else {
            print '<li><a href="movieDescription.php">Movie Descriptions</a></li>';
        }
        
        //About
        if ($path_parts['filename'] == "About") {
            print '<li class="activePage">About</li>';
        } else {
            print '<li><a href="about.php">About</a></li>';
        }
        
        //Suggestions
        if ($path_parts['filename'] == "Suggestions") {
            print '<li class="activePage">Suggestions</li>';
        } else {
            print '<li><a href="name.php">Suggestions</a></li>';
        }
        
        //Upcoming
        if ($path_parts['filename'] == "Upcoming") {
            print '<li class="activePage">Upcoming</li>';
        } else {
            print '<li><a href="name.php">Upcoming</a></li>';
        }
        
        //Employment 
        if ($path_parts['filename'] == "Employment") {
            print '<li class="activePage">Employment</li>';
        } else {
            print '<li><a href="name.php">Employment</a></li>';
        }
        
        
        ?>
    </ol>
</nav>
<!-- #################### Ends Main Navigation    ########################## -->

