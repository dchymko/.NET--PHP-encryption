<?php
error_reporting(0);
?>

<form action="AES256.php" method="post" id="mainform" name="mainform" accept-charset="utf-8">
Text to encrypt (or key to decrypt):<input type="text" size="80" name="key" value="<?php if (isset($_POST['key'])) echo $_POST['key'];  else echo 'TextToEncrypt'; ?>"></br>
Passphrase:<input type="text" size="80" name="passphrase" value="<?php if (isset($_POST['passphrase'])) echo $_POST['passphrase'];  else echo 'test'; ?>"></br>
Salt:<input type="text" size="80" name="salt" value="<?php if (isset($_POST['salt'])) echo $_POST['salt'];  else echo '4Bvq75DG'; ?>"></br>
Iterations:<input type="text" size="80" name="iterations" value="<?php if (isset($_POST['iterations'])) echo $_POST['iterations'];  else echo '1000'; ?>"></br>
Init Vector:<input type="text" size="80" name="initvector" value="<?php if (isset($_POST['initvector'])) echo $_POST['initvector'];  else echo 'pOWaTbO92LfXbh69JkYzfT7P465TNc0h'; ?>"></br>
Key Size:<input type="text" size="80" name="keysize" value="<?php if (isset($_POST['keysize'])) echo $_POST['keysize'];  else echo '32'; ?>"></br>
<input type="submit" name="Encrypt" value="Encrypt"> <input type="submit" name="Decrypt" value="Decrypt">
</form>




<?php 


function pbkdf2( $p, $s, $c, $kl, $a = 'sha1' ) {

    $hl = strlen(hash($a, null, true)); # Hash length
    $kb = ceil($kl / $hl);              # Key blocks to compute
    $dk = '';                           # Derived key

    # Create key
    for ( $block = 1; $block <= $kb; $block ++ ) {

        # Initial hash for this block
        $ib = $b = hash_hmac($a, $s . pack('N', $block), $p, true);

        # Perform block iterations
        for ( $i = 1; $i < $c; $i ++ )

            # XOR each iterate
            $ib ^= ($b = hash_hmac($a, $b, $p, true));

        $dk .= $ib; # Append iterated block
    }

    # Return derived key of correct length
    return substr($dk, 0, $kl);
}

if (isset($_POST['key'])) {
// Make sure salt is 8 bytes length
$key = pbkdf2($_POST['passphrase'],$_POST['salt'], $_POST['iterations'], $_POST['keysize']);

//$text = "yamnuska"; // test plain text
$text = $_POST['key'];

$iv = $_POST['initvector'];

if(isset($_POST['Decrypt'])) {
// Use the output from above. This also works with Windows encrypted output and strips the padded characters
$encrypted = $text;
echo "Decrypted: <input type=\"text\" size=\"60\" value=\"".rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($encrypted), MCRYPT_MODE_CBC, $iv), "\0")."\"><br/>";
} else {
$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_CBC, $iv);
	echo "Encrypted: <input type=\"text\" size=\"60\" value=\"".base64_encode($crypttext)."\"><br/>";
}
}
?>
