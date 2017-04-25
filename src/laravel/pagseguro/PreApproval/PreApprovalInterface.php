<?php

namespace laravel\pagseguro\PreApproval;

/**
 * PreApproval Interface
 *
 * @category   PreApproval
 * @package    Laravel\PagSeguro\PreApproval
 *
 * @author     Maiko de Andrade <maikovisky@gmail.com>
 * @since      2017-04-24
 *
 * @copyright  Laravel\PagSeguro
 */
interface PreApprovalInterface
{

    /**
     * Constructor
     * @param array $data
     */
    public function __construct(array $data = []);

    /**
     * Get Unique Identifier (ID)
     * @return int
     */
    public function getId();

    /**
     * Get Description (Descrição)
     * @return string
     */
    public function getName();

    /**
     * Get Quantity (Quantidade)
     * @return int
     */
    public function getCharge();

    /**
     * Get Amount (Preço unitário)
     * @return float
     */
    public function getPeriod();

    /**
     * Get Weight (Peso)
     * @return float
     */
    public function getAmountPerPayment();

    /**
     * Get Shipping Cost (Frete)
     * @return float
     */
    public function getMemberShipFee();

    /**
     * Get Width (Largura)
     * @return float
     */
    public function getTrialPeriodDuration();

    /**
     * Get Height (Altura)
     * @return float
     */
    public function getDetail();

    /**
     * Get Length (Comprimento)
     * @return float
     */
    public function getMaxAmountPerPeriod();

        /**
     * set Unique Identifier (ID)
     * @return int
     */
    public function setId($id);

    /**
     * set Description (Descrição)
     * @return string
     */
    public function setName($name);

    /**
     * set Quantity (Quantidade)
     * @return int
     */
    public function setCharge($charge);

    /**
     * set Amount (Preço unitário)
     * @return float
     */
    public function setPeriod($preriod);

    /**
     * set Weight (Peso)
     * @return float
     */
    public function setAmountPerPayment($amountPerPayment);

    /**
     * set Shipping Cost (Frete)
     * @return float
     */
    public function setMemberShipFee($memberShipFee);

    /**
     * set Width (Largura)
     * @return float
     */
    public function setTrialPeriodDuration($trialPeriodDuration);

    /**
     * set Height (Altura)
     * @return float
     */
    public function setDetail($detail);

    /**
     * set Length (Comprimento)
     * @return float
     */
    public function setMaxAmountPerPeriod($maxAmountPerPeriod);

    /**
     * Proxies Data Hydrate
     * @param array $data
     * @return object
     */
    public function hydrate(array $data = []);

    /**
     * Test Valid Data
     * @return bool
     */
    public function isValid();

    /**
     * Get Validator
     * Return only after hydrate
     * @return null|\Illuminate\Validation\Validator
     */
    public function getValidator();

    /**
     * Cast Array
     * @return array
     */
    public function toArray();
}
