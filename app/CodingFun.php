<?php

namespace App;

use App\Exceptions\InvalidArgumentException;
use App\Exceptions\InvalidNumberException;

class CodingFun
{
    public function getFibonacciSequence($resultArraySize)
    {
        if (is_string($resultArraySize)) {
            throw new InvalidArgumentException('Array size is not a number!');
        }

        if ($resultArraySize < 0) {
            throw new InvalidNumberException('Number should not be negative');
        }

        $result = [];
        for ($i = 0; $i < $resultArraySize; $i++) {
            if ($i < 2) {
                $result[$i] = $i;
                continue;
            }
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
