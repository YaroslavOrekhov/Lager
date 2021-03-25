<?php
    include_once 'api/api_back.php';
?>

<main>
    <p>main content</p>
    <?php
        $data = get_data();
        
        echo $data;
    ?>
</main>