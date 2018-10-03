<?php if(!empty($reviews) && pt_is_module_enabled('reviews')){ ?>
    <div id="REVIEWS">
        <div class="panel panel-default">
            <button type="button" class="collapsebtn last go-text-right collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false">
               <?php echo trans('0396');?><span class="collapsearrow"></span>
               <a data-toggle="collapse" data-parent="#accordion" class="text-link pull-right" style="margin-right: 30px;" href="#ADDREVIEW"> <?php echo trans('083');?></a>
            </button>
            <div id="collapse4" class="collapse" aria-expanded="false">
                <div class="panel-body">
                    <div class="block-process-evaluate block-process-evaluate2">
                        <div class="clearfix">
                            <div class="lft">
                                <div class="circle-evaluate c100 p<?php echo $avgReviews->overall * 10;?>">
                                    <span>
                                        <small><?php echo $avgReviews->overall;?></small>
                                        <hr>
                                        <small>10</small>
                                    </span>
                                    <div class="slice">
                                        <div class="bar"></div>
                                        <div class="fill"></div>
                                    </div>
                                </div><!-- circle-evaluate -->
                                <div class="clearfix"></div>
                                <p class="andes purple size25 text-center" style="margin-top: 10px;">&ldquo;<?php echo $avgOverall[review_overall_level($avgReviews->overall)][0]; ?>&rdquo;</p>
                            </div>
                            <div class="rgt">
                                <div class="block-scores row">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-12">
                                            <div class="hs_star-rating">
                                                <p class="andes">Đáng giá tiền</p>
                                                <div class="star-rating__wrap">
                                                    <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-1" title="1 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-2" title="2 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-3" title="3 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-4" title="4 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-5" title="5 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-6" type="radio" name="rating" value="6">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-6" title="6 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-7" type="radio" name="rating" value="7">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-7" title="7 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-8" type="radio" name="rating" value="8">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-8" title="8 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-9" type="radio" name="rating" value="9">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-9" title="9 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-10" type="radio" name="rating" value="10">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-10" title="10 out of 10 stars"></label>
                                                </div>
                                                <div class="start-rating_wrap_comment">
                                                    <span class="andes">8/10</span>
                                                    <span class="andes">(Rất tốt)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-sm-12">
                                            <div class="hs_star-rating">
                                                <p class="andes">Đáng giá tiền</p>
                                                <div class="star-rating__wrap">
                                                    <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-1" title="1 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-2" title="2 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-3" title="3 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-4" title="4 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-5" title="5 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-6" type="radio" name="rating" value="6">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-6" title="6 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-7" type="radio" name="rating" value="7">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-7" title="7 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-8" type="radio" name="rating" value="8">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-8" title="8 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-9" type="radio" name="rating" value="9">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-9" title="9 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-10" type="radio" name="rating" value="10">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-10" title="10 out of 10 stars"></label>
                                                </div>
                                                <div class="start-rating_wrap_comment">
                                                    <span class="andes">8/10</span>
                                                    <span class="andes">(Rất tốt)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-12">
                                            <div class="hs_star-rating">
                                                <p class="andes">Đáng giá tiền</p>
                                                <div class="star-rating__wrap">
                                                    <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-1" title="1 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-2" title="2 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-3" title="3 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-4" title="4 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-5" title="5 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-6" type="radio" name="rating" value="6">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-6" title="6 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-7" type="radio" name="rating" value="7">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-7" title="7 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-8" type="radio" name="rating" value="8">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-8" title="8 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-9" type="radio" name="rating" value="9">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-9" title="9 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-10" type="radio" name="rating" value="10">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-10" title="10 out of 10 stars"></label>
                                                </div>
                                                <div class="start-rating_wrap_comment">
                                                    <span class="andes">8/10</span>
                                                    <span class="andes">(Rất tốt)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-sm-12">
                                            <div class="hs_star-rating">
                                                <p class="andes">Đáng giá tiền</p>
                                                <div class="star-rating__wrap">
                                                    <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-1" title="1 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-2" title="2 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-3" title="3 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-4" title="4 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-5" title="5 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-6" type="radio" name="rating" value="6">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-6" title="6 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-7" type="radio" name="rating" value="7">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-7" title="7 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-8" type="radio" name="rating" value="8">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-8" title="8 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-9" type="radio" name="rating" value="9">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-9" title="9 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-10" type="radio" name="rating" value="10">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-10" title="10 out of 10 stars"></label>
                                                </div>
                                                <div class="start-rating_wrap_comment">
                                                    <span class="andes">8/10</span>
                                                    <span class="andes">(Rất tốt)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-12">
                                            <div class="hs_star-rating">
                                                <p class="andes">Đáng giá tiền</p>
                                                <div class="star-rating__wrap">
                                                    <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-1" title="1 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-2" title="2 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-3" title="3 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-4" title="4 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-5" title="5 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-6" type="radio" name="rating" value="6">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-6" title="6 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-7" type="radio" name="rating" value="7">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-7" title="7 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-8" type="radio" name="rating" value="8">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-8" title="8 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-9" type="radio" name="rating" value="9">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-9" title="9 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-10" type="radio" name="rating" value="10">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-10" title="10 out of 10 stars"></label>
                                                </div>
                                                <div class="start-rating_wrap_comment">
                                                    <span class="andes">8/10</span>
                                                    <span class="andes">(Rất tốt)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-sm-12">
                                            <div class="hs_star-rating">
                                                <p class="andes">Đáng giá tiền</p>
                                                <div class="star-rating__wrap">
                                                    <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-1" title="1 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-2" title="2 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-3" title="3 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-4" title="4 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-5" title="5 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-6" type="radio" name="rating" value="6">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-6" title="6 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-7" type="radio" name="rating" value="7">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-7" title="7 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-8" type="radio" name="rating" value="8">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-8" title="8 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-9" type="radio" name="rating" value="9">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-9" title="9 out of 10 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-10" type="radio" name="rating" value="10">
                                                    <label class="star-rating__ico fa fa-square-o fa-lg" for="star-rating-10" title="10 out of 10 stars"></label>
                                                </div>
                                                <div class="start-rating_wrap_comment">
                                                    <span class="andes">8/10</span>
                                                    <span class="andes">(Rất tốt)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i = 0; foreach ($avgReviews->avgMark as $index => $mark) { ?>
                                        <?php if ($i == 0 || $i == 3) { ?>
                                        <!-- <div class="col-sm-6 col-sm-12"> -->
                                        <?php } ?>
                                            <!-- <div class="block-progress"> -->
                                                <!-- <label class="text-left andes"><?php echo $avgOverall[$index][0]; ?>: <span class="purple"><?php echo $avgOverall[$index][1]; ?></span></label> -->
                                                <!-- <div class="progress-inner"> -->
                                                    <!-- <div class="progress">
                                                        <div class="progress-bar progress-bar-primary go-right" role="progressbar" aria-valuenow="<?php echo $mark; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($mark / $avgReviews->totalReviews) * 100; ?>%">
                                                            <span class="sr-only"></span>
                                                        </div>
                                                    </div> --><!-- progress -->
                                                    <!-- <span class="txt">(<?php echo $mark; ?> đánh giá)</span> -->
                                                <!-- </div> -->
                                            <!-- </div> -->
                                        <?php if ($i == 2 || $i == 5) { ?>
                                        <!-- </div> -->
                                        <!-- col-sm-6 col-sm-12 -->
                                        <?php } ?>
                                    <?php $i++; } ?>
                                </div>
                                <!-- rows -->
                            </div>
                        </div>
                    </div>
                    <?php if(!empty($reviews) && pt_is_module_enabled('reviews')){
                        foreach($reviews as $rev){ //echo "<pform-control-cus inputcouponre>";print_r($rev);echo "</pre>"; ?>
                            <div class="item-review clearfix">
                                <div class="clearfix">
                                    <div class="lft">
                                        <div class="cell">
                                            <div class="customer <?php echo $rev->review_id;?>">
                                                <div class="circle-evaluate c100 p<?php echo $rev->review_overall * 10;?>">
                                                    <span>
                                                        <small><?php echo $rev->review_overall;?> </small>
                                                        <hr>
                                                        <small>10</small>
                                                    </span>
                                                    <div class="slice">
                                                        <div class="bar"></div>
                                                        <div class="fill"></div>
                                                    </div>
                                                </div>
                                            </div><!-- customer -->
                                            <div class="item-review-info">
                                                <p class="andes purple size25"><strong class="go-right"><?php echo $rev->review_name;?> &nbsp;</strong></p>
                                                <p class="text-muted andes">Đã ở vào ngày: <small><?php echo pt_show_date_php($rev->review_date);?></small></p>
                                                <p class="text-muted andes">Ngày đánh giá: <small><?php echo pt_show_date_php($rev->review_date);?></small></p>
                                            </div><!-- item-review-info -->
                                        </div>
                                    </div>
                                    <div class="rgt">
                                        <p class="andes size25 text-center">&ldquo;<?php echo $avgOverall[review_overall_level($rev->review_overall)][0]; ?>&rdquo;</p>
                                        <div class="comment andes">"<?php echo character_limiter($rev->review_comment,1000);?>"</div>
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-12 hidden">
                                                <div class="block-progress block-progress2">
                                                    <label class="text-left andes"><?php echo trans('033');?></label>
                                                    <div class="progress-inner">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-primary go-right" role="progressbar" aria-valuenow="20"
                                                                aria-valuemin="0" aria-valuemax="50" style="width: <?php echo $rev->review_facilities * 10;?>%">
                                                                <span class="sr-only"></span>
                                                            </div>
                                                        </div><!-- progress -->
                                                        <span class="txt txt2"><?php echo $rev->review_facilities ;?></span>
                                                    </div>
                                                </div>
                                                <div class="block-progress block-progress2">
                                                    <label class="text-left andes"><?php echo trans('0722');?></label>
                                                    <div class="progress-inner">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-primary go-right" role="progressbar" aria-valuenow="<?php echo $avgReviews->comfort;?>"
                                                                aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rev->review_comfort * 10;?>%">
                                                                <span class="sr-only"></span>
                                                            </div>
                                                        </div><!-- progress -->
                                                        <span class="txt txt2"><?php echo $rev->review_comfort ;?></span>
                                                    </div>
                                                </div>
                                                <div class="block-progress block-progress2">
                                                    <label class="text-left andes"><?php echo trans('0720');?></label>
                                                    <div class="progress-inner">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-primary go-right" role="progressbar" aria-valuenow="<?php echo $avgReviews->anuong;?>"
                                                                aria-valuemin="0" aria-valuemax="10" style="width: <?php echo $rev->review_anuong * 10;?>%">
                                                                <span class="sr-only"></span>
                                                            </div>
                                                        </div><!-- progress -->
                                                        <span class="txt txt2"><?php echo $rev->review_anuong ;?></span>
                                                    </div>
                                                </div>
                                            </div><!-- col-sm-6 col-sm-12 -->
                                            <div class="col-sm-6 col-sm-12 hidden">
                                                <div class="block-progress block-progress2">
                                                    <label class="text-left andes"><?php echo trans('034');?></label>
                                                    <div class="progress-inner">
                                                        <div class="progress">
                                                        <div class="progress-bar progress-bar-primary go-right" role="progressbar" aria-valuenow="<?php echo $avgReviews->staff;?>"
                                                                aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rev->review_staff * 10;?>%">
                                                                <span class="sr-only"></span>
                                                            </div>
                                                        </div><!-- progress -->
                                                        <span class="txt txt2"><?php echo $rev->review_staff ;?></span>
                                                    </div>
                                                </div>
                                                <div class="block-progress block-progress2">
                                                    <label class="text-left andes"><?php echo trans('032');?></label>
                                                    <div class="progress-inner">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-primary go-right" role="progressbar" aria-valuenow="<?php echo $avgReviews->location;?>"
                                                                aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rev->review_location * 10;?>%">
                                                                <span class="sr-only"></span>
                                                            </div>
                                                        </div><!-- progress -->
                                                        <span class="txt txt2"><?php echo $rev->review_location ;?></span>
                                                    </div>
                                                </div>
                                                <div class="block-progress block-progress2">
                                                    <label class="text-left andes"><?php echo trans('030');?></label>
                                                    <div class="progress-inner">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-primary go-right" role="progressbar" aria-valuenow="<?php echo $avgReviews->clean;?>"
                                                                aria-valuemin="0" aria-valuemax="10" style="width: <?php echo $rev->review_clean * 10;?>%">
                                                                <span class="sr-only"></span>
                                                            </div>
                                                        </div><!-- progress -->
                                                        <span class="txt txt2"><?php echo $rev->review_clean ;?></span>
                                                    </div>
                                                </div>
                                            </div><!-- col-sm-6 col-sm-12 -->
                                        </div>
                                    </div>
                                </div><!-- panel-body -->
                            </div><!-- panel-body -->
                        <?php }
                    } ?>
                    <div class="viewmore">
                        <a href="#" title="" class="text-link">Xem thêm đánh giá</a>
                    </div>
                </div><!-- panel-body -->
            </div>
        </div>
    </div>
<?php } ?>