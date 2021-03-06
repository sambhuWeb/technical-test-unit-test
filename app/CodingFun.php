<?php

namespace App;

use PHPUnit\Runner\Exception;

class CodingFun
{
    public function getFibonacciSequence($resultArraySize)
    {
        if (!is_numeric($resultArraySize)) {
            // TODO Generic Exception
            throw new \Exception('Array size must be numeric');
        }
        $result = [0, 1];
        for ($i = 2; $i < $resultArraySize; $i++) {
            $result[$i] = $result[$i - 1] + $result[$i - 2];
        }
        return $result;
    }

    public function getCustomerBalances($customerTransactions)
    {
        if (!is_array($customerTransactions)) {
            // TODO: Generic Exception
            throw new \Exception('Transaction must be an array');
        }

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
        $winners = [];
        $numberOfWinners = 0;

        foreach ($players as $name => $number) {
            if ($number === $winningNumber) {
                $winners[] = $name;
                $numberOfWinners++;
            }
        }

        $eachWinnerPrize = $totalWinnings / $numberOfWinners;

        sort($winners);

        $winnerWithPrize = [];

        foreach ($winners as $winner) {
            $winnerWithPrize[$winner] = $eachWinnerPrize;
        }

        return $winnerWithPrize;
    }
}
