<div class='grid_4'>
    <span class="boldText"><?php echo $header ?>: </span>
    <?php
        if (strlen($header . $data) > 29)
        {
            echo substr($data, 0, 10) . '...';
        } else {
            echo $data;
        }
    ?>
</div>