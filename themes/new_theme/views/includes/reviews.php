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
                                    <?php $i = 0; foreach ($avgReviews->avgMark as $index => $mark) { ?>
                                        <?php if ($i == 0 || $i == 3) { ?>
                                        <div class="col-sm-6 col-sm-12">
                                        <?php } ?>
                                            <div class="block-progress">
                                                <label class="text-left andes"><?php echo $avgOverall[$index][0]; ?>: <span class="purple"><?php echo $avgOverall[$index][1]; ?></span></label>
                                                <div class="progress-inner">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-primary go-right" role="progressbar" aria-valuenow="<?php echo $mark; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($mark / $avgReviews->totalReviews) * 100; ?>%">
                                                            <span class="sr-only"></span>
                                                        </div>
                                                    </div><!-- progress -->
                                                    <ul class="hs_progress">
                                                        <li>1</li>
                                                        <li>2</li>
                                                        <li>3</li>
                                                        <li>4</li>
                                                        <li>5</li>
                                                        <li>6</li>
                                                        <li>7</li>
                                                        <li>8</li>
                                                        <li>9</li>
                                                        <li>10</li>
                                                    </ul>
                                                    <fieldset>
                                                        <span class="star-cb-group">
                                                        <input type="radio" id="rating-10" name="rating" value="10">
                                                        <label for="rating-10">10</label>
                                                        <input type="radio" id="rating-10" name="rating" value="10">
                                                        <label for="rating-9">9</label>
                                                        <input type="radio" id="rating-8" name="rating" value="8">
                                                        <label for="rating-8">8</label>
                                                        <input type="radio" id="rating-7" name="rating" value="7">
                                                        <label for="rating-7">7</label>
                                                        <input type="radio" id="rating-6" name="rating" value="6">
                                                        <label for="rating-6">6</label>
                                                        <input type="radio" id="rating-5" name="rating" value="5">
                                                        <label for="rating-5">5</label>
                                                        <input type="radio" id="rating-4" name="rating" value="4" checked="checked">
                                                        <label for="rating-4">4</label>
                                                        <input type="radio" id="rating-3" name="rating" value="3">
                                                        <label for="rating-3">3</label>
                                                        <input type="radio" id="rating-2" name="rating" value="2">
                                                        <label for="rating-2">2</label>
                                                        <input type="radio" id="rating-1" name="rating" value="1">
                                                        <label for="rating-1">1</label>
                                                        <input type="radio" id="rating-0" name="rating" value="0" class="star-cb-clear">
                                                        <label for="rating-0">0</label>
                                                        </span>
                                                    </fieldset>
                                                    <span class="txt">(<?php echo $mark; ?> đánh giá)</span>
                                                </div>
                                            </div>
                                        <?php if ($i == 2 || $i == 5) { ?>
                                        </div><!-- col-sm-6 col-sm-12 -->
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