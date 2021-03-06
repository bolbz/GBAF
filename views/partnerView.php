<?php session_start(); ?>


<?php $title = htmlspecialchars($partner['name']); ?>
<?php $style = 'Home'; ?>
<?php $username = $_SESSION['user_username']?>
<?php ob_start(); ?>

<section>
  <?php include_once'header.php';?>
</section>

<section>
        <div class="container partner">
            <div class="card mb-3">
                <div class="text-center">
                    <img src="<?= htmlspecialchars($partner['logo']) ?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <p><a href="index.php?action=listPartners" class="btn btn-outline-danger"><-- Retour à la liste des partenaire.</a></p>
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

    <section> <!-- Section Commentaire -->
        <div class="container comments">
            <div class="card">
                <div class="card-header">
                    <div class="btn-toolbar justify-content-between" role="toolbar"
                        aria-label="Toolbar with button groups">
                        <div class="input-group">
                            <h5><?=count($getComments) ?> COMMENTAIRES</h5>
                        </div>
                        <div class="btn-group" role="group" aria-label="First group">
                            <button type="button" class="btn btn-primary mr-4" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nouveau commentaire</button>

                            <form method="post" action="index.php?action=like">
                                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']?>">
                                <input type="hidden" name="partner_id" value="<?= htmlspecialchars($partner['id'])?>">
                                <input type="hidden" name="value" value="1">
                                <button type="submit" class="btn btn-success mr-1"><?= htmlspecialchars($partner['like_count'])?> <i class="far fa-thumbs-up"></i></button>
                            </form>

                            <form method="post" action="index.php?action=dislike">
                                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']?>">
                                <input type="hidden" name="partner_id" value="<?= htmlspecialchars($partner['id'])?>">
                                <input type="hidden" name="value" value="-1">
                                <button type="submit" class="btn btn-danger"><?= htmlspecialchars($partner['dislike_count'])?> <i class="far fa-thumbs-down"></i></button>
                            </form>
                        </div>

                        <!-- Modal new Comment -->

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nouveau commentaire</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="index.php?action=postComment">
                                        <div class="form-group">
                                            <label for="author" class="col-form-label">Nom d'utilisateur : </label>
                                            <input type="text" class="form-control" name="author" id="author" value="<?= $username ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="comment" class="col-form-label">Message:</label>
                                            <textarea class="form-control" name="comment" id="comment" required></textarea>
                                        </div>
                                        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']?>">
                                        <input type="hidden" name="partner_id" value="<?= htmlspecialchars($partner['id'])?>">
                                        <input  type="submit" class="btn btn-primary" value="Envoyer message"></input>
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fermer</button>
                                </div>
                                </div>
                            </div>
                        </div>

                        <!-- end modal -->

                    </div>
                </div>
                <div class="card-body">

                    <?php
                        if(isset($_SESSION["error"])){
                            $error = $_SESSION["error"];
                            echo '<div class="alert alert-danger">';
                            echo "<strong>$error</strong>";
                            echo "</div>";
                        }
                    ?>
                    
                    <?php 
                        if(isset($_SESSION['success'])){
                            $success= $_SESSION['success'];
                            echo '<div class="alert alert-success">';
                             echo "<strong>$success</strong>";
                             echo  "</div>";
                        }
                    ?>

                    <?php
                    foreach($getComments as $value ) 
                    {
                    ?>
                    <div class="list-group">
                        <div class="list-group-item list-group-item-action mb-2">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><strong>Prénom : </strong><?= htmlspecialchars($value['author']) ?></h5>
                                <small><strong><?= $value['comment_date'] ?></strong></small>
                            </div>
                            <p class="mb-1"><?= nl2br(htmlspecialchars($value['comment'])) ?></p>
                            </div>
                    </div>
                    <?php
                     }
                     ?>
                </div>
            </div>
        </div>
    </section>
    
        <?php include_once 'footer.php'?>
   

    
    <?php
    unset($_SESSION["error"]);
    ?>
    
    <?php
    unset($_SESSION["success"]);
    ?>

    <?php $content = ob_get_clean(); ?>
    <?php require ('template.php'); ?> 