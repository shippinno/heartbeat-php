# Heartbeat

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

Let it heartbeat.

```php
class Dude
{
    use Heartbeatable;
   
    public function live()
    {
        while ($alive) {
            $this->heartbeat();
            sleep(1);
        }
    }
}
```