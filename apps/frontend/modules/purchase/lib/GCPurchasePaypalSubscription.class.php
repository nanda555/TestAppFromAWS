<?php
// Created By Nandakumar
// Aug 02, 2015
// This class handles subscription purchases for GlobalClassroom.
class GCPurchasePaypalSubscription extends GCPurchasePaypalRecurring
{
    function __construct($purchase_id, $billing_data)
    {
        parent::__construct($purchase_id, $billing_data);
        $this->setAmount();
        $this->setStartDate();
        $this->setGCFee();
    }
	
	/**
	* this function sets the amount of purchase
	*/	
    public function setAmount($amount = null)
    {
		//echo $this->my_purchase->getPurchaseTypeId()."=".$this->my_purchase->getPurchaseTypeEschoolId();
		$type_id_arr = explode("~", $this->my_purchase->getPurchaseTypeId());
		$product_details = GcrProductsTable::getProductDetails($type_id_arr[0], $type_id_arr[1], $this->my_purchase->getPurchaseTypeEschoolId());
		foreach($product_details as $product) {
			$this->amount = $product->getCost();
		}
		//echo time()."=".$this->amount;exit;
    }
    public function setGCFee($fee = null)
    {
        $this->gc_fee = 0;
    }
	/**
	* this function sets the start date purchase
	*/		
    public function setStartDate($start_date = null)
    {
        $this->start_date = date('Y-n-j', time()) . 'T0:0:0';
		//echo $this->start_date;exit;
    }
	
	/**
	* this function sends purchase info details email
	*/		
    public function emailPurchaseInfo()
    {
        $product_info = 'Subscription, billed ' . $this->my_purchase->getBillCycle() . 'ly';
        parent::emailPurchaseInfo($product_info);
    }
	
	/**
	* this function executes purchase details in screen
	*/		
    public function emailReceipt()
    {
        $user = $this->my_purchase->getPurchaserUser();
        $institution = $user->getApp();
        $trial_length = 0;
		$type_id_arr = explode("~", $this->my_purchase->getPurchaseTypeId());
		$product_details = GcrProductsTable::getProductDetails($type_id_arr[0], $type_id_arr[1], $this->my_purchase->getPurchaseTypeEschoolId());
		foreach($product_details as $product) {
			$trial_length = $product->getExpiryNoOfDays();
		}		
        $trial_end_date = date('F j, Y', $trial_length * self::DAY + time());

        $params = array('institution_full_name' => $institution->getFullName(),
                        'institution_short_name' => $institution->getShortName(),
                        'trial_end_date' => $trial_end_date,
                        'amountCharged' => number_format($this->amount, 2),
                        'trial_length' => $trial_length,
                        'cycle_text' => strtolower($this->my_purchase->getBillCycle()) . 'ly');
        $email = new GcrUserEmailer('purchase_subscription', $user,
                 "Thank you for purchasing a Subscription from " . $institution->getFullName() . "!", $params);
        $email->sendHtmlEmail();
    }
	
	/**
	* this function updated purchase details in join tables
	*/		
    public function providePurchasedUtility()
    {
        global $CFG;
        if (!$institution = $this->my_purchase->getPurchaseTypeApp())
        {
            $CFG->current_app->gcError("Subscription purchase error: " . 'institution ' .
                    $this->my_purchase->getPurchaseTypeId() . ' not found', 'gcdatabaseerror');
        }
        if (!$mhr_user = $this->my_purchase->getPurchaserUser())
        {
            $CFG->current_app->gcError("Subscription purchase error: " . 'Purchaser User ' .
                    $this->my_purchase->getUserId() . ' not found', 'gcdatabaseerror');
        }
        $mhr_user_obj = $mhr_user->getObject();
        // add as auth type institution user on home to grant access to system
        //$mhr_user->addMhrInstitutionMembership(false, true);
		$type_id_arr = explode("~", $this->my_purchase->getPurchaseTypeId());
		$mhr_user->addMhrInstitutionSubscription($type_id_arr[0], true);
    }
}