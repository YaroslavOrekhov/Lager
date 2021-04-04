<?php

?>

<header>
    <!-- <input type="checkbox" id="nav-trigger" class="nav-trigger" />
    <label for="nav-trigger"></label> -->

    <div style='display: inline-flex; flex-direction:colunm'>
        <div onclick='open_left_menu()' style='background-color: blue'>X</div>
        <div>Logo</div>
        <div>menu</div>
    </div>
</header>

<style>
.navigation {
 list-style: none;
 background: #111;
 width: 100%;
 height: 100%;
 position: fixed;
 top: 0;
 right: 0;
 bottom: 0;
 left: 0;
 z-index: -1;
}
</style>