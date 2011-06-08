<dl class="nav3-grid">
    <?php
        foreach($allFields as $aFields)
        {
            echo "<dt>
                    <a href='".site_url('fields')."/view/$aFields->field_id'>
                        $aFields->name
                    </a>
                </dt>";
        }
    ?>
</dl>