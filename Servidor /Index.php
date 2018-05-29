<! DOCTYPE html>
<html lang = "pt-br">
  <cabeça>
    <meta charset = "utf-8">
    <meta name = "viewport" content = "largura = largura do dispositivo, escala inicial = 1">
    <meta http-equiv = "atualizar" conteúdo = "30">
    <meta name = "author" content = "3LT">
    <meta name = "descrição" content = "Prjeto de TCC.">
    <title> Medidor Inteligente </ title>
    <link rel = "stylesheet" href = "estilo.css">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href = 'https: //fonts.googleapis.com/css? family = Lato: 400,300,700' rel = 'folha de estilo' type = 'texto / css'>
    <link rel = "icon" href = "img / icon.png">
  </ head>

  <body>
   <! - CABEÇALHO -> 
    <header class = "cabecalho container">
      <a href="index.php"> </a>
      <img src = "img / logo-mobile.png">
    <! - Menu -> 
    <div class = "menu">
       <ul>
          <! - <li> <a href="#"> Custos </a> </ li>
        <li> <a href="#"> Sustentabilidade </a> </ li>
        <li> <a href="#"> Sobre </a> </ li> u -> 
       </ ul>
       </ div>
    </ header>
   <! - BANNER -> 
    <div class = "contêiner de banner">
      <div class = "title">
        <h2> Consumo de Água e Energia </ h2>
        <h3> Bem vindo <br>
        <script type = "text / javascript">
         var d = new Date ()
         document.write (d.toLocaleString ())
        </ script> </ h3>
      </ div>
    </ div>

          <! - SERViÇOS -> 

      <div class = "servicos"> 

      <article class = "inner servico radius"> 
       <! - GRÁFICO -> 
             <script type = "texto / javascript" src = "https://www.gstatic.com/charts/loader.js"> </ script>
    <script type = "text / javascript">
      google.charts.load ('current', {'packages': ['corechart']});

      google.charts.setOnLoadCallback (drawChart);

      function drawChart () {

        var data = new google.visualization.DataTable ();
        data.addColumn ('string', 'Hórario');
        data.addColumn ('number', 'Água');
        data.addColumn ('number', 'Energia');
        data.addRows ([
         <? php
              $ servidor = 'localhost';
              $ banco = 'medidor';
              $ usuario = 'root';
              $ senha = '';
              $ link = mysqli_connect ($ servidor, $ usuario, $ senha, $ banco);
              $ yday = date ('Ymd h: i: s', strtotime ("- 1 dia"));
              $ query = "SELECT * FROM medidas WHERE horario> '$ yday'";
              $ result = mysqli_query ($ link, $ query);
              $ row = mysqli_fetch_array ($ resultado);
              if ($ row) {
                $ continue = true;
              } outro {
                $ continue = false;
               } while ($ continue) { 
                $ horario = $ row ['horario'];
                $ vazao = $ row ['vazao'];
                $ energia = $ row ['energia'];
                echo ("['$ horario', $ vazao, $ energia]");
                $ row = mysqli_fetch_array ($ resultado);
              if ($ row) {
                $ continue = true;
                echo (", \ n");
              } outro {
                $ continue = false;
                echo ("\ n");
              }
              }
            ?>    
        ]);

        
        var options = {'title': 'Horário',
                       'largura': '100%'
                       'altura': '400'};
        var chart = new google.visualization.AreaChart (document.getElementById ('chart_div'));
        chart.draw (dados, opções,);
      }
    </ script>
            <? php
              ini_set ('display_errors', 'On');
              $ link = mysqli_connect ($ servidor, $ usuario, $ senha, $ banco);
              $ yday = date ('Ymd h: i: s', strtotime ("-1 dia"));
              $ query = "SELECT * FROM medidas WHERE horario> '$ yday'";
              $ result = mysqli_query ($ link, $ query); 
              $ sql = "SELECIONAR SOMA (vazao) AS total FROM medidas";
              $ qry = mysqli_query ($ link, $ sql);
              $ row = mysqli_fetch_assoc ($ qry);
            ?>
            <h4> O consumo total de água é:
              <strong> <? php echo $ row ['total']; ?> Litros </ strong> ou
              <strong> <? php echo $ row ['total']; ?> L / min </ strong>. <br>
              <div id = "chart_div"> </ div> </ h4>
            <? php
              ini_set ('display_errors', 'On');
              $ link = mysqli_connect ($ servidor, $ usuario, $ senha, $ banco);
              $ sql = "SELECT SUM (energia) como total FROM medidas";
              $ qry = mysqli_query ($ link, $ sql);
              $ row = mysqli_fetch_assoc ($ qry);
            ?>
            <h4> O consumo total de energia é:
              <strong> <? php echo $ row ['total']; ?> Kw / h </ strong>.
              <div id = "chart_div"> </ div> </ h4>

      </ article>
      

       <! - -TABELA -> 
      <article class = "raio da tabela">
        <div class = "inner">
           <h4> Últimas medidas </ h4>
          <table style = "width: 100%">
            <tr>
              <td> <strong> Horário </ strong> </ td>
              <td> <strong> Água (L / min) </ strong> </ td>
              <td> <strong> Energia </ strong> </ td>
            </ tr>
            <? php
              $ i = 0;
              while ($ row = mysqli_fetch_assoc ($ result)) {
              $ horario = $ row ['horario'];
              $ vazao = $ row ['vazao'];
              $ energia = $ row ['energia'];
            ?>
            <tr>
              <td align = "right"> <? php echo $ horario; ?> </ td>
                <td align = "right"> <? php echo $ vazao; ?> </ td>
                  <td align = "right"> <? php echo $ energia; ?> </ td>
              </ tr>
              <? php
                $ i ++;
                }
              ?>
          </ table>       
        </ div>      
      </ article>
</ div>
      <! - RODAPÉ -> 
        <footer class = "rodape">
          <div class = "social-icons">
           <p class = "copyright"> 3lt@etec.sp.gov.br <i class = "fa-envelope-fa"> </ i> <p class = "copyright"> Direitos autorais © 3LT 2018. </ p> < / p>
          </ div>
        </ footer> 
              
  </ body>
</ html>
