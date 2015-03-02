<!--<div class='grid_4'>-->
<p>
    <strong><?php echo $header ?>: </strong>
    <?php
        if (strlen($header . $data) > 29)
        {
            echo substr($data, 0, 10) ;
        } else {
            echo $data;
        }
    ?>
</p>
<!--</div>-->