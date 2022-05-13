<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Company;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class CreateCompanyMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createCompany',
        'description' => 'A mutation for create a new company'
    ];

    public function type(): Type
    {
        return GraphQL::type('Company');
    }

    public function args(): array
    {
        return [
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

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $company = Company::create($args);
        return $company;
    }
}
