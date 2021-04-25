<?php if (!empty($errors) || session('error')) : ?>
    <div class="alert alert-danger flash-message" role="alert">
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
    <div name="flash_message" class="alert alert-success flash-message" role="alert">
        <ul>
            <a><?= session()->getFlashdata('success') ?></a>
        </ul>
    </div>

<?php endif ?>


<script type="text/javascript">
    setTimeout(function() {
        $('div.flash-message').fadeOut('fast');
    }, 3000);
</script>
