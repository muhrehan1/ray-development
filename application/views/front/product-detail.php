<?php 
$category_image = one('category',array('category_id' => $record->category_id),'category_image');
if(!empty($category_image)){ $category_image = $category_image; } else { $category_image = "Living.jpg"; }
?>
<div class="page-banner-section section bg-image" data-bg="<?php echo base_url('uploads/category/').$category_image; ?>">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="page-banner text-center">
                            <h2><?php echo name_id('category',$record->category_id)?></h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Page Banner Section End -->
<div id="alertdiv"></div>

        <!-- Single Product Section Start -->
        <div class="single-product-section section pb-100 pb-lg-80 pb-md-70 pb-sm-30 pb-xs-20">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-area">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Product Details Left -->
                                    <div class="product-details-left">
                                        <div class="product-details-images slider-lg-image-1 tf-element-carousel"
                                            data-slick-options='{
                                            "slidesToShow": 1,
                                            "slidesToScroll": 1,
                                            "infinite": true,
                                            "asNavFor": ".slider-thumbs-1",
                                            "arrows": false,
                                            "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                            "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                            }'>
                                                                                        <div class="lg-image">
                                                <img src="<?php echo base_url('uploads/product/').$record->product_image; ?>" alt="">
                                                <a href="<?php echo base_url('uploads/product/').$record->product_image; ?>"
                                                    class="popup-img venobox" data-gall="myGallery"><i
                                                        class="fa fa-expand"></i></a>
                                            </div>
                                                                                     
                                           
                                        </div>
                                        <div class="product-details-thumbs slider-thumbs-1 tf-element-carousel"
                                            data-slick-options='{
                                            "slidesToShow": 4,
                                            "slidesToScroll": 1,
                                            "infinite": true,
                                            "focusOnSelect": true,
                                            "asNavFor": ".slider-lg-image-1",
                                            "arrows": false,
                                            "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                            "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                            }' data-slick-responsive='[
                                            {"breakpoint":991, "settings": {
                                                "slidesToShow": 3
                                            }},
                                            {"breakpoint":767, "settings": {
                                                "slidesToShow": 4
                                            }},
                                            {"breakpoint":479, "settings": {
                                                "slidesToShow": 2
                                            }}
                                        ]'>

                                                                                     <div class="sm-image"><img
                                                    src="<?php echo base_url('uploads/product/').$record->product_image; ?>"
                                                    alt="product image thumb"></div>
                                                                                       
                                        </div>
                                    </div>
                                    <!--Product Details Left -->
                                </div>
                                <div class="col-md-6">
                                    <!--Product Details Content Start-->
                                    <div class="product-details-content">
                                       
                                        <h2><?php echo $record->product_name; ?> - <small><?php echo $record->vendor_sku; ?></small></h2>
                                       <!--  <div class="single-product-reviews">
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star active"></i>
                                            <i class="fa fa-star-o"></i>
                                            <a class="review-link" href="#">(1 customer review)</a>
                                        </div> -->
                                        <div class="single-product-price">
                                            <span class="price new-price">$<?php echo $record->new_cost; ?></span>
                                            <!-- <span class="regular-price">$77.00</span> -->
                                        </div>
                                        <div class="product-description">
                                            <p><?php echo $record->product_descripition; ?></p>
                                        </div>
                                        <div class="single-product-quantity" >
                                            <form class="add-quantity" action="#">
                                                <div class="product-quantity">
                                                    <input value="1" type="number" id="qty">
                                                </div>
                                                <div class="add-to-link">
                                                    <button type="button" class="btn" data-id="534" data-variant="no" onclick="addcart(this);"><i class="ion-bag"></i> add to cart</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="wishlist-compare-btn">
                                            <a href="javascript:void(0);" class="wishlist-btn">Add to Wishlist</a>
                                           <!--  <a href="#" class="add-compare">Compare</a> -->
                                        </div>
                                        <div class="product-meta">
                                            <span class="posted-in">
                                                Categories:
                                                <span style="font-weight: 400;text-transform: capitalize;"><?php echo name_id('category',$record->category_id)?>,<?php echo name_id('sub_category',$record->sub_category_id)?></span>
                                            </span>
                                        </div>
                                        
                                    </div>
                                    <!--Product Details Content End-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product Section End -->

        <!--Product Description Review Section Start-->
        <div class="product-description-review-section section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-review-tab">
                            <!--Review And Description Tab Menu Start-->
                            <ul class="nav dec-and-review-menu">
                                <li>
                                    <a class="active" data-toggle="tab" href="#description" style="line-height: 40px !important;">Description</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews" style="line-height: 40px !important;">Details</a>
                                </li>
                            </ul>
                            <!--Review And Description Tab Menu End-->
                            <!--Review And Description Tab Content Start-->
                            <div class="tab-content product-review-content-tab" id="myTabContent-4">
                                <div class="tab-pane fade active show" id="description">
                                    <div class="single-product-description">
                                        <p><?php echo $record->product_descripition; ?></p>
                                        

                                         <ul style="list-style: disc; margin-left: 10px;">
                                            <li><?php echo $record->feature_one; ?></li>
                                            <li><?php echo $record->feature_two; ?></li>
                                            <li><?php echo $record->feature_three; ?></li>
                                            <li><?php echo $record->feature_four; ?></li>      
                                            <li><?php echo $record->feature_five; ?></li>   
                                        </ul>                                                                                                                                                                                                                                                                                                                       </ul>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews">
                                    <div class="review-page-comment">
                                       
                                        <table style="width: 70%;">
                                            <tbody class="product_des">
                                                <tr>
                                                    <th><h2>BRAND</h2></th>
                                                    <td><h2 style="font-weight: normal;"><?php echo $record->brand; ?></h2></td>
                                                </tr>
                                                <tr>
                                                    <th><h2>COLOR/FINISH</h2></th>
                                                    <td><h2 style="font-weight: normal;"><?php echo $record->color; ?></h2></td>
                                                </tr>
                                                <tr>
                                                    <th><h2>MATERIAL</h2></th>
                                                    <td><h2 style="font-weight: normal;"><?php echo $record->primary_material; ?></h2></td>
                                                </tr>
                                                <tr>
                                                    <th><h2>FABRIC</h2></th>
                                                    <td><h2 style="font-weight: normal;"><?php echo $record->fabric_content; ?></h2></td>
                                                </tr>
                                                                                                                                                                                                                                                <tr>
                                                    <th><h2>WIDTH</h2></th>
                                                    <td><h2 style="font-weight: normal;" class="width"><?php echo $record->actual_width; ?></h2></td>
                                                </tr>
                                                <tr>
                                                    <th><h2>HEIGHT</h2></th>
                                                    <td><h2 style="font-weight: normal;" class="height"><?php echo $record->actual_height; ?></h2></td>
                                                </tr>
                                                <tr>
                                                    <th><h2>WEIGHT</h2></th>
                                                    <td><h2 style="font-weight: normal;" class="height"><?php echo $record->actual_weight; ?></h2></td>
                                                </tr>
                                                <tr>
                                                    <th><h2>PRODUCT DIMENSION</h2></th>
                                                    <td><h2 style="font-weight: normal;" class="dimension"><?php echo $record->actual_width; ?>W X <?php echo $record->actual_length; ?>D X <?php echo $record->actual_height; ?>H</h2></td>
                                                </tr>
                                                                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--Review And Description Tab Content End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Product Description Review Section Start-->

                <!--Product section start-->
        <div class="product-section section">
            <div class="container  sb-border pb-95 pb-lg-75 pb-md-65 pb-sm-55 pb-xs-45">

                <div class="row">
                    <div class="col">
                        <div class="section-title st-border mb-20 pt-20 text-center">
                            <h2>Related Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row tf-element-carousel" data-slick-options='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "infinite": true,
                    "arrows": true,
                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                    }' data-slick-responsive='[
                    {"breakpoint":1199, "settings": {
                    "slidesToShow": 3
                    }},
                    {"breakpoint":992, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint":768, "settings": {
                    "slidesToShow": 2
                    }},
                    {"breakpoint":576, "settings": {
                    "slidesToShow": 1,
                    "arrows": false,
                    "autoplay": true
                    }}
                    ]'>
                    <?php if(!empty($latestpro)): $i=1; foreach($latestpro as $latest): ?>
                     <div class="col">
                        <!--  Single Grid product Start -->
                        <div class="single-grid-product mb-30">
                            <div class="product-image">
                                <a href="<?php echo base_url('product-details/').$latest->vendor_sku; ?>">
                                    <img src="<?php echo base_url('uploads/product/').$latest->product_image; ?>" class="img-fluid" alt="">
                                    <img src="<?php echo base_url('uploads/product/').$latest->product_image; ?>" class="img-fluid" alt="">
                                </a>
                                <div class="product-action d-flex justify-content-between">
                                    <a class="product-btn text-center" href="<?php echo base_url('product-details/').$latest->vendor_sku; ?>" style="width: 100px;margin-right:0px;">View </a>
                                    <ul class="d-flex">
                                        <li>
                                            <a href="javascript:void();" data-id="162" onclick="wishlist(this);"><i class="ion-android-favorite-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="<?php echo base_url('product-details/').$latest->vendor_sku; ?>"><?php echo $latest->product_name; ?></a></h3>
                                <div class="product-category-rating">
                                    <span class="category">
                                        <a href="<?php echo base_url('product-details/').$latest->vendor_sku; ?>"><?php echo $latest->vendor_sku; ?></a>
                                    </span>
                                </div>
                                <p class="product-price">
                                    <span class="discounted-price">$<?php echo $latest->new_cost?></span>
                                </p>
                            </div>
                        </div>
                        <!--  Single Grid product End -->
                    </div>
                    <?php $i++; endforeach; endif; ?>                    
                </div>

            </div>
        </div>
        <!--Product section end-->

            
       