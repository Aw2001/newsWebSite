<header>
        <h2>ACTUALITÉS POLYTECHNICIENNES</h2>
        <nav>
            <ul>
                <li><a href="index.php">Actualités</a></li>
                <?php if (isset($categories)): ?>
                    <?php foreach ($categories as $categorie) : ?>
                        <li><a href="index.php?action=categorie&id=<?= $categorie->getId()?>"><?= $categorie->getLibelle() ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>
        </ul>
        </nav>
</header>
