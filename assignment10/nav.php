<!-- ######################     Main Navigation   ########################## -->
<div class=".center">
<nav>
    <ol>
        <?php
        // This sets the current page to not be a link. Repeat this if block for
        //  each menu item 
        //  
        
          $username = htmlentities($_SERVER["REMOTE_USER"], ENT_QUOTES, "UTF-8");
          $adminId = "SELECT * from tblAdmins";
          //$adminArray = $thisDatabaseReader->testquery($adminId, "", 0,0,0,0, false, false);
          $adminArray = $thisDatabaseReader->select($adminId, "", 0,0,0,0, false, false);
          
    
      
        
        //Home
        if ($path_parts['filename'] == "index") {
            print '<li class="activePage"><button>Home</button></li>';
        } else {
            print '<li><a href="index.php"><button>Home</button></a></li>';
        }
        
        //pricecs
        if ($path_parts['filename'] == "Movie Prices") {
            print '<li class="activePage"><button>Movie Prices</button></li>';
        } else {
            print '<li><a href="pricing.php"><button>Movie Prices</button></a></li>';
        }
        
        //Detailed Show Time
        if ($path_parts['filename'] == "Current Show Times") {
            print '<li class="activePage"><button>Current Show Times</button></li>';
        } else {
            print '<li><a href="currentMovieSchedule.php"> <button>Current Show Times</button></a></li>';
        }
        
        //Movie Description 
        if ($path_parts['filename'] == "Movie Descriptions") {
            print '<li class="activePage"><button>Movie Descriptions</button></li>';
        } else {
            print '<li><a href="movieDescription.php"><button>Movie Descriptions</button></a></li>';
        }
        
        
        //Upcoming
        if ($path_parts['filename'] == "Upcoming") {
            print '<li class="activePage"><button>Upcoming</button></li>';
        } else {
            print '<li><a href="upcoming.php"><button>Upcoming</button></a></li>';
        }
        
        //Suggestions
        if ($path_parts['filename'] == "Suggestions") {
            print '<li class="activePage"><button>Suggestions</button></li>';
        } else {
            print '<li><a href="suggestions.php"><button>Suggestions</button></a></li>';
        }
        
          //Suggestions
        if ($path_parts['filename'] == "Suggestions Listed") {
            print '<li class="activePage"><button>Suggestions Listed</button></li>';
        } else {
            print '<li><a href="post.php"><button>Suggestions List</button></a></li>';
        }
        
        
        //About
        if ($path_parts['filename'] == "About") {
            print '<li class="activePage"><button>About</button></li>';
        } else {
            print '<li><a href="about.php"><button>About</button></a></li>';
        }
        
        //Employment 
        //if ($path_parts['filename'] == "Employment") {
           // print '<li class="activePage"><button>Employment</button></li>';
       // } else {
            //print '<li><a href="employment.php"><button>Employment</button></a></li>';
       // }
        
        //shows to only admins
        foreach($adminArray as $adminId){
            //foreach($adminId as $rec){
                //print $rec; 
            //}
             
        
           for($i =0; $i<1; $i++)
            {
                
               if($username == $adminId[$i])
               {
                   
               
                    
                   if ($path_parts['filename'] == "Employment") 
                       {
                       print '<li class="activePage"><button>Employment</button></li>';
       }           else {
                       print '<li><a href="employment.php"><button>Employment</button></a></li>';        }
                }
                     
            }
        }
        
      
        ?>
    </ol>
</nav>
</div>
<!-- #################### Ends Main Navigation    ########################## -->

