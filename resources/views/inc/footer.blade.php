<footer class="footer mt-auto py-3 bg-light">
  <?php
    $dt = new DateTime("now", new DateTimeZone('Europe/Warsaw'));
  ?>
    <div class="container d-flex justify-content-between">
      <span class="text-muted">webtic v. 1.0.0</span>
      <span class="text-muted">SERVER TIME: {{date('Y-m-d H:i:s')}}</span>
      <span class="text-muted">LOCAL TIME: {{$dt->format('Y-m-d, H:i:s')}}</span>
    </div>
</footer>