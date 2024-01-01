login();
include("_database.php");

function login()
{

    global $db;
    if (!isset($_POST)) {
        header("Location: ../login.php");
    }
    $userID = $_POST['userID'];
    $userID = $db->cleanData($userID);
    $sql = "SELECT * FROM users WHERE userID = '$userID'";
    $result = $db->query($sql);
    $row = mysqli_fetch_assoc($result);
    $db->close();
    $_SESSION['userID'] = $row['userID'];
    $_SESSION['naam'] = $row['naam'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['isAdmin'] = $row['isAdmin'];
    $_SESSION['adres'] = $row['adres'];
    $_SESSION['postcode'] = $row['postcode'];
    $_SESSION['telefoon'] = $row['telefoon'];
    $_SESSION['lessenGebruikt'] = $row['lessenGebruikt'];
    $_SESSION['isGeslaagd'] = $row['isGeslaagd'];
}
