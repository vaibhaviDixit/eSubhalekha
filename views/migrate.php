<?php
errors();
// Define the SQL table names and their corresponding SQL files
        $tables = [
            'users' => 'auth/users.sql',
            'logs' => 'auth/logs.sql',
            'verification' => 'auth/verification.sql',
            'visitors' => 'auth/visitors.sql',
            'weddings' => 'weddings/weddings.sql',
            'gallery' => 'weddings/gallery.sql',
            'payments' => 'weddings/payments.sql',
            'guests' => 'weddings/guests.sql',
            // Add more tables as needed
        ];
        
        // Migrate tables
        $migrate = Migrator::migrate($tables);
        
        echo json_encode($migrate);