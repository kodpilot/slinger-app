
<script type="text/javascript">


	$(document).ready(function() {
		$('#dataTable').DataTable({

			"order": [[ 0, "asc" ]],
			"scrollX": true,
			"language": {
				"sDecimal":        ",",
				"sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
				"sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
				"sInfoEmpty":      "Kayıt yok",
				"sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
				"sInfoPostFix":    "",
				"sInfoThousands":  ".",
				"sLengthMenu":     "Sayfada _MENU_ kayıt göster",
				"sLoadingRecords": "Yükleniyor...",
				"sProcessing":     "İşleniyor...",
				"sSearch":         "Ara:",
				"sZeroRecords":    "Eşleşen kayıt bulunamadı",
				"oPaginate": {
					"sFirst":    "İlk",
					"sLast":     "Son",
					"sNext":     "Sonraki",
					"sPrevious": "Önceki"
				},
				"oAria": {
					"sSortAscending":  ": artan sütun sıralamasını aktifleştir",
					"sSortDescending": ": azalan sütun sıralamasını aktifleştir"
				},
				"select": {
					"rows": {
						"_": "%d kayıt seçildi",
						"0": "",
						"1": "1 kayıt seçildi"
					}
				}
			}
		});
	} );

	$(document).ready(function() {
		$('#dataTable2').DataTable({

			"order": [[ 0, "desc" ]],
			"scrollX": true,
			"language": {
				"sDecimal":        ",",
				"sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
				"sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
				"sInfoEmpty":      "Kayıt yok",
				"sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
				"sInfoPostFix":    "",
				"sInfoThousands":  ".",
				"sLengthMenu":     "Sayfada _MENU_ kayıt göster",
				"sLoadingRecords": "Yükleniyor...",
				"sProcessing":     "İşleniyor...",
				"sSearch":         "Ara:",
				"sZeroRecords":    "Eşleşen kayıt bulunamadı",
				"oPaginate": {
					"sFirst":    "İlk",
					"sLast":     "Son",
					"sNext":     "Sonraki",
					"sPrevious": "Önceki"
				},
				"oAria": {
					"sSortAscending":  ": artan sütun sıralamasını aktifleştir",
					"sSortDescending": ": azalan sütun sıralamasını aktifleştir"
				},
				"select": {
					"rows": {
						"_": "%d kayıt seçildi",
						"0": "",
						"1": "1 kayıt seçildi"
					}
				}
			}
		});
	} );


	$( function() {
		$( "#slidersTable" ).sortable({
			items: "tr",
			opacity: 0.5,
			cursor:'move',
			update: function(){
				var value = $( this ).sortable("serialize");

				$.ajax({
					url: "{{url('/slider-sirala')}}",
					data: { value:value , _token: '{{csrf_token()}}' },
					type: "POST",
					success: function(response) {



					}
				})
			}
		});

	} );

	$( function() {
		$( "#paymentsTable" ).sortable({
			items: "tr",
			opacity: 0.5,
			cursor:'move',
			update: function(){
				var value = $( this ).sortable("serialize");

				$.ajax({
					url: "{{url('/eticaret-odeme-sirala')}}",
					data: { value:value , _token: '{{csrf_token()}}' },
					type: "POST",
					success: function(response) {



					}
				})
			}
		});

	} );



		$( function() {
		$( "#cargosTable" ).sortable({
			items: "tr",
			opacity: 0.5,
			cursor:'move',
			update: function(){
				var value = $( this ).sortable("serialize");

				$.ajax({
					url: "{{url('/eticaret-kargo-sirala')}}",
					data: { value:value , _token: '{{csrf_token()}}' },
					type: "POST",
					success: function(response) {



					}
				})
			}
		});

	} );



	$( function() {
		$( "#productsTable" ).sortable({
			items: "tr",
			opacity: 0.5,
			cursor:'move',
			update: function(){
				var value = $( this ).sortable("serialize");

				$.ajax({
					url: "{{url('/panel/urunler/urun-sirala')}}",
					data: { value:value , _token: '{{csrf_token()}}' },
					type: "POST",
					success: function(response) {

						console.log(response);

					}
				})
			}
		});

	} );


	$( function() {
		$( "#categoriesTable" ).sortable({
			items: "tr",
			opacity: 0.5,
			cursor:'move',
			update: function(){
				var value = $( this ).sortable("serialize");

				$.ajax({
					url: "{{url('/eticaret-kategori-sirala')}}",
					data: { value:value , _token: '{{csrf_token()}}' },
					type: "POST",
					success: function(response) {



					}
				})
			}
		});

	} );
</script>
