<nav>
    <ul>

        <li>
            <a href="http://<?php echo APP_HOST; ?>/home">Inicio</a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="http://<?php echo APP_HOST; ?>/logout">Sair</a>
        </li>

    </ul>
</nav>

<aside>
    <a href="http://<?php echo APP_HOST; ?>/home">
        <span>Vital Hospitalar</span>
    </a>
    <div>
        <div>
            <div>
                <a href="#">Usuario: <?php echo $_SESSION['user']; ?></a>
            </div>
        </div>
        <nav>