<?php


namespace App\GraphQL\Type;

use DateTimeImmutable;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Type\Definition\ScalarType;

class DateTimeType extends ScalarType
{
    /**
     * @var string
     */
    public $name = 'DateTime';

    /**
     * @var string
     */
    public $description = 'The `DateTime` scalar type represents time data, represented as an ISO-8601 encoded UTC date string.';

    /**
     * @param mixed $value
     *
     * @return string
     */
    public function serialize($value): string
    {
        return $value->format(\DateTime::ATOM);
    }

    /**
     * @param mixed $value
     *
     * @return \DateTimeImmutable|null
     */
    public function parseValue($value): ?DateTimeImmutable
    {
        return \DateTimeImmutable::createFromFormat(\DateTime::ATOM, $value) ?: null;
    }

    /**
     * @param \GraphQL\Language\AST\Node $ast
     * @param array $variables
     *
     * @return \DateTime|mixed|null
     */
    public function parseLiteral($ast, ?array $variables = null)
    {
        if ($ast instanceof StringValueNode) {
            try {
                return new \DateTime($ast->value);
            } catch (\Exception $e) {
                return null;
            }
        }

        return null;
    }
}
