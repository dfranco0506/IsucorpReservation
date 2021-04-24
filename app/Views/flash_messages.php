<?php if (!empty($errors) || session('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php if (!empty($errors)) : ?>
                <?php foreach ($errors as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            <?php else: ?>
                <li><?= session()->getFlashdata("error")?></li>
            <?php endif ?>
        </ul>
    </div>
<?php elseif (session()->has('success')): ?>
    <div class="alert alert-success" role="alert">
        <ul>
            <a><?= session()->getFlashdata('success') ?></a>
        </ul>
    </div>

<?php endif ?>