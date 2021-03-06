<?php

namespace App\MyServices;

use MailchimpMarketing\ApiClient;


class Newsletter
{
    public function subscribe(string $email, string $list=null) {
        $list ??= config('services.mailchimp.list.subscribers');

        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us20',
        ]);
        return $mailchimp->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }






}
