<?php
  // error_reporting(E_ALL);
  // ini_set('display_errors', 1);

  include 'src/mighty-mouse.php';
  $m = new MightyMouse();
?>

<header>
  <h1><?php echo $m->value('data.homepage.title','Super Cat'); ?></h1>
  <h5><?php echo $m->value('data.homepage.tagline','Easily Destroys Mighty Mouse'); ?></h5>
</header>

<article>
  <section>
    <h2>With Mighty Mouse -- you can quickly add fields to build a lightweight CMS that you control and has key/values that are easily pulled from a flat json file.   You can also just write everything in JSON then just use dot notation to pull the keys.  Fancy.</h2>
  </section>
</article>

<footer>
  <div class="copyright">
    <h5><?php echo $m->value('data.footer.copyright','No Copyright information found.'); ?></h5>
  </div>
</footer>