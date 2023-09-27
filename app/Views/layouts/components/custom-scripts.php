<!-- popperjs -->
<script src="<?php echo base_url('assets/libs/@popperjs/core/umd/popper.min.js'); ?>"></script>

<!-- Custom-Switcher JS -->
<script src="<?php echo base_url('assets/js/custom-switcher.js'); ?>"></script>

<!-- Preline JS -->
<script src="<?php echo base_url('assets/libs/preline/preline.js'); ?>"></script>

<?= $this->renderSection('scripts'); ?>

<!-- auto close alert -->
<script>
        setTimeout(function () {
                var toastContainer = document.querySelector('.toast-container');
                if (toastContainer) {
                        toastContainer.style.transform = 'translateY(-200%)';
                }
        }, 3000);
</script>