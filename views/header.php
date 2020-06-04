<header>
    <div class="container-fluid header">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 menu">
                <img class="rounded" src="public/images/logo.png" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 menu dropdown">
                <ul class="nav">
                    <li class="nav-item">
                        <a  class="nav-link dropdown-toggle" href=""  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['user_name'] . ' ' . $_SESSION['user_lastname']; ?>
                        </a>
                    </li>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">paramètre du compte</a>
                    </div>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 menu">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="index.php?action=logout">se déconnecter</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<style>
    @media (max-width: 768px) {
    .menu {
        display: flex;
        justify-content: center;
    }
     .rounded{
        width: 600px;
        height: 100px;
    }
    }

    .rounded{
        width: 50px;
        height: 50px;
    }
</style>