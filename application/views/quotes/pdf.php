<!DOCTYPE html>
<html>
<head>
    <title>Report Table</title>
    <style type="text/css">
        table { border-collapse: collapse; font-family: arial;}
        thead th { background:#000000; color:#ffffff; text-align: left; padding: 10px; }
        tbody td { border-top: 1px solid #000000; padding: 10px; }
        tbody tr:nth-child(even) { background: #F6F5FA; }
        .header { text-align:center; top:0; position: fixed; left: -1px; right: -1px; background-color: #4b8709; height: 50px; padding:10px; }
        .header img { width:350px; }
        .content { position:fixed;top:100px; left:-1px;right:-1px; }
    </style>
</head>
<body>
    <div class="header">
        <img src="<?php echo base_url('img/CC-whiteLogo.png');?>">
    </div>
    <div class="content">
        <p>
            Minimum FOS <strong>>1.0</strong>
            <br />
            Optimum FOS <strong>>1.5</strong>
        </p>

        <table>
            <thead>
                <tr>
                    <th>Product Type</th>
                    <th>Overturning Bed</th>
                    <th>Overturning Side</th>
                    <th>Sliding Bed</th>
                    <th>Sliding Side</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($blocks as $key => $block):?>
                    <tr>
                        <td>
                            <?php echo $block['product_name']; ?>
                            <br />
                            <small>(<?php echo $block['product_number']; ?> LB/SF)</small>
                        </td>
                        <td><?php echo $blocks_math[$key . '-' . $block['product_name']]['o']['b']; ?></td>
                        <td><?php echo $blocks_math[$key . '-' . $block['product_name']]['o']['s']; ?></td>
                        <td><?php echo $blocks_math[$key . '-' . $block['product_name']]['s']['b']; ?></td>
                        <td><?php echo $blocks_math[$key . '-' . $block['product_name']]['s']['s']; ?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>