<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    <?php if (!empty($page_title))
      echo $page_title; ?>
  </title>
  <link rel="shorcut icon" href="<?php echo base_url() . 'theme/images/icon.png' ?>">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/bootstrap.min.css' ?>">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/font-awesome.min.css' ?>">
  <!-- Simple Line Font -->
  <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/simple-line-icons.css' ?>">
  <!-- Slider / Carousel -->
  <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/slick.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/slick-theme.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/owl.carousel.min.css' ?>">
  <!-- Main CSS -->
  <link rel="stylesheet" href="<?php echo base_url() . 'theme/css/' ?><?php echo $css ?>.css ?>">
  <link href="<?php echo base_url() . 'theme/css/style.css' ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/skins/_all-skins.min.css' ?>">


  <link href="<?php echo base_url() . 'theme/css/style.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url() . 'theme/css/style_detail.css' ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/' ?><?php echo $css ?>.css ?>">

  <!-- midtrans -->

</head>
<?php
function limit_words($string, $word_limit)
{
  $words = explode(" ", $string);
  return implode(" ", array_splice($words, 0, $word_limit));
}
?>

<body>