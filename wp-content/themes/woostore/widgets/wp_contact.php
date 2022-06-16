<?php
if (!class_exists('wp_contact')) :
    class wp_contact extends WP_Widget
    {
        function __construct()
        {
            parent::__construct(
                'wp_contact',
                esc_html_x('* [WP] Contact', 'widget name', 'wp'),
                array(
                    'classname' => 'wp_contact',
                    'description' => esc_html__('Contact', 'wp'),
                    'customize_selective_refresh' => true
                )
            );
        }

        //Hiển thị nội dung Widget
        function widget($args, $instance)
        {
            $defaults = array('title' => '', 'description' => '', 'img_right_url' => '');
            $title = $instance['title'];
            $description = $instance['description'];
            $img_right_url = $instance['img_right_url'];
            $contact_form_id = $instance['contact_form_id'];


            echo $args['before_widget']; ?>

            <style>
                .newsleater-area:before {
                    background-image: url(<?php echo $img_right_url; ?>);
                }
            </style>

            <div class="newsleater-area mb-120" data-aos="fade-up">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Start section title -->
                            <div class="section-title">
                                <h2><?php echo $title; ?></h2>
                                <p><?php echo $description; ?></p>
                            </div>
                            <!-- End section title -->
                            <!-- Start form -->
                            <!-- <form action="#" method="post" class="subscribe-form watch">
                                <input name="email" class="widget-input" placeholder="Email address" type="email">
                                <button type="submit" class="widget-sbtn">SUBSCRIBE</button>
                            </form> -->

                            <div class="ws247-field">
                                <?php
                                if ($contact_form_id) {
                                    echo do_shortcode('[contact-form-7 id="' . $contact_form_id . '" title="Form liên hệ" html_class="subscribe-form watch"]');
                                }
                                ?>
                            </div>
                            <!-- End form -->
                        </div>
                        <div class="col-md-6"></div>
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

            if (!empty($new_instance['img_right_url'])) {
                $instance['img_right_url'] = ($new_instance['img_right_url']);
            }

            if (!empty($new_instance['contact_form_id'])) {
                $instance['contact_form_id'] = ($new_instance['contact_form_id']);
            }

            return $instance;
        }


        //Khai báo các field của Widget
        function form($instance)
        {
            $defaults = array('title' => '', 'description' => '', 'img_right_url' => '', 'contact_form_id' => '');
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

            <!-- image -->
            <?php Ws247_M_WG::helper_image_field('img_right_url', 'Image Ware Right', $this, $instance); ?>

            <!-- Contact Form 7 field -->
            <?php Ws247_M_WG::helper_contact_form7_field('contact_form_id', 'Form liên hệ', $this, $instance); ?>


<?php
        }
    }
endif;
