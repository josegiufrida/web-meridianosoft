<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--title-->
    <title>MeridianoSoft - Software de Gestion</title>
    <meta name="description" content="Sistemas de gestión mas económicos del mercado. Sin costos de mantenimiento, licencias o instalación por equipo. Desde 1993 brindando soluciones administrativas a medida para pequeñas y medianas empresas (Industrias , Distribuidoras , Comercios , Puntos de Venta, Mutuales, Medicinas Prepagas, Estudios Contables  entre otros)"/>
    <link rel="canonical" href="https://meridianosoft.com.ar" />

    <!--favicon icon-->
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/png" sizes="16x16">

    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!--themify icon-->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">

    <!-- magnific popup css-->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <!--owl carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

    <!-- bootstrap core css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">


    <script type="text/javascript" src="{{ asset('js/vendor/modernizr-2.8.1.min.js') }}"></script>
    <!-- HTML5 Shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/vendor/html5shim.js"></script>
    <script src="js/vendor/respond.min.js"></script>
    <![endif]-->


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function onSubmit( token ){
            
            $.ajax({
                data:  {
                    'email'    : document.getElementById('email').value,
                    'name'     : document.getElementById('name').value,
                    'company'  : document.getElementById('company').value,
                    'telefono' : document.getElementById('telefono').value,
                    'message'  : document.getElementById('message').value,
                    'website'  : document.getElementById('website').value
                },
                url:   'sendContactoMail.php',
                type:  'post',
                success:  function( response ){
                    window.location = 'https://meridianosoft.com.ar';
                }
            });
            
        }
    </script>

    
</head>


<body>

