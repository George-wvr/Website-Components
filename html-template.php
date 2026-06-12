<?php
/*
Template Name: GitHub Dynamic Page
*/
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo get_post_meta(get_the_ID(), 'page_title', true); ?></title>

    <!-- Inline CSS from GitHub -->
    <?php
    $css_url = get_post_meta(get_the_ID(), 'github_css_url', true);
    if ($css_url) {
        $response = wp_remote_get($css_url);
        if (!is_wp_error($response)) {
            echo '<style>' . wp_kses_post($response['body']) . '</style>';
        }
    }
    ?>
</head>
<body>
    <!-- Load HTML from GitHub -->
    <?php
    $html_url = get_post_meta(get_the_ID(), 'github_html_url', true);
    if ($html_url) {
        $response = wp_remote_get($html_url);
        if (!is_wp_error($response)) {
            echo wp_kses_post($response['body']);
        } else {
            echo '<p>Error loading content from GitHub.</p>';
        }
    }
    ?>
</body>
</html>