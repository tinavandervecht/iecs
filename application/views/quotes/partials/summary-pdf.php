<?php foreach($blocks as $key => $block):?>
    <tr>
        <td>
            <?php echo $block['product_name']; ?>
            <br />
            <small>(<?php echo $block['product_number']; ?> LB/SF)</small>
        </td>
        <td class="<?php echo $key . '-' . $block['product_name']; ?>-overturning-bed"></td>
        <td class="<?php echo $key . '-' . $block['product_name']; ?>-sliding-bed"></td>
        <td class="><?php echo $key . '-' . $block['product_name']; ?>-overturning-side"></td>
        <td class="><?php echo $key . '-' . $block['product_name']; ?>-sliding-side"></td>
    </tr>
<?php endforeach;?>