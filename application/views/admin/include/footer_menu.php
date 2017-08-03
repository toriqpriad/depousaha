<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <strong>Halaman Administrator</strong>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
          <?php
          if (isset($site)) {
            echo $site->site_name;
          }
          ?> &copy; <script>document.write(new Date().getFullYear())</script>
        </div>
    </div>
</footer>

</div>
</div>
</body>
