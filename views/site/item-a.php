<div class="row" id="bidding-form">
	<div class="offset-sm-2 offset-md-2 offset-lg-3 offset-xl-3 col-12 col-sm-8 col-md-8 col-lg-6 col-xl-6">
		<center>
			<img class="img-fluid" src="../web/img/ASHTA Lockup White.png">
		</center>

		<h2 class="mb-5">NAMA ITEM</h2>
		<span class="mr-4">Current Bid</span> <span style="font-size:23px">Rp <?= number_format($model ? $model->bid : 0, 0, "", ".") ?></span>		

		<form method="POST" action="item-a" class="mt-5">
			<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
			<div class="row my-2">
				<div class="col-12">
					<input id="input-name" name="name" style=""class="form-control input-bid" placeholder="Name" required>
				</div>
			</div>

			<div class="row my-2">
				<div class="col-12">
					<input id="input-phone" name="phone" class="form-control isNumber input-bid" placeholder="Phone Number" required>
				</div>
			</div>

			<div class="row my-2">
				<div class="col-12">
					<input id="input-bid" name="bid"  class="form-control isNumber input-bid" placeholder="Bid Amount" required>
					<small>Place bid at least Rp 500.000 above current bid</small>
				</div>
			</div>

			<center>
				<button id="btn-submit" type="submit" class="btn btn-light border-secondary mt-5  mb-5" name="submit" style="width: 120px"><b>Place Bid</b></button>
			</center>
		</form>

		<div class="row mt-5 footer-section">
			<table class="table table-borderless">
				<tr>
					<td style="width: 40%;" class="">
						<i class="fa-brands fa-instagram text-white"></i>
						<i class="fa-brands fa-square-facebook text-white"></i>
						<i class="fa-brands fa-youtube text-white"></i>
						<span class="text-white">@ASTHADISTRICT8 | ASTHA.CO.ID</span>
					</td>
					<td style="width: 40%" class="text-center text-white">
						SUPPORTED BY<br><br>
						<img class="img-fluid float-left px-1" style="max-width:50px" src="../web/img/habitat 250.png">
						<img class="img-fluid float-left px-1" style="max-width:50px" src="../web/img/rebricks 250.png">
						<img class="img-fluid float-left px-1" style="max-width:50px" src="../web/img/jangjo 250.png">
					</td>
					<td class="text-center text-white" style="width: 10%;">
						POWERED BY<br><br>
						<img class="img-fluid" style="max-width:60px" src="../web/img/asri living 250.png">
					</td>
					<td class="text-center text-white" style="width: 10%;">
						A PROJECT OF<br><br>
						<img class="img-fluid" style="max-width:60px" src="../web/img/asri 250.png">
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<script>
	var bid = <?= $model ? $model->bid : 0 ?>;
	var min_bid = parseInt(bid) + 500000

	$("#btn-submit").click(function(){
		var input_bid = $('#input-bid').val() ? $('#input-bid').val() : 0

		if(input_bid > 0){
			if(input_bid < min_bid){
				alert('Bid amount min Rp '+formatNumber(min_bid))
				return false
			}
		}else{
			alert('Bid amount min Rp 500.000')
			return false
		}
	})

	$('#bidding-form').on('keypress', '.isNumber', function (evt){
        evt = (evt) ? evt : window.event
        var charCode = (evt.which) ? evt.which : evt.keyCode

        if (charCode < 48 || charCode > 57) {
            return false
        }

        return true
    })

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }
</script>