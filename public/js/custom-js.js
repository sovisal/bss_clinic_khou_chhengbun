
function isArrayEqual(a, b) {
	// if length is not equal 
	if (a.length != b.length)
		return "False";
	else {
		// comapring each element of array 
		for (var i = 0; i < a.length; i++)
			if (a[i] != b[i])
				return "False";
		return "True";
	}
}

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

function loading_square(type) {
	if (type == 'add') {
		$('.loading-square').html(`<div class="sk-cube-grid">
																<div class="sk-cube sk-cube1"></div>
																<div class="sk-cube sk-cube2"></div>
																<div class="sk-cube sk-cube3"></div>
																<div class="sk-cube sk-cube4"></div>
																<div class="sk-cube sk-cube5"></div>
																<div class="sk-cube sk-cube6"></div>
																<div class="sk-cube sk-cube7"></div>
																<div class="sk-cube sk-cube8"></div>
																<div class="sk-cube sk-cube9"></div>
															</div>`);
	} else {
		$('.sk-cube-grid').remove();
	}
}

function landscapePrint() {
	var css = '@page { size: 29.7cm 21cm;}',
		head = document.head || document.getElementsByTagName('head')[0],
		style = document.createElement('style');

	style.type = 'text/css';
	style.media = 'print';
	style.class = 'custom-margin-style';

	if (style.styleSheet) {
		style.styleSheet.cssText = css;
	} else {
		style.appendChild(document.createTextNode(css));
	}

	head.appendChild(style);

	window.print();
}

function portraitPrint() {
	var css = '@page { size: 21cm 29.7cm;}',
		head = document.head || document.getElementsByTagName('head')[0],
		style = document.createElement('style');

	style.type = 'text/css';
	style.media = 'print';
	style.class = 'custom-margin-style';

	if (style.styleSheet) {
		style.styleSheet.cssText = css;
	} else {
		style.appendChild(document.createTextNode(css));
	}

	head.appendChild(style);

	window.print();
}


var datatableKH = {
	"decimal": "",
	"emptyTable": "ពុំមានទិន្នន័យឡើយ",
	"info": "បង្ហាញ _START_ ដល់ _END_ នៃ _TOTAL_ ជួរ",
	"infoEmpty": "បង្ហាញ 0 ដល់ 0 នៃ 0 ជួរ",
	"infoFiltered": "(filtered ពី _MAX_ សរុប ជួរ)",
	"infoPostFix": "",
	"thousands": ",",
	"lengthMenu": "បង្ហាញ _MENU_ ជួរ",
	"loadingRecords": "កំពុងដំណើរការ...",
	"processing": "កំពុងដំណើរការ...",
	"search": "ស្វែងរក:",
	"zeroRecords": "ពុំមានទិន្នន័យឡើយ",
	"paginate": {
		"first": "ដំបូង",
		"last": "ចុងក្រោយ",
		"next": "បន្ទាប់",
		"previous": "ថយ"
	}
};

$('input[type="checkbox"]').change(function () {
	value = $(this).is(':checked');
	$(this).val(((value == true) ? 1 : 0));
});

$('#datatables').DataTable({
	"language": (($('html').attr('lang')) ? datatableKH : {}),
	buttons: true,
	"fnDrawCallback": function (oSettings) {
		$('.BtnDelete').click(function () {
			const swalWithBootstrapButtons = Swal.mixin({
				customClass: {
					confirmButton: 'btn btn-success btn-flat ml-2 py-2 px-3',
					cancelButton: 'btn btn-danger btn-flat mr-2 py-2 px-3'
				},
				buttonsStyling: false
			})

			swalWithBootstrapButtons.fire({
				title: $('#deleteAlert').data('title'),
				text: $('#deleteAlert').data('text'),
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: $('#deleteAlert').data('btnyes'),
				cancelButtonText: $('#deleteAlert').data('btnno'),
				reverseButtons: true
			}).then((result) => {
				if (result.value) {
					$("form").submit(function (event) {
						$('button').attr('disabled', 'disabled');
					});

					$("#form-item-" + $(this).val()).submit();

				}
			})
		});
	},
});


$(".is_number").keyup(function () {
	isNumber($(this))
});

$(".is_integer").keyup(function () {
	isInteger($(this))
});

$(".is_format_integer").keyup(function () {
	isFormatInteger($(this))
});


function isNumKeyup(value) {
	value.keyup(function () {
		value.val(value.val().replace(/[^\d.]/g, ''));
	});
}

function isNumber(value) {
	value.val(value.val().replace(/[^\d.-]/g, ''));
}

function isInteger(value) {
	value.val(value.val().replace(/[^\d]/g, ''));
}

function isFormatInteger(value) {
	value.val(formatNumber(value.val().replace(/[^\d]/g, '')));
}

