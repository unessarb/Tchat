<?php if(isset($errors) && count($errors)!=0): ?>

<div class='alert alert-danger'>
    <ul>
        <?php foreach($errors as $error) :?>
        <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
</div>

<?php endif; ?>