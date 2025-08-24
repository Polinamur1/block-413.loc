
<?php 
global $db;
$most_popular_posts = $db->query("SELECT * FROM posts WHERE rate >= 1 ORDER BY rate ASC LIMIT 5")->findAll();
?>
<div class="col-2">
    <h3>Hot posts</h3>
    <div class="list-group list-group-flush">
        <?php foreach ($most_popular_posts as $link): ?>
            <a href="posts?id=<?= $link['post_id'] ?>" class='list-group-item list-group-item-action'>
                <?= htmlspecialchars($link['title'], ENT_QUOTES, 'UTF-8') ?> 
                <span class="badge bg-secondary"><?= htmlspecialchars($link['rate'], ENT_QUOTES, 'UTF-8') ?></span>
            </a>
        <?php endforeach; ?>
    </div>
</div>