<?php

namespace ywanyi\log;

use yii\httpclient\Client;
use yii\log\Target;

/**
 * ```php
 * 'components' => [
 *     'log' => [
 *          'targets' => [
 *              [
 *                  'class' => 'ywanyi\log\DingTalkTarget',
 *                  'token' => 'your token',
 *                  'levels' => ['error', 'warning'],
 *                  'atMobiles' => [ '13800138000' ]
 *              ],
 *          ],
 *     ],
 * ],
 * ```
 * This is just an example.
 */
class DingTalkTarget extends Target
{
    public $token = '';

    public $atMobiles = [

    ];

    public function export()
    {
        $messages = array_map([$this, 'formatMessage'], $this->messages);
        array_pop($messages);
        $body = wordwrap(implode("\n", $messages), 70);
        $client = new Client(['transport' => 'yii\httpclient\CurlTransport']);
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl("https://oapi.dingtalk.com/robot/send?access_token=".$this->token)
            ->setFormat(Client::FORMAT_JSON)
            ->setData([
                'msgtype' => 'text',
                'text' => [
                    'content' => $body
                ],
                'at' => [
                    'isAtALl' => true,
                    'atMobiles' => $this->atMobiles
                ]
            ])
            ->send();
        if ($response->isOk) {
//            $newUserId = $response->data['id'];
        }
    }
}
