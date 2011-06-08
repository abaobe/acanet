
<!-- Content unit - One column -->
<h1 class="block"><a href="<?=  site_url("/community_list/index/institution")?>">Institute communities</a></h1>
<div class="column1-unit">
    <table>
        <tr>
            <th class="top" scope="col" style="width:200px;">Name</th>
            <th class="top" scope="col">Short Description</th>
            <th class="top" scope="col" style="width:130px;">Action</th>
        </tr>
        <?php foreach($query1_result as $row): ?>
        <tr><th scope="row">
                <a href="<?=  site_url("/community/index/$row->community_id")?>">
                    <?php echo $row->name;?>
                </a>
            </th>
            <td><?php echo $row->short_description;?></td>
            <td><a href="<?=  site_url("/institute/join/id_chosen/$row->community_id")?>">Join</a></td>
        </tr>
        <?php        endforeach; ?>
    </table>
    <a  href="<?=  site_url("/community_list/index/institution")?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  More ...</a>
</div>
<hr class="clear-contentunit" />



<!-- Content unit - One column -->
<h1 class="block"><a href="<?=  site_url("/community_list/index/field")?>">Field communities</a></h1>
<div class="column1-unit">
    <table>
        <tr>
            <th class="top" scope="col" style="width:200px;">Name</th>
            <th class="top" scope="col">Short Description</th>
            <th class="top" scope="col" style="width:130px;">Action</th>
        </tr>
        <?php foreach($query2_result as $row): ?>
        <tr><th scope="row">
                <a href="<?=  site_url("/community/index/$row->community_id")?>">
                    <?php echo $row->name;?>
                </a>
            </th>
            <td><?php echo $row->short_description;?></td>
            <td><a href="<?=  site_url("/fields/join/id_chosen/$row->community_id")?>">Join</a></td>
        </tr>
        <?php        endforeach; ?>
    </table>
    <a  href="<?=  site_url("/community_list/index/field")?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  More ...</a>
</div>
<hr class="clear-contentunit" />


<!-- Content unit - One column -->
<h1 class="block"><a href="<?=  site_url("/community_list/index/subject")?>">Subject communities</a></h1>
<div class="column1-unit">
    <table>
        <tr>
            <th class="top" scope="col" style="width:200px;">Name</th>
            <th class="top" scope="col">Short Description</th>
            <th class="top" scope="col" style="width:130px;">Action</th>
        </tr>
        <?php foreach($query3_result as $row): ?>
        <tr><th scope="row">
                <a href="<?=  site_url("/community/index/$row->community_id")?>">
                    <?php echo $row->name;?>
                </a>
            </th>
            <td><?php echo $row->short_description;?></td>
            <td><a href="javascript:void(0);">Join</a></td>
        </tr>
        <?php        endforeach; ?>
    </table>
    <a  href="<?=  site_url("/community_list/index/subject")?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  More ...</a>
</div>
<hr class="clear-contentunit" />


<!-- Content unit - One column -->
<h1 class="block"><a href="<?=  site_url("/community_list/index/course")?>">Course communities</a></h1>
<div class="column1-unit">
    <table>
        <tr>
            <th class="top" scope="col" style="width:200px;">Name</th>
            <th class="top" scope="col">Short Description</th>
            <th class="top" scope="col" style="width:130px;">Action</th>
        </tr>
        <?php foreach($query4_result as $row): ?>
        <tr><th scope="row">
                <a href="<?=  site_url("/community/index/$row->community_id")?>">
                    <?php echo $row->name;?>
                </a>
            </th>
            <td><?php echo $row->short_description;?></td>
            <td><a href="javascript:void(0);">Join</a></td>
        </tr>
        <?php        endforeach; ?>
    </table>
    <a  href="<?=  site_url("/community_list/index/course")?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  More ...</a>
</div>
<hr class="clear-contentunit" />