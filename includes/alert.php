<?php

if(isset($alert) && !empty($alert['message'])): 

?>

    <div class="alert alert-<?php echo $alert['type']; ?>">
        <?php echo htmlspecialchars($alert['message']); ?>
    </div>

<?php endif; ?>