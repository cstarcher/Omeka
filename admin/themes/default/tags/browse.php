<?php
$pageTitle = __('Browse Tags ('. total_tags() .' total)');
head(array('title'=>$pageTitle, 'content_class' => 'horizontal-nav','bodyclass'=>'tags browse-tags primary')); ?>
<?php echo flash(); ?>
<?php if ( total_tags() ): ?>

    <div class="two columns alpha">
        <h3><?php echo __('Edit/Delete Tags'); ?></h3>
    </div>
    
    <div class="eight columns omega">
        <p id="tags-nav">
            <?php
            $sortOptions = array(
                __('Most') => array('sort_field' => 'count', 'sort_dir' => 'd'),
                __('Least') => array('sort_field' => 'count','sort_dir' => 'a'),
                __('Alphabetical') => array('sort_field' => 'name', 'sort_dir'=> 'a'),
                __('Recent') => array('sort_field' => 'time', 'sort_dir' => 'd')
            );
    
            foreach ($sortOptions as $label => $params) {
                $uri = html_escape(current_uri($params));
                $class = ($sort == $params) ? ' class="current"' : '';
    
                echo "<span $class><a href=\"$uri\">$label</a></span>";
            }
            ?>
        </p>
        <?php echo tag_cloud($tags, ($browse_for == 'Item') ? uri('items/browse/'): uri('exhibits/browse/'), 9, true, 'before'); ?>
        <div class="hTagcloud">
            <ul>
                <li><a href="/admin/items/browse/?tags=united+states"><span class="count">1</span>united states</a><span class="close"><a href="#">close</a></span></li>
            </ul>
        </div>
    </div>
<?php else: ?>
        <p><?php echo __('There are no tags to display. You must first tag some items.'); ?></p>
    </div>
<?php endif; ?>

</div>
<?php foot(); ?>