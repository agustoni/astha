<div class="row" id="bidding-form">
	<div class="offset-sm-2 offset-md-2 offset-lg-3 offset-xl-3 col-12 col-sm-8 col-md-8 col-lg-6 col-xl-6">
		<center>
			<!-- <span class="font-weight-bold" style="font-size: 2em">ASHTA</span><br>
			<span style="font-size: 1em">DISTRICT 8</span> -->
			<img class="img-fluid" src="../web/img/ASHTA Lockup Black.png">

			<h2>
				NAMA ITEM<br>
				Last Bid<br>
				Rp <?= number_format($model ? $model->bid : 0, 0, "", ".") ?>
			</h2>

			<span>Put your bid min Rp <?= number_format("500000",0,"",".") ?> above last bid</span>
		</center>

		<form method="POST" action="item-a">
			<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
			<table class="table-borderless mt-3 mx-auto">
				<tr>
					<th style="padding-right:5%;width: 40%">Name</th>
					<td>
						<input id="input-name" name="name" style="border-width: 2px !important;"class="form-control border-secondary" required>
					</td>
				</tr>
				<tr>
					<th style="padding-right:5%;width: 40%">Phone Number</th>
					<td>
						<input id="input-phone" name="phone" style="border-width: 2px !important;"class="form-control border-secondary isNumber" required>
					</td>
				</tr>
				<tr>
					<th style="padding-right:5%;width: 40%">Bid</th>
					<td>
						<input id="input-bid" name="bid" style="border-width: 2px !important;" class="form-control border-secondary isNumber" required>
					</td>
				</tr>
			</table>

			<center>
				<input id="btn-submit" style="border-width: 3px !important;" type="submit" class="btn btn-light border-secondary mt-4" name="submit">
			</center>
		</form>
	</div>
</div>
<script>
	var bid = <?= $model ? $model->bid : 0 ?>;

	$("#btn-submit").click(function(){
		var input_bid = $('#input-bid').val() ? $('#input-bid').val() : 0

		if(input_bid >= 500000){
			if(input_bid <= bid){
				alert('Bid value must be higher than the last bid')
				return false
			}
		}else{
			alert('Bid value min Rp 500.000')
			return false
		}
	})

	// $('#bidding-form').on('keypress', '#input-phone', function (evt){
 //        evt = (evt) ? evt : window.event
 //        var charCode = (evt.which) ? evt.which : evt.keyCode

 //        if (charCode != 43 && (charCode < 48 || charCode > 57)) {
 //            return false
 //        }

 //        return true
 //    })

	$('#bidding-form').on('keypress', '.isNumber', function (evt){
        evt = (evt) ? evt : window.event
        var charCode = (evt.which) ? evt.which : evt.keyCode

        if (charCode < 48 || charCode > 57) {
            return false
        }

        return true
    })
</script>