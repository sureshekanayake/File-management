<!DOCTYPE html>
<html>

<head>
  <title>File Management System</title>
  <script type="text/javascript" src="date_time.js"></script>
  <style type="text/css">
    .times {
      color: white;
      font-family: Montserrat-Light;
      font-size: 28px;
      padding-top: 10px;
      text-align: center;

    }

    .dropbtn {
      background-color: transparent;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
      border-radius: 20px;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 240px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      border-radius: 20px;

    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: #666666;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a style="font-family: Montserrat-Light; font-size: 24px; background-color: transparent;" class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminprofilehome.php">File Management System</a>
    <div class="times"><span id="date_time"></span></div>
    <script type="text/javascript">
      window.onload = date_time('date_time');
    </script>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <?php
        if (isset($_SESSION['admin_id'])) {
        ?>
          <div class="dropdown">
            <button class="dropbtn">
              <h1 style="font-family: Montserrat-Light; color: white; font-size: 28px; margin-top: 6px; margin-bottom: -3px;" class="h2">Welcome <?php echo $_SESSION["admin_username"]; ?><i class="fa fa-caret-down" style="padding-left: 8px;"></i></h1>
            </button>
            <div class="dropdown-content">
              <a href="admin-logout.php">Log Out</a>
            </div>
          </div>
          <?php
        } else {
          $uriAr = explode("/", $_SERVER['REQUEST_URI']);
          $page = end($uriAr);
          if ($page === "itlogin.php") {
          ?>

          <?php
          } else {
          ?>
            <a class="nav-link" href="../itlogin.php">Login</a>
        <?php
          }
        }

        ?>

      </li>
    </ul>
  </nav>

</body>

</html>