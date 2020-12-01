<?php
include('../inc/config.php');

if(isset($_GET['winUpdater'])) {
    // Check if they're logged in and update their wins by 1
    if(isset($_SESSION['uid'])) {
        // Get wins
        $wins = $conn->prepare("select wins from users where id = :id");
        $wins->bindParam(":id",$_SESSION['uid']);
        $wins->execute();
        $winsNumberFetch = $wins->fetch(PDO::FETCH_ASSOC);
        $winsNumber = $winsNumberFetch['wins'];

        $newWins = $winsNumber+1;
        $addOne = $conn->prepare("update users set wins = :wins where id=:id");
        $addOne->bindParam(":wins",$newWins);
        $addOne->bindParam(":id",$_SESSION['uid']);
        $addOne->execute();
    }
}
?>