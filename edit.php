<?php

use App\Models\Article;

@require __DIR__ . '/autoload.php';

$id = $_GET['id'] ?? null;

$oldArticle = Article::findById($id);

if(!isset($_GET['title']) || !isset($_GET['content'])) { ?>
<form action="<?=$_SERVER["PHP_SELF"]; ?>" method="get">
    <input type="text" name="title">
    <input type="text" name="content">
    <input type="hidden" name="id" value="<?=$id; ?>">
    <button type="submit">Update!</button>
</form>
<?php } else {
    $article = new Article();

    $article->title = $_GET['title'];
    $article->content = $_GET['content'];
    $article->id = $id;

    $article->save();

    header('Location: /index.php');
}


