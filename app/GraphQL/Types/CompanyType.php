<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Company;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CompanyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Company',
        'description' => 'A type of company',
        'model' => Company::class,
    ];

    public function fields(): array
    {
        return [
            "id" => [
                "type" => Type::id(),
                "description" => "The id of the company"
            ],
            "name" => [
                "type" => Type::string(),
                "description" => "The name of the company"
            ],
            "contact_email" => [
                "type" => Type::string(),
                "description" => "The contact email of the company"
            ],
            "street_address" => [
                "type" => Type::string(),
                "description" => "The street address of the company"
            ],
            "city" => [
                "type" => Type::string(),
                "description" => "The city of the company"
            ],
            "country" => [
                "type" => Type::string(),
                "description" => "The country of the company"
            ],
            "domain" => [
                "type" => Type::string(),
                "description" => "The domain of the company"
            ],
        ];
    }
}
