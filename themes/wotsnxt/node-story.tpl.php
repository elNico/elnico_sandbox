<?php
// $Id: node-story.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $story_type; ?> node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

<?php if ($page == 0): ?>
  <div class="content clear-block">
    <div class="story-intro">
      <div class="node-title">Title: <a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title; ?></a></div>
      <div class="node-published">Published: <?php print $published_date; ?></div>
      <div class="story-author">Author: <?php print $story_author; ?></div>
      <?php if($story_intro): ?>
      <div class="story-intro-copy">
        <?php print $story_intro ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php else: ?>
  <div class="content clear-block">
    <?php if($story_intro): ?>
    <div class="story-intro">
      <div class="node-title">Title: <?php print $title; ?></div>
      <div class="node-published">Published: <?php print $published_date; ?></div>
      <div class="story-author">Author: <?php print $story_author; ?></div>
      <div class="story-intro-copy">
        <?php print $story_intro ?>
      </div>
    </div>
    <?php endif; ?>
    <?php if(!empty($story_chapters)): ?>
    <?php foreach($story_chapters as $chapter): ?>
    <div class="story-chapter">
      <?php print $chapter ?>
      <div class="next-chapter-button">next chapter</div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <div class="clear-block">
    <div class="meta">
    <?php if ($taxonomy): ?>
      <div class="terms"><?php print $terms ?></div>
    <?php endif;?>
    </div>
    <?php if ($links): ?>
      <div class="links"><?php print $links; ?></div>
    <?php endif; ?>
  </div>
</div>
<?php endif; ?>