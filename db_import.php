<?php
$host = '127.0.0.1';
$db   = 'u519989786_deshkhoj2';
$user = 'u519989786_admn_deshkhoj2';
$pass = '3cCrV?fKp/0';

echo "<h2>DeshKhoj Force Migration Tool</h2>";

// Check if file exists
$sql_file = 'u519989786_dk.sql';
if (!file_exists($sql_file)) {
    die("Error: $sql_file not found in root.");
}

echo "Attempting to import $sql_file into $db...<br>";

// Method 1: exec (Fasted)
$cmd = "mysql -u $user -p'" . addslashes($pass) . "' -h $host $db < $sql_file 2>&1";
echo "Running: <code>mysql -u $user -p'****' -h $host $db < $sql_file</code><br>";

exec($cmd, $output, $return_var);

if ($return_var === 0) {
    echo "<h3 style='color:green'>✅ SUCCESS! Data imported.</h3>";
} else {
    echo "<h3 style='color:red'>❌ FAILED with code $return_var</h3>";
    echo "<pre>" . implode("\n", $output) . "</pre>";
}

// Method 2: Manual Check
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $stmt = $pdo->query("SELECT COUNT(*) FROM dukaan_list");
    $count = $stmt->fetchColumn();
    echo "Current Business Count: <strong>$count</strong><br>";
    
    if ($count > 100) {
        echo "<strong>Migration looks successful!</strong>";
    }
} catch (Exception $e) {
    echo "Check failed: " . $e->getMessage();
}
?>
