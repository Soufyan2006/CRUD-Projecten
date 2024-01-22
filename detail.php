<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio Website - Overzichtspagina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phpportfoliocrud";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if 'number' is set in the URL
    if (isset($_GET['number'])) {
        $id = $_GET['number'];
       
        // Voer de query uit om de details op te halen
        $sql = "SELECT * FROM projecten WHERE id =" . $id;
        $result = $conn->query($sql);

        // Controleer of er resultaten zijn
        if ($result->num_rows > 0) {
            // Haal de gegevens op van de eerste rij
            $row = $result->fetch_assoc();

            // Toon de details
            ?>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1 projects">
            <div id="project1" class="project card shadow-sm card-body m-2">
                <div class="card-text">
                    <h2><?php echo $row['titel'] . "<br>"; ?></h2>
                    <div><?php echo $row['desc_long']. "<br>"; ?></div>
                    <div><?php echo $row['type']. "<br>"; ?></div>
                    <?php echo $row['jaar']. "<br>"; ?>



                    <?php
        } else {
            echo "Geen resultaten ";
        }

        // Sluit de databaseverbinding
        $conn->close();
    } else {
        echo "Geen project-ID opgegeven.";
    }
    ?>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                        crossorigin="anonymous">
                    </script>
</body>

</html>