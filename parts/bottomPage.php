<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    // Initialize Materialize components
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
    });
    
</script>
<?php
    // Php code to show popup on page
    if (isset($_SESSION['message']) && $_SESSION['message'] != null && $_SESSION['message'] != "") {
        echo '<script>M.toast({html: "'.$_SESSION['message'].'", classes: "rounded"})</script>';
        unset($_SESSION['message']);
    }
    if(isset($_SESSION['error']) && $_SESSION['error'] != null && $_SESSION['error'] != "") {
        echo '<script>M.toast({html: "'.$_SESSION['error'].'", classes: "red"})</script>';
        unset($_SESSION['error']);
    };
?>