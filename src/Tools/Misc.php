<?php declare (strict_types = 1);

namespace Shtikov\CachePHP\Tools;

trait Misc
{
    /**
     * Convert mixed type value to boolean
     *
     * @param mixed $bool
     * @return boolean|null
     */
    public function toBool($bool): bool
    {
        if (!\is_string($bool)) {
            return (bool) $bool;
        }
        
        return strtolower($bool) === 'true' ? true : false;
    }

    /**
     * Convert mixed type value to integer
     *
     * @param mixed $int
     * @return integer|null
     */
    public function toInt($int): ?int
    {
        if (\is_null($int)) {
            return null;
        }

        return (int) $int;
    }

    /**
     * Convert mixed type value to float
     *
     * @param mixed $int
     * @return integer|null
     */
    public function toFloat($float): ?float
    {
        if (\is_null($float)) {
            return null;
        }

        return (float) $float;
    }

    /**
     * Convert mixed type value to array
     *
     * @param mixed $int
     * @return integer|null
     */
    public function toArray($array): ?array
    {
        if (!\is_string($array)) {
            return null;
        }

        $array = json_decode($array, true);

        if (JSON_ERROR_NONE != json_last_error()) {
            throw new \Exception('Json processing error.');
        }

        return $array;
    }
}