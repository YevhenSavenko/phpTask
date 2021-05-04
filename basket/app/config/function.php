<?php

function initialSessionArray(): void
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [
            'products' => [],
        ];
    }
}

function getTotalProducts(): int
{
    $quantityProducts = 0;

    if ((isset($_SESSION['cart']['products']) && (count($_SESSION['cart']['products']) > 0)) && is_array($_SESSION['cart']['products'])) {
        $quantityProducts = array_sum($_SESSION['cart']['products']);
    }

    return $quantityProducts;
}

function  getMessageAboutTotal(int $count): string
{
    $temp = $count > 1 ? 'items' : 'item';
    $temp = 'added ' . getTotalProducts() . ' ' . $temp;

    return $temp;
}

function getTotalCart(): float
{
    global $products;
    $total = 0;

    if ((isset($_SESSION['cart']['products']) && (count($_SESSION['cart']['products']) > 0)) && is_array($_SESSION['cart']['products'])) {
        $allKeysInCart = $_SESSION['cart']['products'];

        foreach ($allKeysInCart as $key => $value) {
            if (array_key_exists($key, $products)) {
                $total += $products[$key]['price'] * $value;
            }
        }
    }

    return $total;
}

function resetCart(): void
{
    if ((isset($_SESSION['cart']['products']) && (count($_SESSION['cart']['products']) > 0)) && is_array($_SESSION['cart']['products'])) {
        $_SESSION['cart']['products'] = [];
    }
}
