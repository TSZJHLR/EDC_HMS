<?php

?>
<div id="stats-section" class="content-section">
    <h2>Statistics</h2>
    <div class="stats-grid">
        <div class="stat-card">
            <h3>Total Entries</h3>
            <p class="stat-number"><?php echo $stats['total'] ?? 0; ?></p>
        </div>
        <div class="stat-card">
            <h3>Male Participants</h3>
            <p class="stat-number"><?php echo $stats['male'] ?? 0; ?></p>
        </div>
        <div class="stat-card">
            <h3>Female Participants</h3>
            <p class="stat-number"><?php echo $stats['female'] ?? 0; ?></p>
        </div>
        <div class="stat-card">
            <h3>Other</h3>
            <p class="stat-number"><?php echo $stats['other'] ?? 0; ?></p>
        </div>
    </div>
</div>
