<?php


namespace Vonq\Shared\Domain;


/**
 * Class Assert
 * @package Vonq\Shared\Domain
 */
final class Assert
{
    /**
     * @param string $class
     * @param array $items
     */
    public static function arrayOf(string $class, array $items): void
    {
        foreach ($items as $item) {
            self::instanceOf($class, $item);
        }
    }

    /**
     * @param string $class
     * @param $item
     */
    public static function instanceOf(string $class, $item): void
    {
        if (!$item instanceof $class) {
            throw new \InvalidArgumentException(
                sprintf('The object <%s> is not an instance of <%s>', $class, get_class($item))
            );
        }
    }
}
