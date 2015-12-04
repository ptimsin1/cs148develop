<?php
//ini_set('display_errors',1);
//error_reporting(E_ALL);
include ("top.php");
include ("header.php");
include ("links.php");
?>

<h1> Contact Me</h1>

<p>The CDC Appreciation Day is a day to celebrate and thank the volunteer and their mentors for all that they have done for this event. In this online handbook, I have talked about how I have organized the appreciation day. This handbook is a guide to be successful in creating the appreciation day or an event similar to it. If there is someone who have suggestion on how to improve this event for future CDC Appreciation Day, I would happy to hear your suggestions. Please feel free to email me all about it. Helping out at the event is a great way to see what people have done and to meet new people. If you would like to volunteer on the day of the CDC Appreciation Day, please email me. </p>
<!--<a href="form.php"></a>-->




<?php
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1 Initialize variables
//
// SECTION: 1a.
// variables for the classroom purposes to help find errors.
$debug = false;

if (isset($_GET["debug"])) { // ONLY do this in a classroom environment
    $debug = true;
}

if ($debug)
    print "<p>DEBUG MODE IS ON</p>";







//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1b Security
//define security variable to be used in SECTION 2a.
$yourURL = $domain . $phpSelf;
// 
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1c form variables
//
// 
// 
// Initialize variables one for each form element
// in the order they appear on the form
$firstName = "";
$lastName = "";
$email = "ptimsin1@uvm.edu";
$comments = "";
$gender = "Male";
$newsletter = true;    // checked
$magazine = false; //not checked
$VideoNews = false; //  not checked
$answer = "Yes";    // pick the option




//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1d form error flags
// 
// Initialize Error Flags one for each form element we validate
// in the order they appear in section 1c.
$firstNameERROR = false;
$lastNameERROR = false;
$emailERROR = false;

