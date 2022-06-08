<?php if(session()->has('livewire-alert')): ?>
    <script> 
        window.onload = event => {
            flashAlert(
                <?php echo json_encode(session('livewire-alert'), 15, 512) ?>
            ) 
        }
    </script>
<?php endif; ?><?php /**PATH /home/sbonder/plug.sboniso.org.za/vendor/jantinnerezo/livewire-alert/src/../resources/views/components/flash.blade.php ENDPATH**/ ?>