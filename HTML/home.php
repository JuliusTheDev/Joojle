<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joojle</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .noticias-lista {
            list-style-type: none;
            padding: 0;
            margin: 0 auto;
            overflow: hidden;
        }
        .noticia {
            display: none;
        }
        .noticia img {
            width: 30%;
            height: auto;
            margin-left: 20%;
        }
        .noticias-filtradas {
            margin-top: 50px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".noticia").first().addClass("ativo").show();
            $(".categorias").change(function(){
                var categoria = $(this).val();
                $(".noticia").hide();
                $("." + categoria).show();  

               
                $(".noticias-lista-filtrada").empty();
                
            
                $(".noticia").each(function() {
                    if ($(this).hasClass(categoria) || categoria === "todas") {
                        $(".noticias-lista-filtrada").append($(this).clone());
                    }
                });
            });

            
            $("#botao-filtrar").click(function(){
                var categoria = $(".categorias").val();
                window.location.href = categoria + ".html";
            });

            setInterval(function(){
                var ativo = $(".noticia.ativo");
                var proximo = ativo.next().length ? ativo.next() : $(".noticia").first();
                ativo.removeClass("ativo").fadeOut();
                proximo.addClass("ativo").fadeIn();
            }, 6000);
        });
    </script>
</head>
<body>
    <header>
        <img src="logotipo.jpg" alt="Logotipo">
    </header>
    <main>
        <section class="noticias">
            <h2>Últimas Notícias</h2>
            <div class="categorias">
            <label for="categoria-select">Filtrar por categoria:</label>
<select id="categoria-select" onchange="redirecionar()">
    <option value="todas">Todas as categorias</option>
    <option value="tecnologia">Tecnologia</option>
    <option value="economia">Economia</option>
    <option value="atualidade">Atualidade</option>
    <option value="esporte">Esporte</option>
</select>

<script>
    function redirecionar() {
        var categoriaSelecionada = document.getElementById("categoria-select").value;
        if (categoriaSelecionada !== "todas") {
            window.location.href = categoriaSelecionada + ".html";
        }
    }
</script>

            </div>
            <button id="botao-filtrar";>Filtrar</button>
            <ul class="noticias-lista">
                <?php
                $noticias = array(
                    array(
                        "titulo" => "Brasil enfrenta novo surto de dengue",
                        "categoria" => "atualidade",
                        "descricao" => "País se prepara para o enfrentamento a dengue, visto que surge 1000 casos todos os dias.",
                        "imagem" => "imagem3.jpg",
                        "link" => "noticia1.html"
                    ),
                    array(
                        "titulo" => "Clima destrói safra de soja em Mato Grosso",
                        "categoria" => "atualidade",
                        "descricao" => "Clima árido é um desafio para os produtores de soja em MT.",
                        "imagem" => "imagem4.jpg",
                        "link" => "noticia2.html"
                    ),
                    array(
                        "titulo" => "Crescimento Moderado na Economia Brasileira em 2024",
                        "categoria" => "economia",
                        "descricao" => "País recebe os bônus dos feitos do ano anterior.",
                        "imagem" => "imagem5.jfif",
                        "link" => "noticia3.html"
                    ),
                    array(
                        "titulo" => "Desaceleração do Crescimento da Economia Mundial em 2024",
                        "categoria" => "economia",
                        "descricao" => "Economistas se preocupam com esse problema.",
                        "imagem" => "imagem6.jfif",
                        "link" => "noticia4.html"
                    ),
                    array(
                        "titulo" => "Palmeiras Empata com Lanterna do Paulistão e Cede a Liderança",
                        "categoria" => "esporte",
                        "descricao" => "Miramar ganha pontos.",
                        "imagem" => "imagem7.png",
                        "link" => "noticia5.html"
                    ),
                    array(
                        "titulo" => "Real Madrid Vence Al Ahly e Vai à Final do Mundial de Clubes",
                        "categoria" => "esporte",
                        "descricao" => "O jogo no Estádio Príncipe Moulay Abdellah, em Rabat, começou com o Real Madrid dominando as ações.",
                        "imagem" => "imagem8.png",
                        "link" => "noticia6.html"
                    ),
                    array(
                        "titulo" => "A Microsoft apresentou uma nova inteligência artificial que pode gerar textos realistas e criativos, imitando diferentes estilos de escrita",
                        "categoria" => "tecnologia",
                        "descricao" => "A Turing NLG é baseada em um modelo de linguagem de grande porte.",
                        "imagem" => "imagem9.jfif",
                        "link" => "noticia7.html"
                    ),
                    array(
                        "titulo" => "Carro Autônomo da Apple é Flagrado em Testes Pela Primeira Vez",
                        "categoria" => "tecnologia",
                        "descricao" => "A Apple está avançando em seu projeto de carro autônomo. A empresa está competindo com outras empresas como Tesla, Waymo e Cruise.",
                        "imagem" => "imagem10.jfif",
                        "link" => "noticia8.html"
                    )
                );

                foreach ($noticias as $noticia) {
                    echo '<li class="noticia ' . $noticia['categoria'] . '">';
                    echo '<a href="' . $noticia['link'] . '">';
                    echo '<img src="' . $noticia['imagem'] . '" alt="' . $noticia['titulo'] . '">';
                    echo '<h3>' . $noticia['titulo'] . '</h3>';
                    echo '<p>' . $noticia['descricao'] . '</p>';
                    echo '</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </section>
        <section class="noticias-filtradas">
            <h2>Notícias Filtradas</h2>
            <ul class="noticias-lista-filtrada">
                <!-- Notícias filtradas serão adicionadas aqui -->
            </ul>
        </section>
    </main>
    <footer>
        <p>Copyright &copy; 2024</p>
    </footer>
</body>
</html>
