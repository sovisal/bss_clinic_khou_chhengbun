<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Prescription</title>
		{{ Html::style('/css/bootstrap3.css') }}
		{{ Html::style('/css/custom-style.css') }}
		{{ Html::style('/css/invoice-print-style.css') }}
		<style>
			img{
				max-width: 100%;
			}
			@page { size: 21cm 29.7cm;}
		</style>
	</head>
	<body>

		{!! $prescription_preview !!}

	</body>
 </html>