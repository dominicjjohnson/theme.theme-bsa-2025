<?php
//PHP8 Ready
// Get current username
if ( is_user_logged_in() ) {
    $currentUser = wp_get_current_user()->user_login; 
} 

// Create password
$ex_id = isset($_GET['exhibitor_id']) ? $_GET['exhibitor_id'] : null; 
$currentPass = $ex_id . "_F4V3r_P@Ss";

//************************************//
//********** Badge ordering **********//
//************************************//

function badgesLink() {

    global $currentUser, $ex_id, $currentPass;

    // Create the link
    echo "<a href='http://favershamhouse.circdata-solutions.co.uk/exhibitors/sd16/LogIn.aspx?l=" . $currentUser . "&p=" . $currentPass . "&r=badges" . "'>Badge Ordering - link</a><br /><br />";
}

add_shortcode('badges', 'badgesLink'); 

//************************************//
//******** Scan Lead ordering ********//
//************************************//

function scanLink() {

    global $currentUser, $ex_id, $currentPass;

    // Create the link
    echo "<a href='http://favershamhouse.circdata-solutions.co.uk/exhibitors/sd16/LogIn.aspx?l=" . $currentUser . "&p=" . $currentPass . "&r=scanners" . "'>Scan Lead Ordering - link</a><br /><br />";
}
 
add_shortcode('scanners', 'scanLink'); 

//************************************//
//**** LiveLeads licence purchase ****// 
//************************************// 

function licenseLink() {

    global $currentUser, $ex_id, $currentPass;

    // Create the link
    echo "<a href='http://favershamhouse.circdata-solutions.co.uk/exhibitors/sd16/LogIn.aspx?l=" . $currentUser . "&p=" . $currentPass . "&r=devicelicences" . "'>LiveLeads licence purchase - link</a><br /><br />";
}
 
add_shortcode('licences', 'licenseLink'); 
 

?>