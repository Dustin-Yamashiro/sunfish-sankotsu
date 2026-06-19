<?php
/**
 * Custom post types and taxonomies.
 *
 * Add project-specific registration here instead of editing functions.php.
 *
 * @package LocalEnvTheme
 */

/**
 * Register FAQ content for reusable FAQ sections.
 */
function theme_register_faq_post_type() {
	register_post_type(
		'faq',
		array(
			'labels'       => array(
				'name'          => 'よくある質問',
				'singular_name' => 'よくある質問',
				'add_new_item'  => 'よくある質問を追加',
				'edit_item'     => 'よくある質問を編集',
			),
			'public'       => true,
			'show_in_rest' => true,
			'menu_position' => 20,
			'menu_icon'    => 'dashicons-editor-help',
			'has_archive'  => false,
			'rewrite'      => array(
				'slug'       => 'faq-item',
				'with_front' => false,
			),
			'supports'     => array( 'title', 'editor', 'page-attributes' ),
		)
	);

	register_taxonomy(
		'faq_category',
		array( 'faq' ),
		array(
			'labels'            => array(
				'name'          => 'FAQカテゴリー',
				'singular_name' => 'FAQカテゴリー',
				'add_new_item'  => 'FAQカテゴリーを追加',
				'edit_item'     => 'FAQカテゴリーを編集',
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array(
				'slug'       => 'faq-category',
				'with_front' => false,
			),
		)
	);
}
add_action( 'init', 'theme_register_faq_post_type' );

/**
 * Return FAQ items for accordion templates.
 *
 * @param string $category_slug FAQ category slug.
 * @param int    $limit Number of items to fetch.
 * @return array<int, array<string, mixed>>
 */
function theme_get_faq_items( $category_slug = '', $limit = 5 ) {
	$query_args = array(
		'post_type'           => 'faq',
		'post_status'         => 'publish',
		'posts_per_page'      => (int) $limit,
		'orderby'             => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	);

	if ( '' !== $category_slug ) {
		$query_args['tax_query'] = array(
			array(
				'taxonomy' => 'faq_category',
				'field'    => 'slug',
				'terms'    => sanitize_title( $category_slug ),
			),
		);
	}

	$faq_query = new WP_Query( $query_args );
	$faq_items = array();

	if ( $faq_query->have_posts() ) {
		while ( $faq_query->have_posts() ) {
			$faq_query->the_post();
			$faq_items[] = array(
				'question'    => get_the_title(),
				'answer_html' => apply_filters( 'the_content', get_the_content() ),
			);
		}
		wp_reset_postdata();
	}

	return $faq_items;
}

/**
 * Add short category archive URLs for news and column parent categories.
 */
function theme_add_category_archive_rewrite_rules() {
	add_rewrite_rule( '^news/?$', 'index.php?category_name=news', 'top' );
	add_rewrite_rule( '^news/([^/]+)/?$', 'index.php?category_name=news/$matches[1]', 'top' );
	add_rewrite_rule( '^column/?$', 'index.php?category_name=column', 'top' );
	add_rewrite_rule( '^column/([^/]+)/?$', 'index.php?category_name=column/$matches[1]', 'top' );
}
add_action( 'init', 'theme_add_category_archive_rewrite_rules' );

/**
 * Prefer child categories in post permalinks.
 *
 * @param WP_Term $category Selected category.
 * @param array   $categories Categories assigned to the post.
 * @return WP_Term
 */
function theme_select_post_link_category( $category, $categories ) {
	$target_roots = array( 'news', 'column' );
	$best_term    = null;
	$best_depth   = -1;

	foreach ( $categories as $candidate ) {
		if ( ! $candidate instanceof WP_Term ) {
			continue;
		}

		$ancestors = get_ancestors( $candidate->term_id, 'category' );
		$root_slug = $candidate->slug;

		if ( ! empty( $ancestors ) ) {
			$root = get_term( end( $ancestors ), 'category' );
			if ( $root instanceof WP_Term ) {
				$root_slug = $root->slug;
			}
		}

		if ( ! in_array( $root_slug, $target_roots, true ) ) {
			continue;
		}

		$depth = count( $ancestors );
		if ( $depth > $best_depth ) {
			$best_depth = $depth;
			$best_term  = $candidate;
		}
	}

	return $best_term instanceof WP_Term ? $best_term : $category;
}
add_filter( 'post_link_category', 'theme_select_post_link_category', 10, 2 );

/**
 * Remove the default category base from news and column archive links only.
 *
 * @param string  $termlink Term link.
 * @param WP_Term $term Term object.
 * @param string  $taxonomy Taxonomy name.
 * @return string
 */
function theme_filter_news_column_category_link( $termlink, $term, $taxonomy ) {
	if ( 'category' !== $taxonomy || ! $term instanceof WP_Term ) {
		return $termlink;
	}

	$ancestors = array_reverse( get_ancestors( $term->term_id, 'category' ) );
	$terms     = array();

	foreach ( $ancestors as $ancestor_id ) {
		$ancestor = get_term( $ancestor_id, 'category' );
		if ( $ancestor instanceof WP_Term ) {
			$terms[] = $ancestor;
		}
	}

	$terms[] = $term;

	if ( empty( $terms[0] ) || ! in_array( $terms[0]->slug, array( 'news', 'column' ), true ) ) {
		return $termlink;
	}

	$path = implode(
		'/',
		array_map(
			static function ( $path_term ) {
				return $path_term->slug;
			},
			$terms
		)
	);

	return home_url( user_trailingslashit( $path ) );
}
add_filter( 'term_link', 'theme_filter_news_column_category_link', 10, 3 );
