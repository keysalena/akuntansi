<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
         
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        Copyright &copy; 2023
                        <a href="." class="link-secondary">Tabler</a>.
                        All rights reserved.
                    </li>
                    <li class="list-inline-item">
                        <a href="./changelog.html" class="link-secondary" rel="noopener">
                            v1.0.0-beta20
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Libs JS -->
<script src="<?= base_url() ?>assets/dist/libs/apexcharts/dist/apexcharts.min.js?1692870487" defer></script>
<script src="<?= base_url() ?>assets/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1692870487" defer></script>
<script src="<?= base_url() ?>assets/dist/libs/jsvectormap/dist/maps/world.js?1692870487" defer></script>
<script src="<?= base_url() ?>assets/dist/libs/jsvectormap/dist/maps/world-merc.js?1692870487" defer></script>
<!-- Tabler Core -->
<script src="<?= base_url() ?>assets/dist/js/tabler.min.js?1692870487" defer></script>
<script src="<?= base_url() ?>assets/dist/js/demo.min.js?1692870487" defer></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
<script>
    if (!localStorage.getItem('authToken')) {
        window.location.href = "<?= base_url('login') ?>";
    }
</script>