<?php


function veuse_get_categories(){

	$categories = get_categories( 'category', array('hide_empty' => 1 ));
	
	$category_list = array();
	
	foreach ($categories as $category){
	
		$category_list[$category->name] = $category->slug; 
	
	}
	   
	return $category_list;	
	
}

function veuse_get_testimonials(){
	   
	   global $post;
	   
	    $testimonials = get_posts( array(
			'post_type' => 'veuse_testimonial',
			'orderby' => 'title', 
	        'order' => 'DESC', 
	        'posts_per_page' => -1, 
	        'post_status' => 'publish' 
			 )
		);
		
		$testimonials_list = array();
		
		foreach ($testimonials as $testimonial){
			$testimonials_list[$testimonial->post_title] = $testimonial->ID; 
		}
	   
		return $testimonials_list;
		
	
}

if(function_exists('add_shortcode_param')){
	
	function my_param_settings_field($settings, $value) {
	   $dependency = vc_generate_dependencies_attributes($settings);
	   return '<div class="my_param_block">'
	             .'<input name="'.$settings['param_name']
	             .'" class="wpb_vc_param_value wpb-textinput '
	             .$settings['param_name'].' '.$settings['type'].'_field" type="text" value="'
	             .$value.'" ' . $dependency . '/>'
	         .'</div>';
	}
	add_shortcode_param('my_param', 'my_param_settings_field');
	
}


