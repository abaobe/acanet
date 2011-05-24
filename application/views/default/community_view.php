



<!-- Content unit - One column -->

<div id="post_detail">
    <h1 class="block">Posts</h1>

    <?php foreach ($post as $row): ?>
        <div class="column1-unit">
            <h1><?= $row->title ?></h1>
            <h3><?= $this->util->FormatMySqlDateTime($row->date_time) ?>, by <a href="#"><?= $row->publisher_name ?> </a></h3>
            <p><?= $row->description ?></p>
            <p class="details"><a href="#">Details</a> | Comments: <a href="#">73</a> </p>
        </div>
        <hr class="clear-contentunit" />
    <?php endforeach; ?>
    </div>


    <div id="news_detail">
        <h1 class="block">News</h1>
    <?php foreach ($news as $row): ?>
            <div class="column1-unit">
                <h1><?= $row->heading ?></h1>
                <p><?= $row->content ?></p>
                <h3><?= $this->util->FormatMySqlDateTime($row->date_time) ?>, by <?= $row->publisher_name ?></h3>
            </div>
            <hr class="clear-contentunit" />
    <?php endforeach; ?>
        </div>


        <div id="event_detail">
            <h1 class="block">Events</h1>
    <?php foreach ($news as $row): ?>
                <div class="column1-unit">
                    <h1><?= $row->heading ?></h1>
                    <p><?= $row->content ?></p>
                    <h3><?= $this->util->FormatMySqlDateTime($row->date_time) ?>, by <?= $row->publisher_name ?></h3>
                </div>
                <hr class="clear-contentunit" />
    <?php endforeach; ?>
            </div>

            <div id="content_detail">
                <h1 class="block">Contents</h1>
            </div>


            <div id="members_detail">
                <h1 class="block">Members</h1>
                <br/>
                <div class="column1-unit">
                    <table>
                        <tr>
                            <th class="top" scope="col" style="width:200px;">Usename</th><th class="top" scope="col" style="width:200px;">Full name</th>
                        </tr>
            <?php foreach ($members as $row): ?>
                    <tr><th scope="row"><?php echo $row->username; ?></th><th><?php echo $row->name; ?></th></tr>
            <?php endforeach; ?>
                </table>
            </div>

        </div>


        <div id="admins_detail">

            <h1 class="block">Administrators</h1>
            <br/>
            <div class="column1-unit">
                <table>
                    <tr>
                        <th class="top" scope="col" style="width:200px;">Usename</th><th class="top" scope="col" style="width:200px;">Full name</th>
                    </tr>
            <?php foreach ($admins as $row): ?>
                        <tr><th scope="row"><?php echo $row->username; ?></th><th><?php echo $row->name; ?></th></tr>
            <?php endforeach; ?>
                    </table>
                </div>

            </div>


            <div id="about_detail">
                <h1 class="block">About this community</h1>
                <div class="column1-unit">
                    <br/>
                    <p> <?php echo $communityInfo->short_description; ?> </p>
    </div>

</div>