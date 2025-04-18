<?php


namespace App\Services;

use App\Repositories\StripeRepository;
use App\Repositories\PaypalRepository;

class PaymentService
{
    protected $stripeRepository, $paypalRepository;

    public function __construct(StripeRepository $stripeRepository, PaypalRepository $paypalRepository)
    {
        $this->stripeRepository = $stripeRepository;
        $this->paypalRepository = $paypalRepository;
    }

    public function processPayment(array $data)
    {
        switch ($data['payment_type']) {
            case 'stripe':
                return $this->stripeRepository->handlePayment($data);

            case 'paypal':
                return $this->paypalRepository->handlePayment($data);

            default:
                throw new \Exception('Unsupported payment type');
        }
    }
}
