<?php
// $Id: template.php,v 1.16.2.2 2009/08/10 11:32:54 goba Exp $

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function phptemplate_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' › ', $breadcrumb) .'</div>';
  }
}

/**
 * Override or insert PHPTemplate variables into the templates.
 */
function phptemplate_preprocess_page(&$vars) {
  $vars['tabs2'] = menu_secondary_local_tasks();

  $node = $vars['node'];
  if ($node == FALSE) {
    $vars['body_class'] =  arg(1);
    $vars['body_id'] =  arg(0); 
  }                  
  else {
    $classes = explode("/",$node->path); 
    $vars['body_class'] = $classes['0'];
    $vars['body_id'] =  $classes['1'];     
  }       
}


/**
 * Override or insert PHPTemplate variables into the templates.
 */
function phptemplate_preprocess_node(&$vars) {
  $nodo = $vars['node'];
  
  $vars['story_intro'] = $nodo->content['body']['#value'];
  // get story type
  foreach($nodo->taxonomy as $term){
    $story_category = $term->name;
  }
  $vars['story_type'] = str_replace(' ','-',strtolower($story_category));
  // author
  $author = user_load($nodo->uid);
  $vars['story_author'] = $author->name;
  // published
  $vars['published_date'] = date('d/m/Y',$nodo->created);
 
  if(!empty($nodo->content['carousel_0']['#value'])){
    $vars['story_chapters'][] = $nodo->content['carousel_0']['#value']; 
  }
  if(!empty($nodo->content['carousel_1']['#value'])){
    $vars['story_chapters'][] = $nodo->content['carousel_1']['#value'];
  }
  if(!empty($nodo->content['carousel_2']['#value'])){
    $vars['story_chapters'][] = $nodo->content['carousel_2']['#value'];
  }
  if(!empty($nodo->content['carousel_3']['#value'])){
    $vars['story_chapters'][] = $nodo->content['carousel_3']['#value'];
  } 
  
}

/**
* @desc View preprocess function
*/
function phptemplate_preprocess_views_view(&$vars) {
  $view = $vars['view'];
  dsm($vars);
}

/**
 * Add a "Comments" heading above comments except on forum pages.
 */
function garland_preprocess_comment_wrapper(&$vars) {
  if ($vars['content'] && $vars['node']->type != 'forum') {
    $vars['content'] = '<h2 class="comments">'. t('Comments') .'</h2>'.  $vars['content'];
  }
}

/**
 * Returns the rendered local tasks. The default implementation renders
 * them as tabs. Overridden to split the secondary tasks.
 *
 * @ingroup themeable
 */
function phptemplate_menu_local_tasks() {
  return menu_primary_local_tasks();
}

function phptemplate_comment_submitted($comment) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $comment),
      '!datetime' => format_date($comment->timestamp)
    ));
}

function phptemplate_node_submitted($node) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $node),
      '!datetime' => format_date($node->created),
    ));
}

/**
 * Generates IE CSS links for LTR and RTL languages.
 */
function phptemplate_get_ie_styles() {
  global $language;

  $iecss = '<link type="text/css" rel="stylesheet" media="all" href="'. base_path() . path_to_theme() .'/fix-ie.css" />';
  if ($language->direction == LANGUAGE_RTL) {
    $iecss .= '<style type="text/css" media="all">@import "'. base_path() . path_to_theme() .'/fix-ie-rtl.css";</style>';
  }

  return $iecss;
}
