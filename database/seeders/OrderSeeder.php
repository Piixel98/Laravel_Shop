<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order1 = new Order([
            'id' => 1,
            'totalAmount' => 100,
            'paymentMethod' => 'CARD',
            'paymentStatus' => 'NEW',
            'firstName' => 'JORDI',
            'lastName' => 'SANCHEZ',
            'email' => 'jsanchez98@uoc.edu',
            'phone' => '666666666',
            'city' => null,
            'country' => null,
            'postalCode' => '08210',
            'address' => 'CL'
        ]);
        $order1->save();

        $orderLine1 = new OrderLine([
            'id' => 1,
            'id_order' => 1,
            'price' => '100',
            'sku' => 'COD000001',
            'quantity' => 2
        ]);
        $orderLine1->save();
        $orderLine1->product()->find(1);
        $order1->ordersLines()->save($orderLine1);

        $order2 = new Order([
            'id' => 2,
            'totalAmount' => 50,
            'paymentMethod' => 'PAYPAL',
            'paymentStatus' => 'COMPLETED',
            'firstName' => 'RICK',
            'lastName' => 'BOTIJO',
            'email' => 'mbotijo@uoc.edu',
            'phone' => '666666666',
            'city' => null,
            'country' => null,
            'postalCode' => '08210',
            'address' => 'CL'
        ]);
        $order2->save();

        $orderLine2 = new OrderLine([
            'id' => 2,
            'id_order' => 2,
            'price' => '200',
            'sku' => 'COD000002',
            'quantity' => 5
        ]);
        $orderLine2->save();
        $orderLine2->product()->find(2);
        $order1->ordersLines()->save($orderLine2);
    }
}
