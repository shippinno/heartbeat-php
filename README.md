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

Make it heartbeatable.

```php
class Dude
{
    use Heartbeatable;
   
    // ...
}
```

Set a heart.

```php
$dude = new Dude;
$dude->setHeart(new DeadMansSnitchHeart('SNITCH_TOKEN'));
```

Let it heartbeat forever.

```php
class Dude
{
    use Heartbeatable;
   
    public function live()
    {
        $alive = true;
        while ($alive) {
            $this->heartbeat();
            sleep(1);
        }
    }
}
```