function formatNumber(num) {
	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}


$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})

//Initialize Select2 Elements
$('.select2').select2({
	theme: 'bootstrap4',
});

$(document).ready(function () {

	//Date picker
	$('#date_picker').datetimepicker({
		date: (($('#date_picker').val() != '') ? $('#date_picker').val() : null),
		format: 'YYYY-MM-DD',
	})

	//Date picker
	$('#date_time_picker').datetimepicker({
		icons: {
			time: 'far fa-clock',
			date: 'fa fa-calendar-alt',
		},
		date: (($('#date_time_picker').val() != '') ? $('#date_time_picker').val() : null),
		format: 'YYYY-MM-DD HH:mm:ss',
	})
});


$('.duallistbox').bootstrapDualListbox({
	selectorMinimalHeight: 300,
	nonSelectedListLabel: 'សិទ្ធិដែលពុំទាន់មាន',
	selectedListLabel: 'សិទ្ធដែលមាន',
	// preserveSelectionOnMove: 'moved',
	moveOnSelect: false,
	nonSelectedFilter: ''
});

$('.moveall').html('<i class="fa fa-angle-double-right"></i>');
$('.removeall').html('<i class="fa fa-angle-double-left"></i>');
$('.move').html('<i class="fa fa-angle-right"></i>');
$('.remove').html('<i class="fa fa-angle-left"></i>');




var a = ['', 'One ', 'Two ', 'Three ', 'Four ', 'Five ', 'Six ', 'Seven ', 'Eight ', 'Nine ', 'Ten ', 'Eleven ', 'Twelve ', 'Thirteen ', 'Fourteen ', 'Fifteen ', 'Sixteen ', 'Seventeen ', 'Eighteen ', 'Nineteen '];
var b = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

function inWords(num) {
	if ((num = num.toString()).length > 9) return 'overflow';
	n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
	if (!n) return; var str = '';
	str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
	str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
	str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
	str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
	str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) : '';
	return str;
}


function convertNumberToWords(amount) {
	var words = new Array();
	words[0] = '';
	words[1] = 'One';
	words[2] = 'Two';
	words[3] = 'Three';
	words[4] = 'Four';
	words[5] = 'Five';
	words[6] = 'Six';
	words[7] = 'Seven';
	words[8] = 'Eight';
	words[9] = 'Nine';
	words[10] = 'Ten';
	words[11] = 'Eleven';
	words[12] = 'Twelve';
	words[13] = 'Thirteen';
	words[14] = 'Fourteen';
	words[15] = 'Fifteen';
	words[16] = 'Sixteen';
	words[17] = 'Seventeen';
	words[18] = 'Eighteen';
	words[19] = 'Nineteen';
	words[20] = 'Twenty';
	words[30] = 'Thirty';
	words[40] = 'Forty';
	words[50] = 'Fifty';
	words[60] = 'Sixty';
	words[70] = 'Seventy';
	words[80] = 'Eighty';
	words[90] = 'Ninety';
	amount = amount.toString();
	var atemp = amount.split(".");
	var number = atemp[0].split(",").join("");
	var n_length = number.length;
	var words_string = "";
	if (n_length <= 9) {
		var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
		var received_n_array = new Array();
		for (var i = 0; i < n_length; i++) {
			received_n_array[i] = number.substr(i, 1);
		}
		for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
			n_array[i] = received_n_array[j];
		}
		for (var i = 0, j = 1; i < 9; i++, j++) {
			if (i == 0 || i == 2 || i == 4 || i == 7) {
				if (n_array[i] == 1) {
					n_array[j] = 10 + parseInt(n_array[j]);
					n_array[i] = 0;
				}
			}
		}
		value = "";
		for (var i = 0; i < 9; i++) {
			if (i == 0 || i == 2 || i == 4 || i == 7) {
				value = n_array[i] * 10;
			} else {
				value = n_array[i];
			}
			if (value != 0) {
				words_string += words[value] + " ";
			}
			if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
				words_string += "Crores ";
			}
			if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
				words_string += "Lakhs ";
			}
			if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
				words_string += "Thousand ";
			}
			if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
				words_string += "Hundred and ";
			} else if (i == 6 && value != 0) {
				words_string += "Hundred ";
			}
		}
		words_string = words_string.split("  ").join(" ");
	}
	return words_string;
}

function decimalToWord(n) {
	var nums = n.toString().split('.');
	var whole = convertNumberToWords(nums[0]);
	var str_dollar = ((nums[0] > 1) ? " Dollars" : " Dollar");
	if (nums.length == 2) {
		var fraction = convertNumberToWords(nums[1])
		var str_cent = ((nums[1] > 1) ? " Cents" : " Cent");
		return whole + str_dollar + ' and ' + fraction + str_cent;
	} else {
		return inWords(n) + str_cent;
	}
}
