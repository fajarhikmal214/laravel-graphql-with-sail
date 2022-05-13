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

use function PHPSTORM_META\type;

class UpdateCompanyMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateCompany',
        'description' => 'A mutation for update existing company data'
    ];

    public function type(): Type
    {
        return GraphQL::type('Company');
    }

    public function args(): array
    {
        return [
            "id" => [
                "type" => Type::id(),
                "description" => "The ID of the Company",
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
                "description" => "The city of the company HQ"
            ],
            "country" => [
                "type" => Type::string(),
                "description" => "The country of the company HQ"
            ],
            "domain" => [
                "type" => Type::string(),
                "description" => "The domain of the company"
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $company = Company::findOrFail($args['id']);

        $company->name = $args['name'];
        $company->contact_email = $args['contact_email'];
        $company->street_address = $args['street_address'];
        $company->city = $args['city'];
        $company->country = $args['country'];
        $company->domain = $args['domain'];

        $company->save();

        return $company;
    }
}
