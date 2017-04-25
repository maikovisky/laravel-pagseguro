<?php

namespace laravel\pagseguro\PreApproval;

/**
 * PreApproval Collection Object
 *
 * @category   PreApproval
 * @package    Laravel\PagSeguro\PreApproval
 *
 * @author     Maiko de Andrade <maikovisky@gmail.com>
 * @since      2017-04-24
 *
 * @copyright  Laravel\PagSeguro
 */
class PreApprovalCollection extends \ArrayObject
{

    /**
     * Factory PreApprovalCollection (Cria coleção de PreApproval)
     * @param array $data PreApproval
     * @return PreApprovalCollection
     * @throws \InvalidArgumentException
     */
    public static function factory(array $data = [])
    {
        $collectionPreApproval = [];
        $itr = new \ArrayIterator($data);
        while ($itr->valid()) {
            $preApproval = $itr->current();
            if ($preApproval instanceof PreApprovalInterface) {
                $collectionPreApproval[] = $preApproval;
            } elseif (is_array($preApproval)) {
                $collectionPreApproval[] = new PreApproval($preApproval);
            } else {
                $exptMsg = sprintf('Invalid preApproval on key: %s', $itr->key());
                throw new \InvalidArgumentException($exptMsg);
            }
            $itr->next();
        }
        return new self($collectionPreApproval);
    }
}
