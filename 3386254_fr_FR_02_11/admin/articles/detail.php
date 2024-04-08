<?php
require_once '../../config/config.php';

use Classes\Article;

$article = Article::find_by_id($_GET['id']);

$title = 'page détail';
print_r($article);
require_once INCLUDES_ROOT.'/header.php';
?>

<ul class="list-group">
  <li class="list-group-item">ID : <?php echo $article->id; ?></li>
  <li class="list-group-item">Title : <?php echo $article->title; ?></li>
  <li class="list-group-item">Content : <?php echo $article->content; ?></li>
  <li class="list-group-item">Date : <?php echo $article->date; ?></li>
</ul>

<?php
require_once INCLUDES_ROOT.'/footer.php';
?>