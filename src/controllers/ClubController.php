<?php

class ClubController {
    
    public function index() {
        // Load the home view
        require_once __DIR__ . '/../views/home/home.blade.php';
    }
}