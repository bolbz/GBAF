<header>
    <div class="container-fluid header">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 menu">
                <img class="rounded" src="public/images/logo.png" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 menu">
                <ul class="nav">
                    <li class="nav-item dropdown">
                        <a  class="nav-link dropdown-toggle" href=""  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION['user_name'] . ' ' . $_SESSION['user_lastname']; ?>
                        </a>                  
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="index.php?action=param&id=<?= $_SESSION['user_id']?>">paramètre du compte</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="index.php?action=logout"><i style='font-size:18px' class='fas'>&#xf2f6;</i> se déconnecter</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

