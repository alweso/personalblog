<?php
namespace ElementorAwesomesauce\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
* @since 1.1.0
*/
class RandomTabs extends Widget_Base {

/**
* Retrieve the widget name.
*
* @since 1.1.0
*
* @access public
*
* @return string Widget name.
*/
public function get_name() {
  return 'random-tabs';
}

/**
* Retrieve the widget title.
*
* @since 1.1.0
*
* @access public
*
* @return string Widget title.
*/
public function get_title() {
  return __( 'Random Tabs', 'elementor-post-tabs' );
}

/**
* Retrieve the widget icon.
*
* @since 1.1.0
*
* @access public
*
* @return string Widget icon.
*/
public function get_icon() {
  return 'fa fa-pencil';
}

/**
* Retrieve the list of categories the widget belongs to.
*
* Used to determine where to display the widget in the editor.
*
* Note that currently Elementor supports only one category.
* When multiple categories passed, Elementor uses the first one.
*
* @since 1.1.0
*
* @access public
*
* @return array Widget categories.
*/
public function get_categories() {
  return [ 'general' ];
}

/**
* Register the widget controls.
*
* Adds different input fields to allow the user to change and customize the widget settings.
*
* @since 1.1.0
*
* @access protected
*/
protected function _register_controls() {
  $this->start_controls_section(
    'section_content',
    [
      'label' => __( 'Content', 'elementor-awesomesauce' ),
    ]
  );

  $this->add_control(
    'title',
    [
      'label' => __( 'Title', 'elementor-awesomesauce' ),
      'type' => Controls_Manager::TEXT,
      'default' => __( 'Latest posts', 'elementor-awesomesauce' ),
    ]
  );


  $this->add_control(
    'post_count',
    [
      'label' => __( 'Post count', 'elementor-awesomesauce' ),
      'type' => Controls_Manager::NUMBER,
      'default' => __( '6', 'elementor-awesomesauce' ),
    ]
  );

  $this->add_control(
    'tabs',
    [
      'label' => esc_html__('Tabs', 'digiqole'),
      'type' => Controls_Manager::REPEATER,
      'default' => [
        [
          'tab_title' => esc_html__('Add Label', 'digiqole'),
          'post_cats' => 1,
        ],
      ],
      'fields' => [
        [
          'name' => 'post_cats',
          'label' => __( 'Categories( Include )', 'elementor-pro' ),
          'type' => \Elementor\Controls_Manager::SELECT2,
          'options' => $this->post_category(),
          'label_block' => true,
          'multiple' => true,
        ],
        [   'name' => 'tab_title',
        'label'         => esc_html__( 'Tab title', 'digiqole' ),
        'type'          => Controls_Manager::TEXT,
        'default'       => 'Add Label',
      ],
      [   'name' => 'tab_text',
        'label'         => esc_html__( 'Tab text', 'digiqole' ),
        'type'          => Controls_Manager::TEXT,
        'default'       => 'tab text',
      ],
    ],
  ]
);



  $this->end_controls_section();
}

/**
* Render the widget output on the frontend.
*
* Written in PHP and used to generate the final HTML.
*
* @since 1.1.0
*
* @access protected
*/
protected function render() {
  $settings = $this->get_settings_for_display();
  $tabs = $settings['tabs'];
  $post_count = count($tabs);
  $tab_text = $settings['tab_text'];


  ?>
  <h2 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo $settings['title']; ?></h2>


  <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <?php foreach ( $tabs as $tab_key=>$value ) {
      if( $tab_key == 0 ){ ?>
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
      <?php } else { ?>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
      <?php
       }
    }?> 
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <?php foreach ($tabs as $content_key=>$value) {
  $args = array(
    'post_type'   =>  'post',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'category__in' => $value['post_cats'],
  );

  $query = new \WP_Query($args); 

    if( $content_key == 0 ){?>
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <?php 
    if ( $query->have_posts() ) {
      while ($query->have_posts()) : $query->the_post(); ?>
          <h5><?php the_title();?></h5><?php
      endwhile; 
      wp_reset_postdata();
    } 
    ?>
  </div>
    <?php } else { ?>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <?php 
    if ( $query->have_posts() ) {
      while ($query->have_posts()) : $query->the_post(); ?>
          <h5><?php the_title();?></h5><?php
      endwhile; 
      wp_reset_postdata();
    }; ?>
  </div>
    <?php 
  }
  wp_reset_postdata();
  } ?>
  
</div>
<?php }

protected function _content_template() {

}

public function post_category() {

      $terms = get_terms( array(
            'taxonomy'    => 'category',
            'hide_empty'  => false,
            'posts_per_page' => -1, 
            'suppress_filters' => false,
      ) );

      $cat_list = [];
      foreach($terms as $post) {
      $cat_list[$post->term_id]  = [$post->name];
      }
      return $cat_list;
   }
   
}