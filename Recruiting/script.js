//window.onload = () {
//    return 0;
//    }

<?php
    $mysqli = new mysqli("levi.cis.indwes.edu/phpmyadmin", "iwurecruiting", "nicolespostmoves", "iwurecruiting");
?>

let recruitHomepageBtn = document.getElementById("recruitHomepageBtn");
recruitHomepageBtn.onclick = function recruitHomepageBtn() {
    window.location.href='recruit/recruitHome.html';
    return -1;
}

let gameHomepageBtn = document.getElementById("gameHomepageBtn");
gameHomepageBtn.onclick = function gameHomepageBtn () {
    window.location.href='game/gameHome.html';
    return -1;
}