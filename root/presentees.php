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
    <p class="message" id="message"></p>

    <script>
       setInterval(updateMessage, 1000);

function updateMessage() {
      // Get current time
      var now = new Date();

      // Check if time is between 8:30 and 10:25
      var startTime1 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 8, 30, 0);
      var endTime1 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 10, 25, 0);

      // Check if time is between 10:30 and 12:30
      var startTime2 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 10, 30, 0);
      var endTime2 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 12, 30, 0);

      // Check if time is between 14:30 and 16:30
      var startTime3 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 14, 30, 0);
      var endTime3 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 16, 30, 0);

      if (now.getTime() >= startTime1.getTime() && now.getTime() <= endTime1.getTime()) {
        var message = "Classe de (8:30-10:25)";
      } else if (now.getTime() >= startTime2.getTime() && now.getTime() <= endTime2.getTime()) {
        var message = "Classe de (10:30-12:30)";
      } else if (now.getTime() >= startTime3.getTime() && now.getTime() <= endTime3.getTime()) {
        var message = "Classe de (14:30-16:30)";
      } else {
        var message = "Hors de classe";
      }

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
            <th>Full name</th>
            <th>l'heure d'entrer</th>
          </tr>
        </thead>
        <tbody>
          <?php

              session_start();
              if (!isset($_SESSION['username'])) {
              header('Location: /phplogin/index.php');
              exit();
              }
              
              $conn = mysqli_connect("localhost", "root", "", "login_db");
              $query = "SELECT * FROM presents";

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