//
//
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
// SECTION: 1e misc variables
//
// // create array to hold error messages filled (if any) in 2d displayed in 3c.
$errorMsg = array();
//array used to hold form value
$dataRecord = array();
$mailed = false;

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//
// SECTION: 2 Process for when the form is submitted
if (isset($_POST["btnSubmit"])) {
//
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//
// SECTION: 2a Security
    if (!securityCheck(true)) {
        $msg = "<p>Sorry you cannot access this page. ";
        $msg.= "Security breach detected and reported</p>";
        die($msg);
    }

    // 
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2b Sanitize (clean) data 
    // 
    //   // remove any potential JavaScript or html code from users input on the
    // form. Note it is best to follow the same order as declared in section 1c.

    $firstName = htmlentities($_POST["txtFirstName"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $firstName;

    $lastName = htmlentities($_POST["txtLastName"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $lastName;

    $email = filter_var($_POST["txtEmail"], FILTER_SANITIZE_EMAIL);
    $dataRecord[] = $email;

    $comments = htmlentities($_POST["txtComments"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $comments;

    $gender = htmlentities($_POST["radGender"], ENT_QUOTES, "UTF-8");
    $dataRecord[] = $gender;

if (isset($_POST["chkNewsletter"])) {
    $newsletter = true;
} else {
    $magazine = false;
    $VideoNews = false; 
}
$dataRecord[] = $newsletter; 

if (isset($_POST["chkmagazine"])) {
    $magazine = true;
} else {
    $newsletter = false;
    $VideoNews = false; 
}
$dataRecord[] = $magazine; 


if (isset($_POST["chkVideoNews"])) {
    $VideoNews = true;
} else {
    $newsletter = false;
    $magazine = false;
}
$dataRecord[] = $VideoNews;

$answer = htmlentities($_POST["lstanswer"],ENT_QUOTES,"UTF-8");
$dataRecord[] = $answer; 
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2c Validation
    //
    // 
    // 
    // Validation section. Check each value for possible errors, empty or
    // not what we expect. You will need an IF block for each element you will
    // check (see above section 1c and 1d). The if blocks should also be in the
    // order that the elements appear on your form so that the error messages
    // will be in the order they appear. errorMsg will be displayed on the form
    // see section 3b. The error flag ($emailERROR) will be used in section 3c.
//First Name
    if ($firstName == "") {
        $errorMsg[] = "Please enter your first name";
        $firstNameERROR = true;
    } elseif (!verifyAlphaNum($firstName)) {
        $errorMsg[] = "Your first name appears to have extra character.";
        $firstNameERROR = true;
    }
    //Last Name
    if ($lastName == "") {
        $errorMsg[] = "Please enter your last name";
        $lastNameERROR = true;
    } elseif (!verifyAlphaNum($lastName)) {
        $errorMsg[] = "Your last name appears to have extra character.";
        $lastNameERROR = true;
    }
//Email                    

    if ($email == "") {
        $errorMsg[] = "Please enter your email address";
        $emailERROR = true;
    } elseif (!verifyEmail($email)) {
        $errorMsg[] = "Your email address appears to be incorrect.";
        $emailERROR = true;
    }
    ?>
    
    <?php
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //
    // SECTION: 2d Process Form - Passed Validation
    //
    // 
    //  // Process for when the form passes validation (the errorMsg array is empty)
    //
    if (!$errorMsg) {
        if ($debug)
            print "<p>Form is valid</p>";



        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
    // SECTION: 2e Save Data
        //   //
        // SECTION: 2e Save Data
        //
        // This block saves the data to a CSV file.

        $fileExt = ".csv";

        $myFileName = "data/data";

        $filename = $myFileName . $fileExt;

        if ($debug)
            print "\n\n<p>filename is " . $filename;

        // now we just open the file for append
        $file = fopen($filename, 'a');

        // write the forms information
        fputcsv($file, $dataRecord);

        // close the file
        fclose($file);

        // 
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
    // SECTION: 2f Create message
        //
      // SECTION: 2f Create message
        //
        // build a message to display on the screen in section 3a and to mail
        // to the person filling out the form (section 2g).

        $message = 'Thank you for you email!';

        foreach ($_POST as $key => $value) {
            if ($key != "btnSubmit") {


                $message .= "<p>";

                $camelCase = preg_split('/(?=[A-Z])/', substr($key, 3));

                foreach ($camelCase as $one) {
                    $message .= $one . " ";
                }
                $message .= " = " . htmlentities($value, ENT_QUOTES, "UTF-8") . "</p>";
            }
        }
        // 
        //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        //
    // SECTION: 2g Mail to user
        //   // SECTION: 2g Mail to user
        //
        // Process for mailing a message which contains the forms data
        // the message was built in section 2f.
        $to = $email; // the person who filled out the form
        $cc = "";
        $bcc = "";
        $from = "Making A World A Better Place <noreplay@yourwebsite.com>";

        // subject of mail should make sense to your form
        $todaysDate = strftime("%x");
        $subject = "Making World A Better Place: " . $todaysDate;

        $mailed = sendMail($to, $cc, $bcc, $from, $subject, $message);

        //#############################################################################
        //
    // 
    //
}
}//ends if form was summitted. 
//ends if form was submitted
//SECTION 3 Display Form
?>

<article id="main">
    <!--<h1>Form</h1>-->

    <?php
//####################################
//
// SECTION 3a.
//
// 
//If its the first time coming to the form or there are errors we are going
// to display the form.

    if (isset($_POST["btnSubmit"]) AND empty($errorMsg)) { // closing of if marked with: end body submit
        print "<h1>Your Request has ";
        print "been processed</h1>";
        print "<p>A copy of this message has ";
        if (!$mailed) {
            print "not ";
        }
        print "been sent</p>";
        print "<p>To: " . $email . "</p>";
        print "<p>Mail Message:$message </p>";
    } else {
// 
// 
//####################################
//
// SECTION 3b Error Messages
//
//
//display any error messages before we print out the form

        if ($errorMsg) {
            print '<div id="errors">';
            print "<ol>\n";
            foreach ($errorMsg as $err) {
                print "<li>" . $err . "</li>\n";
            }
            print "</ol>\n";
            print '</div>';
        }

// form code here but notice this closing bracket on line 315
        // end body submit
//####################################
//
// SECTION 3c html Form
//
        /* Display the HTML form. note that the action is to this same page. $phpSelf
          is defined in top.php */
        ?>

        <form action="<?php print $phpSelf; ?>"
              method="post"
              id="frmRegister">

            <fieldset class="wrapper">
                <legend> </legend>
                <p>If you have any questions or comment about making the world a better place, please email me. I would love to answer any questions or read your comments!</p>

                <fieldset class="wrapperTwo">
                    <legend>To send me a email, just click Register</legend>

                    <fieldset class="contact">
                        <legend>Contact Information:</legend>

                        <label for="txtFirstName" class="required">First Name
                            <input type="text" id="txtFirstName" name="txtFirstName"
                                   value="<?php print $firstName; ?>"
                                   tabindex="100" maxlength="45" placeholder="Enter your first name"
                                   <?php if ($firstNameERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()"
                                   autofocus>

                        </label>

                        <label for="txtLastName" class="required">Last Name
                            <input type="text" id="txtLastName" name="txtLastName"
                                   value="<?php print $firstName; ?>"
                                   tabindex="100" maxlength="45" placeholder="Enter your last name"
                                   <?php if ($lastNameERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()"
                                   autofocus>
                        </label>







                        <label for="txtEmail" class="required">Email
                            <input type="text" id="txtEmail" name="txtEmail"
                                   value="<?php print $email; ?>"
                                   tabindex="120" maxlength="45" placeholder="Enter a valid email address"
                                   <?php if ($emailERROR) print 'class="mistake"'; ?>
                                   onfocus="this.select()" 
                                   >



                        </label>
                    </fieldset> <!-- ends contact -->

                    <fieldset class="radio">
                        <legend>What is your gender?</legend>
                        <label><input type="radio" 
                                      id="radGenderMale" 
                                      name="radGender" 
                                      value="Male"
                                      <?php if ($gender == "Male") print 'checked' ?>
                                      tabindex="330">Male</label>
                        <label><input type="radio" 
                                      id="radGenderFemale" 
                                      name="radGender" 
                                      value="Female"
                                      <?php if ($gender == "Female") print 'checked' ?>
                                      tabindex="340">Female</label>
                        <label><input type="radio" 
                                      id="radGenderNone" 
                                      name="radGender" 
                                      value="Prefer Not To Say"
                                      <?php if ($gender == "Prefer Not To Say") print 'checked' ?>
                                      tabindex="330">Prefer Not To Say</label>
                    </fieldset>   
                    
                           

                                      
                    <fieldset class="checkbox">
    <legend>What else would like like?</legend>
    <label><input type="checkbox" 
                  id="chkNewsletter" 
                  name="chkNewsletter" 
                  value="Newsletter"
                  <?php if ($newsletter) print ' checked '; ?>
                  tabindex="420"> News Letter</label>

    <label><input type="checkbox" 
                  id="chkMagazine " 
                  name="chkMagazine" 
                  value="Magazine"
                  <?php if ($magazine) print ' checked '; ?>
                  tabindex="430"> Magazine</label>
    
    <label><input type="checkbox" 
                  id="chkVideoNews" 
                  name="chkVideoNews" 
                  value="VideoNews"
                  <?php if ($VideNews) print ' checked '; ?>
                  tabindex="440"> Video News</label>
</fieldset>
                    
<fieldset  class="listbox">	
    <label for="lstanswer">Would you like to volunteer during the CDC Appreciation Day?</label>
    <select id="lstanswer" 
            name="lstanswer" 
            tabindex="520" >
        <option <?php if($answer=="yes") print " selected "; ?>
            value="Yes">Yes</option>
        
        <option <?php if($answer=="no") print " selected "; ?>
            value="No" 
>No</option>
        
        <option <?php if($answer=="Maybe") print " selected "; ?>
            value="Maybe.Not sure at this time." >Maybe. Not sure at this time.</option>
        <option <?php if($answer=="more_info") print " selected "; ?>
            value="I would like more information" >I would like more info</option>
    </select>
</fieldset>   
                    
                    
  <fieldset  class="textarea">
                        <legend>Comment</legend>
                        <label for="txtComments" class="required"></label>
                        <textarea id="txtComments" 
                                  name="txtComments" 
                                  tabindex="200"
                                  <?php if ($commentsERROR) print 'class="mistake"'; ?>
                                  onfocus="this.select()" 
                                  style="width: 25em; height: 4em;" ><?php print $comments; ?></textarea>
                    </fieldset>
                </fieldset> <!-- ends wrapper Two -->

                <fieldset class="buttons">
                    <legend></legend>
                    <input type="submit" id="btnSubmit" name="btnSubmit" value="Register" tabindex="900" class="button">
                </fieldset> <!-- ends buttons -->

            </fieldset> <!-- Ends Wrapper -->
        </form>

    <?php } ?>

</article>
<?php include ('footer.php'); ?>
</body>
</html>