<div id="main" class="main-content-wraper">
    <div class="main-content-inner">

        <!--start header section-->
        <header class="header">
            <!--start navbar-->
            <div class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="row">
                        <div class="navbar-header page-scroll">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#myNavbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand page-scroll" href="https://meridianosoft.com.ar">
                                <img src="img/Logo-MerdianoSoft2.png" alt="logo">
                            </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="navbar-collapse collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a class="page-scroll" href="#Inicio">Inicio</a></li>
                                <li><a class="page-scroll" href="#Empresa">Empresa</a></li>
                                <li><a class="page-scroll" href="#Producto">Producto</a></li>
                                <li><a class="page-scroll" href="#Funciones">Funciones</a></li>
                                <li><a class="page-scroll" href="#Clientes">Clientes</a></li>
                                <li>
                                    <div class="try-free-btn">
                                        <a href="#Contacto" class="btn softo-free-btn page-scroll">Contacto</a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!--end navbar-->
        </header>
        <!--end header section-->

        <!--start slider section-->
        <section id="Inicio" class="hero-slider-section">
            <div class="owl-carousel owl-theme hero-background-slider custom-indicator">
                <div class="item">
                    <div class="slider-bg-content"
                         style="background: url('img/hero-slider-bg-1.jpg')no-repeat center center / cover">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="slider-bg-contents-wrap">
                                        <h1><span>Sistemas</span> de Gestion</h1>
                                        <p>Las mejores soluciones para la pequeña y mediana empresa.
                                            Sistemas de bajo costo y mantenimiento sumado a 30 años de Experiencia y mas 300 clientes</p>
                                    </div>
                                    <div class="hero-action-btn">
                                        <a href="#Contacto" class="btn softo-solid-btn page-scroll">Contacto</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slider-bg-content"
                         style="background: url('img/hero-slider-bg-2.jpg')no-repeat center center / cover">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="slider-bg-contents-wrap">
                                        <h1>La Mejor Relacion  <span>Costo - Beneficio</span></h1>
                                        <p>Sin costos de mantenimiento, sin costos de licencias por equipo ni por usuario, sin costos de instalación.</p>
                                    </div>
                                    <div class="hero-action-btn">
                                        <a href="#Contacto" class="btn softo-solid-btn page-scroll">Contacto</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="item">
                    <div class="slider-bg-content"
                         style="background: url('img/hero-slider-bg-3.jpg')no-repeat center center / cover">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="slider-bg-contents-wrap">
                                        <h1>Marketing and <span>Business</span> Solution</h1>
                                        <p>Completely morph efficient technology and B2C bandwidth. Uniquely
                                            leverage other's market positioning relationships rather than
                                            future-proof supply chains.</p>
                                    </div>
                                    <div class="hero-action-btn">
                                        <a href="#"
                                           class="btn softo-solid-btn">Our Services</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>-->
            </div>
        </section>
        <!--end slider section-->

        <!--start promo section-->
        <section class="promo-section ptb-90">
            <div class="promo-section-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="single-promo-section text-center bg-secondary">
                                <span class="ti-light-bulb"></span>
                                <h6>Historia</h6>
                                <p>Desde 1993 dando soluciones a cientos de Pymes acompañando su crecimiento y desarrollo</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="single-promo-section text-center bg-secondary">
                                <span class="ti-headphone-alt"></span>
                                <h6>Post-venta</h6>
                                <p>Asistencia de calidad con un equipo que trabaja en busca de las mejores innovaciones tecnológicas para la empresa</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="single-promo-section text-center bg-secondary">
                                <span class="ti-money"></span>
                                <h6>Precio-Calidad</h6>
                                <p>El Sistema Administrativo <strong>más económico</strong> del mercado con todo lo necesario que la empresa necesita</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="single-promo-section text-center bg-secondary">
                                <span class="ti-ruler-pencil"></span>
                                <h6>A medida</h6>
                                <p>Adaptabilidad 100% a la organización. Pudiendo adaptar nuestros sistemas a medida del negocio.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end promo section-->
            
        
        <!--start why gosofto-->
        <section id="Empresa" class="bg-secondary why-gosofto ptb-90">
            <div class="why-gosofto-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-heading text-center">
                                <h3>Quiénes somos</h3>
                                <p>Simplemente somos una empresa que da <b>soluciones</b>. Una idea sencilla y eficaz. <b><br>Trabajo, ejecución y cumplimiento</b>. Los pilares  de nuestra filosofía.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="why-us-contents">
                                <h6>Cómo Trabajamos</h6>
                                <p>Nos encantan los desafíos y el <strong>premio mayor</strong> es la <strong>satisfacción</strong> de <strong>nuestro cliente</strong>. La experiencia nos enseñó que el único camino es  trabajo,  dedicación y esfuerzo para lograr el objetivo que nos proponen cada vez que contratan nuestros servicios.</p>
                                
                                <br> 
                                
                                
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="about-new-promo">
                                        <span class="ti-vector"></span>
                                        <h6>Interfaz amigable</h6>
                                        <p>Sistemas intuitivos , fáciles de aprender y simples.</p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="about-new-promo">
                                        <span class="ti-cloud-down"></span>
                                        <h6>En la Nube o Servidores Propios</h6>
                                        <p>Bases de datos SQL con la potencia y velocidad de Sql Server y MySql</p>
                                    </div>      
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="why-us-img-three">
                                <img src="img/about-image.png" alt="Why GoSofto" class="about-screen img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end why gosofto-->
        
        
        
        <!--start call to action section-->
        <section class="contact-info-section ptb-40">
            <div class="auto-container">
                <h2>¿Dudas? ¿Estás listo para empezar? Contactanos</h2>
                <div class="info-blocks">
                    <div class="row clearfix">
                        <!--Info Block-->
                        <div class="info-block col-md-5 col-sm-6 col-xs-12">
                            <div class="inner inner-left">
                                <div class="icon-box">
                                    <span class="icon fa fa-envelope-o"></span>
                                </div>
                                <div class="text"><a href="mailto:ventas@meridianosoft.com.ar">ventas@meridianosoft.com.ar</a></div> 
                            </div>
                        </div>

                        <!--Info Block-->
                        <div class="info-block col-md-3 col-sm-6 col-xs-12">
                            <div class="inner">
                                <div class="icon-box">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                                <div class="text"><a a href="tel:+543416422343">+54 341 6422343</a></div>
                            </div>  
                        </div>
                        
                         <!--Info Block-->
                        <div class="info-block col-md-4 col-sm-6 col-xs-12">
                            <div class="inner inner-right">
                                <div class="icon-box">
                                    <span class="icon fa fa-phone"></span>
                                </div>
                                <div class="text"><a a href="tel:+543414555129">+54 341 4555129</a></div>
                            </div>  
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--end call to action section-->



        <!--start software overview section-->
        <section id="Producto" class="overview-section ptb-90">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading text-center white-text">
                            <h3 class="white-text">Nuestro Producto</h3>
                            <p>Industrias , Distribuidoras , Comercios , Puntos de Venta, Mutuales, Medicinas Prepagas, Estudios Contables han confiado en nosotros y seguiremos apostando por nuestras ideas.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="nav-center">
                            <ul class="nav nav-tabs">
                                <li><a href="#nav-1" data-toggle="tab">
                                    Industrias
                                </a></li>
                                <li><a href="#nav-2" data-toggle="tab">
                                    Distribuidoras
                                </a></li>
                                <li class="active"><a href="#nav-3" data-toggle="tab">
                                    Comercios
                                </a></li>
                                <li><a href="#nav-4" data-toggle="tab">
                                    Servicios
                                </a></li>
                            </ul>
                        </div>

                        <div class="tab-content-wrap">
                            <!--<img src="img/macbook.png" alt="" class="overview-mac-image">-->
                            <div class="tab-content clearfix">
                                <div class="tab-pane fade" id="nav-1">
                                    <div class="col-md-6">
                                        <div class="overview-feature-content-image">
                                            <img src="img/tab-image-1.png" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="overview-feature-content">
                                            <h6>Software de Gestión ERP</h6>
                                            <ul class="overview-list">
                                                <li><span class="ti-check-box"></span> Sistema Completo de Gestión</li>
                                                <li><span class="ti-check-box"></span> Ordenes de Trabajo</li>
                                                <li><span class="ti-check-box"></span> Producción</li>
                                                <li><span class="ti-check-box"></span> Formulación de productos Fabricados</li>
                                                <li><span class="ti-check-box"></span> Hoja de Servicios de Reparación(RMA)</li>
                                                <li><span class="ti-check-box"></span> Ordenes de Compra</li>
                                                <li><span class="ti-check-box"></span> Contabilidad</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-2">
                                    <div class="col-md-6">
                                        <div class="overview-feature-content">
                                            <h6>Módulos Esenciales</h6>
                                            <ul class="overview-list">
                                                <li><span class="ti-check-box"></span> Conexión e-commerce</li>
                                                <li><span class="ti-check-box"></span> Toma Pedidos vendedores en el movil</li>
                                                <li><span class="ti-check-box"></span> Análisis de Stock</li>
                                                <li><span class="ti-check-box"></span> Comisiones por venta/cobranzas</li>
                                                <li><span class="ti-check-box"></span> Hojas de Ruta-Planillas de Reparto</li>
                                                <li><span class="ti-check-box"></span> Multiproveedor</li>
                                                <li><span class="ti-check-box"></span> Cash Flow</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="overview-feature-content-image">
                                            <img src="img/tab-image-2.png" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade active in" id="nav-3">
                                    <div class="col-md-6">
                                        <div class="overview-feature-content-image">
                                            <img src="img/tab-image-3.png" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="overview-feature-content">
                                            <h6>Soluciones Minoristas y Puntos de Venta</h6>
                                            <ul class="overview-list">
                                                <li><span class="ti-check-box"></span> Herramientas en Común</li>
                                                <li><span class="ti-check-box"></span> Análisis de Rentabilidad</li>
                                                <li><span class="ti-check-box"></span> Acopio de Materiales</li>
                                                <li><span class="ti-check-box"></span> Múltiples Agrupaciones de Artículos</li>
                                                <li><span class="ti-check-box"></span> Múltiples Bonificaciones Proveedor</li>
                                                <li><span class="ti-check-box"></span> Talles y Colores</li>
                                                <li><span class="ti-check-box"></span> Etiquetas con Código de Barra</li>
                                                <li><span class="ti-check-box"></span> Multimoneda</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-4">
                                    <div class="col-md-6">
                                        <div class="overview-feature-content">
                                            <h6>Medicina Prepaga - Clubes</h6>
                                            <ul class="overview-list">
                                                <li><span class="ti-check-box"></span> Facturación de Abonos</li>
                                                <li><span class="ti-check-box"></span> Cobranza Express</li>
                                                <li><span class="ti-check-box"></span> Cobranzas Rapipagos, Visa</li>
                                                <li><span class="ti-check-box"></span> Generación padrones Socios</li>
                                                <li><span class="ti-check-box"></span> Envíos masivos de Facturación</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="overview-feature-content-image">
                                            <img src="img/tab-image-4.png" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end software overview section-->

        


 
    <!--start our features-->
        <section id="Funciones" class="our-features ptb-90 bg-secondary">
            <div class="our-features-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-heading text-center">
                                <h3>Algunas Funcionalidades</h3>
                                <p>Solo algunos de los procesos que poseen nuestros sistemas</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="biz-home-single-service">
                                <div class="home-service-text service-style-one">
                                    <span class="ti-credit-card"></span>
                                    <h5>Facturación Electrónica de Crédito</h5>
                                    <p>Modalidad de facturación para pequeñas y medianas empresas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="biz-home-single-service">
                                <div class="home-service-text service-style-one">
                                    <span class="ti-book"></span>
                                    <h5>Libro IVA Digital</h5>
                                    <p>Nueva Obligación Fiscal - Régimen de registración electrónica</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="biz-home-single-service">
                                <div class="home-service-text service-style-one">
                                    <span class="ti-shopping-cart"></span>
                                    <h5>Integración E-commerce</h5>
                                    <p>Interfaz que conecta tus datos con tu web e-commerce</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="biz-home-single-service">
                                <div class="home-service-text service-style-one">
                                    <span class="ti-mobile"></span>
                                    <h5>APP Movil - Toma de Pedidos</h5>
                                    <p>Aplicativo que permite integrar tus ventas en tiempo real</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="biz-home-single-service">
                                <div class="home-service-text service-style-one">
                                    <span class="ti-printer"></span>
                                    <h5>Facturación Masiva</h5>
                                    <p>Clubes,Inmobiliarias,Prepagas utilizan ésta herramienta</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="biz-home-single-service">
                                <div class="home-service-text service-style-one">
                                    <span class="ti-export"></span>
                                    <h5>Importador Lista de Proveedores</h5>
                                    <p>Importacion de listas de precios de proveedores en formato exel</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="biz-home-single-service">
                                <div class="home-service-text service-style-one">
                                    <span class="ti-panel"></span>
                                    <h5>Tablero de Control</h5>
                                    <p>Permite evaluar y controlar distintas variables del sistema</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="biz-home-single-service">
                                <div class="home-service-text service-style-one">
                                    <span class="ti-truck"></span>
                                    <h5>Logística y Reparto</h5>
                                    <p>Hojas de Ruta, planillas de reparto y Consolidado de carga</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="biz-home-single-service">
                                <div class="home-service-text service-style-one">
                                    <span class="ti-pie-chart"></span>
                                    <h5>Ajuste por Inflación</h5>
                                    <p>Genera estados contables en moneda nominal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end our features-->
        
        
        
        
         <section id="Clientes" class="section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading text-center">
                            <h3>Clientes</h3>
                            <p>“Mantente cerca de tus clientes. Tan cerca que seas tú el que les diga lo que necesitan mucho antes de que ellos se den cuenta de que lo necesitan”. <br> Steve Jobs, Fundador de Apple.</p>      
                        </div>
                    </div>
                </div>
                <div class="row no-gutters clients-wrap clearfix wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="col-lg-3 col-md-4 col-xs-6 p-0 clients-container">
                        <div class="client-logo" onclick="window.open('http://demisalud.com.ar/')"> <img src="logos/logo-Demi.jpg" class="img-fluid" alt="Demi Salud"> </div>
                        <p class="text-center"><strong>Demi Salud</strong></p>
                        <p class="text-center">Medicina Prepaga</p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 p-0 clients-container">
                        <div class="client-logo" onclick="window.open('http://www.resorteslacas.com.ar/')"> <img src="logos/logo-Lacas.png" class="img-fluid" alt="Resortes Lacas"> </div>
                        <p class="text-center"><strong>Resortes Lacas</strong></p>
                        <p class="text-center">Industria Metalúrgica</p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 p-0 clients-container">
                        <div class="client-logo" onclick="window.open('http://acerhierros.com/')"> <img src="logos/logo-Acer.png" class="img-fluid" alt="Acer"> </div>
                        <p class="text-center"><strong>Acer</strong></p>
                        <p class="text-center">Caños - Hierros - Aceros</p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 p-0 clients-container">
                        <div class="client-logo" onclick="window.open('http://distribuidorabassanini.com/')"> <img src="logos/Logo-Basanini.png" class="img-fluid" alt="Distribudora Bassanini"></div>
                        <p class="text-center"><strong>Distribudora Bassanini</strong></p>
                        <p class="text-center">Alimenticia</p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 p-0 clients-container">
                        <div class="client-logo" onclick="window.open('http://www.femos.com.ar/')"> <img src="logos/logo-PuertoFemos.png" class="img-fluid" alt="Puerto Femos"> </div>
                        <p class="text-center"><strong>Puerto Femos</strong></p>
                        <p class="text-center">Fabricación y venta de Correas</p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 p-0 clients-container">
                        <div class="client-logo" onclick="window.open('http://servicioscae.com/')"> <img src="logos/logo-Cae.png" class="img-fluid" alt="Servicios Cae"> </div>
                        <p class="text-center"><strong>Servicios Cae</strong></p>
                        <p class="text-center">Informática + Seguridad</p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 p-0 clients-container">
                        <div class="client-logo" onclick="window.open('http://www.ptf.com.ar/Contacto.htm')"> <img src="logos/logo-PTF.gif" class="img-fluid" alt="PTF"> </div>
                        <p class="text-center"><strong>PTF</strong></p>
                        <p class="text-center">Industria del Plástico</p>
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6 p-0 clients-container">
                        <div class="client-logo"> <img src="logos/logo-Aristo.png" class="img-fluid" alt="Aristo Impresiones"> </div>
                        <p class="text-center"><strong>Aristo Impresiones</strong></p>
                        <p class="text-center">Servicios de Impresión</p>
                    </div>
                </div>
                
                
                
                <div class="section-heading text-center">
                     <h5><a href="https://meridianosoft.com.ar/clientes">Ver todos los clientes</a></h5>
                </div>
                
                
            </div>
        </section>
        

        
      
        
                
        

        <!--start customers section 
        <div class="bg-secondary customers-section pb-50">
            <div class="customers-wrap">
                <div class="container">
                    <div class="row">
                        <div class="customers-content">
                            <div class="owl-carousel owl-theme customers-slider">
                                <div class="item">
                                    <img src="img/client/customer-logo-1.png" alt="client logo">
                                </div>
                                <div class="item">
                                    <img src="img/client/customer-logo-2.png" alt="client logo">
                                </div>
                                <div class="item">
                                    <img src="img/client/customer-logo-3.png" alt="client logo">
                                </div>
                                <div class="item">
                                    <img src="img/client/customer-logo-4.png" alt="client logo">
                                </div>
                                <div class="item">
                                    <img src="img/client/customer-logo-7.png" alt="client logo">
                                </div>
                                <div class="item">
                                    <img src="img/client/customer-logo-8.png" alt="client logo">
                                </div>
                                <div class="item">
                                    <img src="img/client/customer-logo-10.png" alt="client logo">
                                </div>
                                <div class="item">
                                    <img src="img/client/customer-logo-9.png" alt="client logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        end customers section-->

        <!--contact us section start-->
        <section id="Contacto" class="contact-us ptb-90">
            <div class="contact-us-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-heading text-center">
                                <h3>Contacto</h3>
                                <p>Es muy importante para nosotros tu consulta, no dudes en llamarnos .Tenemos lo que tu empresa necesita y sabemos de lo que hablamos</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="choose-area bg-secondary">
                            <div class="col-md-6 col-76 p-0">
                                <div class="choose-wrapper">
                                    
                                    <form id="contact-form" action="" method="post" class="contact-us-form" novalidate="novalidate">
                                        <h6>Envíanos tu consulta</h6>
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" id="name"
                                                           placeholder="Nombre" required="required">
                                                    <input type="text" id="website" name="website"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                           placeholder="E-mail" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="number" name="telefono" value="" class="form-control"
                                                           id="telefono" placeholder="Telefono">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" name="company" id="company" value="" size="40"
                                                           class="form-control" placeholder="Empresa">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <textarea name="message" id="message" class="form-control" rows="9"
                                                              cols="25" placeholder="Mensaje"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 mt-20">
                                                <button class="btn softo-solid-btn pull-right g-recaptcha" data-callback="onSubmit" data-sitekey="6LdYtxsaAAAAAM5dzA-PXGco8lXwL8yrUPDTmtyI">
                                                    Enviar Mensaje
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 col-6 p-0 choose-img">
                                <div class="footer-address">
                                    <ul>
                                        <li><i class="fa fa-map-marker"></i> <span>Pje. Williams 3583, Rosario</span>
                                        </li>
                                        <li><i class="fa fa-whatsapp"></i> <span>Telefono: <a href="tel:+543416422343">+54 341 6422343</a></span></li>
                                        <li><i class="fa fa-phone"></i> <span>Telefono: <a href="tel:+543414555129">+54 341 4555129</a></span></li>
                                        <li><i class="fa fa-envelope-o"></i> <span>Email : <a href="mailto:ventas@meridianosoft.com.ar">ventas@meridianosoft.com.ar</a></span>
                                        </li>
                                    </ul>
                                </div>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2817.505867466506!2d-60.69530512573227!3d-32.882353485431054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b65396eea63219%3A0xe9eaa600b7a5946c!2sPje.%20Williams%203683%2C%20S2000%20Rosario%2C%20Santa%20Fe!5e0!3m2!1ses-419!2sar!4v1587838362545!5m2!1ses-419!2sar" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--contact us section end-->

        
        
       
        
        
        <!--start footer section-->
        <footer class="bg-secondary footer-section ptb-50">
            <div class="footer-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-4 col-sm-6">
                                <div class="footer-single-col">
                                    <h6>Index</h6>
                                    <ul class="footer-link-list">
                                        <li><a href="#inicio">inicio</a></li>
                                        <li><a href="#Empresa">Empresa</a></li>
                                        <li><a href="#Producto">Producto</a></li>
                                        <li><a href="#Funciones">Funciones</a></li>
                                        <li><a href="#Clientes">Clientes</a></li>
                                        <li><a href="#Contacto">Contacto</a></li>
                                    </ul>

                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6">
                                <div class="footer-single-col">
                                    <h6>Contacto</h6>
                                    <ul class="footer-link-list">
                                         <li><i class="fa fa-map-marker"></i> <span>Rosario, Santa Fe</span>
                                        </li>
                                        <li><span><a href="tel:+543416422343"><i class="fa fa-phone"></i> +54 341 6422343</a></span></li>
                                        <li><span><a href="tel:+543414555129"><i class="fa fa-phone"></i> +54 341 4555129</a></span></li>
                                        <li><span><a href="mailto:ventas@meridianosoft.com.ar"><i class="fa fa-envelope-o"></i> ventas@meridianosoft.com.ar</a></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-single-col">
                                <img src="img/logo-MeridianoCompleto.png" alt="footer logo">
                                <div class="copyright-text">
                                    <p>&copy; copyright <a href="https://meridianosoft.com.ar">Meridianosoft</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--end footer section-->

    </div><!--end main content inner-->
</div>
<!--end main container -->


<!-- Preloader -->
<div id="preloader">
    <div id="status">
        <div class="softo-preloader"></div>
    </div>
</div>
<!--end preloader-->

<!--=========== all js file link ==============-->

<!-- main jQuery -->
<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

<!-- bootstrap core js -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- smothscroll -->
<script type="text/javascript" src="{{ asset('js/jquery.easeScroll.min.js') }}"></script>

<!--owl carousel-->
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>

<!-- scrolling nav -->
<script type="text/javascript" src="{{ asset('js/jquery.easing.min.js') }}"></script>

<!--fullscreen background video js-->
<script type="text/javascript" src="{{ asset('js/jquery.mb.ytplayer.min.js') }}"></script>

<!--typed js -->
<script type="text/javascript" src="{{ asset('js/typed.min.js') }}"></script>

<!--magnific popup js-->
<script type="text/javascript" src="{{ asset('js/magnific-popup.min.js') }}"></script>

<!-- custom script -->
<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

</body>
</html>
