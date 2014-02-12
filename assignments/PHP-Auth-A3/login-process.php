<?php

require __DIR__ . "/vendor/autoload.php";

use ITP\Utilites;
use ITP\Auth;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

$request = Request::createFromGlobals();

// Get session
$session = new Session();
$session->start();

// Check to see if user is logged in
if (!is_null($session->get("loginTime"))) {
    $response = new RedirectResponse("dashboard.php");
    return $response->send();
}

// Check to see if request has username and password
$username = $request->get("username");
$password = $request->get("password");

if (is_null($username) || is_null($password)) {
    $response = new RedirectResponse("login.php");
    return $response->send();
}

// Validate user
$auth = new Auth(Utilites::getPDO());

if ($auth->attempt($username, $password)) {
    // User is validated; store user info in session and redirect to dashboard
    $session->getFlashBag()->set("statusMessage", "You have successfully logged in!");
    $session->set('username', $username);
    $session->set('email', $auth->getUser($username)["email"]);
    $session->set('loginTime', time());
    $response = new RedirectResponse("dashboard.php");
    return $response->send();
}
else {
    // Set flash message
    $session->getFlashBag()->set("statusMessage", "Incorrect credentials.");
    $response = new RedirectResponse("login.php");
    return $response->send();
}