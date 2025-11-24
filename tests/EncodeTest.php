<?php

declare(strict_types=1);

namespace Tests;

use App\Exception\DecodeInvalidStringException;
use App\Exception\DecodeNullValueException;
use App\Exception\EncodeNullValueException;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;

/**
 * Class EncodeTest
 *
 * Tests unitaires pour la classe App\Encoding.
 * 
 * Chaque test suit le pattern AAA :
 *  - Arrange : préparation des données
 *  - Act     : exécution de la méthode à tester
 *  - Assert  : vérification du résultat
 *
 * Et respecte le principe FIRST :
 *  - Fast, Independent, Repeatable, Self-validating, Timely
 */
class EncodeTest extends TestCase
{
    private Encoding $encoder;

    /**
     * setUp() est appelée avant chaque test pour garantir l’isolation (FIRST - Independent).
     */
    protected function setUp(): void
    {
        $this->encoder = new Encoding();
    }

    #[TestWith(['test_string', 'dGVzdF9zdHJpbmc='])]
    #[TestWith(['', ''])]
    #[TestWith(['string_with_spécI4ls_c*har/actèrs', 'c3RyaW5nX3dpdGhfc3DDqWNJNGxzX2MqaGFyL2FjdMOocnM='])]
    public function testEncode($a, $intended): void
    {
        $this->assertSame($this->encoder->encode($a), $intended);
    }

    public function testEncodeNullValueThrowsException(): void
    {
        $this->expectException(EncodeNullValueException::class);

        $this->encoder->encode(null);
    }

    #[TestWith(['dGVzdF9zdHJpbmc=', 'test_string'])]
    #[TestWith(['', ''])]
    public function testDecode($a, $intended): void
    {
        $this->assertSame($this->encoder->decode($a), $intended);
    }

    #[TestWith(['invalid_b64_string'])]
    public function testDecodeInvalidStringThrowsException($a): void
    {
        $this->expectException(DecodeInvalidStringException::class);

        $this->encoder->decode($a);
    }

    public function testDecodeNullValueThrowsException(): void
    {
        $this->expectException(DecodeNullValueException::class);

        $this->encoder->decode(null);
    }
}
