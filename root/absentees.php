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
            <th>Permission</th>
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

            if (isset($_POST['delete']) && isset($_POST['id'])) {
                $id = $_POST['id'];

                $query = "DELETE FROM absentees WHERE ID = $id";
                mysqli_query($conn, $query);
            }

            $query = "SELECT * FROM absentees";
            $result_student = mysqli_query($conn, $query);

            if ($conn) {
                while ($ligne_student = mysqli_fetch_assoc($result_student)) {
                    echo '<tr>';
                    echo '<td>' . $ligne_student['N'] . '</td>';
                    echo '<td>' . $ligne_student['Nom Complet'] . '</td>';
                    echo '<td>' . $ligne_student['Depuis'] . '</td>';
                    echo '<td class="delete-cell">
                            <form method="POST" onsubmit="return confirmDelete()">
                                <input type="hidden" name="id" value="' . $ligne_student['ID'] . '">
                                <button type="submit" name="delete" class="delete-button">Permis</button>
                            </form>
                          </td>';
                    echo '</tr>';
                    echo '<script>
                        function confirmDelete() {
                            return confirm("êtes-vous sûr de vouloir autoriser cet étudiant ??");
                        }
                         </script>';
                }
            }

            mysqli_close($conn);
            ?>

        </tbody>
      </table>
    

  </body>
</html>
