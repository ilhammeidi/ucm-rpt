<?php

/**
 * Sets the body-tag class attribute.
 *
 * Adds 'sidebar-left', 'sidebar-right' or 'sidebars' classes as needed.
 */
function phptemplate_body_class($left, $right) {
	/**
	 * Check if URL string contains values in array.
	 */
	function contains(array $arr) {
	// Get the alias to use in the body class. Normally, we would use the context module to handle this, but it was not working correctly.
        $uri = strtok($_SERVER["REQUEST_URI"],'?');
        $body_classes = explode('/', $uri);
	    foreach($arr as $a) {
	        if (stripos($body_classes[1],$a) !== false) return true;
	    }
	    return false;
	}
	// BEGIN RESEARCH SECTION	
		$begin = array("begin", "begin_2", "begin_3", "begin_4");
		$begin_topic = array("begin_5", "begin_5", "begin_6", "begin_7", "begin_8", "begin_9", "begin_10");
		$begin_keywords = array("begin_11", "begin_12");
		$begin_resources = array("begin_13", "begin_14", "begin_15");
		$begin_quiz = array("begin_16", "begin_17", "begin_quiz");
	// KNOWLEDGE CYCLE SECTION
		$knowledge_cycle = array("knowledge_cycle","knowledge_cycle_2");
		$knowledge_cycle_timeline = array("knowledge_cycle_3","knowledge_cycle_4","knowledge_cycle_5","knowledge_cycle_6","knowledge_cycle_7");
		$knowledge_cycle_research = array("knowledge_cycle_8","knowledge_cycle_9");
		$knowledge_cycle_sources = array("knowledge_cycle_10","knowledge_cycle_11","knowledge_cycle_12","knowledge_cycle_13");
		$knowledge_cycle_scholarly = array("knowledge_cycle_14","knowledge_cycle_15");
		$knowledge_cycle_quiz = array("knowledge_cycle_16","knowledge_cycle_quiz");
	// FIND BOOKS SECTION
		$books = array("books","books_2");
		$books_catalog = array("books_3","books_4","books_5","books_6","books_7","books_8");
		$books_search = array("books_9","books_10");
		$books_call_numbers = array("books_11");
		$books_subject = array("books_12","books_13","books_14");
		$books_quiz = array("books_15","books_quiz");
	// FIND ARTICLES SECTION
		$articles = array("articles","articles_2");
		$articles_basics = array("articles_3");
		$articles_access = array("articles_4","articles_5","articles_6");
		$articles_search = array("articles_7","articles_8","articles_9");
		$articles_quiz = array("articles_10","articles_quiz");
	// MAKE CITIONS SECTION
		$citations = array("citations","citations_2","citations_3");
		$citations_bibliographic = array("citations_4","citations_5","citations_6","citations_7","citations_8");
		$citations_styles = array("citations_9","citations_10","citations_11","citations_12");
		$citations_websites = array("citations_13","citations_14","citations_15","citations_16","citations_17","citations_18");
		$citations_tools = array("citations_19");
		$citations_quiz = array("citations_20","citations_quiz");
	// BASIC SEARCH SECTION
		$basic_search = array("basic_search","basic_search_2","basic_search_3","basic_search_4","basic_search_5");
		$basic_search_truncation = array("basic_search_6","basic_search_7","basic_search_8","basic_search_9","basic_search_10","basic_search_11");
		$basic_search_limits = array("basic_search_12","basic_search_13","basic_search_14","basic_search_15");
		$basic_search_sort = array("basic_search_16","basic_search_17","basic_search_18");
		$basic_search_quiz = array("basic_search_19","basic_search_quiz");
	// ADVANCED SEARCH SECTION
		$advanced_search = array("advanced_search","advanced_search_2","advanced_search_3","advanced_search_4","advanced_search_5");
		$advanced_search_field = array("advanced_search_6","advanced_search_7","advanced_search_8","advanced_search_9");
		$advanced_search_databases = array("advanced_search_10","advanced_search_11","advanced_search_12","advanced_search_13","advanced_search_14");
		$advanced_search_quiz = array("advanced_search_15","advanced_search_quiz");
	
		if (contains($begin_topic)) {$body_class = 'begin-topic';
		} else if (contains($begin_keywords)) {$body_class = 'begin-keywords';
		} else if (contains($begin_resources)) {$body_class = 'begin-resources';
		} elseif (contains($begin_quiz)) {$body_class = 'begin-quiz';
		} else if (contains($begin)) {$body_class = 'begin';
		} else if (contains($knowledge_cycle_timeline)) {$body_class = "knowledge_cycle-timeline";
		} else if (contains($knowledge_cycle_research)) {$body_class = "knowledge_cycle-research";
		} else if (contains($knowledge_cycle_sources)) {$body_class = "knowledge_cycle-sources";
		} else if (contains($knowledge_cycle_scholarly)) {$body_class = "knowledge_cycle-scholarly";
		} else if (contains($knowledge_cycle_quiz)) {$body_class = "knowledge_cycle-quiz";
		} else if (contains($knowledge_cycle)) {$body_class = "knowledge_cycle";
		} else if (contains($books_catalog)) {$body_class = "books-catalog";
		} else if (contains($books_search)) {$body_class = "books-search";
		} else if (contains($books_call_numbers)) {$body_class = "books-call-numbers";
		} else if (contains($books_subject)) {$body_class = "books-subject";
		} else if (contains($books_quiz)) {$body_class = "books-quiz";
		} else if (contains($books)) {$body_class = "books";
		} else if (contains($articles_basics)) {$body_class = "articles-basics";
		} else if (contains($articles_access)) {$body_class = "articles-access";
		} else if (contains($articles_search)) {$body_class = "articles-search";
		} else if (contains($articles_quiz)) {$body_class = "articles-quiz";
		} else if (contains($articles)) {$body_class = "articles";
		} else if (contains($citations_bibliographic)) {$body_class = "citations-bibliographic";
		} else if (contains($citations_styles)) {$body_class = "citations-styles";
		} else if (contains($citations_websites)) {$body_class = "citations-websites";
		} else if (contains($citations_tools)) {$body_class = "citations-tools";
		} else if (contains($citations_quiz)) {$body_class = "citations-quiz";
		} else if (contains($citations)) {$body_class = "citations";
		} else if (contains($basic_search_truncation)) {$body_class = "basic_search-truncation";
		} else if (contains($basic_search_limits)) {$body_class = "basic_search-limits";
		} else if (contains($basic_search_sort)) {$body_class = "basic_search-sort";
		} else if (contains($basic_search_quiz)) {$body_class = "basic_search-quiz";
		} else if (contains($basic_search)) {$body_class = "basic_search";
		} else if (contains($advanced_search_field)) {$body_class = "advanced_search-field";
		} else if (contains($advanced_search_databases)) {$body_class = "advanced_search-databases";
		} else if (contains($advanced_search_quiz)) {$body_class = "advanced_search-quiz";
		} else if (contains($advanced_search)) {$body_class = "advanced_search";
		}

  if ($body_class !='') {
  	$body_class .= ' rpt-page';
  }
      
  if ($left != '' && $right != '') {
    $class = 'sidebars';
  }
  else {
    if ($left != '') {
      $class = 'sidebar-left ' . $body_class; //add no-bread class for matching pages.
    }
    if ($right != '') {
      $class = 'sidebar-right';
    }
  }

  if (isset($class)) {
    print ' class="'. $class .'"';
  }
}

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

  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
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

/**
 * Returns the themed submitted-by string for the comment.
 */
function phptemplate_comment_submitted($comment) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $comment),
      '!datetime' => format_date($comment->timestamp)
    ));
}

/**
 * Returns the themed submitted-by string for the node.
 */
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

/**
 * Remove the OPML feed icon.
 */
function phptemplate_opml_icon($url) {
  return '';
}

?>