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
            <ul>
                <li>
                    <a>

                        <p>
                            Painel Administrativo

                        </p>
                    </a>
                    <ul>
                        <li>
                            <a href="https://<?php echo APP_HOST; ?>/User/index">

                                <p>Cadastro de Usuario</p>
                            </a>
                        </li>
                        <li>
                            <a href="http://<?php echo APP_HOST; ?>/permission/index">

                                <p>Cadastro de Permissões</p>
                            </a>
                        </li>
                        <li>
                            <a href="http://<?php echo APP_HOST; ?>/factory/index">

                                <p>Cadastro de Fornecedores</p>
                            </a>
                        </li>
                        <li>
                            <a href="http://<?php echo APP_HOST; ?>/und/index">

                                <p>Unidade de Medida</p>
                            </a>
                        </li>
                        <li>
                            <a href="http://<?php echo APP_HOST; ?>/agent/index">

                                <p>Cadastro de Vendedores</p>
                            </a>
                        </li>
                        <li>
                            <a href="http://<?php echo APP_HOST; ?>/client/index">

                                <p>Cadastro de Clientes</p>
                            </a>
                        </li>
                        <li>
                            <a href="http://<?php echo APP_HOST; ?>/product/index">

                                <p>Cadastro de Produtos</p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#">

                        <p>
                            Licitação

                        </p>
                    </a>
                    <ul>
                        <a href="http://<?php echo APP_HOST; ?>/costAta/index">

                            <p> Custo de atas</p>
                        </a>
                    </ul>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#">

                        <p>
                            Comercial

                        </p>
                    </a>
                    <ul>

                    </ul>
                </li>
            </ul>


        </nav>

    </div>


</aside>
<hr>