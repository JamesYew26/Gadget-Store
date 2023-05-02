<?php

include 'livechatmain.php';
if (!isset($_POST['name'], $_POST['email'])) {
    exit('Please enter a valid name and email address!');
}
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Please enter a valid email address!');
}


$stmt = $pdo->prepare('SELECT * FROM accounts WHERE email = ?');
$stmt->execute([ $_POST['email'] ]);
$account = $stmt->fetch(PDO::FETCH_ASSOC);

if ($account) {
        if (isset($_POST['password']) && $account['role'] == 'Operator') {
        if (password_verify($_POST['password'], $account['password'])) {
        $_SESSION['account_loggedin'] = TRUE;
        $_SESSION['account_id'] = $account['id'];
        $_SESSION['account_role'] = $account['role']; 
        update_secret($pdo, $account['id'], $account['email'], $account['secret']);
        exit('success');
    } else {
        exit('Invalid credentials!');
    }
} else if ($account['role'] == 'Operator') {
    exit('operator');
} else if ($account['role'] == 'Guest') {
    $_SESSION['account_loggedin'] = TRUE;
    $_SESSION['account_id'] = $account['id'];
    $_SESSION['account_role'] = $account['role']; 
    update_secret($pdo, $account['id'], $account['email'], $account['secret']);
    exit('success');
}
} else {
    $stmt = $pdo->prepare('INSERT INTO accounts (email, password, full_name, role, last_seen) VALUES (?, ?, ?, ?, ?)');
$stmt->execute([ $_POST['email'], '', $_POST['name'] ? $_POST['name'] : 'Guest', 'Guest', date('Y-m-d H:i:s') ]);
$id = $pdo->lastInsertId();
$_SESSION['account_loggedin'] = TRUE;
$_SESSION['account_id'] = $id;   
$_SESSION['account_role'] = 'Guest'; 
update_secret($pdo, $id, $_POST['email']);
exit('success');
}