function get_fontawesome_icons () {
	
	
	$icons = array(
	
		'none' => 'No Icon',
		'fa-adjust' => 'adjust',
		'fa-anchor' => 'anchor',
		'fa-archive' => 'archive',
		'fa-arrows' => 'arrows',
		'fa-arrows-h' => 'arrows-h',
		'fa-arrows-v' => 'arrows-v',
		'fa-asterisk' => 'asterisk',
		'fa-automobile' => 'automobile',
		'fa-ban' => 'ban',
		'fa-bank' => 'bank',
		'fa-bar-chart-o' => 'bar-chart-o',
		'fa-barcode' => 'barcode',
		'fa-bars' => 'bars',
		'fa-beer' => 'beer',
		'fa-bell' => 'bell',
		'fa-bell-o' => 'bell-o',
		'fa-bolt' => 'bolt',
		'fa-bomb' => 'bomb',
		'fa-book' => 'book',
		'fa-bookmark' => 'bookmark',
		'fa-bookmark-o' => 'bookmark-o',
		'fa-briefcase' => 'briefcase',
		'fa-bug' => 'bug',
		'fa-building' => 'building',
		'fa-building-o' => 'building-o',
		'fa-bullhorn' => 'bullhorn',
		'fa-bullseye' => 'bullseye',
		'fa-cab' => 'cab',
		'fa-calendar' => 'calendar',
		'fa-calendar-o' => 'calendar-o',
		'fa-camera' => 'camera',
		'fa-camera-retro' => 'camera-retro',
		'fa-car' => 'car',
		'fa-caret-square-o-down' => 'caret-square-o-down',
		'fa-caret-square-o-left' => 'caret-square-o-left',
		'fa-caret-square-o-right' => 'caret-square-o-right',
		'fa-caret-square-o-up' => 'caret-square-o-up',
		'fa-certificate' => 'certificate',
		'fa-check' => 'check',
		'fa-check-circle' => 'check-circle',
		'fa-check-circle-o' => 'check-circle-o',
		'fa-check-square' => 'check-square',
		'fa-check-square-o' => 'check-square-o',
		'fa-child' => 'child',
		'fa-circle' => 'circle',
		'fa-circle-o' => 'circle-o',
		'fa-circle-o-notch' => 'circle-o-notch',
		'fa-circle-thin' => 'circle-thin',
		'fa-clock-o' => 'clock-o',
		'fa-cloud' => 'cloud',
		'fa-cloud-download' => 'cloud-download',
		'fa-cloud-upload' => 'cloud-upload',
		'fa-code' => 'code',
		'fa-code-fork' => 'code-fork',
		'fa-coffee' => 'coffee',
		'fa-cog' => 'cog',
		'fa-cogs' => 'cogs',
		'fa-comment' => 'comment',
		'fa-comment-o' => 'comment-o',
		'fa-comments' => 'comments',
		'fa-comments-o' => 'comments-o',
		'fa-compass' => 'compass',
		'fa-credit-card' => 'credit-card',
		'fa-crop' => 'crop',
		'fa-crosshairs' => 'crosshairs',
		'fa-cube' => 'cube',
		'fa-cubes' => 'cubes',
		'fa-cutlery' => 'cutlery',
		'fa-dashboard' => 'dashboard',
		'fa-database' => 'database',
		'fa-desktop' => 'desktop',
		'fa-dot-circle-o' => 'dot-circle-o',
		'fa-download' => 'download',
		'fa-edit' => 'edit',
		'fa-ellipsis-h' => 'ellipsis-h',
		'fa-ellipsis-v' => 'ellipsis-v',
		'fa-envelope' => 'envelope',
		'fa-envelope-o' => 'envelope-o',
		'fa-envelope-square' => 'envelope-square',
		'fa-eraser' => 'eraser',
		'fa-exchange' => 'exchange',
		'fa-exclamation' => 'exclamation',
		'fa-exclamation-circle' => 'exclamation-circle',
		'fa-exclamation-triangle' => 'exclamation-triangle',
		'fa-external-link' => 'external-link',
		'fa-external-link-square' => 'external-link-square',
		'fa-eye' => 'eye',
		'fa-eye-slash' => 'eye-slash',
		'fa-fax' => 'fax',
		'fa-female' => 'female',
		'fa-fighter-jet' => 'fighter-jet',
		'fa-file-archive-o' => 'file-archive-o',
		'fa-file-audio-o' => 'file-audio-o',
		'fa-file-code-o' => 'file-code-o',
		'fa-file-excel-o' => 'file-excel-o',
		'fa-file-image-o' => 'file-image-o',
		'fa-file-movie-o' => 'file-movie-o',
		'fa-file-pdf-o' => 'file-pdf-o',
		'fa-file-photo-o' => 'file-photo-o',
		'fa-file-picture-o' => 'file-picture-o',
		'fa-file-powerpoint-o' => 'file-powerpoint-o',
		'fa-file-sound-o' => 'file-sound-o',
		'fa-file-video-o' => 'file-video-o',
		'fa-file-word-o' => 'file-word-o',
		'fa-file-zip-o' => 'file-zip-o',
		'fa-film' => 'film',
		'fa-filter' => 'filter',
		'fa-fire' => 'fire',
		'fa-fire-extinguisher' => 'fire-extinguisher',
		'fa-flag' => 'flag',
		'fa-flag-checkered' => 'flag-checkered',
		'fa-flag-o' => 'flag-o',
		'fa-flash' => 'flash',
		'fa-flask' => 'flask',
		'fa-folder' => 'folder',
		'fa-folder-o' => 'folder-o',
		'fa-folder-open' => 'folder-open',
		'fa-folder-open-o' => 'folder-open-o',
		'fa-frown-o' => 'frown-o',
		'fa-gamepad' => 'gamepad',
		'fa-gavel' => 'gavel',
		'fa-gear' => 'gear',
		'fa-gears' => 'gears',
		'fa-gift' => 'gift',
		'fa-glass' => 'glass',
		'fa-globe' => 'globe',
		'fa-graduation-cap' => 'graduation-cap',
		'fa-group' => 'group',
		'fa-hdd-o' => 'hdd-o',
		'fa-headphones' => 'headphones',
		'fa-heart' => 'heart',
		'fa-heart-o' => 'heart-o',
		'fa-history' => 'history',
		'fa-home' => 'home',
		'fa-image' => 'image',
		'fa-inbox' => 'inbox',
		'fa-info' => 'info',
		'fa-info-circle' => 'info-circle',
		'fa-institution' => 'institution',
		'fa-key' => 'key',
		'fa-keyboard-o' => 'keyboard-o',
		'fa-language' => 'language',
		'fa-laptop' => 'laptop',
		'fa-leaf' => 'leaf',
		'fa-legal' => 'legal',
		'fa-lemon-o' => 'lemon-o',
		'fa-level-down' => 'level-down',
		'fa-level-up' => 'level-up',
		'fa-life-bouy' => 'life-bouy',
		'fa-life-ring' => 'life-ring',
		'fa-life-saver' => 'life-saver',
		'fa-lightbulb-o' => 'lightbulb-o',
		'fa-location-arrow' => 'location-arrow',
		'fa-lock' => 'lock',
		'fa-magic' => 'magic',
		'fa-magnet' => 'magnet',
		'fa-mail-forward' => 'mail-forward',
		'fa-mail-reply' => 'mail-reply',
		'fa-mail-reply-all' => 'mail-reply-all',
		'fa-male' => 'male',
		'fa-map-marker' => 'map-marker',
		'fa-meh-o' => 'meh-o',
		'fa-microphone' => 'microphone',
		'fa-microphone-slash' => 'microphone-slash',
		'fa-minus' => 'minus',
		'fa-minus-circle' => 'minus-circle',
		'fa-minus-square' => 'minus-square',
		'fa-minus-square-o' => 'minus-square-o',
		'fa-mobile' => 'mobile',
		'fa-mobile-phone' => 'mobile-phone',
		'fa-money' => 'money',
		'fa-moon-o' => 'moon-o',
		'fa-mortar-board' => 'mortar-board',
		'fa-music' => 'music',
		'fa-navicon' => 'navicon',
		'fa-paper-plane' => 'paper-plane',
		'fa-paper-plane-o' => 'paper-plane-o',
		'fa-paw' => 'paw',
		'fa-pencil' => 'pencil',
		'fa-pencil-square' => 'pencil-square',
		'fa-pencil-square-o' => 'pencil-square-o',
		'fa-phone' => 'phone',
		'fa-phone-square' => 'phone-square',
		'fa-photo' => 'photo',
		'fa-picture-o' => 'picture-o',
		'fa-plane' => 'plane',
		'fa-plus' => 'plus',
		'fa-plus-circle' => 'plus-circle',
		'fa-plus-square' => 'plus-square',
		'fa-plus-square-o' => 'plus-square-o',
		'fa-power-off' => 'power-off',
		'fa-print' => 'print',
		'fa-puzzle-piece' => 'puzzle-piece',
		'fa-qrcode' => 'qrcode',
		'fa-question' => 'question',
		'fa-question-circle' => 'question-circle',
		'fa-quote-left' => 'quote-left',
		'fa-quote-right' => 'quote-right',
		'fa-random' => 'random',
		'fa-recycle' => 'recycle',
		'fa-refresh' => 'refresh',
		'fa-reorder' => 'reorder',
		'fa-reply' => 'reply',
		'fa-reply-all' => 'reply-all',
		'fa-retweet' => 'retweet',
		'fa-road' => 'road',
		'fa-rocket' => 'rocket',
		'fa-rss' => 'rss',
		'fa-rss-square' => 'rss-square',
		'fa-search' => 'search',
		'fa-search-minus' => 'search-minus',
		'fa-search-plus' => 'search-plus',
		'fa-send' => 'send',
		'fa-send-o' => 'send-o',
		'fa-share' => 'share',
		'fa-share-alt' => 'share-alt',
		'fa-share-alt-square' => 'share-alt-square',
		'fa-share-square' => 'share-square',
		'fa-share-square-o' => 'share-square-o',
		'fa-shield' => 'shield',
		'fa-shopping-cart' => 'shopping-cart',
		'fa-sign-in' => 'sign-in',
		'fa-sign-out' => 'sign-out',
		'fa-signal' => 'signal',
		'fa-sitemap' => 'sitemap',
		'fa-sliders' => 'sliders',
		'fa-smile-o' => 'smile-o',
		'fa-sort' => 'sort',
		'fa-sort-alpha-asc' => 'sort-alpha-asc',
		'fa-sort-alpha-desc' => 'sort-alpha-desc',
		'fa-sort-amount-asc' => 'sort-amount-asc',
		'fa-sort-amount-desc' => 'sort-amount-desc',
		'fa-sort-asc' => 'sort-asc',
		'fa-sort-desc' => 'sort-desc',
		'fa-sort-down' => 'sort-down',
		'fa-sort-numeric-asc' => 'sort-numeric-asc',
		'fa-sort-numeric-desc' => 'sort-numeric-desc',
		'fa-sort-up' => 'sort-up',
		'fa-space-shuttle' => 'space-shuttle',
		'fa-spinner' => 'spinner',
		'fa-spoon' => 'spoon',
		'fa-square' => 'square',
		'fa-square-o' => 'square-o',
		'fa-star' => 'star',
		'fa-star-half' => 'star-half',
		'fa-star-half-empty' => 'star-half-empty',
		'fa-star-half-full' => 'star-half-full',
		'fa-star-half-o' => 'star-half-o',
		'fa-star-o' => 'star-o',
		'fa-suitcase' => 'suitcase',
		'fa-sun-o' => 'sun-o',
		'fa-support' => 'support',
		'fa-tablet' => 'tablet',
		'fa-tachometer' => 'tachometer',
		'fa-tag' => 'tag',
		'fa-tags' => 'tags',
		'fa-tasks' => 'tasks',
		'fa-taxi' => 'taxi',
		'fa-terminal' => 'terminal',
		'fa-thumb-tack' => 'thumb-tack',
		'fa-thumbs-down' => 'thumbs-down',
		'fa-thumbs-o-down' => 'thumbs-o-down',
		'fa-thumbs-o-up' => 'thumbs-o-up',
		'fa-thumbs-up' => 'thumbs-up',
		'fa-ticket' => 'ticket',
		'fa-times' => 'times',
		'fa-times-circle' => 'times-circle',
		'fa-times-circle-o' => 'times-circle-o',
		'fa-tint' => 'tint',
		'fa-toggle-down' => 'toggle-down',
		'fa-toggle-left' => 'toggle-left',
		'fa-toggle-right' => 'toggle-right',
		'fa-toggle-up' => 'toggle-up',
		'fa-trash-o' => 'trash-o',
		'fa-tree' => 'tree',
		'fa-trophy' => 'trophy',
		'fa-truck' => 'truck',
		'fa-umbrella' => 'umbrella',
		'fa-university' => 'university',
		'fa-unlock' => 'unlock',
		'fa-unlock-alt' => 'unlock-alt',
		'fa-unsorted' => 'unsorted',
		'fa-upload' => 'upload',
		'fa-user' => 'user',
		'fa-users' => 'users',
		'fa-video-camera' => 'video-camera',
		'fa-volume-down' => 'volume-down',
		'fa-volume-off' => 'volume-off',
		'fa-volume-up' => 'volume-up',
		'fa-warning' => 'warning',
		'fa-wheelchair' => 'wheelchair',
		'fa-wrench' => 'wrench',
		'fa-file' => 'file',
		'fa-file-archive-o' => 'file-archive-o',
		'fa-file-audio-o' => 'file-audio-o',
		'fa-file-code-o' => 'file-code-o',
		'fa-file-excel-o' => 'file-excel-o',
		'fa-file-image-o' => 'file-image-o',
		'fa-file-movie-o' => 'file-movie-o',
		'fa-file-o' => 'file-o',
		'fa-file-pdf-o' => 'file-pdf-o',
		'fa-file-photo-o' => 'file-photo-o',
		'fa-file-picture-o' => 'file-picture-o',
		'fa-file-powerpoint-o' => 'file-powerpoint-o',
		'fa-file-sound-o' => 'file-sound-o',
		'fa-file-text' => 'file-text',
		'fa-file-text-o' => 'file-text-o',
		'fa-file-video-o' => 'file-video-o',
		'fa-file-word-o' => 'file-word-o',
		'fa-file-zip-o' => 'file-zip-o',
		'fa-circle-o-notch' => 'circle-o-notch',
		'fa-cog' => 'cog',
		'fa-gear' => 'gear',
		'fa-refresh' => 'refresh',
		'fa-spinner' => 'spinner',
		'fa-check-square' => 'check-square',
		'fa-check-square-o' => 'check-square-o',
		'fa-circle' => 'circle',
		'fa-circle-o' => 'circle-o',
		'fa-dot-circle-o' => 'dot-circle-o',
		'fa-minus-square' => 'minus-square',
		'fa-minus-square-o' => 'minus-square-o',
		'fa-plus-square' => 'plus-square',
		'fa-plus-square-o' => 'plus-square-o',
		'fa-square' => 'square',
		'fa-square-o' => 'square-o',
		'fa-bitcoin' => 'bitcoin',
		'fa-btc' => 'btc',
		'fa-cny' => 'cny',
		'fa-dollar' => 'dollar',
		'fa-eur' => 'eur',
		'fa-euro' => 'euro',
		'fa-gbp' => 'gbp',
		'fa-inr' => 'inr',
		'fa-jpy' => 'jpy',
		'fa-krw' => 'krw',
		'fa-money' => 'money',
		'fa-rmb' => 'rmb',
		'fa-rouble' => 'rouble',
		'fa-rub' => 'rub',
		'fa-ruble' => 'ruble',
		'fa-rupee' => 'rupee',
		'fa-try' => 'try',
		'fa-turkish-lira' => 'turkish-lira',
		'fa-usd' => 'usd',
		'fa-won' => 'won',
		'fa-yen' => 'yen',
		'fa-align-center' => 'align-center',
		'fa-align-justify' => 'align-justify',
		'fa-align-left' => 'align-left',
		'fa-align-right' => 'align-right',
		'fa-bold' => 'bold',
		'fa-chain' => 'chain',
		'fa-chain-broken' => 'chain-broken',
		'fa-clipboard' => 'clipboard',
		'fa-columns' => 'columns',
		'fa-copy' => 'copy',
		'fa-cut' => 'cut',
		'fa-dedent' => 'dedent',
		'fa-eraser' => 'eraser',
		'fa-file' => 'file',
		'fa-file-o' => 'file-o',
		'fa-file-text' => 'file-text',
		'fa-file-text-o' => 'file-text-o',
		'fa-files-o' => 'files-o',
		'fa-floppy-o' => 'floppy-o',
		'fa-font' => 'font',
		'fa-header' => 'header',
		'fa-indent' => 'indent',
		'fa-italic' => 'italic',
		'fa-link' => 'link',
		'fa-list' => 'list',
		'fa-list-alt' => 'list-alt',
		'fa-list-ol' => 'list-ol',
		'fa-list-ul' => 'list-ul',
		'fa-outdent' => 'outdent',
		'fa-paperclip' => 'paperclip',
		'fa-paragraph' => 'paragraph',
		'fa-paste' => 'paste',
		'fa-repeat' => 'repeat',
		'fa-rotate-left' => 'rotate-left',
		'fa-rotate-right' => 'rotate-right',
		'fa-save' => 'save',
		'fa-scissors' => 'scissors',
		'fa-strikethrough' => 'strikethrough',
		'fa-subscript' => 'subscript',
		'fa-superscript' => 'superscript',
		'fa-table' => 'table',
		'fa-text-height' => 'text-height',
		'fa-text-width' => 'text-width',
		'fa-th' => 'th',
		'fa-th-large' => 'th-large',
		'fa-th-list' => 'th-list',
		'fa-underline' => 'underline',
		'fa-undo' => 'undo',
		'fa-unlink' => 'unlink',
		'fa-angle-double-down' => 'angle-double-down',
		'fa-angle-double-left' => 'angle-double-left',
		'fa-angle-double-right' => 'angle-double-right',
		'fa-angle-double-up' => 'angle-double-up',
		'fa-angle-down' => 'angle-down',
		'fa-angle-left' => 'angle-left',
		'fa-angle-right' => 'angle-right',
		'fa-angle-up' => 'angle-up',
		'fa-arrow-circle-down' => 'arrow-circle-down',
		'fa-arrow-circle-left' => 'arrow-circle-left',
		'fa-arrow-circle-o-down' => 'arrow-circle-o-down',
		'fa-arrow-circle-o-left' => 'arrow-circle-o-left',
		'fa-arrow-circle-o-right' => 'arrow-circle-o-right',
		'fa-arrow-circle-o-up' => 'arrow-circle-o-up',
		'fa-arrow-circle-right' => 'arrow-circle-right',
		'fa-arrow-circle-up' => 'arrow-circle-up',
		'fa-arrow-down' => 'arrow-down',
		'fa-arrow-left' => 'arrow-left',
		'fa-arrow-right' => 'arrow-right',
		'fa-arrow-up' => 'arrow-up',
		'fa-arrows' => 'arrows',
		'fa-arrows-alt' => 'arrows-alt',
		'fa-arrows-h' => 'arrows-h',
		'fa-arrows-v' => 'arrows-v',
		'fa-caret-down' => 'caret-down',
		'fa-caret-left' => 'caret-left',
		'fa-caret-right' => 'caret-right',
		'fa-caret-square-o-down' => 'caret-square-o-down',
		'fa-caret-square-o-left' => 'caret-square-o-left',
		'fa-caret-square-o-right' => 'caret-square-o-right',
		'fa-caret-square-o-up' => 'caret-square-o-up',
		'fa-caret-up' => 'caret-up',
		'fa-chevron-circle-down' => 'chevron-circle-down',
		'fa-chevron-circle-left' => 'chevron-circle-left',
		'fa-chevron-circle-right' => 'chevron-circle-right',
		'fa-chevron-circle-up' => 'chevron-circle-up',
		'fa-chevron-down' => 'chevron-down',
		'fa-chevron-left' => 'chevron-left',
		'fa-chevron-right' => 'chevron-right',
		'fa-chevron-up' => 'chevron-up',
		'fa-hand-o-down' => 'hand-o-down',
		'fa-hand-o-left' => 'hand-o-left',
		'fa-hand-o-right' => 'hand-o-right',
		'fa-hand-o-up' => 'hand-o-up',
		'fa-long-arrow-down' => 'long-arrow-down',
		'fa-long-arrow-left' => 'long-arrow-left',
		'fa-long-arrow-right' => 'long-arrow-right',
		'fa-long-arrow-up' => 'long-arrow-up',
		'fa-toggle-down' => 'toggle-down',
		'fa-toggle-left' => 'toggle-left',
		'fa-toggle-right' => 'toggle-right',
		'fa-toggle-up' => 'toggle-up',
		'fa-arrows-alt' => 'arrows-alt',
		'fa-backward' => 'backward',
		'fa-compress' => 'compress',
		'fa-eject' => 'eject',
		'fa-expand' => 'expand',
		'fa-fast-backward' => 'fast-backward',
		'fa-fast-forward' => 'fast-forward',
		'fa-forward' => 'forward',
		'fa-pause' => 'pause',
		'fa-play' => 'play',
		'fa-play-circle' => 'play-circle',
		'fa-play-circle-o' => 'play-circle-o',
		'fa-step-backward' => 'step-backward',
		'fa-step-forward' => 'step-forward',
		'fa-stop' => 'stop',
		'fa-youtube-play' => 'youtube-play',
		'fa-adn' => 'adn',
		'fa-android' => 'android',
		'fa-apple' => 'apple',
		'fa-behance' => 'behance',
		'fa-behance-square' => 'behance-square',
		'fa-bitbucket' => 'bitbucket',
		'fa-bitbucket-square' => 'bitbucket-square',
		'fa-bitcoin' => 'bitcoin',
		'fa-btc' => 'btc',
		'fa-codepen' => 'codepen',
		'fa-css3' => 'css3',
		'fa-delicious' => 'delicious',
		'fa-deviantart' => 'deviantart',
		'fa-digg' => 'digg',
		'fa-dribbble' => 'dribbble',
		'fa-dropbox' => 'dropbox',
		'fa-drupal' => 'drupal',
		'fa-empire' => 'empire',
		'fa-facebook' => 'facebook',
		'fa-facebook-square' => 'facebook-square',
		'fa-flickr' => 'flickr',
		'fa-foursquare' => 'foursquare',
		'fa-ge' => 'ge',
		'fa-git' => 'git',
		'fa-git-square' => 'git-square',
		'fa-github' => 'github',
		'fa-github-alt' => 'github-alt',
		'fa-github-square' => 'github-square',
		'fa-gittip' => 'gittip',
		'fa-google' => 'google',
		'fa-google-plus' => 'google-plus',
		'fa-google-plus-square' => 'google-plus-square',
		'fa-hacker-news' => 'hacker-news',
		'fa-html5' => 'html5',
		'fa-instagram' => 'instagram',
		'fa-joomla' => 'joomla',
		'fa-jsfiddle' => 'jsfiddle',
		'fa-linkedin' => 'linkedin',
		'fa-linkedin-square' => 'linkedin-square',
		'fa-linux' => 'linux',
		'fa-maxcdn' => 'maxcdn',
		'fa-openid' => 'openid',
		'fa-pagelines' => 'pagelines',
		'fa-pied-piper' => 'pied-piper',
		'fa-pied-piper-alt' => 'pied-piper-alt',
		'fa-pied-piper-square' => 'pied-piper-square',
		'fa-pinterest' => 'pinterest',
		'fa-pinterest-square' => 'pinterest-square',
		'fa-qq' => 'qq',
		'fa-ra' => 'ra',
		'fa-rebel' => 'rebel',
		'fa-reddit' => 'reddit',
		'fa-reddit-square' => 'reddit-square',
		'fa-renren' => 'renren',
		'fa-share-alt' => 'share-alt',
		'fa-share-alt-square' => 'share-alt-square',
		'fa-skype' => 'skype',
		'fa-slack' => 'slack',
		'fa-soundcloud' => 'soundcloud',
		'fa-spotify' => 'spotify',
		'fa-stack-exchange' => 'stack-exchange',
		'fa-stack-overflow' => 'stack-overflow',
		'fa-steam' => 'steam',
		'fa-steam-square' => 'steam-square',
		'fa-stumbleupon' => 'stumbleupon',
		'fa-stumbleupon-circle' => 'stumbleupon-circle',
		'fa-tencent-weibo' => 'tencent-weibo',
		'fa-trello' => 'trello',
		'fa-tumblr' => 'tumblr',
		'fa-tumblr-square' => 'tumblr-square',
		'fa-twitter' => 'twitter',
		'fa-twitter-square' => 'twitter-square',
		'fa-vimeo-square' => 'vimeo-square',
		'fa-vine' => 'vine',
		'fa-vk' => 'vk',
		'fa-wechat' => 'wechat',
		'fa-weibo' => 'weibo',
		'fa-weixin' => 'weixin',
		'fa-windows' => 'windows',
		'fa-wordpress' => 'wordpress',
		'fa-xing' => 'xing',
		'fa-xing-square' => 'xing-square',
		'fa-yahoo' => 'yahoo',
		'fa-youtube' => 'youtube',
		'fa-youtube-play' => 'youtube-play',
		'fa-youtube-square' => 'youtube-square',
		'fa-ambulance' => 'ambulance',
		'fa-h-square' => 'h-square',
		'fa-hospital-o' => 'hospital-o',
		'fa-medkit' => 'medkit',
		'fa-plus-square' => 'plus-square',
		'fa-stethoscope' => 'stethoscope',
		'fa-user-md' => 'user-md',
		'fa-wheelchair' => 'wheelchair',
		
	);
	
	return $icons;
}

