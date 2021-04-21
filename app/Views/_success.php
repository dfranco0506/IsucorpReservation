<?php if (!empty($errors)) : ?>
    <div class="alert alert-success" role="alert">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>