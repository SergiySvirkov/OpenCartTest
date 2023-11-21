<?php
// Connect to the legacy database
$legacyDb = new mysqli('legacy_host', 'legacy_username', 'legacy_password', 'legacy_database');

// Connect to the OpenCart database
$opencartDb = new mysqli('opencart_host', 'opencart_username', 'opencart_password', 'opencart_database');

// Retrieve user data from the legacy database
$legacyUsersQuery = $legacyDb->query("SELECT * FROM legacy_users");
while ($legacyUser = $legacyUsersQuery->fetch_assoc()) {
    // Insert user data into the OpenCart database
    $opencartDb->query("INSERT INTO oc_user SET username = '{$legacyUser['username']}', email = '{$legacyUser['email']}', password = '{$legacyUser['password']}', ...");
}

// Close database connections
$legacyDb->close();
$opencartDb->close();
?>

