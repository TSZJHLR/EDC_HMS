<?php

?>
<footer class="<?php echo isset($footerClass) ? $footerClass : 'footer'; ?>">
    <div class="container">
        <p>&copy; 2025 Electronic Data Capture System. All rights reserved.</p>
    </div>
</footer>

<script src="assets/js/main.js"></script>

<?php if(isset($includeJS)): ?>
    <?php foreach($includeJS as $js): ?>
        <script src="<?php echo $js; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>