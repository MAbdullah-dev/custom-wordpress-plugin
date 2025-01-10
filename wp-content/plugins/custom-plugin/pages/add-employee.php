<?php
$message = '';
$status = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    global $wpdb;

    // Sanitize input values
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $gender = sanitize_text_field($_POST['gender']);
    $designation = sanitize_text_field($_POST['designation']);

    // Insert data into the database
    $wpdb->insert(
        $wpdb->prefix . 'ems_form_data',
        array(
            'name' => $name,
            'email' => $email,
            'phoneNO' => $phone,
            'gender' => $gender,
            'designation' => $designation
        )
    );

    // Check if the insert was successful
    $last_insert_id = $wpdb->insert_id;
    if ($last_insert_id > 0) {
        $message = 'Employee saved successfully!';
        $status = 'success';
    } else {
        $message = 'Failed to save the employee.';
        $status = 'danger';
    }
}
?>
<div class="container mt-5">
    <h1 class="text-center mb-4">Employee Form</h1>
    <?php if (!empty($message)) : ?>
        <div class="alert alert-<?php echo esc_attr($status); ?>">
            <?php echo esc_html($message); ?>
        </div>
    <?php endif; ?>
    <form action="<?php echo esc_url(admin_url('admin.php?page=Employee-Management-System')); ?>" method="post" id="employeeForm">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter employee name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter employee email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter phone number" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Gender</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="other" value="Other">
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter designation" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>