<?php

class CodingFunTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider fibonacciSequenceNumberProvider
     * @param $arraySize
     * @param $fibSequence
     * @throws Exception
     */
    public function testGetFibonacciSequence($arraySize, $fibSequence): void
    {
        $codingFun = new \App\CodingFun();

        $resultArraySize = $arraySize;

        $result = $codingFun->getFibonacciSequence($resultArraySize);

        $this->assertEquals($fibSequence, $result, "Result is incorrect.");
    }

    public function testInvalidNumberExceptionForNegativeNumber(): void
    {
        $this->expectException(\App\Exceptions\InvalidNumberException::class);

        $codingFun = new \App\CodingFun();

        $codingFun->getFibonacciSequence(-1);
    }

    public function testInvalidArgumentExceptionForNonNumericArraySize(): void
    {
        $this->expectException(\App\Exceptions\InvalidArgumentException::class);

        $codingFun = new \App\CodingFun();

        $codingFun->getFibonacciSequence('1');
    }

    public function fibonacciSequenceNumberProvider(): array
    {
        return [
            [10, [0, 1, 1, 2, 3, 5, 8, 13, 21, 34]],
            [5, [0, 1, 1, 2, 3]],
            [1, [0]],
            [2, [0, 1]],
            [0, []]
        ];
    }

    public function testGetCustomerBalances(): void
    {
        $codingFun = new \App\CodingFun();

        $customerTransactions = [
            'bill=9898',
            'bob=772',
            'james=2672',
            'jim=9872',
            'luke=2665',
            'jim=10000'
        ];

        $result = $codingFun->getCustomerBalances($customerTransactions);

        $this->assertEquals(
            [
                'bill' => 9898,
                'bob' => 772,
                'james' => 2672,
                'jim' => 19872,
                'luke' => 2665
            ],
            $result,
            'Result is incorrect.'
        );
    }

    public function testGetLotteryWinningsForSoleWinner(): void
    {
        $codingFun = new \App\CodingFun();

        $totalWinnings = 212000;
        $winningNumber = 123777;
        $players = [
            'matt' => 187658,
            'kate' => 898722,
            'andy' => 772782,
            'jeremy' => 882992,
            'christian' => 900220,
            'eva' => 123777,
            'jenny' => 989772,
            'corrie' => 123456
        ];

        $result = $codingFun->getLotteryWinnings($totalWinnings, $winningNumber, $players);

        $this->assertEquals(['eva' => 212000], $result, 'Result is incorrect.');
    }

    public function testGetLotteryWinningsForMultipleWinners(): void
    {
        $codingFun = new \App\CodingFun();

        $totalWinnings = 2557767;
        $winningNumber = 223344;
        $players = [
            'matt' => 187658,
            'kate' => 898722,
            'andy' => 223344,
            'jeremy' => 223344,
            'christian' => 900220,
            'eva' => 123777,
            'jenny' => 223344,
            'corrie' => 123456
        ];

        $result = $codingFun->getLotteryWinnings($totalWinnings, $winningNumber, $players);

        $this->assertEquals(
            [
                'andy' => 852589,
                'jenny' => 852589,
                'jeremy' => 852589
            ],
            $result,
            'Result is incorrect.'
        );
    }
}
