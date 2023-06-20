<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style1.css">
  </head>
  <body>
    <div class="header">
    
      <h1>SRI</h1>
      <a href="rootPage.php"> <button><b> Students  </b></button> </a>
      <a href="presentees.php"> <button><b> Presentees </b></button> </a>
      <a href="absentees.php"> <button><b> Absentees </b></button> </a>
      
      <a href="/greatview/logout.php"> <button class="logout-btn"> <b> Logout </b></button> </a> 
    </div>
  



    <p class="datetime" id="datetime"></p>
    <script>
       setInterval(updateMessage, 1000);

function updateMessage() {
      // Get current time
      var now = new Date();

      // Display message on webpage
      
      var datetime = "Date: " + now.toLocaleDateString() + " " + now.toLocaleTimeString() + "<br>";
      document.getElementById("datetime").innerHTML = datetime;
      document.getElementById("message").innerHTML = message;

    }
    </script>

   <table class="content-table"  >
 
        <thead>
          <tr>
            <th>N</th>
            <th>Nom Complet</th>
            <th>Depuis</th>
          </tr>
        </thead>
        <tbody>
        <?php

            session_start();
            if (!isset($_SESSION['username'])) {
            header('Location: /greatview/index.php');
            exit();
            }

            $conn = mysqli_connect("localhost", "root", "", "login_db");
            $query = "SELECT * FROM absentees";

            $result_student = mysqli_query($conn, $query);
            if($conn)
            {  
                while ($ligne_student = mysqli_fetch_row($result_student)) 
                {
            echo '
                <tr>
                <td>'.$ligne_student[1].'</td>
                <td>'.$ligne_student[2].'</td>
                <td>'.$ligne_student[3].'</td>
                </tr>
                  ';
                }
            }



        ?>
</tbody>
</table>


</body>
</html>