/* Get all pages in an associative array */

function veuse_get_pages () {
	
	
	$pages = get_pages();
	
	$page_list = array();
	
	foreach ($pages as $page){
		
		$page_list[$page->post_title] = $page->ID; 
		
	}
	
	
	return $page_list;
}


function veuse_border_styles() {
	
		
	$styles = array(
	
		'None' 		=> 'none',
		'Solid' 	=> 'solid',
		'Dashed' 	=> 'dashed',
		'Dotted'	=> 'dotted',
		'Double' 	=> 'double'		
	);

	
	return $styles;
}

function veuse_border_widths() {
		
	$widths = array(
	
		'1px' => '1px',
		'2px' => '2px',
		'3px' => '3px',
		'4px' => '4px',	
		'5px' => '5px',	
		'6px' => '6px',	
		'7px' => '7px',	
		'8px' => '8px',	
		'9px' => '9px',	
		'10px'=> '10px'
		
	);
	
	return $widths;
}


/* Make shortcodes work with visual composer 
======================================================== */

function veuse_elements_integrateWithVC() {
	
	if(function_exists('vc_map')){	
	   
	   
	   /* Post lists */
	   
	   vc_map( array(
	      "name" => __("Post list"),
	      "base" => "veuse_postlist",
	      "class" => "",
	      "category" => __('Siteman'),
	      //'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
	      //'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
	      "params" => array(
	         array(
	            "type" => "textfield",
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Title"),
	            "param_name" => "title",
	            "value" => __(""),
	            "description" => __("")
	         ),
	         
	         array(
	            "type" => "checkbox",
	            "value" => veuse_get_categories(),
	            "class" => "",
	            "heading" => __("Categories"),
	            "param_name" => "categories",
	            //"value" => __("Default params value"),
	            "description" => __("")
	         ),
	         
	         array(
	            "type" => "dropdown",
	            "value" => array('Descending' => 'DESC', 'Ascending' => 'ASC'),
	            "class" => "",
	            "heading" => __("Post order", "veuse-elements"),
	            "param_name" => "order",
	            //"description" => __("Show portrait", "veuse-elements")
	         ),
	         
	         array(
	            "type" => "dropdown",
	            "value" => array('Date' => 'date', 'Title' => 'title'),
	            "class" => "",
	            "heading" => __("Order by", "veuse-elements"),
	            "param_name" => "orderby",
	            //"description" => __("Show portrait", "veuse-elements")
	         ),
	         
	         array(
	            "type" => "textfield",
	            "class" => "",
	            "heading" => __("Posts per page"),
	            "param_name" => "perpage",
	            "value" => __(""),
	            "description" => __("-1 to show all ")
	         ),
	         
	         array(
	            "type" => "textfield",
	            "class" => "",
	            "heading" => __("Image width"),
	            "param_name" => "width",
	            "value" => __(""),
	            "description" => __("Pixel value. Only numeric values.")
	         ),
	         
	         array(
	            "type" => "textfield",
	            "class" => "",
	            "heading" => __("Image height"),
	            "param_name" => "height",
	            "value" => __(""),
	            "description" => __("Pixel value. Only numeric values.")
	         )
	      )
	   ) );
	   
	   
	   vc_map( array(
	      "name" => __("Testimonial slider"),
	      "base" => "veuse_testimonialslider",
	      "class" => "",
	      "category" => __('Siteman'),
	      //'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
	      //'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
	      "params" => array(
	         array(
	            "type" => "textfield",
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Title"),
	            "param_name" => "title",
	            "value" => __(""),
	            "description" => __("Description for foo param.")
	         ),
	         
	         array(
	            "type" => "checkbox",
	            "value" => veuse_get_testimonials(),
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Select testimonials"),
	            "param_name" => "testimonials",
	            //"value" => __("Default params value"),
	            "description" => __("Description for foo param.")
	         )
	      )
	   ) );
	   
	   
	   /* Modal shortcode
	   ================================================= */
	   
	   vc_map( array(
	      
	      "name" => __("Modal window"),
	      "base" => "veuse_modal",
	      "class" => "",
	      "category" => __('Siteman'),
	      //'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
	      //'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
	      "params" => array(
	         
	         array(
	            "type" => "textfield",
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Title"),
	            "param_name" => "title",
	            "value" => __(""),
	            "description" => __("")
	         ),
	         
	         array(
	            "type" => "dropdown",
	            "value" => get_fontawesome_icons(),
	            "class" => "",
	            "heading" => __("Icon"),
	            "param_name" => "icon",
	            //"value" => __("Default params value"),
	            "description" => __("Select icon")
	         ),
	         
	          array(
	            "type" => "textarea_html",
	            "value" => '',
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Text"),
	            "param_name" => "content",
	            //"value" => __("Default params value"),
	            "description" => __("Enter content for the modal window")
	         )
	      )
	      
	      
	   ) );
	   
	   
	   /* Featured page
	   ================================================= */
	   
	   vc_map( array(
	      
	      "name" => __("Featured page"),
	      "base" => "veuse_page",
	      "class" => "",
	      "category" => __('Siteman'),
	      //'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
	      //'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
	      "params" => array(
	         
	         
	         
	         array(
	            "type" => "dropdown",
	            "value" => veuse_get_pages(),
	            "class" => "",
	            "heading" => __("Select page"),
	            "param_name" => "id",
	            //"value" => __("Default params value"),
	            "description" => __("Select a page to display")
	         ),
	         
	         array(
	            "type" => "dropdown",
	            "value" => array('true','false'),
	            "class" => "",
	            "heading" => __("Show Featured Image"),
	            "param_name" => "image",
	            //"value" => __("Default params value"),
	            "description" => __("Choose if you want to show the pages featured image or not.")
	         ),
	         
	          array(
	            "type" => "dropdown",
	            "value" => get_intermediate_image_sizes(),
	            "class" => "",
	            "heading" => __("Image Size"),
	            "param_name" => "image_size",
	            //"value" => __("Default params value"),
	            "description" => __("Select one of the registered image sizes.")
	         ),
	         array(
	            "type" => "textfield",
	            "class" => "",
	            "heading" => __("Custom image size"),
	            "param_name" => "custom_imagesize",
	            "value" => '',
	            "description" => __("Enter a custom value. I.e. 400x200.")
	         ),
	         
	         array(
	            "type" => "textfield",
	            "class" => "",
	            "heading" => __("Button text"),
	            "param_name" => "title",
	            "value" => __('Read more','veuse-uikit'),
	            "description" => __("")
	         ),
	      )
	      
	      
	   ) );
	   
	  
	   /* Styled list shortcode
	   ================================================= */
	   
	   vc_map( array(
	      "name" => __("Styled lists"),
	      "base" => "veuse_list",
	      "class" => "",
	      "category" => __('Siteman'),
	      //'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
	      //'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
	      "params" => array(
	      
	      	array(
	            "type" => "textarea_html",
	            "value" => '',
	            "class" => "",
	            "heading" => __("Text"),
	            "param_name" => "content",
	            "description" => __("Enter your unordered list here")
	         ),
	         
	         array(
	            "type" => "textfield",
	            "value" => '',
	            "class" => "",
	            "heading" => __("Button text"),
	            "param_name" => "button_text",
	            //"value" => __("Default params value"),
	            "description" => __("")
	         ),
	         
	         array(
	            "type" => "dropdown",
	            "value" => array('default','style-1', 'style-2', 'style-3', 'style-4', 'style-5'),
	            "class" => "",
	            "heading" => __("List style"),
	            "param_name" => "style",
	            //"value" => __("Default params value"),
	            "description" => __("Select icon")
	         ),
	         
	        	   
	         
	         array(
	            "type" => "dropdown",
	            "value" => array('vertical', 'horisontal'),
	            "class" => "",
	            "heading" => __("Direction"),
	            "param_name" => "direction",
	            //"value" => __("Default params value"),
	            "description" => __("")
	         ),
	         
	          array(
	            "type" => "dropdown",
	            "value" => get_fontawesome_icons(),
	            "class" => "",
	            "heading" => __("Icon"),
	            "param_name" => "icon",
	            //"value" => __("Default params value"),
	            "description" => __("Select icon")
	         )
	         
	          
	    )
	    
	    ) );


		/* Icon box shortcode
	   ================================================= */
	   
	   vc_map( array(
	      "name" => __("Icon Box"),
	      "base" => "veuse_iconbox",
	      "class" => "",
	      "category" => __('Siteman'),
	      //'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
	      //'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
	      "params" => array(
	      	
	     			
			 array(
	            "type" => "textfield",
	            "value" => '',
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Heading"),
	            "param_name" => "title",
	            //"value" => __("Default params value"),
	            "description" => __("")
	         ),
			      
	      	array(
	            "type" => "textarea",
	            "value" => '',
	            "class" => "",
	            "heading" => __("Text"),
	            "param_name" => "text",
	            "description" => __("")
	         ),
	         
	         array(
	            "type" => "textfield",
	            "value" => '',
	            "class" => "",
	            "heading" => __("Button text"),
	            "param_name" => "button_text",
	            //"value" => __("Default params value"),
	            "description" => __("")
	         ),
	         
	         array(
	            "type" => "dropdown",
	            "value" => array('h1','h2', 'h3', 'h4', 'h5', 'h6'),
	            "class" => "",
	            "heading" => __("Heading style"),
	            "param_name" => "heading",
	            //"value" => __("Default params value"),
	            "description" => __("")
	         ),
	         
	         array(
	            "type" => "dropdown",
	            "value" => array('default','style-1', 'style-2', 'style-3', 'style-4', 'style-5'),
	            "class" => "",
	            "heading" => __("List style"),
	            "param_name" => "style",
	            //"value" => __("Default params value"),
	            "description" => __("Select icon")
	         ),
	         
	   
	         
	         array(
	            "type" => "colorpicker",
	            "value" => '',
	            "class" => "",
	            "heading" => __("Background Color"),
	            "param_name" => "background",
	            //"value" => __("Default params value"),
	            "description" => __("")
	         ),
	         
	          array(
	            "type" => "colorpicker",
	            "value" => '',
	            "class" => "",
	            "heading" => __("Text Color"),
	            "param_name" => "color",
	            //"value" => __("Default params value"),
	            "description" => __("")
	         ),
	         
	         array(
	            "type" => "colorpicker",
	            "value" => '',
	            "class" => "",
	            "heading" => __("Heading Color"),
	            "param_name" => "heading_color",
	            //"value" => __("Default params value"),
	            "description" => __("")
	         ),
	         
	          array(
	            "type" => "colorpicker",
	            "value" => '',
	            "class" => "",
	            "heading" => __("Border Color"),
	            "param_name" => "bordercolor",
	            //"value" => __("Default params value"),
	            "description" => __("")
	          ),
	          
	          
	            array(
	            "type" => "dropdown",
	            "value" => veuse_border_widths(),
	            "class" => "",
	            "heading" => __("Border Width"),
	            "param_name" => "borderwidth",
	            //"value" => __("Default params value"),
	            "description" => __("")
	         ),
	         
	         array(
	            "type" => "dropdown",
	            "value" => veuse_border_styles(),
	            "class" => "",
	            "heading" => __("Border Style"),
	            "param_name" => "borderstyle",
	            //"value" => __("Default params value"),
	            "description" => __("")
	         ),
	         
	         
	          array(
	            "type" => "dropdown",
	            "value" => get_fontawesome_icons(),
	            "class" => "",
	            "heading" => __("Icon"),
	            "param_name" => "icon",
	            //"value" => __("Default params value"),
	            "description" => __("Select icon")
	         )
	         
	          
	    )
	    
	    ) );


			

	   /* Download shortcode
	   ================================================= */
	   
	   vc_map( array(
	      "name" => __("Download Attachment"),
	      "base" => "veuse_download",
	      "class" => "",
	      "category" => __('Siteman'),
	      //'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
	      //'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
	      "params" => array(
	         array(
	            "type" => "textfield",
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Title"),
	            "param_name" => "title",
	            "value" => __(""),
	            "description" => __("")
	         ),
	         
	         array(
	            "type" => "textfield",
	            "value" => '',
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Button text"),
	            "param_name" => "button_text",
	            //"value" => __("Default params value"),
	            "description" => __("")
	         ),
	         
	         array(
	            "type" => "dropdown",
	            "value" => get_fontawesome_icons(),
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Button icon"),
	            "param_name" => "button_icon",
	            //"value" => __("Default params value"),
	            "description" => __("Select icon")
	         ),
	         
	          array(
	            "type" => "attach_image",
	            "value" => '',
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("File/link"),
	            "param_name" => "id",
	            //"value" => __("Default params value"),
	            "description" => __("Select a file to download")
	         )
	      )
	      
	      
	   ) );
	   
	}
	
	
	
}

add_action( 'init', 'veuse_elements_integrateWithVC' );

?>