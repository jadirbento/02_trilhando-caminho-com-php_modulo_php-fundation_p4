CREATE DATABASE IF NOT EXISTS php_fundation_cms;
USE php_fundation_cms;

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    email VARCHAR(255),
    login VARCHAR(50),
    senha VARCHAR(50),
  PRIMARY KEY (id)
);

INSERT INTO usuarios  (id, nome, email, login, senha)  VALUES (NULL, 'Admin', 'admin@teste.com', 'admin', MD5('admin'));




DELIMITER $$

DROP FUNCTION IF EXISTS func_valida_usuario $$

CREATE FUNCTION func_valida_usuario (
    p_login VARCHAR(50)
  , p_senha VARCHAR(50)
) RETURNS INT(1)
  BEGIN
    DECLARE retorno INT(1) DEFAULT 0;
    SET retorno = IFNULL((
                           SELECT DISTINCT id FROM usuarios
                           WHERE login = p_login
                                 AND senha = MD5(p_senha)),0);
    RETURN retorno;
  END $$
DELIMITER ;


#teste
select func_valida_usuario('admin','admin') as Validou





CREATE TABLE paginas (
  id INT NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(255),
  slug VARCHAR(255),
  texto TEXT,
  criado DATETIME,
  modificado DATETIME,
  PRIMARY KEY (id)
);









############################################################# PAGINAS ###########################;


