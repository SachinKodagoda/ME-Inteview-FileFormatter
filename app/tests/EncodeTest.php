<?php

declare(strict_types=1);

include '../helpers/Encode.php';

use PHPUnit\Framework\TestCase;

final class EncodeTest extends TestCase
{


    public function testCsvInputGetJson(): void
    {
        $encode = new Encode();
        $this->assertJsonStringEqualsJsonFile(
            './files/output.json',
            $encode->getJsonVal('C:\xampp\htdocs\interview\app\tests\files\input.csv', 'csv')
        );
    }

    public function testJsonInputGetJson(): void
    {
        $encode = new Encode();
        $this->assertJsonStringEqualsJsonFile(
            './files/output.json',
            $encode->getJsonVal('C:\xampp\htdocs\interview\app\tests\files\input.json', 'json')
        );
    }

    public function testYamlInputGetJson(): void
    {
        $encode = new Encode();
        $this->assertJsonStringEqualsJsonFile(
            './files/output.json',
            $encode->getJsonVal('C:\xampp\htdocs\interview\app\tests\files\input.yaml', 'yaml')
        );
    }

    public function testArrayOutput(): void
    {
        $encode = new Encode();
        $this->assertTrue(
            is_array($encode->get_encoded_data(
                'C:\xampp\htdocs\interview\app\tests\files\input.yaml',
                'yaml'
            ))
        );
    }

    public function testYamlOutput(): void
    {
        $encode = new Encode();
        $this->assertSame(
            "[{ id: '53421926', title: Dr }]",
            $encode->getYamlVal('C:\xampp\htdocs\interview\app\tests\files\input.json', 'json')
        );
    }

    public function testCsvOutput(): void
    {
        $encode = new Encode();
        $this->assertSame(
            "id,title\n53421926,Dr\n",
            $encode->getCsvVal('C:\xampp\htdocs\interview\app\tests\files\input.csv', 'csv')
        );
    }
}
