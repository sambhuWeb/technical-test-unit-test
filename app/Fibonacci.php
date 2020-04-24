<?php

namespace App;

class Fibonacci
{
    public function getFibonacciSequence($resultArraySize)
    {
        $result = [0, 1];
        for ($i = 2; $i < $resultArraySize; $i++) {
            $result[$i] = $result[$i - 1] + $result[$i - 2];
        }
        return $result;
    }

    public function getCustomerBalances($customerTransactions)
    {
        $result = [];
        foreach ($customerTransactions as $customerTransaction) {
            $customerTransactionParts = explode('=', $customerTransaction);
            $customerName = $customerTransactionParts[0];
            $amount = $customerTransactionParts[1];

            if (array_key_exists($customerName, $result)) {
                $total = $result[$customerName] + $amount;
                $result[$customerName] = $total;
            } else {
                $result[$customerName] = $amount;
            }
        }

        return $result;
    }

    public function getLotteryWinnings($totalWinnings, $winningNumber, $players)
    {
        //
    }
}