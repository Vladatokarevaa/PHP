<?php
// Определение массива транзакций
$transactions = [
    [
        "transaction_id" => 1,
        "transaction_date" => "2019-01-01",
        "transaction_amount" => 100.00,
        "transaction_description" => "Payment for groceries",
        "merchant_name" => "SuperMart",
    ],
    [
        "transaction_id" => 2,
        "transaction_date" => "2020-02-15",
        "transaction_amount" => 75.50,
        "transaction_description" => "Dinner with friends",
        "merchant_name" => "Local Restaurant",
    ],
    [
        "transaction_id" => 3,
        "transaction_date" => "2021-05-20",
        "transaction_amount" => 50.25,
        "transaction_description" => "Fuel purchase",
        "merchant_name" => "Gas Station",
    ],
    [
        "transaction_id" => 4,
        "transaction_date" => "2022-10-10",
        "transaction_amount" => 120.75,
        "transaction_description" => "Shopping",
        "merchant_name" => "Online Store",
    ],
];

// Вывод HTML таблицы
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
</head>
<body>
    <h3>Transactions</h3>
    <table border="1">
        <tr style="background-color: #a6a6a6; color: #252525">
            <th>ID</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Merchant</th>
        </tr>
        <?php foreach ($transactions as $transaction): ?>
        <tr>
            <td><?= $transaction["transaction_id"] ?></td>
            <td><?= $transaction["transaction_date"] ?></td>
            <td><?= $transaction["transaction_amount"] ?></td>
            <td><?= $transaction["transaction_description"] ?></td>
            <td><?= $transaction["merchant_name"] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php
    // Определение пользовательских функций
    function calculateTotalAmount($transactions) {
        $totalAmount = 0;
        foreach ($transactions as $transaction) {
            $totalAmount += $transaction["transaction_amount"];
        }
        return $totalAmount;
    }

    function calculateAverage($transactions) {
        $totalAmount = calculateTotalAmount($transactions);
        $numTransactions = count($transactions);
        if ($numTransactions > 0) {
            return $totalAmount / $numTransactions;
        } else {
            return 0;
        }
    }

    function mapTransactionDescriptions($transactions) {
        $descriptions = array_map(function($transaction) {
            return $transaction["transaction_description"];
        }, $transactions);
           return $descriptions;
    }

    // Вывод результатов работы пользовательских функций
    echo "Total amount of all transactions: " . calculateTotalAmount($transactions) . "<br>";
    echo "Average of all transactions: " . calculateAverage($transactions) . "<br>";
    echo "Array with transaction descriptions: ";
    print_r(mapTransactionDescriptions($transactions));
    ?>
</body>
</html>

