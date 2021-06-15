<?php
/*
Template Name: FAQs/Contact
*/
get_header();

  $contact = get_field('contact');

?>
<div class="page-wrap">
  <div class="faqs-header">
    <div class="faqs-header__inner container">
      <p class="js-faq-link">FAQ</p>
      <p class="js-contact-link">CONTACT</p>
    </div>
  </div>
  <section class="faqs js-visibility reveal-slide">
    <div class="faqs__inner container">
    <h1>FREQUENTLY ASKED QUESTIONS</h1>
    <?php foreach( get_field( 'faqs' ) as $faq  ) { ?>    
      <h4><?php echo $faq['category'] ?></h4>
      <?php foreach( $faq['category_q_&_a'] as $faqQA  ) { ?>
        <div class="product-extra__accordian">
        <div class="product-extra__accordian-item"> 
          <div class="product-extra__accordian-title">
            <h3><?php echo $faqQA['question'] ?></h3>
            <?php _get_template_part('templates/components/_icon-plus'); ?>
          </div>       
          <div class="product-extra__accordian-hidden"> 
            <p><?php echo $faqQA['answer'] ?></p>
          </div>  
          <div class="animated-border js-visibility reveal-del-1 "></div>  
        </div>
      </div>
      <?php } ?>
    <?php } ?>
    </div>
  </section>

  <section class="contact js-visibility reveal-slide">
    <div class="contact__inner container">
      <h2>CONTACT US</h2>
      <P>We’d love to hear from you, get in touch and we will get back to you as soon as possible.</P>

   
      <div class="contact__grid">

        <?php foreach( $contact['contact_options'] as $contactOpts  ) { ?>  
          <div class="contact__grid-item">
            <div class="contact__svg-conatiner">
              <?php echo $contactOpts['svg'] ?>
            </div>
              
            <h4><?php echo $contactOpts['title'] ?></h4>
              <?php foreach( $contactOpts['links'] as $links  ) { ?>             
                <a href="<?php echo  $links['link']['url'] ?>"><?php echo  $links['link']['title'] ?>
              </a> 
              <?php } ?>            
          </div>
         <?php } ?>
      </div>
    </div>
  </section>


</div>

<?php get_footer(); ?>
