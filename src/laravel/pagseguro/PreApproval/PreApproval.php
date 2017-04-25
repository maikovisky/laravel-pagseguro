<?php

namespace laravel\pagseguro\PreApproval;

use laravel\pagseguro\Complements\DataHydratorTrait\DataHydratorTrait;
use laravel\pagseguro\Complements\ValidateTrait;

/**
 * Item Object
 *
 * @category   Item
 * @package    Laravel\PagSeguro\PreApproval
 *
 * @author     Maiko de Andrade <maikovisky@gmail.com>
 * @since      2017-04-24
 *
 * @copyright  Laravel\PagSeguro
 */
class PreApproval implements PreApprovalInterface
{

    /**
     * Item Unique Identifier (ID)
     * @var integer|string
     */
    protected $id;

    /**
     * Item Description (Descrição)
     * @var string
     */
    protected $name;

    /**
     * Item Quantity (Quantidade)
     * @var int
     */
    protected $charge;

    /**
     * Item amount (Preço unitário)
     * @var float
     */
    protected $period;

    /**
     * Item Weight (Peso)
     * @var float
     */
    protected $amountPerPayment;

    /**
     * Item Shipping Cost (Valor de Trasporte / Frete)
     * @var float
     */
    protected $memberShipFee;

    /**
     * Item Width (Largura)
     * @var float
     */
    protected $trialPeriodDuration;

    /**
     * Item Height (Altura)
     * @var float
     */
    protected $detail;

    /**
     * Item Lenght (Comprimento)
     * @var float
     */
    protected $maxAmountPerPeriod;


    use DataHydratorTrait, ValidateTrait {
        ValidateTrait::getHidratableVars insteadof DataHydratorTrait;
    }

    /**
     * Constructor
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        if (count($data)) {
            $this->hydrate($data);
        }
    }

    /**
     * Get Unique Identifier (ID)
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Description (Descrição)
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get Quantity (Quantidade)
     * @return int
     */
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * Get Amount (Preço unitário)
     * @return float
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Get Weight (Peso)
     * @return float
     */
    public function getAmountPerPayment()
    {
        return $this->amountPerPayment;
    }

    /**
     * Get Shipping Cost (Frete)
     * @return float
     */
    public function getMemberShipFee()
    {
        return $this->memberShipFee;
    }

    /**
     * Get Width (Largura)
     * @return float
     */
    public function getTrialPeriodDuration()
    {
        return $this->trialPeriodDuration;
    }

    /**
     * Get Height (Altura)
     * @return float
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Get Length (Comprimento)
     * @return float
     */
    public function getMaxAmountPerPeriod()
    {
        return $this->maxAmountPerPeriod;
    }

    /**
     * Set Unique Identifier (ID)
     * @param int $id
     * @return Item
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set Description (Descrição)
     * @param string $description
     * @return Item
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set Quantity (Quantidade)
     * @param int $quantity
     * @return Item
     */
    public function setCharge($charge)
    {
        $this->charge = $charge;
        return $this;
    }

    /**
     * Set Amount (Preço)
     * @param float $period
     * @return Item
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }

    /**
     * Set Weight (Peso)
     * @param float $amountPerPayment
     * @return Item
     */
    public function setAmountPerPayment($amountPerPayment)
    {
        $this->amountPerPayment = $amountPerPayment;
        return $this;
    }

    /**
     * Set Shipping Cost (Frete)
     * @param float $memberShipFee
     * @return Item
     */
    public function setMemberShipFee($memberShipFee)
    {
        $this->memberShipFee = $memberShipFee;
        return $this;
    }

    /**
     * Set Width (Largura)
     * @param float $trialPeriodDuration
     * @return Item
     */
    public function setTrialPeriodDuration($trialPeriodDuration)
    {
        $this->trialPeriodDuration = $trialPeriodDuration;
        return $this;
    }

    /**
     * Set Height (Altura)
     * @param float $detail
     * @return Item
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
        return $this;
    }

    /**
     * Set Length (Comprimento)
     * @param float $maxAmountPerPeriod
     * @return Item
     */
    public function setMaxAmountPerPeriod($maxAmountPerPeriod)
    {
        $this->maxAmountPerPeriod = $maxAmountPerPeriod;
        return $this;
    }

    /**
     * Get Validation Rules
     * @return ValidationRules
     */
    public function getValidationRules()
    {
        return new ValidationRules();
    }

    public static function factory(array $data = [])
    {
        $collectionPreApproval = [];
        $itr = new \ArrayIterator($data);
        while ($itr->valid()) {
            $preApproval = $itr->current();
            dd($preApproval);
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
