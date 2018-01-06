  <section class="content-header">
      <h1>
        <?php echo $pageInfo['pageTitle'];?>
        <small><?php echo $pageInfo['pageSummery'];?></small>
      </h1>
      <ol class="breadcrumb">
        <li>
            <a href="<?php if($pageInfo['bread1_url'] != '') {echo $pageInfo['bread1_url'];} else {echo '#';}?>">
                <i class="fa fa-dashboard"></i> <?php echo $pageInfo['bread1'];?> 
            </a>
        </li>
        <li>
            <a href="<?php if($pageInfo['bread2_url'] != '') {echo $pageInfo['bread2_url'];} else {echo '#';}?>">
                <?php echo $pageInfo['bread2'];?>
            </a>
        </li>
        @if(!empty($pageInfo['bread3']))
        <li>
            <a href="<?php if($pageInfo['bread3_url'] != '') {echo $pageInfo['bread3_url'];} else {echo '#';}?>">
                <?php echo $pageInfo['bread3'];?>
            </a>
        </li>
        @endif
      </ol>
    </section>