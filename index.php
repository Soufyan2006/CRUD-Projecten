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

// $sql = "SELECT * FROM projecten";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $titel = $row['titel'];
//         echo $row['desc_short'];
//     }
// }


// $sql = "INSERT INTO projecten (titel, desc_short);
// VALUES ('$titel', '$desc_short')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }


?>



    <main>
        <div class="container">
            <div class="d-flex justify-content-center align-items-center m-4">
                <nav aria-label="search and filter">
                    <?php
        $queryCondition = " WHERE ";
        $conditions = array();

        if (!empty($conditions)) {
            $queryCondition .= implode(" AND ", $conditions);
            $stmt = $conn->prepare("SELECT * FROM projecten" . $queryCondition);
            if ($stmt) {
                // Bind parameters
                if (!empty($params)) {
                    $types = str_repeat('s', count($params));
                    $stmt->bind_param($types, ...$params);
                }
                // Execute the query
                $stmt->execute();
                $result = $stmt->get_result();
        
                // Rest of your code...
                
                // Close the statement
                $stmt->close();
            } else {
                die("Error in preparing the SQL statement: " . $conn->error);
            }
        }
        

        if (!empty($conditions)) {
            $queryCondition .= implode(" AND ", $conditions);
        }

        $sql = "SELECT * FROM projecten" . $queryCondition;
        ?>
                    <form action="detail.php" method="get">
                        <input type="search" class="form-control ds-input" id="" name="number" placeholder="Search..."
                            aria-label="Search for..." autocomplete="off" spellcheck="false" role="combobox"
                            aria-autocomplete="list" aria-expanded="false" aria-owns="algolia-autocomplete-listbox-0"
                            dir="auto" style="position: relative; vertical-align: top;">
                        <button type="submit">Search</button>
                    </form>
                </nav>
                <?php $conditions[] = " titel LIKE '%" . "" . "%' OR desc_long LIKE '%" . " " . "%'";  ?>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                    crossorigin="anonymous">
                </script>
</body>
</div>
<div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1 projects">
    <div id="project1" class="project card shadow-sm card-body m-2">
        <div class="card-text">
            <h2> <?php
                        $sql = "SELECT titel, desc_short FROM projecten";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 1) {
                            // Haal de eerste rij op
                            $row = $result->fetch_assoc();
                            // Haal de gewenste kolommen op
                            $titel = $row['titel'];
                            // Toon de waarden
                            echo   $titel . "<br>";
                            
                        } else {
                            echo "Geen resultaten gevonden";
                        }
                        
                       
                         ?> </h2>
            <div>
                <?php 
                        $desc_short = $row['desc_short'];
                        echo $desc_short . "<br>";
                        ?>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    <a href="detail.php?number=1" number=> View </a>
                </button>
                <button type=" button" class="btn btn-sm btn-outline-secondary">
                    Edit
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <div id="project1" class="project card shadow-sm card-body m-2">
        <div class="card-text">
            <h2> <?php
                            if ($result->num_rows > 2) {
                            // Haal de eerste rij op
                            $row = $result->fetch_assoc();
                            // Haal de gewenste kolommen op
                            $titel = $row['titel'];
                            // Toon de waarden
                            echo $titel . "<br>";

                            } else {
                            echo "Geen resultaten gevonden";
                            }
                            ?>
            </h2>
            <div> <?php 
                        $desc_short = $row['desc_short'];
                        echo $desc_short . "<br>";
                        ?></div>
        </div>
        <div class=" d-flex justify-content-between align-items-center mt-3">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    <a href="detail.php?number=2" number=> View </a>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Edit
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <div id="project1" class="project card shadow-sm card-body m-2">
        <div class="card-text">
            <h2><?php
                            if ($result->num_rows > 3) {
                            // Haal de eerste rij op
                            $row = $result->fetch_assoc();
                            // Haal de gewenste kolommen op
                            $titel = $row['titel'];
                            // Toon de waarden
                            echo $titel . "<br>";

                            } else {
                            echo "Geen resultaten gevonden";
                            }
                            ?></h2>
            <div><?php
                            $desc_short = $row['desc_short'];
                            echo $desc_short . "<br>";
                            ?></div>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    <a href="detail.php?number=3" number=> View </a>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Edit
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <div id="project1" class="project card shadow-sm card-body m-2">
        <div class="card-text">
            <h2><?php
                            if ($result->num_rows > 4) {
                            // Haal de eerste rij op
                            $row = $result->fetch_assoc();
                            // Haal de gewenste kolommen op
                            $titel = $row['titel'];
                            // Toon de waarden
                            echo $titel . "<br>";

                            } else {
                            echo "Geen resultaten gevonden";
                            }
                            ?></h2>
            <div><?php
                            $desc_short = $row['desc_short'];
                            echo $desc_short . "<br>";
                            ?></div>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    <a href="detail.php?number=4" number=> View </a>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Edit
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <div id="project1" class="project card shadow-sm card-body m-2">
        <div class="card-text">
            <h2><?php
                            if ($result->num_rows > 5) {
                            // Haal de eerste rij op
                            $row = $result->fetch_assoc();
                            // Haal de gewenste kolommen op
                            $titel = $row['titel'];
                            // Toon de waarden
                            echo $titel . "<br>";

                            } else {
                            echo "Geen resultaten gevonden";
                            }
                            ?></h2>
            <div><?php
                            $desc_short = $row['desc_short'];
                            echo $desc_short . "<br>";
                            ?></div>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    <a href="detail.php?number=5" number=> View </a>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Edit
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>
<div id="project1" class="project card shadow-sm card-body m-2">
    <div class="card-text">
        <h2><?php
                            if ($result->num_rows > 5) {
                            // Haal de eerste rij op
                            $row = $result->fetch_assoc();
                            // Haal de gewenste kolommen op
                            $titel = $row['titel'];
                            // Toon de waarden
                            echo $titel . "<br>";

                            } else {
                            echo "Geen resultaten gevonden";
                            }
                            ?></h2>
        <div><?php
                            $desc_short = $row['desc_short'];
                            echo $desc_short . "<br>";
                            ?></div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    <a href="detail.php?number=6" number=> View </a>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Edit
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center m-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>

        </ul>
    </nav>
</div>

</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>

</html>