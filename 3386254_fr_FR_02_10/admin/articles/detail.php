<?php
require_once '../../config/config.php';

use Classes\Article;

$article = Article::find_by_id($_GET['id']);

print_r($article);
require_once INCLUDES_ROOT.'/header.php';
?>





<?php
require_once INCLUDES_ROOT.'/footer.php';
?>