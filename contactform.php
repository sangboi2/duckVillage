<?php require_once("includes/master_header.php"); ?>
<?php require_once("php/code.php"); ?>
<div class="container py-5">
  <?php
  if ($message_sent) :
  ?>
    <h3>Thanks, we'll be in touch</h3>
  <?php

  else :
  ?>
    <form action="webform.php" method="POST" class="form">
      <div class="form-group">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" class="form-control <?= $invalid_class_name ?? "" ?>" id="name" name="name" placeholder="Enter name" tabindex="1" required>
      </div>
      <div class="form-group">
        <label for="email" class="form-label">Your Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter e-mail" tabindex="2" required>
      </div>
      <div class="form-group">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" tabindex="3" required>
      </div>
      <div class="form-group">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Enter Message..." tabindex="4"></textarea>
      </div>
      <div>
        <button type="submit" class="btn btn-warning">Send Message!</button>
      </div>
    </form>
  <?php
  endif; ?>
</div>