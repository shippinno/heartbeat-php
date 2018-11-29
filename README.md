# Heartbeat

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/shippinno/heartbeat-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/shippinno/heartbeat-php/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/shippinno/heartbeat-php/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/shippinno/heartbeat-php/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/shippinno/heartbeat-php/badges/build.png?b=master)](https://scrutinizer-ci.com/g/shippinno/heartbeat-php/build-status/master)

Let the stuff heartbeat and monitor if it is alive.

Currently it only supports [Dead Man's Snitch](https://deadmanssnitch.com/).

## Installation

```sh
$ composer require shippinno/heartbeat
```

## Usage

Set up a Heartbeater singleton, with a heart and channels.

```php
$heartbeater = Heartbeater::instance();
$heartbeater->setHeart(new DeadMansSnitchHeart(new Client);
$heartbeater->setChannels([
    'vital' => 'SNITCH_TOKEN',
]);
```

Let it heartbeat forever.

```php
class Dude
{
    public function live()
    {
        $alive = true;
        while ($alive) {
            Heartbeat::instance()->heartbeat('vital');
            sleep(1);
        }
    }
}
```
