<!DOCTYPE html>
<html>
    <head>
        <title>Todo App</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <!-- Buttons for the user to add tasks or new status' -->
        <br />
        <div class="container">
            <button onclick="window.location.href='newTask.php'">New Task</button>
            <button onclick="window.location.href='newStatus.php'">New Status</button>
        </div>
        <div class="container">
            <h1>Tasks:</h1>
            <?php
                $tasks = array();
                //Task Class
                class Task {
                    //Properties
                    public $heading;
                    public $content;
                    public $statusName;
                    //Constructor- Creating the object
                    function __construct($heading, $content, $statusName){
                        $this->heading = $heading;
                        $this->content = $content;
                        $this->statusName = $statusName;
                    }
                    //Methods
                }

                //Fetching the MySQL server credentials from the JSON file
                $credsJSON = file_get_contents("creds.json");
                $credsDecode = json_decode($credsJSON, true);
                $servername = $credsDecode["servername"];
                $username = $credsDecode["username"];
                $password = $credsDecode["password"];
                $dbname = $credsDecode["database"];

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT todoData.headingName, todoData.mainContent, statusData.statusName FROM todoData INNER JOIN statusData ON todoData.statusType = statusData.statusType";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        array_push($tasks, new Task($row["headingName"], $row["mainContent"], $row["statusName"]));
                    }
                } else {
                    echo 'helo';
                }
                $conn->close();

                foreach($tasks as &$task){
                    echo '<div class="alert alert-success" role="alert">';
                    echo '<h4 class="alert-heading">'.$task->heading.'</h4>';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    echo '<p>'.$task->content.'</p><hr>';
                    echo '<p class="mb-0">'.$task->statusName.'</p></div>';
                }

            ?>
        </div>
    </body>
</html>