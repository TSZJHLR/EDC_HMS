<?php

?>
<div id="add-form-section" class="content-section">
    <h2 id="form-title">Add New Entry</h2>
    <form id="data-form" method="POST" action="">
        <input type="hidden" name="action" value="create">
        <input type="hidden" id="entry-id" name="id">
        <input type="hidden" name="csrf_token" value="<?php echo Security::generateCSRFToken(); ?>">
        
        <div class="form-group">
            <label for="participant_id">Participant ID *</label>
            <input type="text" id="participant_id" name="participant_id" required 
                   pattern="[A-Z0-9]{6,10}" title="6-10 uppercase letters and numbers">
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="first_name">First Name *</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            
            <div class="form-group">
                <label for="last_name">Last Name *</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" id="date_of_birth" name="date_of_birth">
            </div>
            
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea id="notes" name="notes" rows="3"></textarea>
        </div>
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Entry</button>
            <button type="button" onclick="resetForm()" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</div>
