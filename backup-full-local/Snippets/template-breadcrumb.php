<ol itemscope itemtype="http://schema.org/BreadcrumbList">
<?php
$i = 1;
$parents = $page->parents;
//$parentsCount = count($parents);
foreach($parents as $parent): ?>
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="<?php echo $parent->url; ?>" title="<?php echo $parent->title; ?>">
        <span itemprop="name"><?php echo $parent->title; ?></span></a>
        <meta itemprop="position" content="<?php echo $i++ ?>" />
    </li>
<?php endforeach; ?>
    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
    <a itemprop="item" href="<?php echo $page->url; ?>" title="<?php echo $page->title; ?>">
        <span itemprop="name"><?php echo $page->title; ?></span></a>
        <meta itemprop="position" content="<?php echo $i++ ?>" />
    </li>
</ol>