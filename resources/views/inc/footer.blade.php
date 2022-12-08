<footer class="footer mt-auto py-3 bg-light">
  <?php
    $warsaw = new DateTime("now", new DateTimeZone('Europe/Warsaw'));
    $perth = new DateTime("now", new DateTimeZone('Australia/Perth'));
    $toronto = new DateTime("now", new DateTimeZone('America/Toronto'));
  ?>
    <div class="container d-flex justify-content-between">
      <span class="text-muted">webtic v. 1.0.0</span>
      <span class="text-muted">SERVER TIME: {{date('Y-m-d H:i:s')}}</span>
      <span class="text-muted">LOCAL TIME: {{$warsaw->format('Y-m-d H:i:s')}}</span>
      <span class="text-muted">PERTH TIME: {{$perth->format('Y-m-d H:i:s')}}</span>
      <span class="text-muted">TORONTO TIME: {{$toronto->format('Y-m-d H:i:s')}}</span>
    </div>
</footer>