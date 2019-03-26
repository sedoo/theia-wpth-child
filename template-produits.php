<?php
/*
Template Name: page produits
*/
/**
 * template pour les pages des Produits (affiche thématiques et produits liés)
 * 
 */

get_header(); 

while ( have_posts() ) : the_post();

   get_template_part( 'template-parts/header-content', 'theia-page' );
?>

	<div id="content-area" class="wrapper sidebar toc-left">
      <?php
      get_template_part( 'template-parts/content', 'tpl-page' );
      ?>
		
      <aside>
            <?php
            $postID=get_the_id();
            ?>
         <!-- NEWS --> 
            <?php

            $parameters=array(
               'sectionTitle'    => "News",
               'posttype'        => "post",
               'limit'           => 7,
               'orderby'         => "date",
               'order'           => "DESC",
               'category'        => "category",
               'template'        => "",
               'taxQueryType'    => "",
               'taxQueryCondTerm'  => "",
            );
            theia_wpthchild_get_associate_content($parameters, $postID);
            
           
            ?>
         <!-- SEC --> 
            <?php
            $sectionTitle="SEC";
            $posttype="page";
            $limit="-1";
            $orderby="title";
            $order="ASC";
            $category="category";
            $template="template-ces.php";
            $taxQueryType="";
            $taxQueryCondTerm="";
            theia_wpthchild_get_associate_content($sectionTitle, $postID, $posttype, $limit, $orderby, $order, $category, $template, $taxQueryType, $taxQueryCondTerm);
            ?>
         <!-- Themes --> 
            <?php
            $sectionTitle="Themes";
            $posttype="page";
            $limit=7;
            $orderby="title";
            $order="ASC";
            $category="category";
            $template="template-thema.php";
            $taxQueryType="";
            $taxQueryCondTerm="";
            //theia_wpthchild_get_associate_content($sectionTitle, $postID, $posttype, $limit, $orderby, $order, $category, $template, $taxQueryType, $taxQueryCondTerm);
            ?>
         <!-- Products --> 
            <?php
            $sectionTitle="Products";
            $posttype ="page";
            $limit = "-1"; // Limite à définir
            $orderby="title";
            $order="ASC";
            $category ="category";
            $template ="template-produits.php";
            $taxQueryType="exclude";
            $taxQueryCondTerm=array('donnees-satellitaires, produits');
            theia_wpthchild_get_associate_content($sectionTitle, $postID, $posttype, $limit, $orderby, $order, $category, $template, $taxQueryType, $taxQueryCondTerm);
            ?>

      </aside>


	</div><!-- #content-area -->


<?php
endwhile; // End of the loop.
// get_sidebar();
get_footer();
