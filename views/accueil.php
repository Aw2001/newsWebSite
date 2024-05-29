
<?php
  require_once('index.php')
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <title>Actualités</title>
</head>
<body>
  <main>
    <?php require_once 'menu.php'; ?>
     <div class="news-container">
        <?php if(isset($articles) && is_array($articles)): ?>
          <?php foreach ($articles as $article): ?>
            <div class="news-item">
                <h2><?php echo $article->getTitre(); ?></h2>
                <p><?php echo $article->getContenu(); ?></p>
            </div>
          <?php endforeach; ?>
        <?php endif;?>
     </div>
  </main>
</body>
</html>
