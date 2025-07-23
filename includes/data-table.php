<?php

?>
<div id="data-table-section" class="content-section active">
    <h2>Data Entries</h2>
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Participant ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($entries as $entry): ?>
                <tr>
                    <td><?php echo htmlspecialchars($entry['participant_id']); ?></td>
                    <td><?php echo htmlspecialchars($entry['first_name'] . ' ' . $entry['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($entry['email']); ?></td>
                    <td><?php echo htmlspecialchars($entry['date_of_birth'] ?? 'N/A'); ?></td>
                    <td><?php echo htmlspecialchars($entry['gender'] ?? 'N/A'); ?></td>
                    <td>
                        <button onclick="editEntry(<?php echo $entry['id']; ?>)" class="btn btn-edit">Edit</button>
                        <button onclick="deleteEntry(<?php echo $entry['id']; ?>)" class="btn btn-delete">Delete</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>