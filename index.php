<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2010 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

// the following cPath references come from application_top.php
  $category_depth = 'top';
  if (isset($cPath) && tep_not_null($cPath)) {
    $categories_products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_TO_CATEGORIES . " where categories_id = '" . (int)$current_category_id . "'");
    $categories_products = tep_db_fetch_array($categories_products_query);
    if ($categories_products['total'] > 0) {
      $category_depth = 'products'; // display products
    } else {
      $category_parent_query = tep_db_query("select count(*) as total from " . TABLE_CATEGORIES . " where parent_id = '" . (int)$current_category_id . "'");
      $category_parent = tep_db_fetch_array($category_parent_query);
      if ($category_parent['total'] > 0) {
        $category_depth = 'nested'; // navigate through the categories
      } else {
        $category_depth = 'products'; // category has no products, but display the 'no products' message
      }
    }
    $categories_query = tep_db_query("select categories_image from " . TABLE_CATEGORIES . " where categories_id = '" . (int)$current_category_id . "'");
    $categories_info = tep_db_fetch_array($categories_query);
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_DEFAULT);

  require(DIR_WS_INCLUDES . 'template_top.php');
?>
<?php
 if ($category_depth == 'products' || (isset($HTTP_GET_VARS['manufacturers_id']) && !empty($HTTP_GET_VARS['manufacturers_id']))) {

    /******************************************************************************************/
    /********************** Optional Product Filter by Categories *****************************/
    /******************************************************************************************/
    $listing_sql = "
      select
          DATE_FORMAT(p.create_date, '%d/%m/%Y') as create_date,
          pd.products_name,
          p.create_by,
          p.products_image,
          p.products_price,
          p.person,
          p.day,
          pd.products_viewed,
          p.products_id
      from
          products_description pd, products p
      where
          p.products_status = 1
              and
          pd.products_id = p.products_id
              and
          pd.language_id = " . (int)$languages_id . "
              and
          p.categories_id = '" . (int)$current_category_id . "'
      ORDER BY
          p.products_id DESC
      ";
    include(DIR_WS_MODULES . FILENAME_PRODUCT_LISTING);

  } else {

    /****************************************************************/
    /********************** default page ****************************/
    /****************************************************************/
?>

<?php
  if ($messageStack->size('product_action') > 0) {
    echo $messageStack->output('product_action');
  }
  include(DIR_WS_MODULES . FILENAME_HOME);

  }

  require(DIR_WS_INCLUDES . 'template_bottom.php');
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
