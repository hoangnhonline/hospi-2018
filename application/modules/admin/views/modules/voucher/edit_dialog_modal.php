
<?php foreach ($voucher as $cop) { ?>
	<!--PHPTravels Edit voucher modal -->
	<div class="modal fade" id="editCop<?php echo $cop->id; ?>" tabindex="" role="dialog" aria-labelledby="voucherModal" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit voucher Code "<?php echo $cop->code; ?>"</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" method="POST" id="editvoucher<?php echo $cop->id; ?>" action="" onsubmit="return false;">
						<div class="">
							<div class="">
								<div class="panel-body">


									<div class="spacer20px">
										<div class="col-lg-5">
											<div class="well">
												<div class="form-group">
													<label class="col-md-4 control-label">Status</label>
													<div class="col-md-8">
														<select class="form-control" id="#" name="status">
															<option value="Yes" <?php makeSelected($cop->status, 'Yes'); ?> >
																Enable
															</option>
															<option value="No" <?php makeSelected($cop->status, 'No'); ?> >
																Disable
															</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label">voucher type</label>
													<div class="col-md-8">
														<select data-placeholder="Select" class="form-control" name="type">
															<option value="VND" <?php if ($cop->type == "fixed") {
																echo 'selected';
															} ?> >Fixed
															</option>
															<option value="%" <?php if ($cop->type == "percentage") {
																echo 'selected';
															} ?> >Percentage
															</option>

														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label">Value</label>
													<div class="col-md-4">
														<input type="text" placeholder="Value" class="form-control" name="rate" id="rate" value="<?php echo $cop->value; ?>"/>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label">Max. Uses</label>
													<div class="col-md-6">
														<input type="text" placeholder="Maximum Uses" class="form-control" name="max" id="max" value="<?php echo $cop->maxuses; ?>"/>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label">Start Date</label>
													<div class="col-md-8">
														<input type="text" placeholder="Start Date" class="form-control dpd1" name="startdate" id="stardate" value="<?php echo pt_show_date_php($cop->startdate); ?>"/>
													</div>
												</div>

												<div class="form-group">
													<label class="col-md-4 control-label">Exp. Date</label>
													<div class="col-md-8">
														<input type="text" placeholder="Expiration Date" class="form-control dpd2" name="expdate" id="expdate" value="<?php echo pt_show_date_php($cop->expirationdate); ?>"/>
													</div>
												</div>

											</div>
										</div>
										<div class="col-lg-7">
											<div class="col-lg-12 well">
												<div class="input-group">
													<?php echo $cop->code; ?>
												</div>
											</div>
										</div>

										<div class="col-lg-7">
											<div class="col-lg-12 well">
												<h5>Assign Globally</h5>
												<div class="input-group">
													<?php foreach ($modules as $mod => $items): ?>
														<input type="checkbox" name="allmodules[]" value="<?php echo $mod; ?>" <?php if (pt_voucherAssignedAllItems($cop->id, $mod)) {
															echo "checked";
														} ?> > All <?php echo ucfirst($mod); ?> &nbsp;
													<?php endforeach; ?>

												</div>
											</div>
										</div>

										<?php foreach ($modules as $mod => $items): ?>
											<div class="col-md-12">
												<div class="form-group">
													<label class="required">Assign
														to <?php echo ucfirst($mod); ?></label>
													<select class="chosen-multi-select" name="items[<?php echo $mod; ?>][]" id="" multiple>
														<?php foreach ($items as $item) { ?>
															<option value="<?php echo $item->id; ?>" <?php if (pt_voucherAssigned($cop->id, $mod, $item->id)) {
																echo "selected";
															} ?> ><?php echo $item->title; ?></option>
														<?php } ?>

													</select>
												</div>
											</div>
										<?php endforeach; ?>

									</div>


								</div>
							</div>
						</div>
						<input type="hidden" name="voucherid" value="<?php echo $cop->id; ?>"/>
					</form>
				</div>
				<div id="voucher_result<?php echo $cop->id; ?>"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary editvoucher" id="<?php echo $cop->id; ?>">
						<i class="fa fa-save"></i> Update
					</button>
				</div>
			</div>
		</div>
	</div>
<?php } ?>


<script type="text/javascript">
    $(function () {
        $(".generate").click(function () {
            var id = $(this).prop("id");
            $.post("<?php echo base_url();?>admin/voucher/generate_voucher", {}, function (resp) {
                $("#code" + id).val(resp);
            });
        });
        //add voucher
        $(".submitvoucher").on("click", function () {

            $.post("<?php echo base_url();?>admin/voucher/addvoucher", $("#addvoucher").serialize(), function (resp) {

                var response = $.parseJSON(resp);
                console.log(response);
                //  $("#voucher_result").html(response).fadeIn("slow");
                if (response.status == "success") {

                    $("#voucher_result").html("please wait....").fadeIn("slow");
                    location.reload();

                } else {

                    $("#voucher_result").html(response.msg).fadeIn("slow");

                }

            });

            setTimeout(function () {
                $("#voucher_result").fadeOut("slow");
            }, 5000);

        });

        //update voucher
        $(".editvoucher").on("click", function () {
            var id = $(this).prop('id');
            $.post("<?php echo base_url();?>admin/voucher/updatevoucher", $("#editvoucher" + id).serialize(), function (resp) {

                var response = $.parseJSON(resp);
                console.log(response);
                //  $("#voucher_result").html(response).fadeIn("slow");
                if (response.status == "success") {

                    $("#voucher_result" + id).html("please wait....").fadeIn("slow");
                    location.reload();

                } else {

                    $("#voucher_result" + id).html(response.msg).fadeIn("slow");

                }
            });

            setTimeout(function () {
                $("#voucher_result" + id).fadeOut("slow");
            }, 3000);

        });

    });
</script>

<style>
	.datepicker {
		z-index: 9999 !important;
	}
</style>