INSERT INTO paginas(titulo, slug, texto, criado) VALUES
('DECORA&Ccedil;&Atilde;O CORPORATIVA', 'home', '
<p>Mussum Ipsum, cacilds vidis litro abertis. Manduma pindureta quium dia nois paga. in elementis m&eacute;
        pra quem &eacute; amistosis quis leo. Nullam volutpat risus nec leo commodo, ut interdum diam laoreet.
        Sed non consequat odio. Detraxit consequat et quo num tendi nada.</p>

    <p>Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl. Viva Forevis
        aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Praesent malesuada urna
        nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus.</p>

    <p>Em p&eacute; sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. M&eacute; faiz elementum
        girarzis, nisi eros vermeio. Todo mundo v&ecirc; os porris que eu tomo, mas ningu&eacute;m v&ecirc; os
        tombis que eu levo! Diuretics paradis num copo &eacute; motivis de denguis.&nbsp;</p>

    <p>Mussum Ipsum, cacilds vidis litro abertis. Manduma pindureta quium dia nois paga. in elementis m&eacute;
        pra quem &eacute; amistosis quis leo. Nullam volutpat risus nec leo commodo, ut interdum diam laoreet.
        Sed non consequat odio. Detraxit consequat et quo num tendi nada.</p>

    <p>Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl. Viva Forevis
        aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Praesent malesuada urna
        nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus.</p>

    <p>Em p&eacute; sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. M&eacute; faiz elementum
        girarzis, nisi eros vermeio. Todo mundo v&ecirc; os porris que eu tomo, mas ningu&eacute;m v&ecirc; os
        tombis que eu levo! Diuretics paradis num copo &eacute; motivis de denguis.&nbsp;</p>

    <p>
        <a class="btn btn-lg btn-primary" href="?pagina=contato" role="button">CONTATAR AGORA
            &nbsp;&raquo;</a>
    </p>

    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="/app/assets/img/moveis-corporativos-6.jpg" alt="...">

                <div class="caption">
                    <h3>Thumbnail label</h3>

                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                        gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="/app/assets/img/espac3a7o_zen.jpg" alt="...">

                <div class="caption">
                    <h3>Thumbnail label</h3>

                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                        gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="/app/assets/img/01637_02.jpg" alt="...">

                <div class="caption">
                    <h3>Thumbnail label</h3>

                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                        gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
            </div>
        </div>
    </div>
', NOW()),
('EMPRESA', 'empresa', '
<p>Quem Somos</p>

<p>Somos uma empresa especializada em decorar e organizar festas e eventos socias. H&aacute; 15&nbsp;anos&nbsp;idealizamos e concretizamos sonhos, trazendo para&nbsp;nossos clientes&nbsp;o que h&aacute; de novo e belo para seu evento. Deixamos nossos clientes a vontade para participar de todos os detalhes da festa para que tudo possa sair como o desejado.&nbsp; Sempre temos as melhores op&ccedil;&otilde;es para que seu evento fique elegante, visando o custo benef&iacute;cio,&nbsp;al&eacute;m de oferecermos assessoria e orienta&ccedil;&atilde;o&nbsp;para que fiquem seguros que o dia da sua festa ser&aacute; inesquec&iacute;vel.</p>

<p>?</p>

<p>Nos tornarmos uma empresa cada vez mais s&oacute;lida e refer&ecirc;ncia em decora&ccedil;&atilde;o e organiza&ccedil;&atilde;o de festas e eventos. Atender cada vez mais clientes em todo o estado.<br />
?</p>

<p>Vis&atilde;o</p>

<p>Miss&atilde;o</p>

<p>Levar&nbsp;beleza e sofistica&ccedil;&atilde;o a festas e eventos dos mais diversos seguimentos, trazendo aos&nbsp;nossos clientes novidades do mercado com valores acess&iacute;veis a todas as classes.<br />
?</p>

<p>Valores</p>

<p>Honestidade e respeito s&atilde;o pontos primordiais. Valores justos e respeito as escolhas e desejos do cliente da idealiza&ccedil;&atilde;o a realiza&ccedil;&atilde;o do evento.</p>

', NOW()),
('PRODUTOS', 'produtos', '
<p>Mussum Ipsum, cacilds vidis litro abertis. Manduma pindureta quium dia nois paga. in elementis m&eacute;
        pra quem &eacute; amistosis quis leo. Nullam volutpat risus nec leo commodo, ut interdum diam
        laoreet.
        Sed non consequat odio. Detraxit consequat et quo num tendi nada.</p>

    <p>Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl. Viva
        Forevis
        aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Praesent malesuada
        urna
        nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus.</p>

    <p>Em p&eacute; sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. M&eacute; faiz
        elementum
        girarzis, nisi eros vermeio. Todo mundo v&ecirc; os porris que eu tomo, mas ningu&eacute;m v&ecirc;
        os
        tombis que eu levo! Diuretics paradis num copo &eacute; motivis de denguis.&nbsp;</p>

    <p>Mussum Ipsum, cacilds vidis litro abertis. Manduma pindureta quium dia nois paga. in elementis m&eacute;
        pra quem &eacute; amistosis quis leo. Nullam volutpat risus nec leo commodo, ut interdum diam
        laoreet.
        Sed non consequat odio. Detraxit consequat et quo num tendi nada.</p>

    <p>Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl. Viva
        Forevis
        aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Praesent malesuada
        urna
        nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus.</p>

    <p>Em p&eacute; sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. M&eacute; faiz
        elementum
        girarzis, nisi eros vermeio. Todo mundo v&ecirc; os porris que eu tomo, mas ningu&eacute;m v&ecirc;
        os
        tombis que eu levo! Diuretics paradis num copo &eacute; motivis de denguis.&nbsp;</p>
', NOW()),
('SERVIÇOS', 'servicos', '
<p>Um ambiente visualmente harmonioso &eacute; capaz de despertar os melhores sentimentos. Nossos projetos levam esse conceito para o seu evento, usando cores e formas para inserir seus convidados em uma atmosfera &uacute;nica, inesquec&iacute;vel e principalmente, muito confort&aacute;vel. Abaixo relacionamos alguns tipos de servi&ccedil;os de decora&ccedil;&atilde;o e ambienta&ccedil;&atilde;o:Anivers&aacute;rios, Formaturas, Bodas, 15 Anos, Casamentos, Coquetel, Eventos empresariais, Coffe-break, Jantares, Ch&aacute;/Bar entre outros. Temos uma equipe treinada e altamente qualificada que est&aacute; pronta para a montagem do seu projeto. Um servi&ccedil;o que oferece suporte total desde a etapa criativa at&eacute; a montagem final para a realiza&ccedil;&atilde;o do seu evento.</p>

	<p>Mussum Ipsum, cacilds vidis litro abertis. Manduma pindureta quium dia nois paga. in elementis m&eacute;
        pra quem &eacute; amistosis quis leo. Nullam volutpat risus nec leo commodo, ut interdum diam
        laoreet.
        Sed non consequat odio. Detraxit consequat et quo num tendi nada.</p>

    <p>Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl. Viva
        Forevis
        aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Praesent malesuada
        urna
        nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus.</p>

    <p>Em p&eacute; sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. M&eacute; faiz
        elementum
        girarzis, nisi eros vermeio. Todo mundo v&ecirc; os porris que eu tomo, mas ningu&eacute;m v&ecirc;
        os
        tombis que eu levo! Diuretics paradis num copo &eacute; motivis de denguis.&nbsp;</p>

    <p>Mussum Ipsum, cacilds vidis litro abertis. Manduma pindureta quium dia nois paga. in elementis m&eacute;
        pra quem &eacute; amistosis quis leo. Nullam volutpat risus nec leo commodo, ut interdum diam
        laoreet.
        Sed non consequat odio. Detraxit consequat et quo num tendi nada.</p>

    <p>Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl. Viva
        Forevis
        aptent taciti sociosqu ad litora torquent Per aumento de cachacis, eu reclamis. Praesent malesuada
        urna
        nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus.</p>

    <p>Em p&eacute; sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. M&eacute; faiz
        elementum
        girarzis, nisi eros vermeio. Todo mundo v&ecirc; os porris que eu tomo, mas ningu&eacute;m v&ecirc;
        os
        tombis que eu levo! Diuretics paradis num copo &eacute; motivis de denguis.&nbsp;</p>
', NOW());





