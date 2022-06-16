<?php
if (!class_exists('wpshare247_product')) :
    class wpshare247_product extends WP_Widget
    {
        function __construct()
        {
            parent::__construct(
                'wpshare247_product',
                esc_html_x('* [WP247] Sản phẩm', 'widget name', 'wpshare247'),
                array(
                    'classname' => 'wpshare247_product',
                    'description' => esc_html__('Hiển thị Sản phẩm', 'wpshare247'),
                    'customize_selective_refresh' => true
                )
            );
        }

        //Chỉ cần khai báo các field tại đây và không cần làm gì thêm----------------------------------------
        function init_repeat_sortable_fields()
        {
            $arr_fields = array(
                'f_repeat_image' => array('type' => 'image', 'label' => 'Hình sản phẩm'),
                'f_repeat_link' => array('type' => 'text', 'label' => 'Link sản phẩm'),
                'f_repeat_price_1' => array('type' => 'text', 'label' => 'Giá bán'),
                'f_repeat_price_2' => array('type' => 'text', 'label' => 'Giá ban đầu'),
                'f_repeat_name' => array('type' => 'text', 'label' => 'Tên sản phẩm'),
                'f_repeat_description' => array('type' => 'textarea', 'label' => 'Mô tả sản phẩm'),
            );
            return $arr_fields;
        }
        //End Chỉ cần khai báo các field tại đây và không cần làm gì thêm----------------------------------------

        //Hiển thị nội dung Widget
        function widget($args, $instance)
        {
            $defaults = array('title' => '', 'description' => '', 'wle_repeat_sortable_data_1' => '');
            $title = $instance['title'];
            $description = $instance['description'];
            $data_field = $instance['wle_repeat_sortable_data_1'];
            $arr_data = json_decode($data_field, true);


            echo $args['before_widget']; ?>

            <div id="product" class="product-area pb-80">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <!-- Start section title -->
                            <div class="section-title text-center" data-aos="fade-up">
                                <h2><?php echo $title ?></h2>
                                <p><?php echo $description ?></p>
                            </div>
                            <!-- End section title -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="watch-model-slide">
                                <?php
                                if ($arr_data) {
                                    foreach ($arr_data as $k => $arr_item) {
                                        $f_repeat_image = $arr_item['f_repeat_image']['val'];
                                        $f_repeat_link = $arr_item['f_repeat_link']['val'];
                                        $f_repeat_price_1 = $arr_item['f_repeat_price_1']['val'];
                                        $f_repeat_price_2 = $arr_item['f_repeat_price_2']['val'];
                                        $f_repeat_name = $arr_item['f_repeat_name']['val'];
                                        $f_repeat_description = $arr_item['f_repeat_description']['val'];
                                ?>
                                        <div class="watch-model-wrap" data-aos="fade-right">
                                            <div class="single-watch-model">
                                                <!-- start model  -->
                                                <div class="model-wrap">
                                                    <div class="model-img text-center">
                                                        <img src="<?php echo $f_repeat_image ?>" alt="">
                                                        <div class="model-order">
                                                            <a href="<?php echo $f_repeat_link ?>">
                                                                <h5><i class="icofont-shopping-cart"></i>ORDER NOW</h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end model  -->
                                                <div class="model-content">
                                                    <h2>$<?php echo $f_repeat_price_1 ?> <span><?php echo $f_repeat_price_2 ?></span></h2>
                                                    <a href="<?php echo $f_repeat_link ?>">
                                                        <h3><?php echo $f_repeat_name ?></h3>
                                                    </a>
                                                    <?php echo '<ul><li>' . str_replace("\n", '</li><li><i class="icofont-arrow-right"></i>', trim($f_repeat_description)) . '</ul></li>'; ?>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
            echo $args['after_widget'];
        }

        //Cập nhật dữ liệu các field của Widget
        function update($new_instance, $old_instance)
        {
            $instance = array();

            if (!empty($new_instance['title'])) {
                $instance['title'] = ($new_instance['title']);
            }

            if (!empty($new_instance['description'])) {
                $instance['description'] = ($new_instance['description']);
            }

            if (!empty($new_instance['wle_repeat_sortable_data_1'])) {
                $instance['wle_repeat_sortable_data_1'] = ($new_instance['wle_repeat_sortable_data_1']);
            }

            return $instance;
        }


        //Khai báo các field của Widget
        function form($instance)
        {
            $defaults = array('title' => '', 'description' => '', 'wle_repeat_sortable_data_1' => '');
            $instance = wp_parse_args($instance, $defaults); ?>

            <!-- text field -->
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Tiêu đề', 'wpshare247'); ?></label>
                <input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" />
            </p>

            <!-- textarea field -->
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Mô tả', 'wpshare247'); ?></label>
                <textarea name="<?php echo esc_attr($this->get_field_name('description')); ?>" id="<?php echo esc_attr($this->get_field_id('description')); ?>" class="widefat"><?php echo esc_attr($instance['description']); ?></textarea>
            </p>

            <!-- Repeat field -->
            <?php
            $id_field = 'wle_repeat_sortable_data_1';
            wpshare247_repeat_sortable::register_field($id_field, esc_attr($this->get_field_name($id_field)), 'Slide sản phẩm', $instance, $this->init_repeat_sortable_fields());
            ?>


<?php
        }
    }
endif;
