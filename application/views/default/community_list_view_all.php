
<!-- Content unit - One column -->
<h1 class="block"><a href="<?=  site_url("/community_list/index/institution")?>">Institute communities</a></h1>
<div class="column1-unit">
    <table>
        <tr>
            <th class="top" scope="col" style="width:200px;">Name</th>
            <th class="top" scope="col">Short Description</th>
        </tr>
        <?php foreach($query1_result as $row): ?>
        <tr><th scope="row">
                <a href="<?=  site_url("/community/index/$row->community_id")?>">
                    <?php echo $row->name;?>
                </a>
            </th>
            <td><?php echo $row->short_description;?></td>
        </tr>
        <?php        endforeach; ?>
    </table>
</div>
<hr class="clear-contentunit" />



<!-- Content unit - One column -->
<h1 class="block"><a href="<?=  site_url("/community_list/index/field")?>">Field communities</a></h1>
<div class="column1-unit">
    <table>
        <tr>
            <th class="top" scope="col" style="width:200px;">Name</th>
            <th class="top" scope="col">Short Description</th>
        </tr>
        <?php foreach($query2_result as $row): ?>
        <tr><th scope="row">
                <a href="<?=  site_url("/community/index/$row->community_id")?>">
                    <?php echo $row->name;?>
                </a>
            </th>
            <td><?php echo $row->short_description;?></td>
        </tr>
        <?php        endforeach; ?>
    </table>
</div>
<hr class="clear-contentunit" />


<!-- Content unit - One column -->
<h1 class="block"><a href="<?=  site_url("/community_list/index/subject")?>">Subject communities</a></h1>
<div class="column1-unit">
    <table>
        <tr>
            <th class="top" scope="col" style="width:200px;">Name</th>
            <th class="top" scope="col">Short Description</th>
        </tr>
        <?php foreach($query3_result as $row): ?>
        <tr><th scope="row">
                <a href="<?=  site_url("/community/index/$row->community_id")?>">
                    <?php echo $row->name;?>
                </a>
            </th>
            <td><?php echo $row->short_description;?></td>
        </tr>
        <?php        endforeach; ?>
    </table>
</div>
<hr class="clear-contentunit" />


<!-- Content unit - One column -->
<h1 class="block"><a href="<?=  site_url("/community_list/index/course")?>">Course communities</a></h1>
<div class="column1-unit">
    <table>
        <tr>
            <th class="top" scope="col" style="width:200px;">Name</th>
            <th class="top" scope="col">Short Description</th>
        </tr>
        <?php foreach($query4_result as $row): ?>
        <tr><th scope="row">
                <a href="<?=  site_url("/community/index/$row->community_id")?>">
                    <?php echo $row->name;?>
                </a>
            </th>
            <td><?php echo $row->short_description;?></td>
        </tr>
        <?php        endforeach; ?>
    </table>
</div>
<hr class="clear-contentunit" />