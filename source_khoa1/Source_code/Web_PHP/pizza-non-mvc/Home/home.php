<?php if(session_id() === '') session_start(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../javascript/parallax.min.js"></script>
<script src="../javascript/parallax.js"></script>
<div style="width: 100%; height: 0px;">
  <?php require_once "blocks/banner.php"?>
  <?php require_once "blocks/welcome.php"?>
  <?php require_once "blocks/delicious.php"?>
  <?php require_once "blocks/categories.php"?>
  <?php require_once "blocks/reviews.php"?>
  <?php require_once "blocks/events.php"?>
  <?php require_once "blocks/contact.php"?>
  <?php include_once("../global/footer.php"); ?>
</div>