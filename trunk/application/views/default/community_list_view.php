<!-- Content unit - One column -->
<h1 class="block"><?php echo $type ?> communities</h1>
<div class="column1-unit">
    <table>
        <tr>
            <th class="top" scope="col" style="width:200px;">Name</th>
            <th class="top" scope="col">Short Description</th>
        </tr>
        <?php foreach($query_result as $row): ?>
        <tr><th scope="row"><?php echo $row->name;?></th><td><?php echo $row->short_description;?></td></tr>
        <?php        endforeach; ?>
    </table>
</div>
<hr class="clear-contentunit" />
