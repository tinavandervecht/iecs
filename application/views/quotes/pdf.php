<!DOCTYPE html>
<html>
<head>
    <title>Report Table</title>
    <style type="text/css">
        table { border-collapse: collapse; width:100%; }
        thead th { background:#000000; color:#ffffff; text-align: left; padding: 10px; }
        tbody td { border-top: 1px solid #000000; padding: 10px; }
        tbody tr:nth-child(even) { background: #F6F5FA; }
        .design-details thead th { background:#626262; }
        .design-details tbody td { width:50%; }
        .block { page-break-after: always; }
        .header .logo { float:left; width:25%; }
        .header .content { float:left; width:75%; text-align:center; line-height:12px; padding-top:10px; }
        .green-text { color: #56644C; }
        .text-center { text-align:center; width:100%; }
        .cc-logo { width: 300px; }
    </style>
</head>
<body>
    <?php include 'application/views/quotes/partials/pdf-header.php'; ?>
    <p>
        Minimum FOS <strong>>1.0</strong>
        <br />
        Optimum FOS <strong>>1.5</strong>
    </p>
    <div class="block">
        <table>
            <tbody>
                <tr>
                    <td>Project Name:</td>
                    <td><?php echo $blocks_math['project_information']['name']; ?></td>
                </tr>
                <tr>
                    <td>Projected Start Date For Project:</td>
                    <td><?php echo $blocks_math['project_information']['date']; ?></td>
                </tr>
                <tr>
                    <td>City & State/Province:</td>
                    <td><?php echo $blocks_math['project_information']['location']; ?></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><?php echo $blocks_math['project_information']['address']; ?></td>
                </tr>
                <tr>
                    <td>Engineer Name:</td>
                    <td><?php echo $blocks_math['project_information']['engineer']; ?></td>
                </tr>
                <tr>
                    <td>Comments:</td>
                    <td><?php echo $blocks_math['project_information']['comments']; ?></td>
                </tr>
            </tbody>
        </table>

        <p><u>Input Parameters:</u></p>
        <table>
            <tbody>
                <tr>
                    <td>Max Expected Flow:</td>
                    <td><?php echo $summaryInfo['estimate_expectedFlow']; ?></td>
                    <td>Bed Width:</td>
                    <td><?php echo $summaryInfo['estimate_bedWidth']; ?></td>
                </tr>
                <tr>
                    <td>Max Expected Velocity:</td>
                    <td><?php echo $summaryInfo['estimate_expectedVelocity']; ?></td>
                    <td>Type of Flow:</td>
                    <td><?php echo $summaryInfo['estimate_flowType_string']; ?></td>
                </tr>
                <tr>
                    <td>Bed Slope:</td>
                    <td><?php echo $summaryInfo['estimate_bedSlope']; ?></td>
                    <td>Alignment:</td>
                    <td><?php echo $summaryInfo['estimate_alignment_string']; ?></td>
                </tr>
                <tr>
                    <td>Side Slope:</td>
                    <td><?php echo $summaryInfo['estimate_sideSlope']; ?></td>
                    <td>Channel Length:</td>
                    <td><?php echo $summaryInfo['estimate_channelLength']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>


    <?php foreach($blocks as $key => $block):?>
        <div class="block">
            <?php include 'application/views/quotes/partials/pdf-header.php'; ?>

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
                    <tr>
                        <td>
                            <?php echo $block['product_name']; ?>
                            <br />
                            <small>(<?php echo $block['product_number']; ?> LB/SF)</small>
                        </td>
                        <td><?php echo $blocks_math[$block['product_name']]['o']['b']; ?></td>
                        <td><?php echo $blocks_math[$block['product_name']]['o']['s']; ?></td>
                        <td><?php echo $blocks_math[$block['product_name']]['s']['b']; ?></td>
                        <td><?php echo $blocks_math[$block['product_name']]['s']['s']; ?></td>
                    </tr>
                </tbody>
            </table>
            <table class="design-details">
                <thead>
                    <tr>
                        <th>Design Details</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="design-item">Block b: <?php echo $blocks_math[$block['product_name']]['product_b']; ?></div>
                        </td>
                        <td>
                            <div class="design-item">Manning's N: <?php echo $blocks_math[$block['product_name']]['manningsN']; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="design-item">Block bT: <?php echo $blocks_math[$block['product_name']]['product_bT']; ?></div>
                        </td>
                        <td>
                            <div class="design-item">Vertical Offset dz (mm): <?php echo $blocks_math[$block['product_name']]['verticalOffset']; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="design-item">Block hB: <?php echo $blocks_math[$block['product_name']]['product_hB']; ?></div>
                        </td>
                        <td>
                            <strong>Step 6 - Net Drag & Lift</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="design-item">Block Weight (N): <?php echo $blocks_math[$block['product_name']]['product_W']; ?></div>
                        </td>
                        <td>
                            <div class="design-item">Drag on Block [Bed] (N): <?php echo $blocks_math[$block['product_name']]['netBedDrag']; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="design-item">Submerged Block Weight (N): <?php echo $blocks_math[$block['product_name']]['product_Ws']; ?></div>
                        </td>
                        <td>
                            <div class="design-item">Drag on Block [Side] (N): <?php echo $blocks_math[$block['product_name']]['netSideDrag']; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="design-item">Bed Width (m): <?php echo $blocks_math[$block['product_name']]['bedWidth']; ?></div>
                        </td>
                        <td>
                            <div class="design-item">Lift on Block [Bed] (N): <?php echo $blocks_math[$block['product_name']]['netBedLift']; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="design-item">Flow Depth: <?php echo $blocks_math[$block['product_name']]['bedWidthDN']; ?></div>
                        </td>
                        <td>
                            <div class="design-item">Lift on Block [Side] (N): <?php echo $blocks_math[$block['product_name']]['netSideLift']; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="design-item">Bed Slope (Degree): <?php echo $blocks_math[$block['product_name']]['angleBedSlope']; ?></div>
                        </td>
                        <td>
                            <strong>Shear Stresses</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="design-item">Side Slope (Degree): <?php echo $blocks_math[$block['product_name']]['angleSideSlope']; ?></div>
                        </td>
                        <td>
                            <div class="design-item">Bed, straight: <?php echo $blocks_math[$block['product_name']]['bedStress']; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div class="design-item">Side: <?php echo $blocks_math[$block['product_name']]['sideStress']; ?></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php endforeach;?>
    <?php include 'application/views/quotes/partials/pdf-header.php'; ?>

    <h2>Disclaimer</h2>
    <p>
        THIS PROGRAM IS INTENDED AS A GUIDE TO THE DESIGN OF CABLE CONCRETE MATS. ALL FINAL DESIGNS SHOULD BE VERIFIED BY A LICENCED CIVIL ENGINEER.
    </p>
    <p>
        Version 2017.01, copyright 2013-2018 by IECS Group.
    </p>
    <p>
        THIS PROGRAM CALCULATES THE SEPARATE SAFETY FACTORS FOR FAILURE BY OVERTURNING AND SLIDING OF CONCRETE BLOCK REVETMENT SYSTEMS. THIS PROGRAM USES THE OVERTURNING EQUATION IN: "Articulating Concrete Block Revetment Design-Factor of Safety Method"--National Concrete Masonry Association TEK 11-12 and "Bridge Scour and Stream Instability Countermeasures"-- U.S. Department of Transportation, Hydraulic Engineering Circular No. 23 (HEC-23). IN ADDITION, THE PROGRAM COMPUTES THE FACTOR AGAINST FAILURE DUE TO SLIDING BASED ON THE THEORY OF DAMS IN: "Design of Small Dams", by U.S. Bureau of Reclamation" The equations in this program are calibrated using laboratory studies conducted at: University of Minnesota Colorado State University of Windsor to derive the forces and moments in the Factors of Safety. See CC-TM.
    </p>
</body>
</html>