@extends('agro::layouts.master')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fondo animado</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="/master/css/navbar.css">
</head>
<body>
    <header class="full-width NavBarP">
		<div class="full-width NavBarP-Logo">AGRO</div>
        
		<i class="fa fa-bars visible-xs btn-menuMobile ShowMenuMobile" aria-hidden="true"></i>
	</header>

	<section class="banner">
		<div class="banner-content">
			<h1>Bienvenido a la aplicaion AGRO</h1>	
		</div>
	</section>

    
    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.1.o.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
@endsection
