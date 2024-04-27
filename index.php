<?php session_start(); ?>

<!doctype html>

<html lang="en-US">

<head>

<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1,width=device-width">

<title>Themes</title>

<?php

if (isset($_GET["theme"])) {                                                  // If url has ?theme=something, set the session theme to that and save it to a cookie

      $_SESSION["theme"] = $_GET["theme"];
      setcookie("theme", $_GET["theme"], time() + 34560000, "/");
      header("Location: ".$_SERVER['SCRIPT_NAME']);                           // Reload page to avoid showing query string, optional
    
} elseif(!isset($_SESSION["theme"])) {                                        // If no query string, check if session theme exists

      if (isset($_COOKIE["theme"])) {                                         // If not, check if cookie exists
            $_SESSION["theme"] = $_COOKIE["theme"];                           // If it does, set the session theme to that
            setcookie("theme", $_COOKIE["theme"], time() + 34560000, "/");    // Cookie has a limited lifetime so reset it every new session
      };

}

?>

<link rel="stylesheet" href="<?php if (isset($_SESSION["theme"])) { echo $_SESSION["theme"]; } else { echo "default"; }; ?>.css">

</head>

<body>

<h1>Set Theme:<h1>
<a href="?theme=default">Default</a><br>
<a href="?theme=red">Red</a><br>
<a href="?theme=green">Green</a><br>
<a href="?theme=blue">Blue</a><br>

</body>

</html>
