<?php 
if(!isset($_SESSION['user_id'])){
  session_start();
} else {
  header('Location: index.php');
  exit;
}
?>

<?php 
    $title = 'Acceuil';
    $style = "Home" ;
?>

<?php ob_start(); ?>

<section>
  <?php include_once'header.php';?>
</section>

<section>
    <div class="card">
      <div class="card-body">
        <h1 class="card-title title">GBAF</h1>
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
   </div>
   <div class="container text-center my-3">
    <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
        <div class="carousel-inner w-100" role="listbox">
            <div class="carousel-item row no-gutters active">
                <div class="col-3 float-left thumbnail"><img class="img-fluid w-50" alt="logo_Postal" src="public/images/banque/banquePostale.png"></div>
                <div class="col-3 float-left thumbnail"><img class="img-fluid w-50" alt="logo_BNP" src="public/images/banque/bnp.png"></div>
                <div class="col-3 float-left thumbnail"><img class="img-fluid w-50" alt="logo_BPCE" src="public/images/banque/bpce.png"></div>
                <div class="col-3 float-left thumbnail"><img class="img-fluid w-50" alt="logo_CIC" src="public/images/banque/cic.jpg"></div>

            </div>
            <div class="carousel-item row no-gutters">
            <div class="col-3 float-left thumbnail"><img class="img-fluid w-50" alt="logo_CA" src="public/images/banque/credit_agricole.jpg"></div>
                <div class="col-3 float-left thumbnail"><img class="img-fluid w-50" alt="logo_CM" src="public/images/banque/credit_mutuelle.png"></div>
                <div class="col-3 float-left thumbnail"><img class="img-fluid w-50" alt="logo_SG" src="public/images/banque/s_g.jpg"></div>
                <div class="col-3 float-left thumbnail"><img class="img-fluid w-50" alt="logo_BP" src="public/images/banque/banquePostale.png">
            </div>
        </div>
        <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
   </div>
</section>

  <!--section entreprises-->
  <section class="enterprise">
    <div class="card border-light mb-3">
      <div class="card-header ">
        <h2 class="title_S">Nos Partenaires</h2>
      </div>
      <div class="card-body">
        <p class="card-text">
          Afin de vous renseigner au mieux, GBAF vous propose une liste de partenaires qui 
          répertorie un grand nombre d'informations sur les produits et les services bancaires et financiers.
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
                  <img class="img_partner" src="<?= htmlspecialchars($data['logo']) ?>" alt=" <?= htmlspecialchars($data['name']) ?>">
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

  <section>
  <?php include_once'footer.php';?>
</section>
 
  <?php $content = ob_get_clean(); ?>

  <?php require('template.php'); ?>