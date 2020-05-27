<?php $title = htmlspecialchars($partner['name']); ?>

<?php ob_start(); ?>

<section>
        <div class="container-fluid">
            <div class="card mb-3">
                <div class="text-center">
                    <img src="<?= htmlspecialchars($partner['logo']) ?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <p><a href="index.php" class="btn btn-danger"><-- Retour à la liste des partenaire.</a></p>
                    <h2 class="card-title">
                        <?= htmlspecialchars($partner['name']) ?>
                    </h2>
                    <p class="card-text">
                        <?= nl2br(htmlspecialchars($partner['content']))?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="btn-toolbar justify-content-between" role="toolbar"
                        aria-label="Toolbar with button groups">
                        <div class="input-group">
                            <h3>X COMMENTAIRE</h3>
                        </div>
                        <div class="btn-group" role="group" aria-label="First group">
                            <button type="button" class="btn btn-primary mr-4">Nouveau commentaire</button>
                            <button type="button" class="btn btn-success mr-1">3 <i style="font-size:24px"
                                    class="fa">&#xf087;</i></button>
                            <button type="button" class="btn btn-danger">4 <i style="font-size:24px"
                                    class="fa">&#xf088;</i></button>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Prénom : Unny</h5>
                                <small>3 days ago</small>
                            </div>
                            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget
                                risus varius blandit.</p>
                            </div>
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Prénom : Mike</h5>
                                <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget
                                risus varius blandit.</p>

                        </div>
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Prénom : Bolbz</h5>
                                <small class="text-muted">3 days ago</small>
                            </div>
                            <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget
                                risus varius blandit.</p>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $content = ob_get_clean(); ?>
    <?php require ('template.php'); ?> 