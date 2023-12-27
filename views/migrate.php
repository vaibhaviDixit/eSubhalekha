<?php
errors();
// Define the SQL table names and their corresponding SQL files
        $tables = [
            'users' => 'auth/users.sql',
            'logs' => 'auth/logs.sql',
            'visitors' => 'auth/visitors.sql',
            'weddings' => 'weddings/weddings.sql',
            'wedding_images' => 'weddings/wedding_images.sql',
            // Add more tables as needed
        ];
        
        // Migrate tables
        $migrate = Migrator::migrate($tables);
        
        echo json_encode($migrate);