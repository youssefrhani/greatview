<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="header">
    
      <h1>SRI</h1>
      <a href="userPage.php"> <button><b> Students  </b></button> </a>
      <a href="presentees.php"> <button><b> Presentees </b></button> </a>
      <a href="absentees.php"> <button><b> Absentees </b></button> </a>
      
      <a href="/greatview/logout.php"> <button class="logout-btn"> <b> Logout </b></button> </a> 
    </div>
  

   <table class="content-table"  >
        <thead>
          <tr>
            <th>N</th>
            <th>Full name</th>
            <th>Date of birth</th>
            <th>Ville</th>
            <th>Genre</th>
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
              $query = "SELECT * FROM students";

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
                      <td>'.$ligne_student[4].'</td>
                      <td>'.$ligne_student[5].'</td>
                    </tr>
                    ';
                }
              }
          
          
          
          ?>
        </tbody>
      </table>
    

  </body>
</html>
