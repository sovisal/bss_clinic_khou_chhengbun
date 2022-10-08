<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Labor</title>
		{{ Html::style('/css/bootstrap3.css') }}
		{{ Html::style('/css/custom-style.css') }}
		{{ Html::style('/css/invoice-print-style.css') }}
		<style>
			img{
				max-width: 100%;
			}
			.labor-print{
				width: 21cm;
				height: 29.7cm;
			}
			@media print {
				header { position: fixed; top: 0px; left: 0px; width: 100%; padding: 50px; }
				footer { position: fixed; bottom: 0px; left: 0px; width: 100%; }
				table#table_split tr td:nth-child(1) { width: 250px; }
				table#table_split tr td:nth-child(2) { width: 80px; }
				table#table_split tr td:nth-child(3) { width: 90px; }
				table#table_split tr td:nth-child(4) { width: 200px; }
				table#table_split tr td[colspan] { width: 900px; }
				table#table_split, table#table_split tbody { page-break-inside: auto; width: 21cm; }
				table#table_split tr { display: block;  }
				table#table_split .splitter { page-break-before: always; margin-top: 370px; width: 100%; }
			}
		</style>
		@if ( $labor->type == 'blood-test')
			<style>
				.mr-1,.mx-1{margin-right:0.25rem!important}.mb-1,.my-1{margin-bottom:0.25rem!important}.ml-1,.mx-1{margin-left:0.25rem!important}.m-2{margin:0.5rem!important}.mt-2,.my-2{margin-top:0.5rem!important}.mr-2,.mx-2{margin-right:0.5rem!important}.mb-2,.my-2{margin-bottom:0.5rem!important}.ml-2,.mx-2{margin-left:0.5rem!important}.m-3{margin:1rem!important}.mt-3,.my-3{margin-top:1rem!important}.mr-3,.mx-3{margin-right:1rem!important}.mb-3,.my-3{margin-bottom:1rem!important}.ml-3,.mx-3{margin-left:1rem!important}.m-4{margin:1.5rem!important}.mt-4,.my-4{margin-top:1.5rem!important}.mr-4,.mx-4{margin-right:1.5rem!important}.mb-4,.my-4{margin-bottom:1.5rem!important}.ml-4,.mx-4{margin-left:1.5rem!important}.m-5{margin:3rem!important}.mt-5,.my-5{margin-top:3rem!important}.mr-5,.mx-5{margin-right:3rem!important}.mb-5,.my-5{margin-bottom:3rem!important}.ml-5,.mx-5{margin-left:3rem!important}
			</style>
		@endif
	</head>
	<body>
	
		{!! $labor_preview !!}

		<script src="{{ asset('js/app.js') }}"></script>
		<script type="text/javascript">
			// if ('{{ $labor->type }}' == 'blood-test') {
			// 	console.log( $('body').height() );
			// 	console.log( '1122.5196972' );

			// 	var total_height = $('body').height();
			// 	var margin = 75.590552;
			// 	var a4_height = 1122.5196972;
			// 	var origin_pages =total_height/a4_height;
			// 	var pages = Math.ceil((total_height + (origin_pages * margin))/a4_height);
			// 	var pages_height = (pages * a4_height) - (margin*pages);

			// 	console.log('Origin Pages: '+ (total_height + (origin_pages * margin))/a4_height);
			// 	console.log('Pages: '+ Math.ceil((total_height + (origin_pages * margin))/a4_height));

			// 	$('.blood-test').css({'height':pages_height+'px' });
			// }
			$(document).ready(function () {
				$('table').eq(2).attr('id', 'table_split');
				$('table#table_split').find('tr').each(function (i) {
					if (i % 30 == 0) {
						$('table#table_split').find('tr').eq(i).attr("class", "splitter");
					}
				});
			});
    	</script>
	</body>
 </html>
