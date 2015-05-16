<?php

if (file_exists('data.php')) {
  include 'data.php';

  if (empty($data)) {
    throw new Exception("No data to sync.");
  }
}
else {
  throw new Exception('No data.php exists. Please create a "data.php" file inside the "data" directory.');
}

// Build the base command options.
$cmd_base = array();
if (isset($mode) && !empty($mode)) {
  $cmd_base[$mode] = '';
}
$cmd_base['skipsize'] = '';

if (isset($debug) && $debug == TRUE) {
  $cmd_base['debug'] = '';
}

$cmd_base['authmech1'] = 'PLAIN';
$cmd_base['port1'] = '143';

$cmd_base['port2'] = '993';
$cmd_base['authmech2'] = 'PLAIN';
$cmd_base['ssl2'] = '';
$cmd_base['noauthmd5'] = '';

print "--- START SYNC ---\r\n";

foreach ($data as $account) {
  $cmd_account = array();

  // Account options.
  $cmd_account['host1'] = $account['host1'];
  $cmd_account['user1'] = $account['user1'];
  $cmd_account['password1'] = $account['password1'];

  $cmd_account['host2'] = $account['host2'];
  $cmd_account['user2'] = $account['user2'];
  $cmd_account['password2'] = $account['password2'];

  // Build the command string based on the options arrays.
  $cmd = 'imapsync';
  foreach (array_merge($cmd_base, $cmd_account) as $key => $value) {
    if (empty($value)) {
      $cmd .= ' --' . $key;
    }
    else {
      $cmd .= ' --' . $key . ' ' . escapeshellarg($value);
    }
  }

  // Print complete command if debug mode is enabled.
  if (isset($debug) && $debug == TRUE) {
    var_dump($cmd);
  }

  print ">> " . $account['user1'] . "\r\n";

  // Run the command.
  $result = shell_exec($cmd . ' >&1');
  print $result;
}

print "\r\n--- END SYNC ---";

?>
