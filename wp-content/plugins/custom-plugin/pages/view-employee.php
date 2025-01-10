<?php
global $wpdb;
$employees = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}ems_form_data", ARRAY_A);

?>
<div class="container mt-5">
    <h1 class="text-center mb-4">Employee Table</h1>

    <table id="employeeTable" class="table table-striped table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Designation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($employees)) { // Check if employees exist 
            ?>
                <?php foreach ($employees as $index => $employee) { // Loop through each employee 
                ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><?php echo esc_html($employee['name']); ?></td>
                        <td><?php echo esc_html($employee['email']); ?></td>
                        <td><?php echo esc_html($employee['phoneNO']); ?></td>
                        <td><?php echo ucfirst(esc_html($employee['gender'])); ?></td>
                        <td><?php echo esc_html($employee['designation']); ?></td>
                        <td>
                            <a class="btn btn-warning " href="admin.php?page=Employee-Management-System&action=edit&empId=<?php echo esc_attr($employee['id']); ?>">Edit</a>
                            <a class="btn btn-danger " href="admin.php?page=ems_view_employee&empId=<?php echo esc_attr($employee['id']); ?>">Delete</a>
                            <!-- <button class="btn btn-danger btn-sm">Delete</button> -->
                            <a class="btn btn-info " href="admin.php?page=Employee-Management-System&action=view&empId=<?php echo esc_attr($employee['id']); ?>">view</a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { // If no employees found 
            ?>
                <tr>
                    <td colspan="7" class="text-center">No employees found.</td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</div>