<?php
session_start();

header('Content-Type: application/json');

// Initialize the cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['product'])) {
        // Add item to the cart
        $_SESSION['cart'][] = $input['product'];
        echo json_encode(['status' => 'success', 'message' => 'Product added to cart']);
        exit;
    }

    if (isset($input['action']) && $input['action'] === 'remove' && isset($input['index'])) {
        $index = $input['index'];

        // Remove item from the cart
        if (isset($_SESSION['cart'][$index])) {
            unset($_SESSION['cart'][$index]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
            echo json_encode(['status' => 'success', 'message' => 'Item removed from cart']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Item not found']);
        }
        exit;
    }
}

// Handle GET requests (fetch cart)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(['cart' => $_SESSION['cart']]);
    exit;
}

// Invalid request handling
http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
