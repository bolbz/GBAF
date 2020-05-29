<?php 
    $title = 'Acceuil';
    $style = "Home" ;
?>

<?php ob_start(); ?>

<section>
    <div class="card">
      <div class="card-body">
        <h1 class="card-title">Gbaf</h1>
        <p class="card-text">Le Groupement Banque Assurance Français​ (GBAF) est une fédération
          représentant les 6 grands groupes français :
        </p>

        <ul>
            <li>BNP Paribas;</li>
            <li>BPCE;</li>
            <li>Crédit Agricole;</li>
            <li>Crédit Mutuel - CIC;</li>
            <li>Société Générale;</li>
            <li>La Banque Postale</li>
        </ul>

          <p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler
            de la même façon pour gérer près de 80 millions de comptes sur le territoire
            national.
            Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
            les axes de la réglementation financière française. Sa mission est de promouvoir
            l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
            pouvoirs publics.
          </p>
     </div>
      <img src="public/images/logo.png" class="card-img-top" alt="image_header">
   </div>
</section>

  <!--section entreprises-->
  <section class="enterprise">
    <div class="card border-light mb-3">
      <div class="card-header">
        <h2>Nos Partenaires</h2>
      </div>
      <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.
        </p>
      </div>
    </div>
    <div class="partners">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">

            <?php
            while ($data = $partners->fetch())
            {
              ?>
              <div class="partner-card row">
              <div class="col-md-5 img-padding-no">
                <div class="partner-logo">
                  <img src="<?= htmlspecialchars($data['logo']) ?>" alt=" <?= htmlspecialchars($data['name']) ?>">
                </div>
              </div>
              <div class="col-md-7">
                <div class="partner-description card-body">
                  <h3>
                  <?= htmlspecialchars($data['name']) ?>
                  </h3>
                  <p>
                  <?= htmlspecialchars($data['extract']) ?>
                  </p>
                  <div class="text-right">
                    <a href="index.php?action=partner&amp; id=<?= $data['id'] ?>" class="btn btn-outline-danger">Lire la suite</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
            }
            $partners->closeCursor();
            ?>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
    </div>
  </section>
 
  <?php $content = ob_get_clean(); ?>

  <?php require('template.php'); ?>