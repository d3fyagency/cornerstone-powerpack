 <?php
$elements = Cornerstone_Powerpack_Elements::get_elements();
$key = (isset($_GET['cspp_elementkey'])) ? $_GET['cspp_elementkey'] : null;
if ($key) {
  $opts = Cornerstone_Powerpack_Elements::get_element_opts($key);
  $video_url = $opts->get('video_url');
} else $video_url = null;
if ($video_url || 1):
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Video Player</title>
</head>
<body style="background-color: #eee;">
  <div style="padding: 15px 10px 0 10px; margin: 0 auto; text-align: center;">
    <iframe width="853" height="480" src="<?php echo esc_url($video_url); ?>" frameborder="0" style="margin: 0 auto;" allowfullscreen></iframe>
  </div>
</body>
</html>
<?php
endif;