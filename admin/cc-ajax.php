<?php

/**
 * This file contains all the ajax methods. These methods are hooked by the admin-ajax.php file.
 * 
 * Learn More : http://codex.wordpress.org/AJAX
 * 
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */


global $error;

/**
 * Override of PHP Error for Ajax return. Return a string of the error
 * @param type $errno
 * @param type $errmsg
 * @param type $filename
 * @param type $linenum
 * @param type $vars
 */
function cc_error_manage($errno, $errmsg, $filename, $linenum, $vars) {   
    $GLOBALS['error'] = $errmsg.' '.$filename.' '.$linenum;
}


/*
 * This method return the URL of the pictures with the ID of each picture
 */
function cc_ajax_generate_gallery_callback(){
    
    //Define the error manager
    set_error_handler("cc_error_manage");
    
    $json = new stdClass();
    $output="";
    if (isset($_POST['listid'])) { //if we have a list of ID
        $listID = split(',',$_POST['listid']);
        foreach ($listID as $value) {
            //The method genrerate the <img> HTML code of each picture
            $output .= get_image_send_to_editor($value, '', '', '', '', '', 'cc-archive-thumbnail').'
                ';
        }
        $json->img = $output;
    } else {
        $json->error = $GLOBALS['error'];
    }
    echo json_encode($json);
    die();
}

//Hook for Ajax function (only it's a admin page)
add_action('wp_ajax_cc_ajax_generate_gallery', 'cc_ajax_generate_gallery_callback');





/**
 * Function who get the contact page form content. Test each value and send the mail.
 */
function cc_ajax_contact() {
    
    set_error_handler("cc_error_manage");  
    
    $json= new stdClass();
    
// Where will you get the forms' results?
    
    if(get_option('cc-contact-destination'))
    define("WEBMASTER_EMAIL", get_option('cc-contact-destination')); // here will get from theme options

    error_reporting(E_ALL ^ E_NOTICE);

    $post = (!empty($_POST)) ? true : false;

    if ($post) {

        function ValidateEmail($value) {
            $regex = '/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i';

            if ($value == '') {
                return false;
            } else {
                $string = preg_replace($regex, '', $value);
            }

            return empty($string) ? true : false;
        }

        $name = stripslashes($_POST['name']);
        $email = trim($_POST['email']);
        $subject = stripslashes($_POST['subject']);
        $message = stripslashes($_POST['message']);

        $error='';

// Check name

        if (!$name) {
            $error .= "Please enter your name<br>";
        }

// Check email

        if (!$email) {
            $error .= "Please enter your email adress<br>";
        }

        if ($email && !ValidateEmail($email)) {
            $error .= "Please enter a valid email adress<br>";
        }

// Check message (length)

        if (!$message || strlen($message) < 15) {
            $error .="Please enter your message. It should have at least 15 characters";
        }
        

        if (!$error) {
            
            ini_set("sendmail_from", WEBMASTER_EMAIL); // for windows server
                
            if (mail(WEBMASTER_EMAIL, $subject, $message, "From: " . $name . " <" . $email . ">\r\n"
                    . "Reply-To: " . $email . "\r\n"
                    . "X-Mailer: PHP/" . phpversion())) {
                $json->succes = 'OK';
                echo json_encode($json);
                die();
            }
            else{
                $json->fatalerror = $GLOBALS['error'];
                echo json_encode($json);
                die();
            }
            
        } else {
            $json->error = $error;
            echo json_encode($json);
            die();
        }
    }
}

// End function

//Hook Ajax for all visitor
add_action('wp_ajax_nopriv_cc_ajax_contact', 'cc_ajax_contact');
add_action('wp_ajax_cc_ajax_contact', 'cc_ajax_contact');







/*
 * This method return the URL of the pictures with the ID of each picture
 */
function cc_ajax_save_options(){
    
    //Define the error manager
    set_error_handler("cc_error_manage");
    
    $json = new stdClass();
    $output="";
    if (isset($_POST['options'])) { //if we have a list of ID
        foreach ($_POST['options'] as $option) {
            if (empty($option['value'])) {
                delete_option($option['name']);
            } else {
                $value = htmlspecialchars(stripslashes($option['value']));
                update_option($option['name'], $value);
            }
        }
        $json->succes = "Options saved !";
    } else {
        $json->error = $GLOBALS['error'];
    }
    echo json_encode($json);
    die();
}

//Hook for Ajax function (only it's a admin page)
add_action('wp_ajax_cc_ajax_save_options', 'cc_ajax_save_options');