<?php
// Define a 32-byte (64 character) hexadecimal encryption key
// Note: The same encryption key used to encrypt the data must be used to decrypt the data

function cryptShortcode() {

function encryptAPIData($data) {
    # key size for AES-128, 192 256 should be
    # 16, 24 and 32 byte keys respectively
    # as now we are using "MCRYPT_RIJNDAEL_256", we'll be using 32
    $key = "o7Pdq109At42r280aRq5uU3Cq07cAc2b"; 

    # lets serialize data before sending to encrypt
    $encrypt_data = serialize($data);

    # lets first find out what size is supported for IV
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);

    # create a random IV to use with CBC encoding
    // $iv = mcrypt_create_iv($iv_size, MCRYPT_DEV_URANDOM);
    $iv = "Rq5uU3Cq07cAc2bo7Pdq109At42r280a";

    # now lets creates a cipher text compatible with AES (Rijndael block size = 256)
    # with CBC Mode
    $encrypted_data = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $encrypt_data, MCRYPT_MODE_CBC, $iv);

    # lets encode data to send it and attach IV with it for decryption on another end
    $encoded = base64_encode($encrypted_data) . '|' . base64_encode($iv);

    return $encoded;
  }

# Corresponding Decription function will be
function decryptAPIData($data) {
    $key = "o7Pdq109At42r280aRq5uU3Cq07cAc2b"; 
    $decrypt_data = explode('|', $data . '|');
    $decoded = base64_decode($decrypt_data[0]);
    //$iv = base64_decode($decrypt_data[1]);
    $iv = "Rq5uU3Cq07cAc2bo7Pdq109At42r280a";  

    if (strlen($iv) !== mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)) {
        return false;
    }

    $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_CBC, $iv));
    $decrypted = unserialize($decrypted);
        return $decrypted;
}

if ( is_user_logged_in() ) { 
    global $current_user;
    get_currentuserinfo();
    $currentUser = $current_user->user_login; 
} 

// Encoding the current username
$encrypted_user = encryptAPIData($currentUser);

echo "Username: </br>" . $currentUser . "<br /><br />";
echo "Encrypted username: </br>" . $encrypted_user . "<br /><br />";
echo "Decrypted username: </br>" . decryptAPIData($encrypted_user) . "<br /><br />"; 

// Encoding the pass
$ex_id = $_GET['exhibitor_id']; 
$pass = $ex_id . "_F4V3r_P@Ss";

// echo "Password: " . $pass . "<br /><br />";
echo "Encrypted password: " . $encrypted_pass = encryptAPIData($pass) . "<br /><br />";  

// Create the link
echo "<a href='https://favershamhouse.circdata-solutions.co.uk/exhibitors/sd16/LogIn.aspx?l=" . $encrypted_user . "&p=" . $encrypted_pass . "'>This is a test link</a>";

}

add_shortcode('crypt', 'cryptShortcode'); 

?>