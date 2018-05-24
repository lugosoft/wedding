  <?php
  error_reporting(E_ERROR | E_PARSE);
  include "library/functions.php";
  $isConfirmado = isInvitadoConfirmado($_GET['user_id']);
  $numInvitados = getInvitados($_GET['user_id'])['cnt'];
  ?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
    <head>
      <!-- Mobile Specific Meta -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Favicon-->
      <link rel="shortcut icon" href="img/fav.png">
      <!-- Author Meta -->
      <meta name="author" content="CodePixar">
      <!-- Meta Description -->
      <meta name="description" content="">
      <!-- Meta Keyword -->
      <meta name="keywords" content="">
      <!-- meta character set -->
      <meta charset="UTF-8">
      <!-- Site Title -->
      <title>Boda Monica & Luis</title>

      <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/availability-calendar.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter" />
		</head>
		<body>

			<!-- Start Header Area -->
			<header>
				<div class="container">
					<div class="header-wrap">
						<div class="header-top d-flex justify-content-between align-items-center">
							<div class="col menu-left">
								<a href="#"><img class="mx-auto" src="img/whatsapp.png" alt="">311 655 2659 - 300 514 1198</a>
							</div>
							<div class="col-3 logo">
								<a href="index.php"><img class="mx-auto" src="img/logo.png" alt=""></a>
							</div>
							 <nav class="col navbar navbar-expand-md justify-content-end">

							  <!-- Toggler/collapsibe Button -->
							  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
							    <span class="lnr lnr-menu"></span>
							  </button>

							  <!-- Navbar links -->
							  <div class="collapse navbar-collapse menu-right" id="collapsibleNavbar">
							    <ul class="navbar-nav">
							      <li class="nav-item">
							        <a class="nav-link" href="#home">Invitaci&oacute;n</a>
							      </li>
							      <li class="nav-item">
							        <a class="nav-link" href="#infoboda">La Boda</a>
							      </li>
                    <li class="nav-item">
							        <a class="nav-link" href="#about">C&oacute;digo Vestuario</a>
							      </li>
                    <?php 
                      if($numInvitados > 0){
                        echo"<li class='nav-item'><a class='nav-link' href='#reservation'>";
                        if($isConfirmado)
                          echo "Asistencia Confirmada";
                        else
                          echo "Confirmar Asistencia";
                        echo"</a></li>";
                      }
                    ?>
                    <li class="nav-item">
							        <a class="nav-link" href="#gallery">Galer&iacute;a Preboda</a>
							      </li>
								   <!-- Dropdown -->
								    <!--
                    <li class="nav-item dropdown">
								      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								        Galer&iacute;as
								      </a>
								      <div class="dropdown-menu">
								        <a class="dropdown-item" href="#about">Nuestra Historia</a>
                        <a class="dropdown-item" href="#gallery">Preboda</a>
								      </div>
								    </li>
                    -->
							    </ul>
							  </div>
							</nav> 
						</div>
					</div>
				</div>
			</header>
			<!-- End Header Area -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
						<div class="row fullscreen align-items-center justify-content-center" style="height: 915px;">
              <div class="banner-content col-lg-12 col-md-12" style="padding-top: 540px;"> <!-- style="padding-top: 580px;" -->
                  <p>
                    <a class="font-invitacion2" style="color:#525252;">
                      <?php if($numInvitados > 0) echo "Invitaci&oacute;n para:"; ?>
                    </a>
                    <a class="font-invitacion3" style="color:#525252;">
                      <?php echo getTextoInvitados($_GET['user_id']); ?>
                    </a>
                    <br>
                    <a class="font-invitacion4" style="color:525252;">
                      <?php 
                        if($numInvitados > 0){
                          if($isConfirmado){
                            echo "Asistencia Confirmada"; 
                          }else{
                            echo "Por favor confirmanos tu asistencia <a href='#reservation'>aqu&iacute;</a>"; 
                          }
                        } 
                      ?>
                    </a>
                  </p>
							</div>
						</div>
				</div>
			</section>
			<!-- End banner Area -->
      
			<!-- start banner Area -->
			<!--<section id="home">
				<div style="width:100%; height: 800px; display: flex;  justify-content: center;  align-items: center; position: relative; top: 96px;">
          <div>
            <iframe frameborder="0" width="390" height="547" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" src="https://view.genial.ly/5aa5b683b0254779f3d6117d" type="text/html" allowscriptaccess="always" allowfullscreen="true" scrolling="yes" allownetworking="all"></iframe>
          </div>
        </div>
			</section>-->
			<!-- End banner Area -->
      
      <!-- Start countdown Area -->
			<section class="countdown-area pt-100">
				<div class="container">
					<div class="row justify-content-center no-padding">
						<div class="col-lg-10">
							<div class="row clock_sec align-items-end clockdiv" id="clockdiv">
                  <div class="col clockinner1 clockinner">
                      <span class="days">29</span>
                      <div class="smalltext">D&iacute;as</div>
                  </div>
                  <div class="col clockinner clockinner1">
                      <span class="hours">22</span>
                      <div class="smalltext">Horas</div>
                  </div>
                  <div class="col counter-img">
                    <img src="img/counter.png" alt="">
                  </div>
                  <div class="col clockinner clockinner1">
                      <span class="minutes">23</span>
                      <div class="smalltext">Minutos</div>
                  </div>
                  <div class="col clockinner clockinner1">
                      <span class="seconds">52</span>
                      <div class="smalltext">Segundos</div>
                  </div>
				      </div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End countdown Area -->
      
      <!-- Start date Area -->
			<!--<section class="date-area">
				<div class="container">
					<div class="row justify-content-between date-section flex-row">
							<h3 class="text-white">Fecha de la Boda :     18 de Agosto de 2018 4:00 pm.</h3>					
					</div>
				</div>	
			</section>-->
			<!-- End date Area -->
      
			<!-- Start information Area -->
			<section class="section-gap info-area" id="infoboda">
				<div class="container">
					<div class="row headz justify-content-center">
						<div class="col-lg-6">
							<h1>Informaci&oacute;n de la Boda</h1>
							<p>
								Nuestro gran d&iacute;a se llevar&aacute; a cabo en dos lugares campestres en Copacabana (Antioquia).<br>Esperamos que se sientan a gusto en estos espacios, pues los hemos escogido para pasar un d&iacute;a muy especial con ustedes nuestros familiares y amigos m&aacute;s cercanos.<br>
                <?php if(($numInvitados > 0)&&(!$isConfirmado)) echo "No olvides confirmarnos tu asistencia <a href='#reservation'>aqu&iacute;</a>.<br>"; ?>
                Los presentes lo recibimos en <b>Lluvia de Sobres</b>.
							</p>							
						</div>
					</div>					
					<div class="single-info row mt-80">
						<div class="col-lg-6 col-md-12 text-center no-padding">
							<div class="info-thumb">
								<img src="img/info1.jpg" class="img-fluid" alt="">
							</div>
						</div>
						<div class="col-lg-6 col-md-12 mt-60 no-padding">
							<div class="info-content">
								<h1>Ceremonia</h1>
								<p>La ceremonia se realizar&aacute; en la parroquia <b>"San Juan de la Tasajera"</b> ubicada en Copacabana (Antioquia).<br>Les aconsejamos salir con tiempo desde sus casas ya que el lugar es en las afueras de Medell&iacute;n y por ser un d&iacute;a s&aacute;bado, el tr&aacute;fico en la ciudad es bastante pesado.</p>
								<div class="meta">
									<p>Fecha:&nbsp;&nbsp;&nbsp;S&aacute;bado 18 de Agosto de 2018</p>
									<p>Hora:&nbsp;&nbsp;&nbsp;04:00pm.</p>
									<p>Lugar:&nbsp;&nbsp;&nbsp;Parroquia San Juan de la Tasajera (Copacabana)</p>
                  <p>Direcci&oacute;n:&nbsp;&nbsp;&nbsp;Calle 48 # 27-39</p>
                  <p><a href="https://www.google.com.co/maps/place/Iglesia+San+Juan+de+La+Tasajera/@6.356053,-75.495429,15z/data=!4m12!1m6!3m5!1s0x0:0xe613e5748e30aee!2sIglesia+San+Juan+de+La+Tasajera!8m2!3d6.356053!4d-75.495429!3m4!1s0x0:0xe613e5748e30aee!8m2!3d6.356053!4d-75.495429" target="_blank">Ver en Google Maps</a></p>
                  <p>Mapa: </p>
                  <p><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15861.173634736098!2d-75.495429!3d6.356053!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe613e5748e30aee!2sIglesia+San+Juan+de+La+Tasajera!5e0!3m2!1ses-419!2sco!4v1520725154627" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></p>
								</div>
							</div>
						</div>
					</div>
					<div class="single-info row mt-50">
						<div class="col-lg-6 col-md-12 mt-60 no-padding">
							<div class="info-content2">
								<h1>Recepci&oacute;n</h1>
								<p>La recepci&oacute;n se realizar&aacute; en la <b>"Finca Villa Roc&iacute;o"</b> ubicada tambi&eacute;n en Copacabana (Antioquia).<br></p>
								<div class="meta">
									<p>Fecha:&nbsp;&nbsp;&nbsp;S&aacute;bado 18 de Agosto de 2018</p>
									<p>Hora:&nbsp;&nbsp;&nbsp;05:00pm.</p>
									<p>Lugar:&nbsp;&nbsp;&nbsp;Finca Villa Roc&iacute;o (Copacabana)</p>
                  <p>Direcci&oacute;n:&nbsp;&nbsp;&nbsp;Autopista Norte Km 18, Parcelaci&oacute;n El Limonar, <b>Finca #27</b></p>
                  <p><a href="https://goo.gl/maps/7PZ1g1hp1zm" target="_blank">Ver en Google Maps</a></p>
                  <p>Mapa: </p>
                  <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.056294556042!2d-75.48241758523!3d6.3867368953786565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9d5609523831b6b1!2sFinca+Villa+Roc%C3%ADo!5e0!3m2!1ses!2sco!4v1520750712794" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe></p>
								</div>
							</div>
						</div>	
						<div class="col-lg-6 col-md-12 text-center no-padding">
							<div class="info-thumb">
								<img src="img/info2.jpg" class="img-fluid" alt="">
							</div>
						</div>											
					</div>
				</div>
			</section>			
			<!-- End information Area -->
			
      <!-- Start About Area -->
			<section class="About-area pt-100 pb-60" id="about">
				<div class="container">
					<div class="carousel-trigger">
							<div class="next-trigger"><span class="lnr lnr-arrow-right"></span></div>
							<div class="prev-trigger"><span class="lnr lnr-arrow-left"></span></div>	
						</div> 						
					<div class="active-about-carousel">
						<div class="item">
							<div class="row justify-content-center align-items-center">
								<div class="col-lg-6">
									<h1>Vestuario para <span>Ellas</span></h1>
									<p>
										- Usar vestido de Coctel.<br>
                    - Recomendamos usar vestido con colores pasteles.<br>
                    - No usar color blanco.<br>
                    - Evita usar tacones de punta delgada.<br>
                    - Evita usar vestidos cortos (Por encima de la rodilla).
									</p>
								</div>
								<div class="col-lg-6">
									<img class="img-fluid mx-auto" src="img/about.png" alt="">
								</div>										
							</div>
						</div>
						
            <div class="item">
							<div class="row justify-content-center align-items-center">
								<div class="col-lg-6">
									<h1>Vestuario para <span>Ellos</span></h1>
									<p>
										- Usar traje formal o Blazer.<br>
                    - Recomendamos usar traje de tonos oscuros.<br>
                    - No usar traje con colores claros (Como el Blanco, Beige o Gris claro).<br>
                    - La corbata es opcional.
									</p>
								</div>
								<div class="col-lg-6">
									<img class="img-fluid mx-auto" src="img/about2.png" alt="">
								</div>										
							</div>
						</div>
            
						</div>
					</div>					
				</div>	
			</section>
			<!-- End About Area -->
      
			<!-- Start reservation Area -->
			<section class="reservation-area section-gap relative" id="reservation" <?php if($numInvitados == 0) echo" style='display: none;' "; ?> >
				<div class="container">
          <form class="booking-form" id="myForm" action="">
					<div class="overlay overlay-bg"></div>
					<div class="row headz justify-content-center">
						<div class="col-lg-6">
              <?php
                if($isConfirmado){
                  echo"<h1 class='text-white h1'>Asistencia Confirmada</h1>
                       <p class='p1'>Nos complace saber que nos acompa&ntilde;ar&aacute;n en este d&iacute;a tan especial para nosotros.</p>";
                }else{
                  echo"<h1 class='text-white h1'>Confirmar Asistencia</h1>
                       <p class='p1'>
                        A continuaci&oacute;n por favor confirma las personas que asistir&aacute;n a nuestra boda.<br>Ten presente que tienes hasta el <b>30 de Junio</b> para confirmarnos debido a que necesitamos saber con anticipación cuantos invitados nos acompañar&aacute;n.<br>Si no nos confirmas por este medio asumiremos que no nos podr&aacute;s acompa&ntilde;ar y no estar&aacute;s en la lista de invitados permitidos para ingresar a la recepci&oacute;n.  
                      </p>";
                }
              ?>
														
						</div>
					</div>
          
					<div class="row no-padding justify-content-center mt-40">
						<div class="col-lg-8">
							<!--<form class="booking-form" id="myForm" action="">-->
							 	<div class="row">
                  
                  <div class="alert-msg"><?php printInvitadosConfirmados2($_GET['user_id']); ?></div>

                  <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']; ?>">
                  
							 		<div class="col-lg-12 d-flex justify-content-center">
                    <div class="default-select" id="default-select">
                      <select name="guests">
                        <?php echo printOpcionesConfir($_GET['user_id']); ?>
                      </select>
                    </div>
							 		</div>
									
									<div class="col-lg-12 d-flex justify-content-center send-btn">
										<button class="submit-btn primary-btn mt-20 text-uppercase ">Enviar Confirmaci&oacute;n<span class="lnr lnr-arrow-right"></span></button>
									</div>
                  
								</div>
						  	</form>							
						</div>
					</div>
				</div>	
			</section>
			<!-- End reservation Area -->
			
      <!-- Start About Area -->
      <!-- End About Area -->
      
      <!-- Start gallery Area -->
			<section class="gallery-area pt-100" id="gallery">
				<div class="container-fluid">
					<div class="row headz justify-content-center">
						<div class="col-lg-8">
							<h1>Galer&iacute;a Preboda</h1>
							<p>
								<i>&quot;El amor es paciente y bondadoso. El amor no es celoso ni fanfarr&oacute;n ni orgulloso ni ofensivo.<br>
                No exige que las cosas se hagan a su manera. No se irrita ni lleva un registro de las ofensas<br>
                recibidas. No se alegra de la injusticia sino que se alegra cuando la verdad triunfa.<br>
                El amor nunca se da por vencido, jam&aacute;s pierde la fe, siempre tiene esperanzas y se mantiene<br> 
                firme en toda circunstancia.&quot;</i><br><a style="font-weight: bold;">1 Corintios 13:4-7</a>
							</p>							
						</div>
					</div>
					<div class="row no-padding">
						<div class="single-gallery active-gallery-carusel">
							<img class="item" src="img/g1.jpg" alt="">
							<img class="item" src="img/g2.jpg" alt="">
							<img class="item" src="img/g3.jpg" alt="">
							<img class="item" src="img/g4.jpg" alt="">
							<img class="item" src="img/g5.jpg" alt="">
							<img class="item" src="img/g6.jpg" alt="">
							<img class="item" src="img/g7.jpg" alt="">
							<img class="item" src="img/g8.jpg" alt="">
							<img class="item" src="img/g9.jpg" alt="">
							<img class="item" src="img/g10.jpg" alt="">
							<img class="item" src="img/g11.jpg" alt="">
							<img class="item" src="img/g12.jpg" alt="">
							<img class="item" src="img/g13.jpg" alt="">
						</div>
					</div>
				</div>	
			</section>
			<!-- End gallery Area -->
      
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row justify-content-center">
						<div class="footer-top flex-column">
							<ul class="footer-menu">
								<li><a href="#home">Invitaci&oacute;n</a></li>
								<li><a href="#infoboda">La Boda</a></li>
								<li><a href="#gallery">Galer&iacute;a Preboda</a></li>
                <?php 
                  if($numInvitados > 0){
                    echo"<li><a href='#reservation'>";
                    if($isConfirmado)
                      echo "Asistencia Confirmada";
                    else
                      echo "Confirmar Asistencia";
                    echo"</a></li>";
                  }
                ?>
							</ul>
							<!--
              <div class="footer-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>
							</div>
              -->
						</div>					
					</div>
          <br>
					<div class="row footer-bottom justify-content-center">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						<p class="col-lg-8 col-sm-12 footer-text">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>
			<script src="js/jquery.sticky.js"></script>
			<script src="js/parallax.min.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/countdown2.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/main.js"></script>	
		</body>
	</html>