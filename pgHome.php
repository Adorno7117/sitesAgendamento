<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" type="image/png" href="img/plantaIcon.png">
</head>
<body>
    <div class="nav-bar" style="height: 70px; background-color: rgba(0,0,0,0.5);">
        <div class="nav-logo">Décio Simoso</div>
        <div class="nav-links-container" id="antes">
            <a class="nav-link" href="pgHome.php" id="topLink">Home</a>
            <a class="nav-link" href="pgAgendamento.php" id="aboutLink">Agenda</a>
            <?php
            include('config.php');

            
            if (isset($_SESSION['nome'])) {
                echo '<span class="nav-link">Olá, ' . $_SESSION['nome'] . '</span>';
                echo '<a class="nav-link" href="logout.php" id="logoutLink">Sair</a>';
                if ($_SESSION['idCliente'] == 999) {
                    echo '<a class="nav-link" href="pgLista.php" id="aboutLink">Lista</a>';
                }
            } else {
                echo '<a class="nav-link" href="pgLogin.php" id="aboutLink">Login</a>';
                echo '<a class="nav-link" href="Cadastro.php" id="teamLink">Cadastro</a>';
            }
            ?>
        </div>
    </div>

    <div class="rela-block top-section grad-back" id="topSection">
        <div class="abs-cent-text top-text" style="background-color: rgba(0, 0, 0, 0.5); border-radius:20px;">
            <p class="top-small-text">Seja Bem vindo</p>
            <h1 class="big-text"> Décio Colheitas</h1>
        </div>
    </div>
    <div class="animat">
        <div class="rela-block under-top-section"><br><br><br><br><br><br><br>
        <div class="orbitron abs-cent-text">\\\///</div>
        <a href=""><button class="custom-btn btn-3 abs-cent-text"><span>Agende Agora!</span></button></a>
        <div class="half-big-text abs-cent-text">Precisa de Nossos Serviços?</div>
        <br><br><br><br>
        </div>
        <div class="rela-block about-us-section" id="aboutSection">
        <h1 class="half-big-text has-border">Sobre nós</h2>
        <p>Somos uma microempresa especializada em colheitas de milho e soja, atendendo fazendas nas 
            regiões de Mogi Mirim e arredores. Nossa paixão pela agricultura e nosso compromisso com a 
            qualidade nos impulsionam a oferecer os melhores serviços aos nossos clientes.</p><p> Com uma equipe dedicada e experiente, 
            garantimos colheitas eficientes e de alta qualidade, 
            contribuindo para o sucesso de cada propriedade agrícola que atendemos.</p>
        <br>
        <div class="orbitron black-orb">\\\///</div>
        </div>
        <br><br>
        <div class="rela-block about-us-quad-container">
            <div class="half-big-text">Tabela</div>
            <div class="rela-block quad-row" style="margin-left: 15%;">
                <div class="quad-half floated left">
                    <h2 class="small-header">Maquina Grande</h2>
                    <p>Para grãos de milho</p>
                </div>
                <div class="quad-half floated left">
                    <h2 class="small-header">R$ 00,00</h2>
                    <p>Por hora rodada</p>
                </div>
            </div>
            <div class="rela-block quad-row" style="margin-left: 15%;">
                <div class="quad-half floated left">
                    <h2 class="small-header">Maquina Pequena</h2>
                    <p>Para sojas e afins</p>
                </div>
                <div class="quad-half floated left">
                    <h2 class="small-header">R$ 00,00</h2>
                    <p>Por hora rodada</p>
                </div>
            </div>
        </div>
    </div>
    <div class="rela-block portfolio-collage">
    <div class="floated left collage-column">
        <div class="floated left collage-image third one">
            
        </div>
        <div class="floated left collage-image third two"></div>
        <div class="floated left collage-image third three"></div>
    </div>
    <div class="floated left collage-column">
        <div class="floated left collage-image third four"></div>
        <div class="floated left collage-image two-thirds five"></div>
    </div>
    <div class="floated left collage-column">
        <div class="floated left collage-image two-thirds six">

        </div>
        <div class="floated left collage-image third seven"></div>
    </div>
    </div>
    
    <div class="rela-block portfolio-bottom" style="color: white;">
    <div class="floated left quarter-div">
        <div class="abs-cent-text">
            <h1 class="big-text">+200</h1>
            <p>Clientes Satisfeitos</p>
        </div>
    </div>
    <div class="floated left quarter-div">
        <div class="abs-cent-text">
            <h1 class="big-text">+45</h1>
            <p>Anos de Ação</p>
        </div>
    </div>
    <div class="floated left quarter-div">
        <div class="abs-cent-text">
            <h1 class="big-text">100K</h1>
            <p>De KMs Colhidos</p>
        </div>
    </div>
    <div class="floated left quarter-div">
        <div class="abs-cent-text">
            <h1 class="big-text">TOP</h1>
            <p>Região</p>
        </div>
    </div>
</div>
</div>
    <div class="rela-block about-us-section" id="aboutSection">
    <h1 class="half-big-text has-border">Contato</h2>
    <p>Estamos aqui para ajudar você com todas as suas necessidades relacionadas à colheita. <br>Se você tiver dúvidas, solicitações de serviço ou 
        simplesmente quiser saber mais sobre nossos serviços, não hesite em nos contatar.</p>
    <div class="rela-block quad-row" style="margin-left: 20%;">
            <div class="quad-half floated left">
                <h2 class="small-header">Whatsapp</h2>
            </div>
            <div class="quad-half floated left">
                <h2 class="small-header">+55 (19)99723-7601</h2>
                <p>Duvidas Ligar ao mesmo numero!</p>
            </div>
            </div>
            <div class="rela-block quad-row"  style="margin-left: 20%;">
                <div class="quad-half floated left">
                    <h2 class="small-header"></h2>
                </div>
                <div class="quad-half floated left">
                    <h2 class="small-header"></h2>
                    
                </div>
    </div>
    <div class="orbitron black-orb">\\\///</div><br>
    </div>
    <div class="rela-block footer-section" style="margin: 0px;">
    <h2 class="small-header top-link">Voltar ao Topo</h2><br>
    <p>Obrigado por escolher os nossos serviços de colheitadeiras. É uma honra fazer parte da sua jornada agrícola. <br>
    Estamos aqui para ajudar no que for preciso. Obrigado!</p>
</div>
    <script src="home.js"></script>
</body>
</html>
