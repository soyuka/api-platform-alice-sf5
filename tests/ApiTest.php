<?php

/*
 * This file is part of the API Platform By Examples project.
 *
 * (c) Antoine Bluchet <soyuka@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\Constraint\MatchesJsonSchema;
use JsonSchema\Constraints\Constraint;

class ApiTest extends ApiTestCase
{
    public function testGetCollection(): void
    {
        $response = static::createClient()->request('GET', '/api/cars');
        $this->assertResponseIsSuccessful();
    }

    const OPEN_API_JSON_SCHEMA_V2_URL = 'https://raw.githubusercontent.com/OAI/OpenAPI-Specification/master/schemas/v2.0/schema.json';
    const OPEN_API_JSON_SCHEMA_V3_URL = 'https://raw.githubusercontent.com/OAI/OpenAPI-Specification/master/schemas/v3.0/schema.json';

    // public function testOpenApiV2Validation()
    // {
    //
    //     $schema = json_decode(file_get_contents(self::OPEN_API_JSON_SCHEMA_V2_URL));
    //     $response = static::createClient()->request(
    //         'GET',
    //         '/api/docs.json',
    //         [
    //             'headers' => ['Accept' => 'application/json'],
    //             'query' => ['spec_version' => 2],
    //         ]
    //     );
    //
    //     $this->assertMatchesJsonSchema($schema);
    // }

    public function testOpenApiV3Validation()
    {
        static::createClient()->request(
            'GET',
            '/api/docs.json',
            [
                'headers' => ['Accept' => 'application/json'],
                'query' => ['spec_version' => 3],
            ]
        );
        $this->assertMatchesJsonSchema(file_get_contents(self::OPEN_API_JSON_SCHEMA_V3_URL));
    }
}
