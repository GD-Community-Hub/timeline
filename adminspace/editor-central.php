<?php
session_start();
require_once "../config.php";
if(!isset($_SESSION["isEditor"]) || $_SESSION["isEditor"] == "0"){
  header("Location: lurkin.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_REQUEST["id"];
  $sql = "UPDATE events SET approved = '1' WHERE id = '$id'";
  $rs = mysqli_query($link, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Editor Central - GDT</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/timeline-plus/dist/timeline.js"></script>
    <script type="text/javascript" src="../js/menu.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/timeline-plus@latest/dist/timeline.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/bg.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <script type="text/javascript" src="https://kit.fontawesome.com/944eb371a4.js"></script>
    <link rel="stylesheet" href="../css/menu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body data-nav="false">
    <main>
    <h1>Editor Central</h1>

    <h2>Events for approval</h2>
    <?php
      $sql = "SELECT id, name, date_start, date_end, timelinegroup, type, approved FROM events";
      $result = mysqli_query($link, $sql);

      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          if($row["approved"] == "0") {
            $finalStartDate = date("d. m. Y", strtotime($row["date_start"]));
            $finalEndDate = date("d. m. Y", strtotime($row["date_end"]));
            echo "<table class=\"accept-table\"><tr><th colspan=\"2\">".$row["name"]."</th></tr>";
            if($row["date_end"] !== null) {
              echo "<tr><td class=\"start\">".$finalStartDate."</td>";
              echo "<td class=\"end\">".$finalEndDate."</td>";
            } else {
              echo "<tr><td class=\"start\" colspan=\"2\">".$finalStartDate."</td>";
            }
            echo "</tr>";
            echo "<tr><td class=\"submit\" colspan=\"2\">";
            echo "<form action=\"".htmlspecialchars($_SERVER["PHP_SELF"])."\" method=\"post\">";
            echo "<input type=\"hidden\" name=\"id\" value=\"".$row["id"]."\">";
            echo "<input type=\"submit\" class=\"btn btn-success\" value=\"Validate\"></input>";
            echo "</form></td></tr></table><br><br>";
          }
        }
      } else {
        echo "<p>All results are validated.</p>";
      }
    ?>
    <h2>Users</h2>
    <?php
      $sql = "SELECT id, username, created_at, isAuthor, isEditor FROM users";
      $result = mysqli_query($link, $sql);
    
      if ($result->num_rows > 0) {
        echo "<table class='editor-overview'><tr><th>ID</th><th>Username</th><th>Created At</th><th>Is Author</th><th>Is Editor</th></tr>";
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["created_at"]."</td><td>".$row["isAuthor"]."</td><td>".$row["isEditor"]."</td></tr>";
        }
        echo "</table>";
      } else {
        echo "<div class='d-flex justify-content-center'><p>0 results</p></div>";
      }
    ?>
    <br>
    <div class="d-flex justify-content-center">
    <a href="edit-data.php" class="btn btn-primary align-self-center">Edit User Details</a>
    </div>
    </main>
    <nav>
      <div id="nav-links">
        <a class="nav-link" href="../index.php">
          <h2 class="nav-link-label rubik-font">Home</h2>
          <img class="nav-link-image" src="../img/homepage.jpg" />
        </a>
        <a class="nav-link" href="../docs/submit-event.html">
          <h2 class="nav-link-label rubik-font">Join Us</h2>
          <img class="nav-link-image" src="../img/join us.jpg" />
        </a>
        <a class="nav-link" href="../about.html">
          <h2 class="nav-link-label rubik-font">About Us</h2>
          <img class="nav-link-image" src="../img/about.jpg"/>
        </a>
      </div>
    </nav>

    <button id="nav-toggle" type="button" onclick="toggleNav()">
      <i class="open fa-light fa-bars-staggered"></i>
      <i class="close fa-light fa-xmark-large"></i>
    </button>
  </body>
</html>